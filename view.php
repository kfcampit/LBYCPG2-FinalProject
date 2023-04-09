<?php 
    $sqlconnect = mysqli_connect('localhost', 'root', '');
    if (!$sqlconnect){
        die("Failed to connect to the database: ");
    }
            
    $selectDB = mysqli_select_db($sqlconnect, 'APSMS');
    if (!$selectDB){
         die("Failed to connect to the database: ");
    }

    session_start();
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
            
        </style>
    </head>
    <body style='background-color: #F6F6E9'>
    <div class="container" >
        <h1 style="text-align: center; padding-bottom: 16px; color: #013700">Document Tracking Status </h1>
    </div>        
        <body style = "margin: 50px;">
            <div class = "container" style='background-color: #F5F5F0'>  
                <div class = "float-parent-element">  
                <table class = "table">
                <tbody>
                    <div class = "float-child-element">
                    <?php
                    $subID = $_GET['id'];
                    $_SESSION['submID'] = $subID;
                    $result_out = mysqli_query($sqlconnect, "SELECT Timestamp, Term, Organization, ARN, ActivityTitle, TypeOfSubmission, ActivityDuration, ForEvaluation, StartingDate, EndingDate, Time, Venue, 
                    NatureOfActivity, TypeOfActivity, SubmissionBy, Position, ContactNumber, Email, File, ProcessingStage, ApprovalStatus from actdetail JOIN actstatus on actdetail.submissionid = actstatus.subid 
                    WHERE SubmissionID = '$subID'");
                    if (!$result_out){
                        die("Failed to connect: ");
                    }else {
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
                    echo "<a class = 'btn btn-primary' href = 'dts.php'> Return DTS </a> 
                    <a class = 'btn btn-success' href = 'actStatusEdit.php'> Check Submission</a>  ";
                ?>
                </div>
                <div class = "float-child-element">
                    <?php
                    $result_out = mysqli_query($sqlconnect, "SELECT PROCESSINGSTAGE, APPROVALSTATUS, ASSOCIATECHECKER, FINALCHECKER, ASSOCIATEREMARKS, FINALREMARKS, POSTACTREQUIREMENTS, POSTACTDEADLINE,
                    FOREVAL, SUBID FROM ACTSTATUS WHERE SUBID = '$subID'");
                    if (!$result_out){
                        die("Failed to connect: ");
                    }else {
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
                        echo "<div style='text-align:justify'>";
                        echo "<div class = 'textColor'>Processing Stage: </div>" . " " . $processStage . " " . "<br>";
                        echo "<div class = 'textColor'>Approve Status: </div>" . " " . $approveStatus . " " . "<br>";
                        echo "<div class = 'textColor'>Associate Checker: </div>" . " " . $assocCheck . " " . "<br>";
                        echo "<div class = 'textColor'>Final Checker: </div>" . " " . $finalCheck . " " . "<br>";
                        echo "<div class = 'textColor'>Associate Remark: </div>" . " " . "<div class = 'box'>$assocRemark  </div>". " " . "<br>";
                        echo "<div class = 'textColor'>Final Remark: </div>" . " " . "<div class = 'box'>$finalRemark  </div>" . " " . "<br>";
                        echo "<div class = 'textColor'>Post-Activity Requirements: </div>" . " " . "<div class = 'box'>$postReq </div>" . " " . "<br>";
                        echo "<div class = 'textColor'>Post-Activity Deadline: </div>" . " " . $postD . " " . "<br>";
                        echo "<div class = 'textColor'>For Evaluation: </div>" . " " . $eval . " " . "<br>";
                    }
                    ?>
                    </div>
                </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
        
<?php
    mysqli_close($sqlconnect);
?>
