<?php

  use PHPMailer\PHPMailer\PHPMailer;
  use GuzzleHttp\Client;
  require 'vendor/autoload.php';

  /**
   * 
   * class SendEmail().
   * 
   * This class represents to Send a custom Email
   * to the Input Email id.
   * 
   */

  class SendEmail {

    /**
     * 
     * @var PHPMailer.
     * 
     * Stores object of PHPMailer class.
     * 
     */
    
    private $mail;
    public function __construct() {
      $this->mail = new PHPMailer(TRUE);
    }
    public function configureMail($email) {
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
      if ($this->mail->send()) {
        return TRUE;
      }
      return FALSE;
    }

    public function validateEmail($email) {
      if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $apiKey = '1e78c4c89237488db4366aee49b9a7e7';
        $client = new Client();
        $response = $client->request('GET', "https://emailvalidation.abstractapi.com/v1?api_key=$apiKey&email=$email");
        $data = json_decode($response->getBody(), TRUE);
        if ($data['deliverability'] === "DELIVERABLE" && !$data["is_disposable_email"]["value"]) {
          return TRUE;
        }
        return FALSE;
      }
      else {
        return FALSE;
      }
    } 
  }

?>