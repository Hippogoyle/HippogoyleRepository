<?php
    
    require(__DIR__ . "/../includes/config.php");
    
    // numerically indexed array of places
    $places = [];
   
    // search database for places matching $_GET["geo"]
 
    // if string contains zipcode
    if(preg_match("/\b\d{5}\b/", $_GET["geo"], $match)){
        $zip = $match[0];
        $request = query("SELECT * FROM `places` WHERE `postal_code` = ?", $zip);
    }
    
    // if string is NOT city and state
    else if(strpos($_GET["geo"], ",") == FALSE){
        $ct = $_GET["geo"];
        $st = $_GET["geo"];
        $st_name = $_GET["geo"];
        $type = 0;
    }
    
    // if string is city and state      
    else {
        // explode city from state (if any)
        $expl = explode(",", $_GET["geo"]);
        
        // trim off beginning space of state (if any)
        $cut_blank = trim($expl[1]);
        
        $ct = $expl[0];
        $st = $cut_blank;
        $st_name = $cut_blank;
        $type = 1;
        
    }  
    
    // format city & state if zip not found
    if(!preg_match("/\b\d{5}\b/", $_GET["geo"], $match)){   
        // state code to upper
        $st_code = strtoupper($st);

        // format city and state vars
            $cty = strtolower($ct);
        $city = ucwords($cty);
            $stt = strtolower($st_name);
        $state = ucwords($stt);

        // search data base for matches   
        if ($type == 1){
            $request = query("SELECT * FROM `places` WHERE `place_name` = ? AND `admin_name1` = ? OR `place_name` = ? AND `admin_code1` = ?", $city, $state, $city, $st_code);
        }
        else{
            $request = query("SELECT * FROM `places` WHERE `place_name` = ? OR `admin_name1` = ? OR `admin_code1` = ?", $city, $state, $st_code);
        }
    }
    
    // matches to array for export
    foreach ($request as $row){
        $places [] = [
            "place_name" => $row["place_name"],
            "admin_name1" => $row["admin_name1"],
            "postal_code" => $row["postal_code"],
            "latitude" => $row["latitude"],
            "longitude" => $row["longitude"]
        ];
    }

    
    // output places as JSON (pretty-printed for debugging convenience)
    header("Content-type: application/json");
    print(json_encode($places, JSON_PRETTY_PRINT));

?>
