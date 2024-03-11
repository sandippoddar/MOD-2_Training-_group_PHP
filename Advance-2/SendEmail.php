<?php
  require 'vendor/autoload.php';
  use PHPMailer\PHPMailer\PHPMailer;
  use GuzzleHttp\Client;
  use Dotenv\Dotenv as Dotenv;

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

    /**
     * 
     * Constructor of class SendEmail().
     * 
     * Initialize the instance variable when
     * the object of class is created.
     * 
     */

    public function __construct() {
      $dotenv = Dotenv::createImmutable(__DIR__);
      $dotenv->safeLoad();
      $this->mail = new PHPMailer(TRUE);
    }

    /**
     * 
     * Function configureMail($email).
     * 
     * This function is use here to return TRUE if The Email
     * is send or FALSE if the email is not sent.
     * 
     * @param string.
     * Stores Email address of Person to send Email.
     * 
     * @return bool.
     * 
     */

    public function configureMail($email) {
      $this->mail->isSMTP();
      $this->mail->Host = 'smtp.gmail.com';
      $this->mail->SMTPAuth = TRUE;
      $this->mail->Username = $_ENV['userName'];
      $this->mail->Password = $_ENV['password'];
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

    /**
     * 
     * Function validateEmail($email).
     * 
     * This function is use here to check the email is
     * valid or not and if valid now check if this email
     * exist or not.
     * 
     * @param string.
     *  Stores Email address of Person to send Email.
     * 
     * @return bool.
     * 
     */

    public function validateEmail($email) {
      if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $apiKey = $_ENV['apiKey'];
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

