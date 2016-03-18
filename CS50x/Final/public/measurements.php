<?php

    // configuration
    require("../includes/config.php"); 

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // render form
        render("measurements.php", ["title" => "Measurements"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["weight"]))
        {
            apologize("Your data was not saved.");
            // render measurements_form page
            render("measurements_form", ["title" => "Measurements"]);
        }
        // calculate bmi
        if($_POST["height"] < 7 && $_POST["height"] > 3)
        {
            $bmi = $_POST["weight"] / $_POST["height"]^2;
        } 
        else
        {  
            $bmi = ($_POST["weight"] / $_POST["height"]^2) * 703;
        }
        $date = date('Y-m-d');

        // insert new data into measurements database(bmi calculated inserted with timestamp)
        $measures = query("INSERT INTO `measurements`
            (`id`, `date`, `height`, `weight`, `bmi`, `skinChest`, `skinAbs`, `skinThigh`, `neck`, `leftUpper`, 
            `rightUpper`, `leftForearm`, `rightForearm`, `chest`, `waist`, `hips`, `leftThigh`, 
            `rightThigh`, `leftCalf`, `rightCalf`)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)",$_SESSION["id"], $date,
            $_POST["height"], $_POST["weight"], $bmi, $_POST["skinChest"], $_POST["skinAbs"],
            $_POST["skinThigh"], $_POST["neck"], $_POST["leftUpper"], $_POST["rightUpper"],
            $_POST["leftForearm"], $_POST["rightForearm"],$_POST["chest"], $_POST["waist"],
            $_POST["hips"], $_POST["leftThigh"], $_POST["rightThigh"], $_POST["leftCalf"],
            $_POST["rightCalf"]
        );
        
        // retrieve first data entry by id
        $measure = query("SELECT * FROM `measurements` WHERE `id` = ?", $_SESSION["id"]);
        
        // retrieve exercise history by id
        $exercise = query("SELECT *  FROM `workouts` WHERE `id` = ?", $_SESSION["id"]);
      
        // render stats page
        render("progress.php", ["measurements" => $measure, "exercise" => $exercise, "title" => "Progress"]);
    }

?>
