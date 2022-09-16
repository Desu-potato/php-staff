<?php

function calculate_first_monday_of_table($epoh){
    $raw = $epoh;
    
    $workEpoh = 0;
    $i = 0;
    while (TRUE){
        $buffor = $raw - (86400*$i);
        if ($buffor <= 0) {
            $workEpoh = 0;
            break;
        }
        $bufforArray =  explode(" ", date("N d m Y", $buffor));
        
        $premouth = $bufforArray[2];
       
        if (($bufforArray[1] == "1") && (($bufforArray[0] == '1'))){
            $workEpoh = $buffor;
            break;
            
        }
       
        if(($bufforArray[0] == '1') && ($premouth != date("m", $raw))){
            $workEpoh = $buffor;
            break;
            
        }
        
        $i++;
        
    };
    return $workEpoh;
}

function parse_raw_epoh_to_day($epoh){
    $data = date('j', $epoh);
    return $data;
}


function clear_raw_data($epoh){
    $data = date('r', $epoh);
    return $prepdata;
}

function translate_mouth($mouth){
$mouthArray = array(
    "01" => "Styczeń",
    "02" => "Luty",
	"03" => "Marzec",
	"04" => "Kwiecień",
	"05" => "Maj",
	"06" => "Czerwiec",
	"07" => "Lipiec",
	"08" => "Sierpień",
    "09" => "Wrzesień",
    "10" => "Październik",
    "11" => "Listopad",
    "12" => "Grudzień",
);

return $mouthArray[$mouth];
}

