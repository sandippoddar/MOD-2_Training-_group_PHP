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
<?php

    $targetFile= "";
    if (isset($_POST["submit"])) {

        $file = $_FILES['image'];
        $targetDir="img/";
        $targetFile = $targetDir . basename($_FILES["image"]["name"]);
        $tmp_name = $_FILES['image']['tmp_name'];
        $fileext = explode('.', $targetFile);
        $file_type = strtolower($fileext[1]);
        move_uploaded_file($tmp_name,$targetFile);

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
        <form method = "post" action = "index.php" enctype="multipart/form-data">
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
            <div class="form-ele">
                <label for="image">Enter Image</label>
                <input type="file" name="image" id="image">
            </div>
            <div class = "form-ele">
                <label for = "full_name"> Full Name: </label>
                <input type = "text" name = "full_name" id = "full_name" value = "" disabled>
            </div>
            <div class = "form-ele" class = "btn">
                <input type = "submit" name = "submit" value="Submit">
            </div>

        </form>
        <div class="image">
            <img src="<?php 
            
                 if (isset($_POST['submit'])) {
                    echo $targetFile;
                 }
            ?>" alt="">
        </div>
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
