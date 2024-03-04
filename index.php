<?php

    $fullName = "";
    if (isset($_SERVER["REQUEST_METHOD"]) == "POST" && isset($_POST['submit'])) {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $fullName = $firstName . ' ' . $lastName;
    }

?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Example</title>
    <link rel = "stylesheet" href = "./CSS/style.css">
</head>
<body>
    <div class = "container">
        <form method = "post" action = "index.php">
            <div class = "form-ele">
                <label for = "firstName">First Name:*</label>
                <input type = "text" name = "firstName" id = "firstName" maxlength = "20" pattern = "[A-Za-z]+" required>
                <p class = "wrongFname"></p>
            </div>
            <div class = "form-ele">
                <label for = "lastName">Last name:*</label>
                <input type = "text" name = "lastName" id = "lastName" maxlength = "20" pattern = "[A-Za-z]+" required>
                <p class = "wrongLname"></p>
            </div>
            <div class = "form-ele">
                <label for = "fullName"> Full Name: </label>
                <input type = "text" name = "fullName" id = "fullName" value = "" disabled>
            </div>
            <div class = "form-ele" class = "btn">
                <input type = "submit" name = "submit" value = "Submit">
            </div>   
        </form>
        <!-- Display User Full Name here. -->
        <h1> 
            <?php 
                if (isset($_POST['submit'])) {
                    echo "Hello " . $fullName; 
                }
            ?> 
        </h1>
    </div>
<script src = "./JS/script.js"></script>
</body>
</html>
