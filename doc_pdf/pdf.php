<?php
    $full_name = "";
    if (isset($_SERVER["REQUEST_METHOD"]) == "POST") {
        if (isset($_POST['submit'])) {
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $full_name = $first_name . ' ' . $last_name;
        }
    }
    $targetFile = "";
    if (isset($_POST["submit"])) {
        $file = $_FILES['image'];
        $targetDir = "img/";
        $targetFile = $targetDir . basename($_FILES["image"]["name"]);
        $tmp_name = $_FILES['image']['tmp_name'];
        $fileext = explode('.', $targetFile);
        $file_type = strtolower($fileext[1]);
        if ($file_type == "jpg" || $file_type == "png") {
            move_uploaded_file($tmp_name, $targetFile);
        }
    }
    $ph_flag=0;
    $phnumber = $_POST['phone'];
    if (isset($_POST['submit'])) {
        $ph_flag = 0;
        
        if (preg_match('/^\+91[0-9]{10}$/', $phnumber)) {
            $ph_flag = 1;
        }
    }
    $marks_array = explode("\n", $_POST['table']);
    $email = $_POST['email'];
    use Fpdf\Fpdf;
    require 'vendor/autoload.php';
    $pdf = new Fpdf();
    $pdf -> AddPage();
    $pdf -> SetFont('Arial', 'B', 16);
    $pdf -> Cell(0, 10, "PHP Basic Assignment", 1, 1, 'C');
    $pdf -> Cell(20, 10, "NAME: ", 0, 0, 'L');
    $pdf -> Cell(0, 10, strtoupper($full_name), 0, 1, 'L');
    $pdf -> Cell(50, 10, "PHONE NUMBER: ", 0, 0, 'L');
    $pdf -> Cell(0, 10, $phnumber, 0, 1, 'L');
    $pdf -> Cell(40, 10, "USER EMAIL: ", 0, 0, 'L');
    $pdf -> Cell(0, 10, $email, 0, 1, 'L');
    $pdf -> cell(90, 10, "STUDENT TABLE", 1, 1, 'C');
    $pdf -> Cell(45,10,"Subject",1,0, "C");
    $pdf -> Cell(45,10,"Subject",1,1, "C");
    foreach( $marks_array as $mark ) {
        $marks = explode("|", $mark);
        $pdf->Cell(45,10,$marks[0],1,0, "C");
        $pdf->Cell(45,10,$marks[1],1,1, "C");
    }
    $pdf-> Image($targetFile,130,25,50,50);
    $pdf->Output();
?>
