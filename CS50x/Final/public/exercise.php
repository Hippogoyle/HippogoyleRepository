<?php

    // configuration
    require("../includes/config.php"); 

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // render form
        render("exercise_form.php", ["title" => "New Exercise"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else 
    {  
    
        // validate submission
        if (empty($_POST["excercise"]))
        {
            apologize("No exercise added to the database.");
            // render create workout page
            render("exercise_form", ["title" => "New Exercise"]);
        }
        
        $insert = query("INSERT INTO `exercises`(exercise, description, focus) VALUES (?, ?, ?)", $_POST["exercise"], $_POST["description"], $_POST["focus"]);
	    // render template quote.php
        render("exercise_form.php", ["title" => "New Exercise"]);
    
    }

?>
