<?php
    session_start();
    if (!isset($_SESSION["user_name"])) {
        header("location: login.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Q_3</title>
</head>
<body>
    <h1>Question 3</h1>
    <p> Add a text area to the above form and accept marks of different subjects in the format, English|80. One subject in each line. Once values entered and submitted, accept them to display the values in the form of a table.</p>
</body>
</html>
