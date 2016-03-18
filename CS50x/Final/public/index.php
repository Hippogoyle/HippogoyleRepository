<?php

    // configuration
    require("../includes/config.php"); 
    
    //if(query("SELECT * FROM `workouts` WHERE `id` = ?", $_SESSION["id"]) == NULL)
    //{
        // gather  available exercises for dropdown menu
        $exercises = query("SELECT * FROM `exercises`");

        
        // send user to create_workout.php form
        render("progress.php", [ /*"day" => $day[0]["day"],*/ "exercises" => $exercises, "title" => "Create Workout"]);   
/*    }
    
    else
    {
        // query database for user's next workout day
        $day = query("SELECT MAX(day + 1) AS day FROM `workouts` WHERE `actreps` != 0 AND `id` = ?", $_SESSION["id"]);

        // grab next day's workout list
        $rows = query("SELECT * FROM `workouts` WHERE `id` = ? AND `day` = ?", $_SESSION["id"], $day[0]["day"]);        
        $workout = [];
        foreach ($rows as $row)
        {
             $workout[] = [
                "day" => $row["day"],
                "exercise" => $row["exercise"],
                "goalweight" => $row["goalweight"],
                "goalreps" => $row["goalreps"],
                "actweight" => $row["actweight"],
                "actreps" => $row["actreps"]
            ];
     
        }
        // render workout
        render("current_workout.php", ["workout" => $workout, "title" => "Workout"]);
    }
*/    
?>
