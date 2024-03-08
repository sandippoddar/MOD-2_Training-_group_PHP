<?php

  require_once 'Insert.php';

  if (isset($_POST['submit'])) {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $codeName = $_POST['Employee_code_name'];
    $salary = $_POST['Employee_salary'];
    $domain = $_POST['Employee_domain'];
    $percentile = $_POST['Employee_perc'];
    $empCode = 'SU_' . $firstName;
    //Create an object of Insert class.
    $obInsert = new Insert($firstName, $lastName,  $codeName, $salary, $domain, $percentile, $empCode);
    $obInsert->insertCode();
    $obInsert->insertSalary();
    $obInsert->insertDetails() ;
    print_r($_POST);
  }

?>
