<?php
    session_start();
    if (empty($_SESSION['classification'])) {
        echo '
        <nav class="navbar sticky-top navbar-dark bg-primary navbar-expand-lg" style="margin-bottom: 32px">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">CSO - APSMS</a>
        </div>
        </nav>
        ';

        if ($_SERVER['REQUEST_URI'] != '/index.php' ) {
            header('Location: /restrict.php');
        }
        
    } else if ($_SESSION['classification'] == "VC") {
        echo '
        <nav class="navbar sticky-top navbar-dark bg-primary navbar-expand-lg" style="margin-bottom: 32px">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">CSO - APSMS</a>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" href="dts.php">Document Tracking System</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" href="accountManagement.php">Account Manager</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" href="actDetails.php">Activity Receiving and Tracking System</a>
                </li>
            </ul>
            <span class="navbar-text active"> <?php echo $_SESSION["accountName"] ?> </span>
            </div>
        </div>
        </nav>
        ';
    } 

    else if ($_SESSION['classification'] == "ASSOCIATE" || $_SESSION['classification'] == "AVC") {
        echo '
        <nav class="navbar sticky-top navbar-dark bg-primary navbar-expand-lg" style="margin-bottom: 32px">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">CSO - APSMS</a>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" href="dts.php">Document Tracking System</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" href="actDetails.php">Activity Receiving and Tracking System</a>
                </li>
            </ul>
            <span class="navbar-text active"> <?php echo $_SESSION["accountName"] ?> </span>
            </div>
        </div>
        </nav>
        ';
        if ($_SERVER['SCRIPT_NAME'] == '/index.php' || $_SERVER['SCRIPT_NAME'] == '/dts.php' || $_SERVER['SCRIPT_NAME'] == '/view.php' || $_SERVER['SCRIPT_NAME'] == '/actDetails.php' || $_SERVER['SCRIPT_NAME'] == '/view.php') {
            
        } else header('Location: /restrict.php');
    } else if ($_SESSION['classification'] == "ORG") {
        echo '
        <nav class="navbar sticky-top navbar-dark bg-primary navbar-expand-lg" style="margin-bottom: 32px">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">CSO - APSMS</a>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" href="dts.php">Document Tracking System</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" href="accountManagement.php">Account Manager</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" href="actDetails.php">Activity Receiving and Tracking System</a>
                </li>
            </ul>
            <span class="navbar-text active"> <?php echo $_SESSION["accountName"] ?> </span>
            </div>
        </div>
        </nav>
        ';
        if ($_SERVER['SCRIPT_NAME'] == '/index.php' || $_SERVER['SCRIPT_NAME'] == '/dts.php' || $_SERVER['SCRIPT_NAME'] == '/view.php' || $_SERVER['SCRIPT_NAME'] == '/actDetails.php' || $_SERVER['SCRIPT_NAME'] == '/accountManagement.php' ) {
            
        } else header('Location: /restrict.php');
    }
    else {
        echo '
        <nav class="navbar sticky-top navbar-dark bg-primary navbar-expand-lg" style="margin-bottom: 32px">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">CSO - APSMS</a>
        </div>
        </nav>
        ';
        if ($_SERVER['REQUEST_URI'] != '/index.php'){

           header('Location: /restrict.php'); 
        }
    }
?>