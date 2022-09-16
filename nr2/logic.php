<?php

require 'vendor/autoload.php';
require 'helpers.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;

$raw = "17576.10";
/*
if (empty($_POST["fileToUpload"])){
    header("Location: index.php");
}
if (empty($_POST["CTA"])){
    header("Location: index.php");
}
$raw = $_POST["CTA"];
array_intersect
*/

$containBool = str_contains($raw, ".");

if($containBool){
    var_dump(check_what_letter($raw));
   
}
if(!$containBool){
    explode('', $raw);
}

/*


$beta = 0;
$_POST["CTA"];





$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($_POST["fileToUpload"]);
$cellValue = $spreadsheet->getActiveSheet()->getCell('A1')->getValue();
echo "Answer is:</br>";
var_dump($cellValue);


*/