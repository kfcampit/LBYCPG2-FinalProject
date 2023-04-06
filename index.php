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
        <title>CSO - APSMS</title>
        <meta charset = "UTF-8">
        <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
        <meta name = "viewport" content = "width = device - width, initialize-scale = 1.0">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <style>.error {color: #FF0000}</style>
    </head>
    <body>
        <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post">
            <h1>Login Page</h1>
            <span class = "error">*Required Field</span>
            <table>
                <tr><td><span class = "error">*</span>Username: </td><td><input type = "text" name = "user" /></td></tr>
                <tr><td><span class = "error">*</span>Password: </td><td><input type = "password" name = "pass" /></td></tr>
            </table>
            <input type = "submit" name = "b1" value = "Login"/>
        </form>
        <?php

            function cleanInput($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);

                return $data;
            }

            function checkIfValid($connection, $user, $pass) {
                $searchForUser = mysqli_query($connection, "SELECT * FROM accountDetails WHERE username = '". cleanInput($user) ."'");
                if (!$searchForUser) return false;
                
                $data = mysqli_fetch_array($searchForUser);

                if ($data['password'] == cleanInput($pass)) {
                    $_SESSION['username'] = $data['username'];
                    $_SESSION['accountID'] = $data['accountID'];
                    $_SESSION['accountName'] = $data['accountName'];
                    $_SESSION['classification'] = $data['classification'];

                    return true;
                }
                return false;
            }

            if (isset($_POST['b1'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];

                if (checkIfValid($sqlconnect, $user, $pass) && !empty($user) && !empty($pass)) header('Location: dts.php');
                else echo "<span class = 'error'>Incorrect username or password.</span>";
                die();
            }
        ?>
    </body>
</html>