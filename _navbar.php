<?php
    if (empty($_SESSION['classification'])) {
        if ($_SERVER['REQUEST_URI'] != '/index.php') {
            header('Location: /index.php');
        }
        echo '
        <nav class="navbar sticky-top navbar-dark bg-primary navbar-expand-lg" style="margin-bottom: 32px">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">CSO - APSMS</a>
        </div>
        </nav>
        ';
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
                <a class="nav-link active" href="#">Account Manager</a>
                </li>
            </ul>
            <span class="navbar-text active"> <?php echo $_SESSION["accountName"] ?> </span>
            </div>
        </div>
        </nav>
        ';
    } else header('Location: index.php');
?>