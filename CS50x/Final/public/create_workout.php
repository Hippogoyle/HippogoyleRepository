<?php

    // configuration
    require("../includes/config.php"); 

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // render form
        render("create_workout.php", ["title" => "Create Workout"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else 
    {  
        // validate submission
        if (empty($_POST["week"]))
        {
            apologize("You have no workout planned for this week.");
            // render create workout page
            render("create_workout", ["title" => "Create Workout"]);
        }
        for($j = 1; $j <= 3; $j++)
        {     
            for ($i = 1; $i <= 14; $i++)
            {
                $insert = query("INSERT INTO `workouts`(`day`, `exercisenum`, `exercise`, `id`) VALUES (?, ?, ?, ?) ", $j + ($_POST["week"] - 1 )* 3 , $i, $_POST[$i], $_SESSION["id"]);
            } 
        }
        // render template quote.php
        render("current_workout.php", ["title" => "Today's Workout"]);
    }

?>
