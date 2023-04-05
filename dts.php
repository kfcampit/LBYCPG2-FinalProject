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
                height: 400px;
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
            
            
        <html>
            <body style = "margin: 50px;">
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
                        </tr>
                    </thread>
                 <tbody>
            <?php

                $result_out = mysqli_query($sqlconnect, "Select Timestamp, Term, Organization, ActivityTitle, TypeOfSubmission, ActivityDuration, StartingDate, NatureOfActivity, TypeOfActivity
                  from actdetail ORDER BY Timestamp");
                if (!$result_out){
                    die("Failed to connect: ");
                }
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
                    </tr>";
            }        
        ?>
        </tbody>
        </table>
    </body>
</html>
        
<?php
    mysqli_close($sqlconnect);
?>
