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
        <style>
            .wrapper{
                display: inline-block;
                width: 150px;
                color : #183C1B;
                margin : 2px;
                border-radius: 5px; 
            }
            .textColor{
                display: inline-block;
                width: 150px;
                color : #183C1B;
                margin : 2px;
            }
            .float-parent-element { 
                width: 100%; 
            } 
            .float-child-element { 
                float: left; 
                width: 50%; 
            }
            .box {
                display: inline-block;
                width: 300px;
                border: solid grey;
                padding: 5px;
                margin: 20px;
            }
            .error {color: #FF0000;}
            
        </style>
    </head>
    <body>
    <?php include("_navbar.php")?>
    <div class="container" >
        <h1 style="text-align: center; padding-bottom: 16px;">Document Tracking Status </h1>
    </div>        
        <body>
            <div class = "container">  
                <div class = "float-parent-element">  
                <table class = "table">
                <tbody>
                    <div class = "float-child-element">
                    <?php

                    if (!empty($_GET['id'])) {
                        $subID = $_GET['id'];
                        $_SESSION['submID'] = $subID;
                    } else {
                        $subID = $_SESSION['submID'];
                    }
                        

                    $result_out = mysqli_query($sqlconnect, "SELECT Timestamp, Term, Organization, ARN, ActivityTitle, TypeOfSubmission, ActivityDuration, ForEvaluation, StartingDate, EndingDate, Time, Venue, 
                    NatureOfActivity, TypeOfActivity, SubmissionBy, Position, ContactNumber, Email, File, ProcessingStage, ApprovalStatus from actdetail JOIN actstatus on actdetail.submissionid = actstatus.subid 
                    WHERE SubmissionID = '$subID'");


                    if (!$result_out){
                        die("Failed to connect: ");
                    } else {
                        $dataVal = mysqli_fetch_array($result_out);
                        $timeS = $dataVal['Timestamp'];
                        $term = $dataVal['Term'];
                        $org = $dataVal['Organization'];
                        $arn = $dataVal['ARN'];
                        $actTitle= $dataVal['ActivityTitle'];
                        $typeSub = $dataVal['TypeOfSubmission'];
                        $actDur = $dataVal['ActivityDuration'];
                        $eval = $dataVal['ForEvaluation'];
                        $startDate = $dataVal['StartingDate'];
                        $endDate = $dataVal['EndingDate'];
                        $time = $dataVal['Time'];
                        $venue = $dataVal['Venue'];
                        $natureAct = $dataVal['NatureOfActivity'];
                        $typeAct = $dataVal['TypeOfActivity'];
                        $subBy = $dataVal['SubmissionBy'];
                        $pos = $dataVal['Position'];
                        $num = $dataVal['ContactNumber'];
                        $email = $dataVal['Email'];
                        $file = $dataVal['File'];
                        $processStage = $dataVal['ProcessingStage'];
                        $approveStatus = $dataVal['ApprovalStatus'];
                        echo "<div class = 'textColor'>Timestamp: </div>" . " " . $timeS . " " . "<br>";
                        echo "<div class = 'textColor'>Term: </div>" . " " . $term . " " . "<br>";
                        echo "<div class = 'textColor'>Organization: </div>" . " " . $org . " " . "<br>";
                        echo "<div class = 'textColor'>Activity Reference Number: </div>" . " " . $arn . " " . "<br>";
                        echo "<div class = 'textColor'>Activity Title: </div>" . " " . $actTitle . " " . "<br>";
                        echo "<div class = 'textColor'>Type of Submission: </div>" . " " . $typeSub . " " . "<br>";
                        echo "<div class = 'textColor'>Activity Duration: </div>" . " " . $actDur . " " . "<br>";
                        echo "<div class = 'textColor'>For Evaluation: </div>" . " " . $eval . " " . "<br>";
                        echo "<div class = 'textColor'>Starting Date: </div>" . " " . $startDate . " " . "<br>";
                        echo "<div class = 'textColor'>Ending Date: </div>" . " " . $endDate . " " . "<br>";
                        echo "<div class = 'textColor'>Time: </div>" . " " . $time . " " . "<br>";
                        echo "<div class = 'textColor'>Venue: </div>" . " " . $venue . " " . "<br>";
                        echo "<div class = 'textColor'>Nature of Activity: </div>" . " " . $natureAct . " " . "<br>";
                        echo "<div class = 'textColor'>Type of Activity: </div>" . " " . $typeAct . " " . "<br>";
                        echo "<div class = 'textColor'>Submission By: </div>" . " " . $subBy . " " . "<br>";
                        echo "<div class = 'textColor'>Position: </div>" . " " . $pos . " " . "<br>";
                        echo "<div class = 'textColor'>Contact Number: </div>" . " " . $num . " " . "<br>";
                        echo "<div class = 'textColor'>Email: </div>" . " " . $email . " " . "<br>";
                        echo "<div class = 'textColor'>File: </div>" . " " . "<a href = $file target = '_blank'> $file </a> " . "<br>";
                        if (strtolower($processStage) == strtolower('For First Checking')){
                            echo "<div class = 'textColor'>Processing Stage: </div>" . " " . "<div class = 'wrapper' style='background-color:#FF0000'>$processStage</div>" . "<br>"; 
                        } else if (strtolower($processStage) == strtolower('For Second Checking')) {
                            echo "<div class = 'textColor'>Processing Stage: </div>" . " " . "<div class = 'wrapper' style='background-color:#FEC20C'>$processStage</div>" . "<br>"; 
                        }else if (strtolower($processStage) == strtolower('Checked')) {
                            echo "<div class = 'textColor'>Processing Stage: </div>" . " " . "<div class = 'wrapper' style='background-color:#03AC13'>$processStage</div>" . "<br>"; 
                        }
                        if (strtolower($approveStatus) == strtolower('Full Incentive')){
                            echo "<div class = 'textColor'>Approval Status: </div>" . " " . "<div class = 'wrapper' style='background-color:#6f90f4'>$approveStatus</div>" . " " . "<br>";}
                        elseif (strtolower($approveStatus) == strtolower('Half Incentive')) {
                            echo "<div class = 'textColor'>Approval Status: </div>" . "<div class = 'wrapper' style='background-color:#6f90f4'>$approveStatus</div>" . " " . "<br>";}
                        elseif (strtolower($approveStatus) == strtolower('Early Approved')) {
                            echo "<div class = 'textColor'>Approval Status: </div>" . "<div class = 'wrapper' style='background-color:#d9ead3'>$approveStatus</div>" . " " . "<br>";}
                        elseif (strtolower($approveStatus) == strtolower('Late Approved')) {
                            echo "<div class = 'textColor'>Approval Status: </div>" . "<div class = 'wrapper' style='background-color:#fff2cc'>$approveStatus</div>" . " " . "<br>";}
                        elseif (strtolower($approveStatus) == strtolower('Pending')) {
                            echo "<div class = 'textColor'>Approval Status: </div>" . "<div class = 'wrapper' style='background-color:#CBC3E3'>$approveStatus</div>" . " " . "<br>";}
                        elseif (strtolower($approveStatus) == strtolower('Uncounted Pend')) {
                            echo "<div class = 'textColor'>Approval Status: </div>" . "<div class = 'wrapper' style='background-color:#ff80ff'>$approveStatus</div>" . " " . "<br>";}
                        elseif (strtolower($approveStatus) == strtolower('No Status')) {
                            echo "<div class = 'textColor'>Approval Status: </div>" . "<div class = 'wrapper' style='background-color:#D3D3D3'>$approveStatus</div>" . " " . "<br>";}
                        elseif (strtolower($approveStatus) == strtolower('Denied')) {
                            echo "<div class = 'textColor'>Approval Status: </div>" . "<div class = 'wrapper' style='background-color:#E3BAC6'>$approveStatus</div>" . " " . "<br>";}
                    }
                    echo "<br><a class = 'btn btn-primary' href = 'dts.php'> Return DTS </a>         <span style = 'padding-right: 8px'></span>";

                    $result_out = mysqli_query($sqlconnect, "SELECT PROCESSINGSTAGE, APPROVALSTATUS, ASSOCIATECHECKER, FINALCHECKER, ASSOCIATEREMARKS, FINALREMARKS, POSTACTREQUIREMENTS, POSTACTDEADLINE,
                    FOREVAL, SUBID FROM ACTSTATUS WHERE SUBID = '$subID'");
                    if (!$result_out){
                        die("Failed to connect: ");
                    } else {
                        $dataVal = mysqli_fetch_array($result_out);
                        $processStage = $dataVal['PROCESSINGSTAGE'];
                        $approveStatus = $dataVal['APPROVALSTATUS'];
                        $assocCheck = $dataVal['ASSOCIATECHECKER'];
                        $finalCheck = $dataVal['FINALCHECKER'];
                        $assocRemark = $dataVal['ASSOCIATEREMARKS'];
                        $finalRemark = $dataVal['FINALREMARKS'];
                        $postReq = $dataVal['POSTACTREQUIREMENTS'];
                        $postD = $dataVal['POSTACTDEADLINE'];
                        $eval = $dataVal['FOREVAL'];
                    }

                    if ($_SESSION['organization'] == 'CSO')
                    echo "<button 

                        class = 'btn btn-success' 
                        type='button' 
                        data-bs-toggle='modal' 
                        data-bs-target='#checkSubmission'
                        data-bs-processStage = '$processStage'
                        data-bs-approveStatus = '$approveStatus'
                        data-bs-assocCheck = '$assocCheck'
                        data-bs-finalCheck = '$finalCheck'
                        data-bs-assocRemark = '$assocRemark'
                        data-bs-finalRemark = '$finalRemark'
                        data-bs-postReq =  '$postReq'
                        data-bs-postD = '$postD'
                        data-bs-eval = '$eval'
                    
                    > Check Submission</button>  ";

                    if(isset($_POST['save'])) {
                        $subID = $_SESSION['submID'];
                        $updaterecords = "UPDATE ACTSTATUS SET PROCESSINGSTAGE = '$_POST[process]', APPROVALSTATUS = '$_POST[approval]', ASSOCIATECHECKER = '$_POST[assocCheck]', FINALCHECKER = '$_POST[finalCheck]', 
                        ASSOCIATEREMARKS = '$_POST[assocRemark]', FINALREMARKS = '$_POST[finalRemark]', POSTACTREQUIREMENTS = '$_POST[postDet]', POSTACTDEADLINE = '$_POST[deadlinePR]', FOREVAL = '$_POST[evalStatus]' 
                        WHERE SUBID = '$subID'";
                        mysqli_query($sqlconnect, $updaterecords);
                        echo "<script type='text/javascript'>location.href = 'view.php?id=$subID';</script>";
                    }

                    function test_input($data) {
                        $data = trim($data);
                        $data = stripslashes($data);
                        $data = htmlspecialchars($data);
                        return $data;
                    }
                ?>
                </div>
                <div class = "float-child-element">
                    <?php
                        echo "<div style='text-align:justify'>";
                        echo "<div class = 'textColor'>Processing Stage: </div>" . " " . $processStage . " " . "<br>";
                        echo "<div class = 'textColor'>Approve Status: </div>" . " " . $approveStatus . " " . "<br>";
                        echo "<div class = 'textColor'>Associate Checker: </div>" . " " . $assocCheck . " " . "<br>";
                        echo "<div class = 'textColor'>Final Checker: </div>" . " " . $finalCheck . " " . "<br>";
                        echo "<div class = 'textColor'>Associate Remark: </div>" . " " . "<div class='form-control'>$assocRemark  </div>". " " . "<br>";
                        echo "<div class = 'textColor'>Final Remark: </div>" . " " . "<div class='form-control'>$finalRemark  </div>" . " " . "<br>";
                        echo "<div class = 'textColor'>Post-Activity Requirements: </div>" . " " . "<div class='form-control'>$postReq </div>" . " " . "<br>";
                        echo "<div class = 'textColor'>Post-Activity Deadline: </div>" . " " . $postD . " " . "<br>";
                        echo "<div class = 'textColor'>For Evaluation: </div>" . " " . $eval . " " . "<br>";
                    ?>
                    </div>
                </tbody>
                </table>
            </div>
        </div>

        <div class="modal fade" id="checkSubmission" tabindex="-1" aria-labelledby="checkSubLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createAccountLabel">Check Submission</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                
                    <label for = "dropdownProcess" style = "color: #183C1B; width : 150px; border-radius: 10px"> Processing Stage: </label> 
                    <select class="form-select" name="process" id="dropdownProcess" <?php if($_SESSION['classification'] == "ASSOCIATE") echo " disabled " ?>>
                        <option value=""> </option>
                        <option value="For First Checking">For First Checking</option>
                        <option value="For Second Checking">For Second Checking</option>
                        <option value="Checked">Checked</option>
                    </select>


                    <br>
                    <label for = "dropdownApproval" style = "width : 150px; border-radius: 10px"> Approval Status: </label> 
                    <select class="form-select" name="approval" id="dropdownApproval" <?php if($_SESSION['classification'] == "ASSOCIATE") echo " disabled " ?>>
                        <option value="">  </option>
                        <option value="Full Incentive">Full Incentive</option>
                        <option value="Half Incentive">Half Incentive</option>
                        <option value="Early Approved">Early Approved</option>
                        <option value="Late Approved">Late Approved</option>
                        <option value="Pending">Pending</option>
                        <option value="Uncounted Pend">Uncounted Pend</option>
                        <option value="No Status">No Status</option>
                        <option value="Denied">Denied</option>
                    </select>
                    
                    <br>  
                    <label for = "assocCheck" style = "width : 150px; border-radius: 10px"> Associate Checker: </label>              
                    <input class="form-control" type="text" name="assocCheck" <?php if($_SESSION['classification'] == "ASSOCIATE") echo " readonly value = '". $_SESSION['accountName'] ."' "; else echo " id='assocCheck' "  ?>>

                    <br>
                    <label for = "finalCheck" style = "width : 150px; border-radius: 10px"> Final Checker: </label>
                    <input class="form-control" type="text" name="finalCheck" <?php if($_SESSION['classification'] == "ASSOCIATE") echo " readonly id='finalCheck' "; else echo " readonly value = '". $_SESSION['accountName'] ."' ";?>>
                    

                    <br>
                    <label for = "assocRemark" style = "width : 150px; border-radius: 10px"> Associate Remark: </label>
                    <textarea class="form-control" rows = '5' cols = '30' name = 'assocRemark' id = 'assocRemark' placeholder = 'Enter Associate Remark Here'></textarea>
                    

                    <br>
                    <label for = "finalRemark" style = "width : 150px; border-radius: 10px"> Final Remark: </label>
                    <textarea class="form-control" rows = '5' cols = '30' name = 'finalRemark' id = 'finalRemark' placeholder = 'Enter Final Remark Here' <?php if($_SESSION['classification'] == "ASSOCIATE") echo " readonly " ?>></textarea>
                    

                    <br>
                    <label for = "postDet" style = "border-radius: 10px">Post-Activity Requirements: </label>
                    <textarea class="form-control" rows = '5' cols = '30' name = 'postDet' id = 'postDet' placeholder = 'Enter Post Activity Details' <?php if($_SESSION['classification'] == "ASSOCIATE") echo " readonly " ?>></textarea>
                    

                    <br>
                    <label for = "deadlinePR" style = "color: #183C1B; border-radius: 10px"> Post-Activity Deadline: </label>
                    <input class="form-control" type="date" name="deadlinePR"  id="deadlinePR" <?php if($_SESSION['classification'] == "ASSOCIATE") echo " readonly " ?>>
           

                    <br>
                    <label for = "evalStatus" style = "width : 150px; border-radius: 10px"> For Evaluation: </label>
                    <select class="form-select" name="evalStatus" id="evalStatus" <?php if($_SESSION['classification'] == "ASSOCIATE") echo " disabled " ?>>
                        <option value=""></option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                    <br>
                    <br>     
                    
                </form>
                </table>    

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-success" value="Save Changes" name="save" />
                </div>
                </div>
            </form>
            </div>
        </div>

        <script>
            var editModal = document.getElementById('checkSubmission')
            editModal.addEventListener('show.bs.modal', function (event) {

            var button = event.relatedTarget
            // Extract info from data-bs-* attributes
            var processStage = button.getAttribute('data-bs-processStage')
            var approveStatus = button.getAttribute('data-bs-approveStatus')
            var assocCheck = button.getAttribute('data-bs-assocCheck')
            var finalCheck = button.getAttribute('data-bs-finalCheck')
            var assocRemark = button.getAttribute('data-bs-assocRemark')
            var finalRemark = button.getAttribute('data-bs-finalRemark')
            var postReq = button.getAttribute('data-bs-postReq')
            var postD = button.getAttribute('data-bs-postD')
            var eval = button.getAttribute('data-bs-eval')

            // Set values of Text Entries
            document.getElementById('dropdownProcess').value = processStage
            document.getElementById('dropdownApproval').value = approveStatus

            try {
                document.getElementById('assocCheck').value = assocCheck
            } catch {

            }

            try {
                document.getElementById('finalCheck').value = finalCheck
            } catch {

            }
            
            
            document.getElementById('assocRemark').value = assocRemark
            document.getElementById('finalRemark').value = finalRemark
            document.getElementById('postDet').value = postReq
            document.getElementById('deadlinePR').value = postD
            document.getElementById('evalStatus').value = eval
            })
        </script>
    
    </body>
</html>
        
<?php
    mysqli_close($sqlconnect);
?>
