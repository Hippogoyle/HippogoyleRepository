<?php

    // configuration
    require("../includes/config.php"); 

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("funds_form.php", ["title" => "Funds"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // query database for user's portfolio
        $rows = query("SELECT * FROM `stock` WHERE `id` = ?", $_SESSION["id"]);        
            
        if (query("SELECT `symbol` FROM `stock` WHERE  `id` = ?", $_SESSION["id"]) == NULL)
        {
            
            $positions[] = [
                        "name" => NULL,
                        "price" => NULL,
                        "shares" => NULL,
                        "symbol" => NULL,
                        "linetotal" => NULL
                    ];
            
            
        }
        else
        {
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
                        "linetotal" => $stock["price"] * $row["symbol"]
                    ];
                }
            }
        }
            // query database for user
            $rowcash = query("SELECT `cash` FROM `users` WHERE `id` = ?", $_SESSION["id"]);
            
            $newcash = $rowcash[0]["cash"] + $_POST["cash"];
          
            // update user cash and history
            $c = query("UPDATE users SET cash = ?  WHERE id = ?", $newcash, $_SESSION["id"]);
            $h = query("INSERT INTO history (id, shares, price, type) VALUES (?, 1, ?, 'FUND')", $_SESSION["id"], $newcash[0]);
            render("portfolio.php", ["cash" => $newcash, "positions" => $positions, "title" => "Portfolio"]);
        
    }
?>
