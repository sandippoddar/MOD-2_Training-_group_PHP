<!DOCTYPE html>
<html>
<head>
    <title>Form Example</title>
</head>
<body>

    <form method = "post" action = "index.php" enctype="multipart/form-data">
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
        <div class="form-ele">
            <label for="image">User Image</label>
            <input type="file" name="image" id="image">
        </div>
        <input type = "submit" name = "submit" value = "Submit">
    </form>
    <div class="image">
        <?php
            if (isset($_POST["submit"])) {

                $file=$_FILES['image'];
                // echo var_dump($file);
                print_r($file);
                
                $file_name = $_FILES['image']['name'];
                $tmp_name = $_FILES['image']['tmp_name'];
                echo $tmp_name;
                $fileext=explode('.',$file_name);
                print_r($fileext);
                $file_type=strtolower($fileext[1]);
                echo $file_type;
                $file_new=uniqid('',true).".".$file_type;
                echo $file_new;
                $file_dest='img/'.$file_new;
                move_uploaded_file($tmp_name,$file_dest);
                echo "<img src='$file_dest'/>";
            }
        ?>
    </div>
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