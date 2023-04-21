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
        <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
        <meta name = "viewport" content = "width = device - width, initialize-scale = 1.0">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <style>
            .scroll{
                height: 700px;
                overflow: scroll;
                overflow-x: hidden;
            }

            .error {color: #FF0000;}
            .label {
                display: inline-block;
                width: 150px;
                color: #183C1B;
            }
            .input {
                padding: 5px 10px;
            }
            .select {
                padding: 5px 10px;
            }
            .textColor{
                display: inline-block;
                width: 150px;
                color : #183C1B;
                margin : 2px;
            }
        </style>
        <script type="text/javascript">
            function ShowHideDiv() {
                var dropdownType = document.getElementById("dropdownType");
                var otherInfo = document.getElementById("otherInfo");
                otherInfo.style.display = dropdownType.value == "Others" ? "block" : "none";
            }
            </script>
    </head>
<body>
    <?php include("_navbar.php"); ?>
    <div class="container">
        <h1 style="text-align: center; padding-bottom: 16px;">Activity Receiving and Tracking System </h1>
    </div> 
    <div class = "container"  style = "padding-right: 20%; padding-left: 20%"> 
    <div class = "scroll"> 
    <table class = "table">
        <?php
        $term = $org = $arn = $actTitle = $submissionType = $actDuration = $eval_Status = $start_Date = $end_Date = $time = $venue = $actNature = $actType= $OtheractType = $submission = $org_Pos = $contact_Num = $email = $file = "";
        $termErr = $orgErr = $arnErr = $actTitleErr = $submissionTypeErr = $actDurationErr = $eval_StatusErr = $start_DateErr = $end_DateErr = $timeErr = $venueErr = "";
        $actNatureErr = $actTypeErr = $submissionErr = $org_PosErr = $contact_NumErr = $emailErr = $fileErr = "";
        $flag = true;
        $timestamp = date('Y-m-d H:i:s');


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["term"])) {
            $termErr = "Term is required";
            $flag = false;
        } else {
            $term = test_input($_POST["term"]);
        }
        if (empty($_POST["org"])) {
            $orgErr = "Organization is required";
            $flag = false;
        } else {
            $org = test_input($_POST["org"]);
        }
        if (empty($_POST["arn"])) {
            $arnErr = "Activity Reference Number is required";
            $flag = false;
        } else {
            $arn = test_input($_POST["arn"]);
        }
        if (empty($_POST["actTitle"])) {
            $actTitleErr = "Activity Title is required";
            $flag = false;
        } else {
            $actTitle = test_input($_POST["actTitle"]);
        }
        if (empty($_POST["submissionType"])) {
            $submissionTypeErr = "Type of Submission is required";
            $flag = false;
        } else {
            $submissionType = test_input($_POST["submissionType"]);
        }
        if (empty($_POST["actDuration"])) {
            $actDurationErr = "Duration of Activity is required";
            $flag = false;
        } else {
            $actDuration = test_input($_POST["actDuration"]);
        }
        if (empty($_POST["eval_Status"])) {
            $eval_StatusErr = "For Evaluation is required";
            $flag = false;
        } else {
            $eval_Status = test_input($_POST["eval_Status"]);
        }
        if (empty($_POST["start_Date"])) {
            $start_DateErr = "Start Date is required";
            $flag = false;
        } else {
            $start_Date = test_input($_POST["start_Date"]);
        }
        if (empty($_POST["end_Date"])) {
            $end_DateErr = "End Date is required";
            $flag = false;
        } else {
            $end_Date = test_input($_POST["end_Date"]);
        }
        if (empty($_POST["time"])) {
            $timeErr = "time is required";
            $flag = false;
        } else {
            $time = test_input($_POST["time"]);
        }
        if (empty($_POST["venue"])) {
            $venueErr = "Venue is required";
            $flag = false;
        } else {
            $venue = test_input($_POST["venue"]);
        }
        if (empty($_POST["actNature"])) {
            $actNatureErr = "Nature of Activity is required";
            $flag = false;
        } else {
            $actNature = test_input($_POST["actNature"]);
        }
        if(empty($_POST["actType"]) || ($_POST["actType"] =='Others' && empty($_POST["OtheractType"]))){
            $actTypeErr = "Type of Activity is required";
            $flag = false;
        } else {
            if (empty($_POST["actType"])){
                $_POST["actType"] = $_POST["OtheractType"];
                $actType = test_input($_POST["actType"]);
            }else {
                $actType = test_input($_POST["actType"]);
            }
        }
        if (empty($_POST["submission"])) {
            $submissionErr = "Submitted By is required";
            $flag = false;
        } else {
            $submission = test_input($_POST["submission"]);
        }
        if (empty($_POST["org_Pos"])) {
            $org_PosErr = "Position of Organization is required";
            $flag = false;
        } else {
            $org_Pos = test_input($_POST["org_Pos"]);
        }
        if (empty($_POST["contact_Num"])) {
            $contact_NumErr = "Contact Number is required";
            $flag = false;
        } else {
            $contact_Num = test_input($_POST["contact_Num"]);
        }
        if (empty($_POST["email"])) {
            $emailErr = "Email Address is required";
            $flag = false;
        } else {
            $email = test_input($_POST["email"]);
        }
        if (empty($_POST["file"])) {
            $fileErr = "File is required";
            $flag = false;
        } else {
            $file = test_input($_POST["file"]);
        }

        if ($flag == true){
            $addrecords = "INSERT INTO ActDetail values('$timestamp', '$_POST[term]', '$_POST[org]', '$_POST[arn]', '', '$_POST[actTitle]', '$_POST[submissionType]', 
            '$_POST[actDuration]', '$_POST[eval_Status]', '$_POST[start_Date]', '$_POST[end_Date]', '$_POST[time]', '$_POST[venue]', '$_POST[actNature]', '$_POST[actType]', '$_POST[submission]', '$_POST[org_Pos]',
            '$_POST[contact_Num]', '$_POST[email]', '$_POST[file]')";
            mysqli_query($sqlconnect,$addrecords);

            $addStatus = "INSERT INTO ActStatus(ProcessingStage) values(NULL)";
            mysqli_query($sqlconnect,$addStatus);
            header("Location: dts.php");
        }
        }




    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for = "term" style = "padding-right: 8px" class="form-label"> Term: </label>
        <span class="error">* <?php echo $termErr;?></span> 
        <select name="term" id="dropdown" class="form-select w-50">
            <option value="Term 1">Term 1</option>
            <option value="Term 2">Term 2</option>
            <option value="Term 3">Term 3</option>
        </select>
        <br>
        <label for = "org" style = "padding-right: 8px" class="form-label"> Organization: </label>
        <span class="error">* <?php echo $orgErr;?></span>
        <input type="text" name="org" class="form-control w-50"  readonly value = "<?php echo $_SESSION['organization']?>">
        <br>
        <label for = "arn" style = "padding-right: 8px" class="form-label"> Activity Reference Number: </label>
        <span class="error">* <?php echo $arnErr;?></span>
        <input type="text" name="arn" class="form-control w-50">
        <br>
        <label for = "actTitle" style = "padding-right: 8px" class="form-label"> Activity Title: </label>
        <span class="error">* <?php echo $actTitleErr;?></span>
        <input type="text" name="actTitle" class="form-control w-50">
        <br>
        <label for = "dropdown" style = "padding-right: 8px" class="form-label">Type of Submission: </label>
        <span class="error">* <?php echo $submissionTypeErr;?></span>
        <select name="submissionType" id="dropdown" class="form-select w-50">
            <option value="Initial Submission">Initial Submission</option>
            <option value="Pended Submission">Pended Submission</option>
        </select>
        <br>
        <label for = "dropdown" style = "padding-right: 8px" class="form-label">Activity Duration: </label>
        <span class="error">* <?php echo $actDurationErr;?></span>
        <select name="actDuration" id="dropdown" class="form-select w-50">
            <option value="One Day">One Day</option>
            <option value="Multiple Days">Multiple Days</option>
            <option value="Termlong">Termlong</option>
        </select>
        <br>
        <label for = "eval_Status" style = "padding-right: 8px" class="form-label"> For Evaluation: </label>
        <span class="error">* <?php echo $eval_StatusErr;?></span>
        <select name="eval_Status" id="dropdown" class="form-select w-50">
            <option value="Yes">Yes</option>
            <option value="No">No</option>
        </select> 
        <br>
        <label for = "start_Date" style = "padding-right: 8px" class="form-label"> Starting Date: </label>
        <span class="error">* <?php echo $start_DateErr;?></span>
        <input type="date" name="start_Date"  class="form-control w-50">
        <br>
        <label for = "end_Date" style = "padding-right: 8px" class="form-label"> Ending Date: </label>
        <span class="error">* <?php echo $end_DateErr;?></span>
        <input type="date" name="end_Date"  class="form-control w-50">
        <br>
        <label for = "time" style = "padding-right: 8px" class="form-label"> Time: </label>
        <span class="error">* <?php echo $timeErr;?></span>
        <input type="time" name="time"  class="form-control w-50">
        <br>
        <label for = "venue" style = "padding-right: 8px" class="form-label"> Venue: </label>
        <span class="error">* <?php echo $venueErr;?></span>
        <input type="text" name="venue"  class="form-control w-50">
        <br>
        <label for = "dropdown" style = "padding-right: 8px" class="form-label">Nature of Activity: </label>
        <span class="error">* <?php echo $actNatureErr;?></span>
        <select name="actNature" id="dropdown"  class="form-select w-50">
            <option value=""> </option>
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
        <br>
        <label for = "dropdownType" style = "padding-right: 8px" class="form-label">Type of Activity: </label>
        <span class="error">* <?php echo $actTypeErr;?></span>
        <select name="actType" id="dropdownType" onchange = "ShowHideDiv()" class="form-select w-50">
            <option value=""> </option>
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
        <br>
        <div class="control-group" id="otherInfo" style="display: none">
            <label for = "otherInfo" class="control-label" style = "display: inline-block; border-radius: 10px; width : 150px" >Enter Other Type: </label>
            <input type="text" placeholder="Enter Other Type" name="OtheractType" class="input-xlarge"  class="form-control w-50">
        </div>
        <br>
        <label for = "submission" style = "padding-right: 8px" class="form-label"> Submission By: </label>
        <span class="error">* <?php echo $submissionErr;?></span>
        <input type="text" name="submission"  class="form-control w-50" readonly value = "<?php echo $_SESSION['accountName']?>">
        <br>
        <label for = "org_pos" style = "padding-right: 8px" class="form-label"> Position in Organization: </label>
        <span class="error">* <?php echo $org_PosErr;?></span>
        <input type="text" name="org_Pos"  class="form-control w-50">
        <br>
        <label for = "contact_Num" style = "padding-right: 8px" class="form-label"> Contact Number: </label>
        <span class="error">* <?php echo $contact_NumErr;?></span>
        <input type="text" name="contact_Num"  class="form-control w-50">
        <br>
        <label for = "contact_Num" style = "padding-right: 8px" class="form-label"> Email Address: </label>
        <span class="error">* <?php echo $emailErr;?></span>
        <input type="text" name="email"  class="form-control w-50">
        <br>
        <label for = "file" style = "padding-right: 8px" class="form-label"> File: </label>
        <span class="error">* <?php echo $fileErr;?></span>
        <input type="text" name="file"  class="form-control w-50">
        <br>
        <input type="submit" value="Submit" class="btn btn-success" />
        <span style="padding-right:8px"></span>
        <input type="button" onclick="window.location.href='dts.php';" value="Return to DTS" class="btn btn-primary"/>
    </form>
    </table>
    </body>
</html>
