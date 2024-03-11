<?php

require 'SendEmail.php';
if (isset($_POST['submit'])) {
  $emailObj = new SendEmail();
  $email = $_POST['email'];
  $emailCheck = $emailObj->configureMail($email);
  $validateEmail = $emailObj->validateEmail($email);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Advance Task2</title>
  <link rel="stylesheet" href="./CSS/style.css">
</head>

<body>
  <div class="container">
    <form action="index.php" method="post">
      <h1>PHP Advance Task2</h1>
      <div class="form-ele">
        <label for="email">Enter email:</label>
        <input type="email" name="email" id="email">
      </div>
      <input type="submit" value="Submit" name="submit">
    </form>
    <h1>
      <?php
      if (isset($_POST["submit"])) {
        if ($emailCheck && $validateEmail) {
          echo "Message has been sent successfully";
        }
        else {
          echo "Message cant be send Email does not exist.";
        }
      }
      ?>
    </h1>
  </div>
</body>

</html>
