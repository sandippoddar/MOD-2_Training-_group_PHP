<!DOCTYPE html>
<html>
<head>
    <title>Form Example</title>
</head>
<body>

<form method = "post" action = "index.php">
    <div class = "form-ele">
        <label for = "first_name">First_Name:</label>
        <input type = "text" name = "first_name" id = "first_name" required>
    </div>
    <div class = "form-ele">
        <label for = "last_name">Last name:</label>
        <input type = "text" name = "last_name" id = "last_name" required>
    </div>
    <div class = "form-ele">
        <label for = "full_name">Full Name:</label>
        <input type = "text" name = "full_name" id = "full_name" value = "" disabled>
    </div>
    <input type = "submit" name = "submit" value="Submit">
</form>
<h1>
<?php
    if (isset($_POST['submit']))
    {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $full_name = $first_name . ' ' . $last_name;
        echo "Hello " . $full_name;
    }
?>
</h1>
<script src = "./script.js"></script>
</body>
</html>
