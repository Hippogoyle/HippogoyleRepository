<?php

    // configuration
    require("../includes/config.php"); 

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // render form
        render("login.php", ["title" => "Login"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["workouts"]))
        {
            apologize("You have no workout planed for this week.");
            // render create workout page
            render("create_workout", ["title" => "Create Workout"]);
        }
        // grab next empty day from workout
        $current = query("SELECT * WHERE `id` = ?", $_SESSION["id"]);
        
        
	    // render template quote.php
        render("current_workout.php", ["title" => "Today's Workout"]);
    }

?>
