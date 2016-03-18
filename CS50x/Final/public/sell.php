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

	   	// query database for user's portfolio
        $sell = query("SELECT * FROM `stock` WHERE `id` = ? AND `symbol` = ?", $_SESSION["id"], $_POST["symbol"]);        
	  
	    // validate user owns stock
	    if(empty($sell[0]["symbol"]))
	    {
	        apologize("You don't own any shares in that stock");
	        exit;
        }
        $position = [];
	    foreach ($sell as $sold)
        {
            $stock = lookup($sell[0]["symbol"]);
            if ($stock !== false)
            {
                $position[] = [
                    "name" => $stock["name"],
                    "price" => $stock["price"],
                    "shares" => $sold["shares"],
                    "symbol" => $sold["symbol"],
                    "avgbuyprice" => $sold["avgbuyprice"],
                    "currentvalue" => $sold["currentvalue"],
                    "P/L" => $sold["P/L"]
                ];
            }
        }
        
        // check holdings for stock existence   
        $shares = query("SELECT shares FROM stock WHERE id = ? AND symbol = ?", $_SESSION["id"], $sold["symbol"]); 
        
        if ($shares[0]["shares"] < $_POST["quantity"])
        {
            apologize("You don't have that many shares to sell.");
            exit;
        }
        // tracking variables for transaction
        $newcash = $_POST["quantity"] * $stock["price"];
        $newshare = $shares[0]["shares"] - $_POST["quantity"];
        $cash = query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
        
        // update cash balance
        $funds = $cash[0]["cash"] + $newcash;
        
        // update data bases
        $c = query("UPDATE users SET cash = ? WHERE id = ?", $funds, $_SESSION["id"]);
        $s = query("UPDATE stock SET shares = ? WHERE id = ? AND symbol = ?", $newshare, $_SESSION["id"], $sold["symbol"]) ;
        $h = query("INSERT INTO history ( id, symbol, shares, price, type) VALUES ( ?, ?, ?, ?, 'SELL')", $_SESSION["id"], strtoupper($sold["symbol"]), $_POST["quantity"], $stock["price"]);
        
        // render template quote.php
        render("sell.php", ["title" => "Sold", "position" => $sold, "quantity" => $_POST["quantity"], "newcash" => $newcash, "funds" => $funds ] );
    }

?>
