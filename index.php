<?php

    $targetFile= "";
    if (isset($_POST["submit"])) {
        $file = $_FILES['image'];
        $targetDir = "img/";
        $targetFile = $targetDir . basename($_FILES["image"]["name"]);
        $tmpName = $_FILES['image']['tmp_name'];
        $fileExt = explode('.', $targetFile);
        $fileType = strtolower($fileExt[1]);
        if ($fileType == "jpg" || $fileType == "jpeg" || $fileType == "png") {
            move_uploaded_file($tmpName,$targetFile);
        }
    }

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
    <div class="container">
        <form method = "post" action = "index.php" enctype = "multipart/form-data">
            <h1>PHP BASIC</h1>
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

            <div class = "form-ele">
                <label for = "image">Enter Image</label>
                <input type = "file" name = "image" id = "image">
            </div>
            <div class = "form-ele btn">
                <input type = "submit" name = "submit" value = "Submit">
            </div>
        </form>

        <!-- Display image here Task 2.-->

        <div class = "image">
            <img src = "<?php 
                if (isset($_POST['submit'])) {
                    echo $targetFile;
                 }
            ?>">
        </div>

        <!-- Display user name here Task 1. -->

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
