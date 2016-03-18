<?php

    // configuration
    require("../includes/config.php"); 

    // query database for user's portfolio
    $rows = query("SELECT * FROM `history` WHERE `id` = ?", $_SESSION["id"]);        
        
    $positions = [];
    foreach ($rows as $row)
    {
        $stock = lookup($row["symbol"]);
        $positions[] = [
            "time" => $row["time"],
            "price" => $row["price"],
            "shares" => $row["shares"],
            "symbol" => $row["symbol"],
            "type" => $row["type"],
            "cashbalance" => $row["price"] *  $row["shares"],
        ];
    }
    
    // render portfolio
    render("history.php", ["positions" => $positions, "title" => "History"]);
 
?>

