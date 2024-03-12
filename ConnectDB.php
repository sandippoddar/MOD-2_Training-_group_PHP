<?php

  require 'vendor/autoload.php';
  use Dotenv\Dotenv as Dotenv;  
  /**
   * 
   * class ConnectDB
   * 
   * This class represents to Connect with the Database.
   *  
   */

  class ConnectDB {

    /**
     * 
     * @var string.
     * 
     * Use here to store Server name.
     * 
     */

    private $servername = $_ENV['serverName'];

    /**
     * 
     * @var string.
     * 
     * Store Username to connect with database.
     * 
     */

    private $username = $_ENV['userName'];

    /**
     * 
     * @var string.
     * 
     * store Password of User.
     * 
     */
    private $password = $_ENV['password'];

    /**
     * 
     * @var string.
     * 
     * Store Database name.
     */

    private $dbname = $_ENV['dbName'];

    /**
     * 
     * @var bool.
     * 
     * Conn variable use here to know if the database is
     * Connected or not and it return true or false.
     */

    private $conn;

    public function __construct() {
      $dotenv = Dotenv::createImmutable(__DIR__);
      $dotenv->load();
      $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
      if (!$this->conn) {
        die("Connection Failed". mysqli_error($this->conn));
      }
      else {
        echo "Connected Sucesssfuly.";
      }
    }

    /**
     * 
     * here getConnection() function is use to
     * return the conn variable whenever object of
     * the class is created and will call the function.
     * 
     * @return mysqli if true.
     * or @return bool if false.
     * 
     */

    public function getConnection() {
      return $this->conn;
    }
  }  

?>
