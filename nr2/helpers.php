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
    $letterArray = array();
    $i = 0;

    while (TRUE){
        $bufor = 26**$i;
        if ($bufor >= $workingInt) {
            $row = $i;
            break;
        }
        $i++;

    }
   

    $Buffor = array();
    $test = $workingInt;
    while(TRUE){
        $betanextvalue = floor($test/(26));
        $letter = $test%(26);
        if($betanextvalue == 0){
            $Buffor[] = $letter;
            break;
        }
        $Buffor[] = $letter;
        if($test < 27){
            $Buffor[] = $letter;
            break;
        }
        $test = $betanextvalue;
    }
    
   
    if($Buffor[0] == 0){
        $Buffor[0] = 26;
        for($x = 1; $x <= count($Buffor)-1; $x++){
            if($Buffor[$x]-1 == -1){
                $Buffor[$x] = 26;
                continue;
            }
            $Buffor[$x] = $Buffor[$x]-1;
        }
    }
   
    
    var_dump($Buffor);
    


    $reversBuffor = array_reverse($Buffor);

   
    $string = ""; 
    foreach($Buffor as $value){
        $string = $string.translate_number_to_letter($value);
    } 
    return $string;
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






$i = 0;
while (TRUE){
    echo check_what_letter($i.".1");
    echo "</br>";
    $i++;
    if($i==17576){
        
        break;
    }
}




