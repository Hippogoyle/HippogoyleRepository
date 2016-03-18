<?php

    // configuration
    require("../includes/config.php"); 

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("quote_form.php", ["title" => "Quote Search"]);
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
  
	    // render template quote.php
        render("quote.php", ["title" => "Quote Result", "symbol" => strtoupper($stock["symbol"]), "name" => $stock["name"], "price" => $stock["price"]]);
    }

?>
