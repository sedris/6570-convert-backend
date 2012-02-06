<?
// convert images (or other files, I suppose) to pdf
// currently at sedris.mit.edu/print.php

// GET UPLOADED FILE 
//$inp = fopen("php://input");
$inp = file_get_contents("php://input");
$imgFileName = $_GET['filename'];
$pdfFileName = $imgFileName.'.pdf';
$outp = fopen($imgFileName, "w");

fwrite($outp, $inp);
fclose($outp);

// CONVERT UPLOADED FILE
$converted = `convert $imgFileName $pdfFileName`;

// SEND CONVERTED FILE
header('Content-type: application/pdf');
header('Content-Disposition: attachment; filename='.$pdfFileName);
readfile($pdfFileName);

// DELETE FILES
$delImg = `rm $imgFileName`;
$delPdf = `rm $pdfFileName`;
?>


