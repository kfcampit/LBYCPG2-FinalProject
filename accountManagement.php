<?php 
    $sqlconnect = mysqli_connect('localhost', 'root', '');
    if (!$sqlconnect){
        die("Failed to connect to the database: ");
    }
            
    $selectDB = mysqli_select_db($sqlconnect, 'APSMS');
    if (!$selectDB){
         die("Failed to connect to the database: ");
    }
?>

<html>
    <head>
        <title>CSO - APSMS</title>
        <meta charset = "UTF-8">
        <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
        <meta name = "viewport" content = "width = device - width, initialize-scale = 1.0">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <style>.error {color: #FF0000}</style>
    </head>
    <body>
        <?php include("_navbar.php")?>

        <div class="container" >
                <h1 style="text-align: center; padding-bottom: 16px">Account Management System</h1>
            </div>

            <div class = "container" style = "padding-left: 10%; padding-right: 10%">
                <form class="row g-3" method="get">
                    <div class="col-auto">
                        <label for="search" class="visually-hidden">SearchVal</label>
                        <input type="text" class="form-control" name="search" placeholder="Search">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3" name="searchButton">Search</button>
                    </div>
                    <div class="col-auto">
                        <a class="btn btn-primary mb-3" name="createAccount" data-bs-toggle="modal" data-bs-target="#createAccount">Create Account</a>
                    </div>
                </form>
            </div>
            
        <div class = "container-sm" style = "padding-left: 10%; padding-right: 10%">
            <div class = "scroll"> 
                <table class = "table">
                    <thread>
                         <tr>
                            <th> Account Name </th>
                            <th> Username</th>
                            <th> Classification</th>
                            <th> Organization</th>
                            <th>  </th>
                        </tr>
                    </thread>
                 <tbody>
                    <?php


                        function allContents($connection) {
                            $orgsearch = " ";

                            if ($_SESSION['organization'] != 'CSO') {
                                $orgsearch = " WHERE Organization = '". $_SESSION['organization'] ."' ";
                            }

                            $result_out = mysqli_query($connection, "SELECT accountID, accountName, username, password, classification, organization FROM accountDetails $orgsearch");
                            if (!$result_out) die("Failed to connect: ");
                            else return $result_out;
                        }

                        function displayTable($result_out) {
                            while($dataVal = mysqli_fetch_array($result_out)){
                                $id = $dataVal['accountID'];
                                $name = $dataVal['accountName'];
                                $user = $dataVal['username'];
                                $pass = $dataVal['password'];
                                $class = $dataVal['classification'];
                                $org= $dataVal['organization'];

                                echo "<tr>
                                <td>" . $name . "</td>
                                <td>" . $user . "</td>
                                <td>" . $class . "</td>
                                <td>" . $org . "</td>
                                <td>
                                    <a class = 'btn btn-primary' data-bs-toggle='modal' data-bs-target='#editAccount' data-bs-id='". $id ."' data-bs-username='". $user ."' data-bs-password='". $pass ."' data-bs-class='". $class ."'  data-bs-org='". $org ."' data-bs-name='". $name ."'> Edit </a> 
                                </td>
                                </tr>";
                            }          
                        }
                        
                        function cleanInput($data) {
                            $data = trim($data);
                            $data = stripslashes($data);
                            $data = htmlspecialchars($data);
            
                            return $data;
                        }

                        function checkIfValid($connection, $user) {
                            $searchForUser = mysqli_query($connection, "SELECT * FROM accountDetails WHERE username = '". cleanInput($user) ."'");
                            $data = mysqli_fetch_array($searchForUser);
                            return $data == null;
                        }

                        
                        function inputData($connection, $user, $pass, $accntName, $classif, $org) {
                            $insertRecord = "INSERT INTO accountDetails(username, password, accountName, classification, organization) VALUES('". $user ."', '". $pass ."', '". $accntName ."', '". $classif. "', '". $org ."')";
                            mysqli_query($connection, $insertRecord);
                        }

                        function updateData($connection, $id, $user, $pass, $accntName, $classif, $org) {
                            $replaceRecord = "REPLACE INTO accountDetails(accountID, username, password, accountName, classification, organization) VALUES('". $id ."', '". $user ."', '". $pass ."', '". $accntName ."', '". $classif. "', '". $org ."')";
                            mysqli_query($connection, $replaceRecord);
                        }

                        function deleteData($connection, $id) {
                            $deleteRecord = "DELETE FROM accountDetails WHERE accountID = ". $id ."";
                            mysqli_query($connection, $deleteRecord);
                        }


                        if(isset($_GET['searchButton'])) {
                            $orgsearch = " ";

                            if ($_SESSION['organization'] != 'CSO') {
                                $orgsearch = " Organization = '". $_SESSION['organization'] ."' AND ";
                            }
                            

                            $basicSearch = cleanInput($_GET['search']);
                            if (empty($basicSearch)) displayTable(allContents($sqlconnect));
                            else {
                                $result_out = mysqli_query($sqlconnect,
                                "SELECT accountID, accountName, username, classification, organization, password FROM accountDetails joined
                                WHERE $orgsearch username LIKE '%". $basicSearch ."%' OR
                                accountName LIKE '%". $basicSearch ."%' OR
                                organization LIKE '%". $basicSearch ."%' OR
                                classification LIKE '%". $basicSearch ."%'");
                                displayTable($result_out);
                            }
                        } else if(isset($_POST['createAcc'])) {
                            $user = $_POST['user'];
                            $pass = $_POST['pass'];
                            $accntName = $_POST['accntName'];
                            $classif = $_POST['classif'];
                            $org = $_POST['org'];

                            if (checkIfValid($sqlconnect, $user) && !empty($user) && !empty($pass) && !empty($accntName) && !empty($classif) && !empty($org)) inputData($sqlconnect, $user, $pass, $accntName, $classif, $org);
                            displayTable(allContents($sqlconnect));

                        } else if(isset($_POST['saveAcc'])) {
                            $id = $_POST['id'];
                            $user = $_POST['user'];
                            $pass = $_POST['pass'];
                            $accntName = $_POST['accntName'];
                            $classif = $_POST['classif'];
                            $org = $_POST['org'];

                            if (!empty($user) && !empty($pass) && !empty($accntName) && !empty($classif) && !empty($org)) updateData($sqlconnect, $id, $user, $pass, $accntName, $classif, $org);
                            displayTable(allContents($sqlconnect)); 

                        } else if(isset($_POST['delAcc'])) {
                            deleteData($sqlconnect, $_POST['id']);   
                            displayTable(allContents($sqlconnect));              
                        }
                        else displayTable(allContents($sqlconnect)); 
                    ?>
                </tbody>
                </table>
            </div>
        </div>
        
        <div class="modal fade" id="createAccount" tabindex="-1" aria-labelledby="createAccountLabel" aria-hidden="true">
            <div class="modal-dialog">
            <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createAccountLabel">Create Account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                    <div class="mb-3">
                        <label for="user" class="col-form-label">Username:</label>
                        <input type="text" class="form-control" id="user" name="user">
                    </div>
                    <div class="mb-3">
                        <label for="pass" class="col-form-label">Password:</label>
                        <input type="password" class="form-control" id="pass" name="pass">
                    </div>
                    <div class="mb-3">
                        <label for="accntName" class="col-form-label">Account Name:</label>
                        <input type="text" class="form-control" id="accntName" name="accntName">
                    </div>
                    <div class="mb-3">
                        <label for="dropdownclassif" class="col-form-label">Classification:</label>
                        <select class="form-select form-select" name="classif" id="dropdownclassif"
                        <?php
                            if ($_SESSION['organization'] != 'CSO') {
                                echo "readonly value = '". $_SESSION['organization'] ."'>";
                            } else {
                                echo ">
                                    <option value=''>  </option>
                                    <option value='VC'>VC</option>
                                    <option value='AVC'>AVC</option>
                                    <option value='ASSOCIATE'>ASSOCIATE</option>
                                    <option value='ORG'>ORG</option>
                                    
                                ";
                            }
                        ?>
                        
                        <option value='ORGOFFICER'>ORGOFFICER</option>
                            
                            
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="org" class="col-form-label">Organization:</label>
                        <input type="text" class="form-control" id="org" name="org"
                        <?php
                            if ($_SESSION['organization'] != 'CSO') {
                                echo "readonly value = '". $_SESSION['organization'] ."'";
                            }
                        ?>
                        >
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input class="btn btn-primary" type = "submit" name = "createAcc" value="Create Account">
                </div>
                </div>
            </form>
            </div>
        </div>


        <div class="modal fade" id="editAccount" tabindex="-1" aria-labelledby="editAccountLabel" aria-hidden="true">
            <div class="modal-dialog">
            <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editAccountLabel">Edit Account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="id" class="col-form-label">Account ID:</label>
                        <input type="number" readonly class="form-control" id="idEditModal" name="id">
                    </div>
                    <div class="mb-3">
                        <label for="user" class="col-form-label">Username:</label>
                        <input type="text" class="form-control" id="userEditModal" name="user">
                    </div>
                    <div class="mb-3">
                        <label for="pass" class="col-form-label">Password:</label>
                        <input type="password" class="form-control" id="passEditModal" name="pass">
                    </div>
                    <div class="mb-3">
                        <label for="accntName" class="col-form-label">Account Name:</label>
                        <input type="text" class="form-control" id="accntNameEditModal" name="accntName">
                    </div>
                    <div class="mb-3">
                        <label for="classifEditModal" class="col-form-label">Classification:</label>
                        <select class="form-select form-select" name="classif" id="classifEditModal">
                            <option value="">  </option>
                            <option value="VC">VC</option>
                            <option value="AVC">AVC</option>
                            <option value="ASSOCIATE">ASSOCIATE</option>
                            <option value="ORG">ORG</option>
                            <option value="ORGOFFICER">ORGOFFICER</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="org" class="col-form-label">Organization:</label>
                        <input type="text" class="form-control" id="orgEditModal" name="org">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input class="btn btn-primary" type = "submit" name = "saveAcc" value="Save">
                    <input class="btn btn-danger" type = "submit" name = "delAcc" value="Delete">
                </div>
                </div>
            </form>
            </div>
        </div>

        <script>
            var editModal = document.getElementById('editAccount')
            editModal.addEventListener('show.bs.modal', function (event) {

            var button = event.relatedTarget
            // Extract info from data-bs-* attributes
            var id = button.getAttribute('data-bs-id')
            var username = button.getAttribute('data-bs-username')
            var password = button.getAttribute('data-bs-password')
            var classif = button.getAttribute('data-bs-class')
            var org = button.getAttribute('data-bs-org')
            var name = button.getAttribute('data-bs-name')

            // Set values of Text Entries
            document.getElementById('idEditModal').value = id
            document.getElementById('userEditModal').value = username
            document.getElementById('passEditModal').value = password
            document.getElementById('classifEditModal').value = classif
            document.getElementById('orgEditModal').value = org
            document.getElementById('accntNameEditModal').value = name
            })
        </script>

    </body>
</html>
