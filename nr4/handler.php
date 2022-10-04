<?php

include 'includes/simple_html_dom.php';
include 'config.php';

function google_parser_prototype(string $appId){

    global $RULESAPPSCRAPER,$BASELINK, $OFFSET;

    
    $root_path = $_SERVER['DOCUMENT_ROOT'];


    $url = $BASELINK.$appId.$OFFSET;

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $resp = curl_exec($curl);
    curl_close($curl);


    $file = 'test.txt';
    file_put_contents($file, $resp);


    $workspace = file_get_contents($file)."";

    $base1 =  strpos($workspace, $RULESAPPSCRAPER['startingRow']);

    $base2 =  strpos($workspace, $RULESAPPSCRAPER['endingRow']);

    $bufor = substr($workspace, $base1, $base2 - $base1);

    $base3 =  strpos($workspace, $RULESAPPSCRAPER['startingRow2']);

    $base4 =  strpos($workspace, $RULESAPPSCRAPER['endingRow2']);

    $bufor2 = substr($workspace, $base3, $base4 - $base3);

    $test2 = $spaceString = str_replace( '<', ' <',$bufor2);

    $test = $spaceString = str_replace( '<', ' <',$bufor);


    $array2 = [];
    foreach(explode(" ", strip_tags($test2)) as $value){
        if ($value != ""){
            $array2[] = $value;
        }
    }

    $array = [];
    foreach(explode(" ", strip_tags($test)) as $value){
        if ($value != ""){
            $array[] = $value;
        }
    }
    $array[] = "downloads";
    $array[] = implode(" ", $array2);
    $array[] = "updatetime";
    $array = array_reverse($array);
    $newArray = [];
    for ($i = 0; $i <= count($array)-1; $i++) {
        if ($i%2 == 1){
            $newArray[
                $array[$i-1]."" ] = $array[$i];
        }
    }
    $newArray['appPackageId'] = $appId;
    file_put_contents($file, "");
    return $newArray;
}

function mainScraper($search){
  
    Global $RULESMAINSCRAPER;
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://play.google.com/store/search?q='.$search.'&c=apps&hl=en&gl=US',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    ));

    $response = curl_exec($curl);

    curl_close($curl);

    $file = 'test.txt';
    file_put_contents($file, $response );

    $workspace = file_get_contents($file);

    $base1 =  strpos($workspace, $RULESMAINSCRAPER['mainRangeStart']);

    $base2 =  strpos($workspace, $RULESMAINSCRAPER['mainRangeEnd']);

    $bufor = substr($workspace, $base1, $base2 - $base1);
    file_put_contents($file, $bufor);
    
    $doc = str_get_html($bufor);

    $test = $doc->find($RULESMAINSCRAPER['contenerName']);

    $newBrand = [];
    foreach($test as $item){

        $appNameTag = $item->find($RULESMAINSCRAPER['appName']);
        $appName = $appNameTag[0]->innertext();
        $idTag = $item->find($RULESMAINSCRAPER['idTag']);
        $id = $idTag[0]->href;
        
        $divWithImage = $item->find($RULESMAINSCRAPER['divWithImage']);
        $imgSource = $divWithImage[0]->getElementByTagName("img")->src;

        $newBrand[] = [
            "divWithImage" => $imgSource,
            "id" => (explode("=", $id)[1]),
            "appName" => $appName
        ];


    }
    file_put_contents($file, "");
    return $newBrand;
}


function scraper_wrapper($search){
    $buffor = [];
    $array = mainScraper($search);
    foreach($array as $record){
        $buffor[] = google_parser_prototype($record['id']);
    }
    var_dump($buffor);
    echo "</br>";
    var_dump($array);
}




scraper_wrapper("test");
