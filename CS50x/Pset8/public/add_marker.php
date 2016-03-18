<?php
    
    require(__DIR__ . "/../includes/config.php");
    
    $sw_lat = htmlspecialchars($_POST[sw_lat]);
    $sw_lng = htmlspecialchars($_POST[sw_lng]);
    $ne_lat = htmlspecialchars($_POST[ne_lat]);
    $ne_lng = htmlspecialchars($_POST[ne_lng]);
    
    
    $rows = query("SELECT * FROM `places` WHERE (`latitude` BETWEEN ? AND ?) AND ('longitude' BETWEEN ? AND ?)", $sw_lat, $ne_lat, $sw_lng, $ne_lng);        
        
    $positions = [];
    foreach ($rows as $row)
    {
        $news = lookup($row["symbol"]);
        $positions[] = [
            "latitude" => $row["latitude"],
            "logitude" => $row["logitude"],
            "shares" => $row["shares"],
            "symbol" => $row["symbol"],
            "type" => $row["type"],
            "cashbalance" => $row["price"] *  $row["shares"],
        ];
    }
