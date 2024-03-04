<?php

    session_start();
     /*Check if the session variable is set or not if not set then go back to Login page.*/
    if (!isset($_SESSION["user_name"])) {
        header("location: login.php");
        exit();
    }

?>
<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
    <title>Pager</title>
    <link rel = "stylesheet" href = "./CSS/pager.css">
</head>
<body>
    <div class = "container">
        <h1><?php echo "Hello " . strtoupper($_SESSION["user_name"]);?></h1>
        <p>
            <?php
                if (isset($_GET["q"])) {
                    $question = intval($_GET["q"]);
                    if ($question > 6 || $question <= 0) {
                        echo "Enter valid q number";
                    }
                    else
                    {
                        include("q_".$question.".php");
                    }
                }
            ?>
        </p>
        <div class = "button">
            <a href = "logout.php">Log Out</a>
        </div>
    </div>
</body>
</html>
