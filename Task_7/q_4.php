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
    <title>Q_4</title>
</head>
<body>
    <h1>Question 4</h1>
    <p> Add a new text field to the above form to accept the phone number from the user. The number will belong to an Indian user. So, the number should begin with +91 and not be more than 10 digits.</p>
</body>
</html>
