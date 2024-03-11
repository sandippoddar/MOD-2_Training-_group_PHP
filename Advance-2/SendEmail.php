<?php
  use PHPMailer\PHPMailer\PHPMailer;
  require 'vendor/autoload.php';

  class SendEmail {
    private $mail;
    public function __construct() {
      $this->mail = new PHPMailer(true);
      $this->configureMail();
    }
    public function configureMail() {
      if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $this->mail->isSMTP();
        $this->mail->Host = 'smtp.gmail.com';
        $this->mail->SMTPAuth = TRUE;
        $this->mail->Username = 'sandip.poddar@innoraft.com';
        $this->mail->Password = 'pbhcctzzenyutbsj';
        $this->mail->SMTPSecure = 'ssl';
        $this->mail->Port = 465;
        $this->mail->setFrom('sandip.poddar@innoraft.com');
        $this->mail->addAddress($email);
        $this->mail->isHTML(TRUE);
        $this->mail->Subject = 'Submission';
        $this->mail->Body = 'Thank you for the Submission.';
      }
    }
    public function checkEmail() {
      $emailFlag = 0;
      if (isset($_POST['submit'])) {
        if ($this->mail->send()) {
          $emailFlag = 1;
        }
      }
      return $emailFlag;
    }
  }

  // function CheckEmail() {
  //   if (isset($_POST['submit'])) {
  //     $email = $_POST['email'];
  //     $ob = new SendEmail();
  //     if ($ob->)
  //   }
  // }

?>