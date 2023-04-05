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