<!DOCTYPE html>

<html>

    <head>

        <link href="/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="/css/bootstrap-theme.min.css" rel="stylesheet"/>
        <link href="/css/styles.css" rel="stylesheet"/>

        <?php if (isset($title)): ?>
            <title><?= htmlspecialchars($title) ?>HealthMe</title>
        <?php else: ?>
            <title>HealthMe</title>
        <?php endif ?>

        <script src="/js/jquery-1.11.1.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/scripts.js"></script>


    </head>

    <body>
        <div class="container">

            <div id="top">
                <a href="/"><img alt="HealthMe" src="/img/logo.gif"/></a>
           
                <ul class="nav nav-pills">
                    <li><a href="history.php">Workout History</a></li>
                    <li><a href="exercise.php">Exercises</a></li>
                    <li><a href="measurements.php">Measurements</a></li>
                    <li><a href="history.php">History</a></li>
                    <li><a href="index.php">Workout</a></li>
                    
                </ul>
            </div>
        
            <div id="middle">
