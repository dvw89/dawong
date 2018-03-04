<!DOCTYPE html>
<?php include 'inc/functions.php'; ?>
<?php 
session_start();

if (!isset($_SESSION['totalTime'])) {
    $_SESSION['totalTime'] = 0;
    $_SESSION['numRuns'] = 0;
}

$_SESSION['currentRunStart'] = microtime(true);

?>
<html lang="en">
    <head>
        <title> SilverJack </title>
        <meta charset="utf-8">
        <link href="css/styles.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Aldrich|Black+Ops+One" rel="stylesheet">
        
    </head>
    <body>
        <header>
            <font size=10><u>Silverjack</u></h1></font>
            <h2>By Connor, Cristian, Jordi, and David</h2>
        </header>
        <main>
            <?php 
                play();
            ?>
        </main>
        <hr />
        <footer>
            <img src="img/csumb_logo2.jpg" alt="CSUMB logo"/>
            <div>
                Class CST336 of Spring 2018. By Connor Gieg, Cristian Galvan, Jordi Mejia Cruz, and David Wong.<br />
                <strong>Disclaimer:</strong> The information in the webpage is purely fictitious.<br />
                It is used for academic purposes only.
            </div>
        </footer>
    </body>
</html>