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
        <meta charset = "UTF-8">
        <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
        <meta name = "viewport" content = "width = device - width, initialize-scale = 1.0">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel = "stylesheet" href = "/css/dts_style.css">
        <script src = "/js/dts_script.js"></script>
    </head>
    <body style="overflow-y: scroll">
            <?php include("_navbar.php") ?>
            
            <div class="container">
                <h1 style="text-align: center; padding-bottom: 16px">Document Tracking System</h1>
            </div>

            <div class = "container">
                <form class="row g-3" method="get">
                    <div class="col-auto">
                        <label for="search" class="visually-hidden">SearchVal</label>
                        <input type="text" class="form-control" name="search" placeholder="Basic Search">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3" name="searchButton">Search</button>
                    </div>

                    <div class="col-auto">
                        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            Advanced Search
                        </button>
                    </div>
                </form>
                <div class="collapse search" id="collapseExample">
                    <div class="card card-body">
                        <form class="row" style="padding-top: 8px; padding-left: 16px; padding-right: 16px" method="get">
                            <div class="col">
                                <div class="row g-2 advSearch">
                                    <div class="col-auto">
                                        <input type="text" readonly class="form-control-plaintext" value="Term">
                                    </div>
                                    <div class="col-auto">
                                        <label for="selectTerm" class="visually-hidden">selectTerm</label>
                                        <select class="form-select" name="selectTerm">
                                            <option value="">Select Term</option>
                                            <option value="Term 1">Term 1</option>
                                            <option value="Term 2">Term 2</option>
                                            <option value="Term 3">Term 3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row g-2 advSearch">
                                    <div class="col-auto">
                                        <input type="text" readonly class="form-control-plaintext" value="Organization">
                                    </div>
                                    <div class="col-auto">
                                        <label for="searchOrg" class="visually-hidden">searchOrg</label>
                                        <input type="text" class="form-control" name="searchOrg" placeholder="CSO">
                                    </div>
                                </div>
                                <div class="row g-2 advSearch">
                                    <div class="col-auto">
                                        <input type="text" readonly class="form-control-plaintext" value="Activity Title">
                                    </div>
                                    <div class="col-auto">
                                        <label for="searchTitle" class="visually-hidden">searchTitle</label>
                                        <input type="text" class="form-control" name="searchTitle" placeholder="General Assembly">
                                    </div>
                                </div>
                                <div class="row g-2 advSearch">
                                    <div class="col-auto">
                                        <input type="text" readonly class="form-control-plaintext" value="Type of Submission">
                                    </div>
                                    <div class="col-auto">
                                        <label for="selectTypeSub" class="visually-hidden">selectTypeSub</label>
                                        <select class="form-select" name="selectTypeSub">
                                            <option value="">Select Type of Submission</option>
                                            <option value="Initial Submission">Initial Submission</option>
                                            <option value="Pended Submission">Pended Submission</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="row g-2 advSearch">
                                    <div class="col-auto">
                                        <input type="text" readonly class="form-control-plaintext" value="Activity Duration">
                                    </div>
                                    <div class="col-auto">
                                        <label for="selectDuration" class="visually-hidden">selectDuration</label>
                                        <select class="form-select" name="selectDuration">
                                            <option value="">Select Activity Duration</option>
                                            <option value="One Day">One Day</option>
                                            <option value="Multiple Days">Multiple Days</option>
                                            <option value="Termlong">Termlong</option>
                                            <option value="Yearlong">Yearlong</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row g-2 advSearch">
                                    <div class="col-auto">
                                        <input type="text" readonly class="form-control-plaintext" value="Staring Date">
                                    </div>
                                    <div class="col-auto">
                                        <label for="searchDate" class="visually-hidden">searchDate</label>
                                        <input type="date" class="form-control" name="searchDate">
                                    </div>
                                </div>
                                <div class="row g-2 advSearch">
                                    <div class="col-auto">
                                        <input type="text" readonly class="form-control-plaintext" value="Nature of Activity">
                                    </div>
                                    <div class="col-auto">
                                        <label for="selectNature" class="visually-hidden">selectNature</label>
                                        <select class="form-select" name="selectNature">
                                            <option value="">Select Nature of Activity</option>
                                            <option value="Academic">Academic</option>
                                            <option value="Special Interest">Special Interest</option>
                                            <option value="Departmental Initiative">Departmental Initiative</option>
                                            <option value="Fundraising">Fundraising</option>
                                            <option value="Community Development">Community Development</option>
                                            <option value="Organizational Development">Organizational Development</option>
                                            <option value="Issue Advocacy">Issude Advocacy</option>
                                            <option value="Lasallian Formation/ Spiritual Growth">Lasallian Formation/ Spiritual Growth</option>
                                            <option value="Outreach">Outreach</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row g-2 advSearch">
                                    <div class="col-auto">
                                        <input type="text" readonly class="form-control-plaintext" value="Type of Activity">
                                    </div>
                                    <div class="col-auto">
                                        <label for="selectTypeAct" class="visually-hidden">selectTypeAct</label>
                                        <select class="form-select" name="selectTypeAct">
                                            <option value="">Select Type of Activity</option>
                                            <option value="Assistance">Assistance</option>
                                            <option value="Awareness Campaign">Awareness Campaig</option>
                                            <option value="Contest">Contest</option>
                                            <option value="Distribution">Distribution</option>
                                            <option value="Focus Group Discussion">Focus Group Discussion</option>
                                            <option value="General Assembly / Recognition">General Assembly / Recognition</option>
                                            <option value="Meeting">Meeting</option>
                                            <option value="Recreation">Recreation</option>
                                            <option value="Recruitment / Audiition / Election">Recruitment / Audiition / Election</option>
                                            <option value="Seminar / Workshop">Seminar / Workshop</option>
                                            <option value="Spiritual Activity">Spiritual Activity</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="padding-top: 16px">
                                <div class="d-grid gap-2 col-3">
                                    <button type="submit" class="btn btn-primary" name="advSearch">Search</button>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>

            <div class = "container">
            <div class = "scroll"> 
                <table class = "table">
                    <thread>
                         <tr>
                            <th> Timestamp </th>
                            <th> Term</th>
                            <th> Organization</th>
                            <th> Activity Title</th>
                            <th> Type of Submission</th>
                            <th> Activity Duration</th>
                            <th> Starting Date</th>
                            <th> Nature of Activity</th>
                            <th> Type of Acitivity</th>
                            <th> Submission Status</th>
                            <th> Check Status</th>
                        </tr>
                    </thread>
                 <tbody>
            <?php

                function allContents($connection) {
                    if ($_SESSION['organization'] != 'CSO') {
                        $result_out = mysqli_query($connection, "SELECT Timestamp, Term, Organization, ActivityTitle, TypeOfSubmission, ActivityDuration, StartingDate, NatureOfActivity, TypeOfActivity, 
                        SubmissionID, ProcessingStage FROM actdetail LEFT JOIN actstatus ON actdetail.SubmissionID = actstatus.SubID WHERE Organization = '". $_SESSION['organization'] ."' ORDER BY Timestamp");
                    } else {
                        $result_out = mysqli_query($connection, "SELECT Timestamp, Term, Organization, ActivityTitle, TypeOfSubmission, ActivityDuration, StartingDate, NatureOfActivity, TypeOfActivity, 
                        SubmissionID, ProcessingStage FROM actdetail LEFT JOIN actstatus ON actdetail.SubmissionID = actstatus.SubID ORDER BY Timestamp");
                    }
                    
                    if (!$result_out) die("Failed to connect: ");
                    else return $result_out;
                }

                function displayTable($result_out) {
                    while($dataVal = mysqli_fetch_array($result_out)){
                        $timeS = $dataVal['Timestamp'];
                        $term = $dataVal['Term'];
                        $org = $dataVal['Organization'];
                        $actTitle= $dataVal['ActivityTitle'];
                        $typeSub = $dataVal['TypeOfSubmission'];
                        $actDur = $dataVal['ActivityDuration'];
                        $startDate = $dataVal['StartingDate'];
                        $natureAct = $dataVal['NatureOfActivity'];
                        $typeAct = $dataVal['TypeOfActivity'];
                        $subID = $dataVal['SubmissionID'];
                        $process = $dataVal['ProcessingStage'];
                        echo "<tr>
                        <td>" . $timeS . "</td>
                        <td>" . $term . "</td>
                        <td>" . $org . "</td>
                        <td>" . $actTitle . "</td>
                        <td>" . $typeSub . "</td>
                        <td>" . $actDur . "</td>
                        <td>" . $startDate . "</td>
                        <td>" . $natureAct . "</td>
                        <td>" . $typeAct . "</td>
                        <td>" . $process . "</td>
                        <td>
                            <a class = 'btn btn-primary' href = 'view.php?id=$subID'> View </a> 
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

                if(isset($_GET['searchButton'])) {

                    $orgsearch = " ";

                    if ($_SESSION['organization'] != 'CSO') {
                        $orgsearch = " WHERE Organization = '". $_SESSION['organization'] ."' ";
                    }


                    $basicSearch = cleanInput($_GET['search']);
                    if (empty($basicSearch)) displayTable(allContents($sqlconnect));
                    else {
                        $result_out = mysqli_query($sqlconnect,
                        "SELECT Timestamp, Term, Organization, ActivityTitle, TypeOfSubmission, ActivityDuration, StartingDate, NatureOfActivity, TypeOfActivity, SubmissionID, ProcessingStage
                        FROM (SELECT Timestamp, Term, Organization, ActivityTitle, TypeOfSubmission, ActivityDuration, StartingDate, NatureOfActivity, TypeOfActivity, 
                    SubmissionID, ProcessingStage FROM actdetail LEFT JOIN actstatus ON actdetail.SubmissionID = actstatus.SubID". $orgsearch ."ORDER BY Timestamp) joined
                        WHERE Term LIKE '%". $basicSearch ."%' OR
                        Organization LIKE '%". $basicSearch ."%' OR
                        ActivityTitle LIKE '%". $basicSearch ."%' OR
                        TypeOfSubmission LIKE '%". $basicSearch ."%' OR
                        ActivityDuration LIKE '%". $basicSearch ."%' OR 
                        StartingDate LIKE '%". $basicSearch ."%' OR 
                        NatureOfActivity LIKE '%". $basicSearch ."%' OR 
                        TypeOfActivity LIKE '%". $basicSearch ."%' ");
                        displayTable($result_out);
                    }
                } else if (isset($_GET['advSearch'])) {
                    $selectTerm = cleanInput($_GET['selectTerm']);
                    $searchOrg = cleanInput($_GET['searchOrg']);
                    $searchTitle = cleanInput($_GET['searchTitle']);
                    $selectTypeSub = cleanInput($_GET['selectTypeSub']);
                    $selectDuration = cleanInput($_GET['selectDuration']);
                    $searchDate = cleanInput($_GET['searchDate']);
                    $selectNature = cleanInput($_GET['selectNature']);
                    $selectTypeAct = cleanInput($_GET['selectTypeAct']);

                    if (empty($selectTerm) && empty($searchOrg) && empty($searchTitle) && empty($selectTypeSub) && empty($selectDuration) && empty($searchDate) && empty($selectNature) && empty($selectTypeAct)) {
                        displayTable(allContents($sqlconnect));
                    } else {
                        $query = "SELECT Timestamp, Term, Organization, ActivityTitle, TypeOfSubmission, ActivityDuration, StartingDate, NatureOfActivity, TypeOfActivity, SubmissionID, ProcessingStage
                        FROM (SELECT * FROM actdetail LEFT JOIN actstatus ON actdetail.SubmissionID = actstatus.SubID". $orgsearch .") joined WHERE ";

                        if(!empty($selectTerm)) $query = $query . "Term LIKE '%". $selectTerm ."%' OR ";
                        if(!empty($searchOrg)) $query = $query . "Organization LIKE '%". $searchOrg ."%' OR ";
                        if(!empty($searchTitle)) $query = $query . "ActivityTitle LIKE '%". $searchTitle ."%' OR ";
                        if(!empty($selectTypeSub)) $query = $query . "TypeOfSubmission LIKE '%". $selectTypeSub ."%' OR ";
                        if(!empty($selectDuration)) $query = $query . "ActivityDuration LIKE '%". $selectDuration ."%' OR ";
                        if(!empty($searchDate)) $query = $query . "StartingDate LIKE '%". $searchDate ."%' OR ";
                        if(!empty($selectNature)) $query = $query . "NatureOfActivity LIKE '%". $selectNature ."%' OR ";
                        if(!empty($selectTypeAct)) $query = $query . "TypeOfActivity LIKE '%". $selectTypeAct ."%' OR ";
                        $query = $query . "0";

                        $result_out = mysqli_query($sqlconnect, $query);
                        displayTable($result_out);
                    }
                } else displayTable(allContents($sqlconnect));

                
        ?>
        </tbody>
        </table>


        <script>
            var myCollapse = document.getElementById('myCollapse')
            var bsCollapse = new bootstrap.Collapse(myCollapse, {
            toggle: false
            })
        </script>
    </body>
</html>
        
<?php
    mysqli_close($sqlconnect);
?>
