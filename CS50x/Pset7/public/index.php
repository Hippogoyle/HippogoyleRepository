<?php

    // configuration
    require("../includes/config.php"); 

    // query database for user's portfolio
    $rows = query("SELECT * FROM `stock` WHERE `id` = ?", $_SESSION["id"]);        
        
    if (query("SELECT `symbol` FROM `stock` WHERE  `id` = ?", $_SESSION["id"]) == NULL)
    {
        $v = 0;
        $positions[0] =[
            "symbol" => NULL,
            "shares" => NULL,
            "price" => NULL,
            "linetotal" => NULL
        ];
    }
    else
    {
        $v = 0;
        $positions = [];
        foreach ($rows as $row)
        {
            $stock = lookup($row["symbol"]);
            if ($stock !== false)
            {
                $positions[] = [
                    "name" => $stock["name"],
                    "price" => $stock["price"],
                    "shares" => $row["shares"],
                    "symbol" => $row["symbol"],
                    "linetotal" => $stock["price"] * $row["shares"]
                ];
            }
            $u = query("UPDATE stock SET currentvalue = ? WHERE id = ? AND symbol = ?", $stock["price"] * $row["shares"], $_SESSION["id"], $row["symbol"]);
            $v += $stock["price"] * $row["shares"];     
        }

    
        
        // render portfolio
    }
    $cash = query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
  
    render("portfolio.php", ["cash" => $cash[0]["cash"], "value" => $v, "positions" => $positions, "title" => "Portfolio"]);
?>
