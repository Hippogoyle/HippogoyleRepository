s<?php

    // configuration
    require("../includes/config.php"); 

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("password_form.php", ["title" => "Password change"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
     
        // query database for user
        $rows = query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);
        
        // first (and only) row
            $row = $rows[0];
        
        // compare hash of user's input against hash that's in database
            if (crypt($_POST["currentpassword"], $row["hash"]) == $row["hash"])
            {
                // verify both new passwords match
                if (($_POST["password"]) != ($_POST["conpassword"]))
		        {
            	    apologize("Passwords do not match.");	
		        }
		        else
		        {
		            // update user password and log them out
		            $result = query("UPDATE users SET hash = ? WHERE id = ?", crypt($_POST["password"]), $_SESSION["id"]);
		            render("login_form.php", ["title" => "Log In"]);
		        }

            }
            else
            {
                apologize("Current password incorrect.");
            }

 }

?>
