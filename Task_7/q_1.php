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
    <title>q_1</title>
</head>
<body>
    <h1>Question 1</h1>
    <h1>Create a Form with below Fields.</h1>
    <ul>
        <li>First Name - <b>User will input only alphabets</b></li>
        <li>Last Name - <b>User will input only alphabets</b></li>
        <li>Full Name - User cannot enter a value in Full name field. It will be disabled by default. When the first name and last name fields are filled, this field outputs the sum of the above 2 fields.</li>
        <li>Submit Button</li>
            <ul>
                <li>On submit, the form gets submitted and the page will reload</li>
                <li>Hello [full-name]” will appear on the page</li>
            </ul>
    </ul>
</body>
</html>
