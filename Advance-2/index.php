<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/autoload.php';

    if(isset($_POST['submit'])) {
        $email = $_POST['email'];
        $mail = new PHPMailer(true);
        $mail -> SMTPDebug = 1;                           
        $mail -> isSMTP();                          
        $mail -> Host = 'smtp.gmail.com';
        $mail -> SMTPAuth = true;                      
        $mail -> Username = 'sandip.poddar@innoraft.com';             
        $mail -> Password = 'pbhcctzzenyutbsj';                       
        $mail -> SMTPSecure = 'ssl';                       
        $mail -> Port = 465;                    
        $mail -> setFrom('sandip.poddar@innoraft.com');
        $mail -> addAddress($email);
        $mail -> isHTML(true);
        $mail -> Subject = 'Submission';
        $mail -> Body = 'Thank you for the Submission.';
        if(!$mail -> send())
        {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }
        else
        {
            echo "Message has been sent successfully";
        }
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
    </div>
</body>
</html>
