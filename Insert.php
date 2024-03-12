<?php
  require_once 'ConnectDB.php';

  /**
   * 
   * class Insert
   * 
   * Here Insert Class is used to insert Records in Tables.
   * 
   */

  class Insert {

    /**
     * 
     * @var string.
     * 
     * Store First Name of Employee.
     * 
     */

    private $firstName;

    /**
     * 
     * @var string.
     * 
     * Store Last Name of Employee.
     * 
     */
    private $lastName;

    /**
     * 
     * @var string.
     * 
     * Store Code Name of Employee.
     * 
     */

    private $codeName;

    /**
     * 
     * @var int.
     * 
     * Store Salary of Employee.
     * 
     */

    private $salary;

    /**
     * 
     * @var string.
     * 
     * Store Work Domain of Employee.
     * 
     */

    private $domain;

    /**
     * 
     * @var int.
     * 
     * Store Perecntile of Employee.
     * 
     */

    private $percentile;

    /**
     * 
     * @var string.
     * 
     * Store Employee Code.
     * 
     */

    private $empCode;
    public function __construct($firstName, $lastName,  $codeName, $salary, $domain, $percentile, $empCode) {
      $this->firstName = $firstName;
      $this->lastName = $lastName;
      $this->codeName = $codeName;
      $this->salary = $salary;
      $this->domain = $domain;
      $this->percentile = $percentile;
      $this->empCode = $empCode;
    }

    /**
     * 
     * Here insertCode() function is use to Insert 
     * Records in Employee_Code_Table.
     * 
     * @return void.
     * 
     */

    public function insertCode() {
      $conn = new ConnectDB();
      
      $sql = "INSERT INTO Employee_Code_Table (Employee_Code, Employee_Code_Name, Employee_Domain) VALUES('$this->empCode', '$this->codeName', '$this->domain')";
      $result = mysqli_query($conn->getConnection(), $sql);
      if (!$result) {
        echo mysqli_error($conn->getConnection());
      }
    }

    /**
     * 
     * Here insertSalary() function is use to Insert 
     * Records in Employee_Salary_Table.
     * 
     * @return void.
     * 
     */

    public function insertSalary() {
      $conn = new ConnectDB();
      $sql = "INSERT INTO Employee_Salary_Table (Employee_Salary, Employee_Code) VALUES('$this->salary', '$this->empCode')";
      $result = mysqli_query($conn->getConnection(), $sql);
      if (!$result) {
        echo mysqli_error($conn->getConnection());
      }
    }

    /**
     * 
     * Here insertDetails() function is use to Insert 
     * Records in Employee_Details_Table.
     * 
     * @return void.
     * 
     */

    public function insertDetails() {
        $conn = new ConnectDB();
        $sql = "INSERT INTO Employee_Details_Table (Employee_First_Name, Employee_Last_Name, Graduation_Percentile) VALUES('$this->firstName', '$this->lastName', '$this->percentile')";
        $result = mysqli_query($conn->getConnection(), $sql);
        if (!$result) {
            echo mysqli_error($conn->getConnection());
        }
    }
  }
