<?php

    // configuration
    require("../includes/config.php"); 

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("quote_form.php", ["title" => "Quote"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["symbol"]))
        {
            apologize("You must provide a ticker symbol.");
        }
        // try to receive stock quote
        $stock = lookup($_POST["symbol"]);

	    // validate response from server
	    if ($stock != true)
	    {
		    apologize("Stock not found.");
		    exit;
	    }

	    // validate user owns stock
        $buy = query("SELECT * FROM `stock` WHERE `id` = ? AND `symbol` = ?", $_SESSION["id"], $_POST["symbol"]);               
        
        // query database for user's portfolio
        if(empty($buy[0]["symbol"]))
	    {
	        $result = query("INSERT INTO `stock` (`id`, `symbol`, `shares`) VALUES (?, ?, 0)", $_SESSION["id"], $_POST["symbol"]);
	        $buy = query("SELECT * FROM `stock` WHERE `id` = ? AND `symbol` = ?", $_SESSION["id"], strtoupper($_POST["symbol"]));
	    }   
        
        
        $position = [];
        
	    foreach ($buy as $bought)
        {
            $stock = lookup($buy[0]["symbol"]);
            if ($stock !== false)
            {
                $position[] = [
                    "name" => $stock["name"],
                    "price" => $stock["price"],
                    "shares" => $bought["shares"],
                    "symbol" => $bought["symbol"],
                    "avgbuyprice" => $bought["avgbuyprice"],
                    "currentvalue" => $bought["currentvalue"],
                    "P/L" => $bought["P/L"]
                ];
            }
        }
        // grab cash balance
        $cash = query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
        
        // get total cash needed for transaction
        $newcash = $_POST["quantity"] * $stock["price"];
        
        // verify funds available
        if ($cash[0]["cash"] < $newcash)
        {
            apologize("Not enough funds available.");
		    exit; 
        }
       
        // update share quantity 
        $position[0]["shares"] += $_POST["quantity"];

        // update cash balance
        $funds = $cash[0]["cash"] - $newcash;
    
        // update dat bases
        $c = query("UPDATE users SET cash = ? WHERE id = ?", $funds, $_SESSION["id"]);
        $s = query("UPDATE stock SET shares = ? WHERE id = ? AND symbol = ?", $_POST["quantity"], $_SESSION["id"], $buy[0]["symbol"]) ;
        $h = query("INSERT INTO history ( id, symbol, shares, price, type) VALUES (?, ?, ?, ?,'BUY')", $_SESSION["id"], strtoupper($buy[0]["symbol"]), $_POST["quantity"], $stock["price"]);    
        
        // render template quote.php
        render("bought.php", ["title" => "Bought", "position" => $position[0], "quantity" => $_POST["quantity"], "newcash" => $newcash, "funds" => $funds ] );
    }

?>
