<!-- php code for Task 2 -->

<?php

    $targetFile= "";
    if (isset($_POST["submit"])) {
        $file = $_FILES['image'];
        $targetDir="img/";
        $targetFile = $targetDir . basename($_FILES["image"]["name"]);
        $tmp_name = $_FILES['image']['tmp_name'];
        $fileext = explode('.', $targetFile);
        $file_type = strtolower($fileext[1]);
        if ($file_type == "jpg" || $file_type == "jpeg" || $file_type == "png") {
            move_uploaded_file($tmp_name,$targetFile);
        }
    }
?>

<!-- php code for Task 1 -->

<?php
    $full_name="";
    if (isset($_SERVER["REQUEST_METHOD"])=="POST") {
        if (isset($_POST['submit']))
        {
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $full_name = $first_name . ' ' . $last_name;
        }
    }
?>

<!-- php code  for Task 3 -->

<?php
$marksTable = '';
$flag = 0;
if (isset($_POST['submit'])) {
    $flag=0;
    $marksTable .= "<h2>Marks Table</h2>";
    $marksTable .= "<table border='1'style='width: 100%;'>";
    $marksTable .= "<tr><th>Subject</th><th>Marks</th></tr>";
    $marks = explode("\n", $_POST['table']);
    foreach ($marks as $mark) {
        $marks_array = explode("|", $mark);
        if (preg_match('/^[A-Za-z\s]+$/', $marks_array[0]) && preg_match('/^[0-9\s]+$/', $marks_array[1])) {
            $marksTable .= "<tr><td>$marks_array[0]</td><td>$marks_array[1]</td></tr>";
        } 
        else{
            $flag=1;
            continue;
        }
    }
    $marksTable .= "</table>";
}
?>

<!-- php code for Task 4 -->

<?php
    if (isset($_POST['submit'])) { 
        $ph_flag=0;
        $phnumber=$_POST['phone'];
        if (preg_match('/^\+91[0-9]{10}$/',$phnumber)) {
            $ph_flag=1;
        }
    }
?>

<!-- PHP Code for Task 5 -->

<?php
    $email_flag = 0;
    $email = "";
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $api_key = '1e78c4c89237488db4366aee49b9a7e7';
            $ch = curl_init();
            curl_setopt_array($ch, [CURLOPT_URL => "https://emailvalidation.abstractapi.com/v1?api_key=$api_key&email=$email", 
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET" 
            ]);
            $response = curl_exec($ch);
            curl_close($ch);
            $data = json_decode($response, true);
            if ($data['deliverability'] === "DELIVERABLE" && !$data["is_disposable_email"]["value"]) {
                $email_flag = 1;
            }
        }
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
        <form method = "post" action = "index.php" enctype = "multipart/form-data">
            <h1>PHP BASIC</h1>
            <div class = "form-ele">
                <label for = "first_name">First Name:*</label>
                <input type = "text" name = "first_name" id = "first_name" maxlength="20" pattern="[A-Za-z]+" required>
                <p class = "wrong_fname"></p>
            </div>
            <div class = "form-ele">
                <label for = "last_name">Last name:*</label>
                <input type = "text" name = "last_name" id = "last_name" maxlength="20" pattern="[A-Za-z]+" required>
                <p class = "wrong_lname"></p>
            </div>
            <div class = "form-ele">
                <label for = "full_name"> Full Name: </label>
                <input type = "text" name = "full_name" id = "full_name" value = "" disabled>
            </div>
            <div class = "form-ele">
                <label for = "image">Enter Image</label>
                <input type = "file" name = "image" id = "image">
            </div>
            <div class = "form-ele">
                <label for = "phone">Enter Phone No. (+91)</label>
                 <input type = "text" name = "phone" id="phone" maxlength="13">
            </div>
            <div class = "form-ele">
                <label for = "email">Enter User Email:</label>
                <input type = "text" name = "email" id="email">
            </div>
            <div class = "form-ele">
                <label for = "table">Enter Marks (Subject|Marks):</label>
                <textarea name = "table" id = "table" cols = "30" rows = "5"></textarea>
            </div>
            <div class = "form-ele btn">
                <input type = "submit" name = "submit" value = "Submit">
            </div>

        </form>
        <!-- display image here Task 2-->
        <div class="image">
            <img src="<?php 

                 if (isset($_POST['submit'])) {
                    echo $targetFile;
                 }
            ?>" alt="">
        </div>
        <!-- display user name here Task 1 -->
        <h1> 
            <?php 
                if (isset($_POST['submit'])) {
                    echo "Hello " . $full_name; 
                }
            ?> 
        </h1>
        <h1>
            <?php
                if (isset($_POST['submit'])) {
                    if ($ph_flag) {
                        echo "Phone Number Verified";
                    }
                    else{
                        echo "Phone Number Not Verified";
                    }
                }
            ?>
        </h1>
        <h2>
            <?php
                if (isset($_POST['submit'])) {
                    if ($email_flag) {
                        echo $email . " is verified";
                    }
                    else{
                        echo $email . " is not verified";
                    }
                }
            
            ?>
        </h2>
        <div class = "table">
            <?php 
                if ($_POST['table']!=NULL)
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
