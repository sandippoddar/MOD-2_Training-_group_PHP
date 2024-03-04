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
    <title>q_5</title>
</head>
<body>
    <h1>Question 5</h1>
    <h1>Add a new single text field to the above form that will accept email id. Do not use email id input field type.</h1>
    <ul>
        <li>Email Syntax Check</li>
            <ul>
                <li>User will enter email id and on submit, check if correct email id syntax has been used.</li>
                <li>Show a message on successful email syntax or show an error message on the wrong syntax.</li>
            </ul>
        <li>Valid Email Id Check</li>
            <ul>
                <li>User will enter email id and on submit, use the following site http://www.mailboxlayer.com/ to check if the entered email id is valid.</li>
            </ul>
    </ul>
</body>
</html>
