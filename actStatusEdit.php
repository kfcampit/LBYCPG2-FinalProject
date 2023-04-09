<html>
<head>
        <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
        <meta name = "viewport" content = "width = device - width, initialize-scale = 1.0">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <style>
            .scroll{
                height: 550px;
                overflow: scroll;
            }
            </style>
        <style>
            .error {color: #FF0000;}
        </style>
        <style>
             label {
                display: inline-block;
                width: 110px;
                color: #000000;
            }
            input {
                padding: 5px 10px;
            }
            select {
                padding: 5px 10px;
            }
        </style>
    </head>
<body style = "margin: 50px;">
    <div class = "container"> 
    <div class = "scroll"> 
    <table class = "table">
        <?php
        $process = $approval = $assocCheck = $FinalCheck = $assocRemark = $FinalRemark = $postReq = $deadlinePR = $eval_Status = "";
        $processErr = $approvalErr = $assocCheckErr = $finalCheckErr = $assocRemarkErr = $finalRemarkErr = $postReqErr = $deadlinePRErr = $eval_StatusErr = "";
        $flag = true;
        $sqlconnect = mysqli_connect('localhost', 'root', '');
        if (!$sqlconnect){
        die("Failed to connect to the database: ");
        }

        $selectDB = mysqli_select_db($sqlconnect, 'APSMS');
        if (!$selectDB){
        die("Failed to connect to the database: ");
        }

        session_start();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["process"])) {
            $processErr = "Processing Stage is required";
            $flag = false;
        } else {
            $process = test_input($_POST["process"]);
        }
        if (empty($_POST["approval"])) {
            $approvalErr = "Approval Status is required";
            $flag = false;
        } else {
            $approval = test_input($_POST["approval"]);
        }
        if (empty($_POST["postReq"])) {
            $postReqErr = "Post-Act Requirement is required";
            $flag = false;
        } else {
            $postReq = test_input($_POST["postReq"]);
        }
        if (empty($_POST["deadlinePR"])) {
            $deadlinePRErr = "Post-Act Deadline is required";
            $flag = false;
        } else {
            $deadlinePR = test_input($_POST["deadlinePR"]);
        }
        if (empty($_POST["eval_Status"])) {
            $eval_StatusErr = "Evaluation Status is required";
            $flag = false;
        } else {
            $eval_Status = test_input($_POST["eval_Status"]);
        }

        if ($flag == true){
            $subID = $_SESSION['submID'];
            $updaterecords = "UPDATE ACTSTATUS SET PROCESSINGSTAGE = '$_POST[process]', APPROVALSTATUS = '$_POST[approval]', ASSOCIATECHECKER = '$_POST[assocCheck]', FINALCHECKER = '$_POST[finalCheck]', 
            ASSOCIATEREMARKS = '$_POST[assocRemark]', FINALREMARKS = '$_POST[finalRemark]', POSTACTREQUIREMENTS = '$_POST[postReq]', POSTACTDEADLINE = '$_POST[deadlinePR]', FOREVAL = '$_POST[eval_Status]' 
            WHERE SUBID = '$subID'";
            mysqli_query($sqlconnect,$updaterecords);
            echo "Record Updated Successfully!";
        }
        }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <h2>Activity Details Form </h2>
    <p><span class="error">* required field</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for = "dropdownProcess"> Processing Stage: </label> 
        <select name="process" id="dropdownProcess">
            <option value=""> --- SELECT OPTION ---</option>
            <option value="For First Checking">For First Checking</option>
            <option value="For Second Checking">For Second Checking</option>
            <option value="Checked">Checked</option>
        </select>
        <span class="error">* <?php echo $processErr;?></span>

        <br><br>
        <label for = "dropdownApproval"> Approval Status: </label> 
        <select name="approval" id="dropdownApproval">
            <option value=""> --- SELECT OPTION ---</option>
            <option value="Full Incentive">Full Incentive</option>
            <option value="Half Incentive">Half Incentive</option>
            <option value="Early Approved">Early Approved</option>
            <option value="Late Approved">Late Approved</option>
            <option value="Pending">Pending</option>
            <option value="Uncounted Pend">Uncounted Pend</option>
            <option value="No Status">No Status</option>
            <option value="Denied">Denied</option>
        </select>
        <span class="error">* <?php echo $approvalErr;?></span>
        
        <br><br>
        <label for = "assocCheck"> Associate Checker: </label> <input type="text" name="assocCheck">
        <span class="error">* <?php echo $assocCheckErr;?></span>
        <br><br>
        <label for = "finalCheck"> Final Checker: </label><input type="text" name="finalCheck">
        <span class="error">* <?php echo $finalCheckErr;?></span>

        <br><br>
        <label for = "assocRemark"> Associate Remark: </label><textarea rows = '5' cols = '30' name = 'assocRemark' placeholder = 'Enter Associate Remark Here'></textarea>
        <span class="error">* <?php echo $assocRemarkErr;?></span>

        <br><br>
        <label for = "finalRemark"> Final Remark: </label><textarea rows = '5' cols = '30' name = 'finalRemark' placeholder = 'Enter Final Remark Here'></textarea>
        <span class="error">* <?php echo $finalRemarkErr;?></span>

        <br><br>
        <label for = "dropdownPostReq">Nature of Activity: </label>
        <select name="postReq" id="dropdownPostReq">
            <option value=""> --- SELECT OPTION ---</option>
            <option value="Pre-Acts Requirements,
                            General Attendance Log Sheet,
                            Audited List of Expenses,
                            List of Pictures,
                            Member Feedback,
                            Activity Report"> Assistance - Synchronous/Consultation/ Tutorials</option>
            <option value="Pre-Acts Requirements,
                            Audited List of Expenses,
                            Approved Flyer/Poster,
                            Activity Report"> Assistance - Asynchronous</option>
            <option value="Pre-Acts Requirements,
                            Audited List of Expenses,
                            Approved Flyer/Poster,
                            Activity Report"> Awareness Campaign - Announcements</option>
            <option value="Pre-Acts Requirements,
                            Audited List of Expenses,
                            List of Participants and Winners,
                            Approved Flyer/Poster,
                            Activity Report">Contest - Asynchronous </option>
            <option value="Pre-Acts Requirements,
                            General Attendance Log Sheet,
                            Audited List of Expenses,
                            List of Pictures,
                            List of Participants and Winners,
                            Member Feedback, 
                            Activity Report">Contest - (NON) Academic/ Synchronous</option>
            <option value="Pre-Acts Requirements,
                            Audited List of Expenses,
                            Approved Flyer/Poster,
                            Activity Report">Distribution - Reviewers/ Memebership Materials</option>
            <option value="Pre-Acts Requirements,
                            General Attendance Log Sheet,
                            Audited List of Expenses,
                            List of Pictures,
                            Consolidated and Summarized Focus Group Discussion Results,
                            Minutes of the Meeting">Data Gathering - Focus Group Discussion </option>
            <option value="Pre-Acts Requirements,
                            Audited List of Expenses,
                            Approved Flyer/Poster,
                            Consolidated Survey Results,
                            Activity Report">Data Gathering - Survey</option>
            <option value="Pre-Acts Requirements,
                            General Attendance Log Sheet,
                            Audited List of Expenses,
                            List of Pictures,
                            Activity Report,
                            AMT Evaluation Results (if applicable)">General Assembly</option>
            <option value="Pre-Acts Requirements,
                            Signed Broadcast Consent Form/s (if applicable),
                            General Attendance Log Sheet,
                            Audited List of Expenses,
                            List of Pictures,
                            Activity Report">Online Recognition - Synchronous</option>
            <option value="Pre-Acts Requirements,
                            Audited List of Expenses,
                            Approved Flyer/Poster,
                            Activity Report">Online Recognition - Asynchronous</option>
            <option value="Pre-Acts Requirements,
                            Audited List of Expenses,
                            List of Pictures,
                            Minutes of the Meeting">Meeting</option>
            <option value="Pre-Acts Requirements,
                            General Attendance Log Sheet,
                            Audited List of Expenses,
                            List of Pictures,
                            Activity Report">Recreation - Film Showing/ Hangout/ Game Nights</option>
            <option value="Pre-Acts Requirements,
                            Audited List of Expenses,
                            List of Accepted Applicants,
                            Activity Report">Recruitment / Audition / Election - Asynchronous / With Interviewers Only</option>
            <option value="Pre-Acts Requirements,
                            General Attendance Log Sheet,
                            Audited List of Expenses,
                            List of Pictures,
                            List of Accepted Applicants,
                            Activity Report">Recruitment / Audition / Election - With Meeting De Avance</option>
            <option value="Pre-Acts Requirements,
                            Signed Broadcast Consent Form/s (if applicable),
                            General Attendance Log Sheet,
                            Audited List of Expenses,
                            List of Pictures,
                            Activity Report,
                            AMT Evaluation Results (if applicable)">Seminar / Workshop - Talk/ Forum/ Orientation/ Convocation</option>
            <option value="Pre-Acts Requirements,
                            General Attendance Log Sheet,
                            Audited List of Expenses,
                            List of Pictures,
                            Activity Report">Training Program / Succession Program / Simulation - Synchronous</option>
            <option value="Pre-Acts Requirements,
                            Audited List of Expenses,
                            Approved Flyer/Poster,
                            Activity Report">Training Program / Succession Program / Simulation - Asynchronous</option>
            <option value="Pre-Acts Requirements,
                            General Attendance Log Sheet,
                            Audited List of Expenses,
                            List of Pictures,
                            Member Feedback,
                            Activity Report">Series Activity</option>

        </select>
        <span class="error">* <?php echo $postReqErr;?></span>

        <br><br>
        <label for = "deadlinePR"> Post-Activity Deadline: </label><input type="date" name="deadlinePR" >
        <span class="error">* <?php echo $deadlinePRErr;?></span>

        <br><br>
        <label for = "eval_Status"> For Evaluation: </label> 
        Yes<input type="radio" name="eval_Status" value = "Yes">
        No<input type="radio" name="eval_Status" value = "No">       
        <span class="error">* <?php echo $eval_StatusErr;?></span>


        <br><br>
        <input type="submit" value="Save Changes" />
        <input type="button" onclick="window.location.href='dts.php';" value="DTS" />
    </form>
    </table>
    </body>
</html>
