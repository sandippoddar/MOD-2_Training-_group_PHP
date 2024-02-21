<!DOCTYPE html>
<html>
<head>
    <title>Form Example</title>
</head>
<body>

<form method="post">
    First Name: <input type="text" name="first_name" required><br>
    Last Name: <input type="text" name="last_name" required><br>
    Full Name: <input type="text" name="full_name" value="<?php 
    if(isset($_POST["first_name"]) && isset($_POST["last_name"])){
        echo $_POST['first_name']." ".$_POST['last_name'];
    }
    ?>" disabled><br>
    <input type="submit" name="submit" value="Submit">
</form>

<?php
if(isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $full_name = $first_name . ' ' . $last_name;
    echo "Hello ".$full_name;
}
?>

</body>
</html>