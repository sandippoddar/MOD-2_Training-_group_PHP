<?php
    session_start();
    $flag = 0;
    if (isset($_SESSION["user_name"])) {
        header("location: pager.php");
        exit();
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['login'])) {
            $username = 'sandip';
            $password = 1234;
            if ($username == $_POST['user_name'] && $password == $_POST['pass']) {
                $_SESSION["user_name"] = $username;
                $flag = 1;
                header('location: pager.php');
                exit();
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>LOG IN PAGE</h1>
        <form action="login.php" method="post">
            <div class="form-ele">
                <label for="user_name">Enter User Name</label>
                <input type="text" name="user_name" id="user_name" place>
            </div>
            <div class="form-ele">
                <label for="pass">Enter Password:</label>
                <input type="password" name="pass" id="pass">
            </div>
            <input type="submit" value="Login" name="login">
        </form>
        <p>
            <?php
                if (isset($_POST['login'])) {
                    if (!$flag) {
                        echo "INVALID USER-NAME OR PASSWORD";
                    }
                }
            ?>
        </p>
    </div>
</body>
</html>
