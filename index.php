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

    $marksTable = '';
    if (isset($_POST['submit'])) {
        $flag = 0;
        $marksTable .= "<h2>Marks Table</h2>";
        $marksTable .= "<table border = '1'style = 'width: 100%;'>";
        $marksTable .= "<tr><th>Subject</th><th>Marks</th></tr>";
        $marks = explode("\n", $_POST['table']);
        foreach ($marks as $mark) {
            $marksArray = explode("|", $mark);
            $regexSubject = '/^[A-Za-z\s]+$/';
            $regexMarks = '/^[0-9\s]+$/';
            if (preg_match($regexSubject, $marksArray[0]) && preg_match($regexMarks, $marksArray[1])) {
                $marksTable .= "<tr><td>$marksArray[0]</td><td>$marksArray[1]</td></tr>";
            } 
            else{
                $flag = 1;
                continue;
            }
        }
        $marksTable .= "</table>";
    }

    if (isset($_POST['submit'])) { 
        $phFlag = 0;
        $phNumber = $_POST['phone'];
        if (preg_match('/^\+91\s?\d{10}$/',$phNumber)) {
            $phFlag = 1;
        }
    }
    
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Example</title>
    <link rel="stylesheet" href="./CSS/style.css">
</head>
<body>
    <div class = "container">
        <form method = "post" action = "index.php" enctype="multipart/form-data">
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
                <label for="image">Enter Image</label>
                <input type="file" name="image" id="image">
            </div>

            <div class = "form-ele">
                <label for = "phone">Enter Phone No. (+91)</label>
                <input type = "text" name = "phone" id = "phone">
            </div>

            <div class = "form-ele">
                <label for="table">Enter Marks (Subject|Marks):</label>
                <textarea name="table" id="table" cols="30" rows="5"></textarea>
            </div>

            <div class = "form-ele btn">
                <input type = "submit" name = "submit" value="Submit">
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
        <!-- Display Phone Number is verified or not. -->
        <h1>
            <?php
                if (isset($_POST['submit']) && $phFlag) {
                    echo "Phone Number Verified";
                }
                else {
                    echo "Phone Number Not Verified";
                }
            ?>
        </h1>
        <!-- Display Table here. -->
        <div class="table">
            <?php 
                if ($_POST["table"]!=NULL)
                {
                    echo $marksTable;
                } 
                if ($flag == 1){
                    echo "Entered records are not Correct";
                }
            ?>
        </div>
    </div>
    <script src = "./JS/script.js"></script>
</body>
</html>
