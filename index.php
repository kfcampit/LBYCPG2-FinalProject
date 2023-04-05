<?php
    $sqlConnect = mysqli_connect('localhost', 'root', '');
    if (!$sqlConnect) die();

    $selectDB = mysqli_select_db($sqlConnect, 'APSMS');
    if (!$selectDB) die();
?>

<html>
    <head>
        <title>CSO - APSMS</title>
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
            <br>
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

                if ($data['password'] == cleanInput($pass))
                    return true;
                return false;
            }

            if (isset($_POST['b1'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];

                if (checkIfValid($sqlConnect, $user, $pass) && !empty($user) && !empty($pass)) header('Location: welcome.php');
                else echo "<span class = 'error'>Incorrect username or password.</span>";
                die();
            }
        ?>
    </body>
</html>