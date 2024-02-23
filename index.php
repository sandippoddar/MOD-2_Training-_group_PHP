<?php
    $full_name="";
    if (isset($_SERVER["REQUEST_METHOD"])=="POST") {
        if (isset($_POST['submit']))
        {
            $first_name = htmlspecialchars($_POST['first_name']);
            $last_name = $_POST['last_name'];
            $full_name = $first_name . ' ' . $last_name;
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Example</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form method = "post" action = "index.php">
            <div class = "form-ele">
                <label for = "first_name">First Name:</label>
                <input type = "text" name = "first_name" id = "first_name" pattern="[A-Za-z]+" required>
                <p class="wrong_fname"></p>
            </div>
            <div class = "form-ele">
                <label for = "last_name">Last name:</label>
                <input type = "text" name = "last_name" id = "last_name" pattern="[A-Za-z]+" required>
                <p class="wrong_lname"></p>
            </div>
            <div class = "form-ele">
                <label for = "full_name"> Full Name: </label>
                <input type = "text" name = "full_name" id = "full_name" value = "" disabled>
            </div>
            <div class = "form-ele" class = "btn">
                <input type = "submit" name = "submit" value="Submit">
            </div>
            
        </form>
        <h1> 
            <?php 
                if (isset($_POST['submit'])) {
                    echo "Hello " . $full_name; 
                }
            ?> 
        </h1>
    </div>
<script src = "script.js"></script>
</body>
</html>
