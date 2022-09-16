<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billings</title>
    <style>

    th {
        background: black;
        color: white;
    }
    
    td{
        border-color:black;
        border:solid;
        padding: 0px;
    }
    </style>
</head>
<body>
<?php
        require_once("helpers.php");
        $epoh = $_POST["data_time"];
        $data = 0;
        if (empty($_POST["data_time"])){
            header("Location: index.php");
        }
        if (empty($_POST["data_type"])){
            header("Location: index.php");
        }
        if ($_POST["data_type"] == 1){
            if($epoh != "0"){
                $data = calculate_first_monday_of_table($epoh);
            }
            
        }
        if ($_POST["data_type"] == 2){
            if($epoh != "1/1970"){
                $prep = explode("/", $_POST["data_time"]);
                $epoh = date("U", mktime(0, 0, 0, intval($prep[0]), 15, intval($prep[1])));
                $data = calculate_first_monday_of_table(intval($epoh));
            }
            if($epoh == "1/1970"){
                $epoh = '1';
            }
            
        }
        
        if ($_POST["data_type"] == 3){
            if($epoh != "1-1970"){
                $prep = explode("-", $_POST["data_time"]);
                $epoh = date("U", mktime(0, 0, 0, intval($prep[0]), 15, intval($prep[1])));
                $data = calculate_first_monday_of_table(intval($epoh));
            }
            if($epoh == "1-1970"){
                $epoh = '1';
            }
        }
        $parser = explode(" ", date("N d m Y", $epoh));
        echo '<table style="width:100%;">
        <th style="background:white;color:Red;"><h2>'.translate_mouth($parser[2]).'</h2></th>
        <th style="width:60%;background:white;color:black"></th>
        <th style="background:white;color:black">'.$parser[3].'</th>
        </table>
        <table style="width:100%;">
        <tr>
        <th>Pn</th>
        <th>Wt</th>
        <th>Śr</th>
        <th>Cz</th>
        <th>Pt</th>
        <th>So</th>
        <th style="background:red;">Nd</th>
        </tr>';
        
        
        if ($epoh != '1'){
            $i = 0;
            for ($y = 0; $y <= 5; $y++) {
                echo '<tr>';
                for ($x = 0; $x <= 6; $x++) {
                    if ($x == 6) {
                        echo '<td style="color:red;">'.parse_raw_epoh_to_day($data+86400*$i).'</td>';
                    }
                    if ($x != 6) {
                        echo '<td>'.parse_raw_epoh_to_day($data+86400*$i).'</td>';
                    }
                    $i++;
                }
            }
        }
        if ($epoh == '1'){
            $i = 4;
            echo '<tr><td>29</td><td>30</td><td>31</td><td>1</td><td>2</td><td>3</td><td style="color:red;">4</td></tr>';
            for ($y = 0; $y <= 4; $y++) {
                echo '<tr>';
                for ($x = 0; $x <= 6; $x++) {
                    if ($x == 6) {
                        echo '<td style="color:red;">'.parse_raw_epoh_to_day($data+86400*$i).'</td>';
                    }
                    if ($x != 6) {
                        echo '<td>'.parse_raw_epoh_to_day($data+86400*$i).'</td>';
                    }
                        $i++;
                } 
                echo '</tr>';
            }
            echo '</tr>';
        }
        echo '</table>';
    ?>

    
    
    
</body>