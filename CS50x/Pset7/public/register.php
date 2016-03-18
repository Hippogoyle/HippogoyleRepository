<?php

	// configuration
    	require("../includes/config.php"); 

    	// if user reached page via GET (as by clicking a link or via redirect)
    	if ($_SERVER["REQUEST_METHOD"] == "GET")
    	{
		    // else render form
		    render("register_form.php", ["title" => "Register"]);
   	    }

    	// else if user reached page via POST (as by submitting a form via POST)
    	else if ($_SERVER["REQUEST_METHOD"] == "POST")
    	{
		// validate submission
		if (empty($_POST["username"]))
		{
	    		apologize("You must provide your username.");
		}
		else if (empty($_POST["password"]))
		{
		     	apologize("You must provide your password.");
		}
		else if (($_POST["password"]) != ($_POST["confirmation"]))
		{
		    	apologize("Passwords do not match.");	
		}

		// query database for user
		$rows = query("SELECT * FROM users WHERE username = ?", $_POST["username"]);

		// if we found user, check password
		if (count($rows) == 1)
		{
		    	apologize("User name already exists.");
		}
		else 
		{
			$result = query("INSERT INTO users (username, hash, cash) VALUES(?, ?, 10000.00)", $_POST["username"], crypt($_POST["password"]));

			// query database for user
			$rows = query("SELECT * FROM users WHERE username = ?", $_POST["username"]);

			// if we found user, check password
			if (count($rows) == 1)
			{
		    		// first (and only) row
		    		$row = $rows[0];

		    		// compare hash of user's input against hash that's in database
		    		if (crypt($_POST["password"], $row["hash"]) == $row["hash"])
		    		{
		        		// remember that user's now logged in by storing user's ID in session
		        		$_SESSION["id"] = $row["id"];

		        		// redirect to portfolio
		        		redirect("/");
		    		}
			}

		
    	}
	}

?>
