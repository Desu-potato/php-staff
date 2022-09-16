<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

function generate_spreadsheet(){
    
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'Hello World !');
    
    $writer = new Xlsx($spreadsheet);
    $writer->save('hello world.xlsx');
}



function check_what_letter($raw){
    $workingArray = explode('.', $raw);

    $workingInt =  $workingArray[0];
    
    $i = 0;
    $row = 0;
    if ($workingInt < 27)
        {
            return translate_number_to_letter($workingInt);
        }
    while (TRUE){
        $bufor = 26**$i;
        if ($bufor >= $workingInt) {
            $row = $i;
            break;
        }
        $i++;

    }
    $letterArray = array();
    for($i = $row-1; $i >= 0; $i--){
        if ($workingInt < 27 && $i == 0 && $workingInt >= 1)
        {
            $letterArray[] = translate_number_to_letter($workingInt);
            
            break;
        }

        if($workingArray[0] == (26**$row)){
            for($x = $row-1; $x >= 0; $x--){
                $letterArray[] = translate_number_to_letter(26);
            }
            break;
        }
        if ($workingInt < 27 && $i == 0)
        {
            if($workingInt <= 1){
                $letterArray[] = translate_number_to_letter(26);
                break;
            }
            if($workingInt >= 1){
                $letterArray[] = translate_number_to_letter($workingInt);
                break;
            }
            
        }

        $letter = $workingInt/(26**$i);
        if($letter > floor($letter)){
            if($letter <= 1){
                $letterArray[] =  translate_number_to_letter(1);
            }
            if($letter >= 1){
                $letterArray[] =  translate_number_to_letter(floor($letter));
            }
        }
        $nextvalue = $workingInt%(26**$i);
        $workingInt = $nextvalue;

        


    }
    return $letterArray;
    }


function translate_number_to_letter($number){
   
    $lettersArray = array(
    
        1 => "A",
        2  => "B",
        3  => "C",
        4  => "D",
        5  => "E",
        6  => "F",
        7  => "G",
        8  => "H",
        9  => "I",
        10  => "J",
        11  => "K",
        12  => "L",
        13  => "M",
        14  => "N",
        15  => "O",
        16  => "P",
        17  => "Q",
        18  => "R",
        19  => "S",
        20  => "T",
        21  => "U",
        22  => "V",
        23  => "W",
        24  => "X",
        25  => "Y",
        26  => "Z",
    
    
    
    );
    return $lettersArray[$number];
}

/*
$i = 1;
while (TRUE){
    
    if (is_string(check_what_letter($i.".1"))){
        echo check_what_letter($i.".1")."</br>";
    }
    if (!is_string(check_what_letter($i.".1"))){
        echo implode("",check_what_letter($i.".1"))."</br>";
    }
     ;
    $i++;
    if($i==17576){
        break;
    }
}
*/