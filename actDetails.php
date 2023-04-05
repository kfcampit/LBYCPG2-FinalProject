<html>
<head>
    <style>
        .error {color: #FF0000;}
    </style>
</head>
<body>

<?php
$term = $org = $arn = $actTitle = $submissionType = $actDuration = $eval_Status = $start_Date = $end_Date = $time = $venue = $actNature = $actType = $submission = $org_Pos = $contact_Num = $email = $file = "";
$termErr = $orgErr = $arnErr = $actTitleErr = $submissionTypeErr = $actDurationErr = $eval_StatusErr = $start_DateErr = $end_DateErr = $timeErr = $venueErr = "";
$actNatureErr = $actTypeErr = $submissionErr = $org_PosErr = $contact_NumErr = $emailErr = $fileErr = "";
$flag = true;
$timestamp = date('Y-m-d H:i:s');

$sqlconnect = mysqli_connect('localhost', 'root', '');
if (!$sqlconnect){
    die("Failed to connect to the database: ");
}

$selectDB = mysqli_select_db($sqlconnect, 'APSMS');
if (!$selectDB){
    die("Failed to connect to the database: ");
}

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
    if (empty($_POST["actType"])) {
        $actTypeErr = "Type of Activity is required";
        $flag = false;
    } else {
        $actType = test_input($_POST["actType"]);
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
        echo "Account Created Successfully!";
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
    Term: 
    Term 1<input type="radio" name="term" value = "Term 1">
    Term 2<input type="radio" name="term" value = "Term 2">
    Term 3<input type="radio" name="term" value = "Term 3">        
    <span class="error">* <?php echo $termErr;?></span>

    <br><br>
    Organization: <input type="text" name="org">
    <span class="error">* <?php echo $orgErr;?></span>

    <br><br>
    ARN: <input type="text" name="arn">
    <span class="error">* <?php echo $arnErr;?></span>

    <br><br>
    Activity Title: <input type="text" name="actTitle">
    <span class="error">* <?php echo $actTitleErr;?></span>

    <br><br>
    <label for = "dropdown">Type of Submission: </label>
    <select name="submissionType" id="dropdown">
		<option value="Initial Submission">Initial Submission</option>
		<option value="Pended Submission">Pended Submission</option>
	</select>
    <span class="error">* <?php echo $submissionTypeErr;?></span>

    <br><br>
    <label for = "dropdown">Activity Duration: </label>
    <select name="actDuration" id="dropdown">
		<option value="One Day">One Day</option>
		<option value="Multiple Days">Multiple Days</option>
		<option value="Termlong">Termlong</option>
	</select>
    <span class="error">* <?php echo $actDurationErr;?></span>

    <br><br>
    For Evaluation: 
    Yes<input type="radio" name="eval_Status" value = "Yes">
    No<input type="radio" name="eval_Status" value = "No">       
    <span class="error">* <?php echo $eval_StatusErr;?></span>

    <br><br>
    Starting Date: <input type="text" name="start_Date" placeholder="YYYY-MM-DD" pattern="[0-2023]{3}-[0-12]{2}-[0-31]{3}">
    <span class="error">* <?php echo $start_DateErr;?></span>

    <br><br>
    Ending Date: <input type="text" name="end_Date" placeholder="YYYY-MM-DD" pattern="[0-2023]{3}-[0-12]{2}-[0-31]{3}">
    <span class="error">* <?php echo $end_DateErr;?></span>

    <br><br>
    Time: <input type="text" name="time" placeholder="HH-MM-SS" pattern="[0-12]{3}-[0-60]{2}-[0-60]{3}">
    <span class="error">* <?php echo $timeErr;?></span>

    <br><br>
    Venue: <input type="text" name="venue">
    <span class="error">* <?php echo $venueErr;?></span>

    <br><br>
    <label for = "dropdown">Nature of Activity: </label>
    <select name="actNature" id="dropdown">
		<option value="Academic">Academic</option>
		<option value="Special Interest">Special Interest</option>
		<option value="Departmental Initiative">Departmental Initiative</option>
        <option value="Fundraising">Fundraising</option>
		<option value="Community Development">Community Development</option>
		<option value="Organizational Development">Organizational Development</option>
        <option value="Issude Advocacy">Issude Advocacy</option>
		<option value="Lasallian Formation/ Spiritual Growth">Lasallian Formation/ Spiritual Growth</option>
		<option value="Outreach">Outreach</option>
	</select>
    <span class="error">* <?php echo $actNatureErr;?></span>

    <br><br>
    <label for = "dropdown">Type of Activity: </label>
    <select name="actType" id="dropdown">
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
    <span class="error">* <?php echo $actTypeErr;?></span>

    <br><br>
    Submission By: <input type="text" name="submission">
    <span class="error">* <?php echo $submissionErr;?></span>

    <br><br>
    Position in Organization: <input type="text" name="org_Pos">
    <span class="error">* <?php echo $org_PosErr;?></span>

    <br><br>
    Contact Number: <input type="text" name="contact_Num">
    <span class="error">* <?php echo $contact_NumErr;?></span>

    <br><br>
    Email Address: <input type="text" name="email">
    <span class="error">* <?php echo $emailErr;?></span>

    <br><br>
    File: <input type="text" name="file">
    <span class="error">* <?php echo $fileErr;?></span>


    <br><br>
    <input type="submit" onclick="window.location.href='act9_1F.html';" value="Submit" />

</form>

</body>
</html>