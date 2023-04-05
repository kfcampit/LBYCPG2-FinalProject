<html>
    <head>
        <meta charset = "UTF-8">
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
    </head>
    <body>
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
            <body style = "margin: 50px;">
            <div class = "container"> 
            <div class = "scroll"> 
            <table class = "table">
                <tbody>
                <?php

                $subID = $_GET['id'];
                $result_out = mysqli_query($sqlconnect, "Select * from actdetail WHERE SubmissionID = '$subID'");
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
                    $subID = $dataVal['SubmissionID'];
                    echo "<div style='text-align:justify'>";
                    echo "Timestamp: " . $timeS . " " . "<br>";
                    echo "Term     : " . $term . " " . "<br>";
                    echo "Organization: " . $org . " " . "<br>";
                    echo "Activity Reference Number: " . $arn . " " . "<br>";
                    echo "Activity Title: " . $actTitle . " " . "<br>";
                    echo "Type of Submission: " . $typeSub . " " . "<br>";
                    echo "Activity Duration: " . $actDur . " " . "<br>";
                    echo "For Evaluation: " . $eval . " " . "<br>";
                    echo "Starting Date: " . $startDate . " " . "<br>";
                    echo "Ending Date: " . $endDate . " " . "<br>";
                    echo "Time: " . $time . " " . "<br>";
                    echo "Venue: " . $venue . " " . "<br>";
                    echo "Nature of Activity " . $natureAct . " " . "<br>";
                    echo "Type of Activity " . $typeAct . " " . "<br>";
                    echo "Submission By: " . $subBy . " " . "<br>";
                    echo "Position: " . $pos . " " . "<br>";
                    echo "Contact Number: " . $num . " " . "<br>";
                    echo "Email: " . $email . " " . "<br>";
                    echo "File: " . $file . " " . "<br>";
                }
        ?>
        </tbody>
        </table>
    </body>
</html>
        
<?php
    mysqli_close($sqlconnect);
?>
