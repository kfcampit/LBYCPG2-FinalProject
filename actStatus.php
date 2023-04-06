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
                height: 700px;
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
            session_start();
            ?>
            <body style = "margin: 50px;">
            <div class = "container"> 
            <div class = "scroll"> 
            <table class = "table">
                <tbody>
                <?php
                $subID = $_GET['id'];
                $_SESSION['submID'] = $subID;
                $result_out = mysqli_query($sqlconnect, "SELECT ARN, PROCESSINGSTAGE, APPROVALSTATUS, ASSOCIATECHECKER, FINALCHECKER, ASSOCIATEREMARKS, FINALREMARKS, POSTACTREQUIREMENTS, POSTACTDEADLINE,
                FOREVAL, SUBID FROM ACTSTATUS RIGHT JOIN ACTDETAIL ON ACTDETAIL.SUBMISSIONID = ACTSTATUS.SUBID WHERE SUBID = '$subID'");
                if (!$result_out){
                    die("Failed to connect: ");
                }else {
                    $dataVal = mysqli_fetch_array($result_out);
                    $arn = $dataVal['ARN'];
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
                    echo "Activity Reference Number: " . $arn . " " . "<br>";
                    echo "Processing Stage: " . $processStage . " " . "<br>";
                    echo "Approval Status: " . $approveStatus . " " . "<br>";
                    echo "Associate Checker: " . $assocCheck . " " . "<br>";
                    echo "Final Checker: " . $finalCheck . " " . "<br>";
                    echo "Associate Remark: " . $assocRemark . " " . "<br>";
                    echo "Final Remark: " . $finalRemark . " " . "<br>";
                    echo "Post-Activity Requirement: " . $postReq . " " . "<br>";
                    echo "Post-Activity Deadline: " . $postD . " " . "<br>";
                    echo "For Evaluation: " . $eval . " " . "<br>";
                }
                echo "<a class = 'btn btn-primary' href = 'dts.php'> Return DTS </a> 
                <a class = 'btn btn-success' href = 'actStatusEdit.php?id=$subID'> Check </a> ";
            ?>
            </tbody>
            </table>
</html>
        
<?php
    mysqli_close($sqlconnect);
?>