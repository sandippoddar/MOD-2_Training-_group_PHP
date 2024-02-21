<!DOCTYPE html>
<html>
<head>
    <title>Form Example</title>
</head>
<body>

<form method="post" action="index.php" enctype="multipart/form-data">
    First Name: <input type="text" name="first_name" id="first_name" required><br>
    Last Name: <input type="text" name="last_name" id="last_name" required><br>
    Full Name: <input type="text" name="full_name" id="full_name" value="" disabled><br>

    <!-- User image: <input type="file" name="image" id="image" required><br> -->
    <input type="submit" name="submit" value="Submit">
</form>
<h1>
<?php


if(isset($_POST['submit'])) {
    
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $full_name = $first_name . ' ' . $last_name;
    echo "Hello ".$full_name;
}
?>
</h1>

<script>
    const first_name=document.querySelector("#first_name");
    const last_name=document.querySelector("#last_name");
    let full_name=document.querySelector("#full_name");
    console.log(first_name.value + " "+ last_name.value);

    function update(){
     
     full_name.value=first_name.value+" "+last_name.value;
      
    }
    

    
    first_name.addEventListener('input', update);
    last_name.addEventListener('input', update);

</script>

</body>
</html>