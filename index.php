<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MySql Task2</title>
  <link rel="stylesheet" href="./CSS/style.css">
</head>

<body>
  <div class="container">
    <form action="Data.php" method="post">
      <div class="form-ele">
        <label for="Employee_Id">Enter Employee First Name:</label>
        <input type="text" name="first_name" id="first_name">
      </div>

      <div class="form-ele">
        <label for="Employee_Id">Enter Employee Last Name:</label>
        <input type="text" name="last_name" id="last_name">
      </div>

      <div class="form-ele">
        <label for="Employee_Id">Enter Employee Code Name:</label>
        <input type="text" name="Employee_code_name" id="Employee_code_name">
      </div>

      <div class="form-ele">
        <label for="Employee_Id">Enter Employee Salary:</label>
        <input type="text" name="Employee_salary" id="Employee_salary">
      </div>

      <div class="form-ele">
        <label for="Employee_Id">Enter Employee Domain:</label>
        <input type="text" name="Employee_domain" id="Employee_domain">
      </div>

      <div class="form-ele">
        <label for="Employee_Id">Enter Employee Graduation Percentile:</label>
        <input type="text" name="Employee_perc" id="Employee_perc">
      </div>
      <input type="submit" value="Submit" name="submit">
    </form>
  </div>
</body>

</html>
