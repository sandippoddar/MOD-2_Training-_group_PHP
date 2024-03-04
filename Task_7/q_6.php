<?php

    session_start();
    /*Check if the session variable is set or not if not set then go back to Login page.*/
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
    <title>Q_6</title>
</head>
<body>
    <h1>Question 6</h1>
    <p>When the user submits the above form, 2 copies of the data will get created in a doc format. One will store on the server and the other will be downloaded to the user submitting the data. The information in the doc should be presented in a well-defined manner.</p>
</body>
</html>
