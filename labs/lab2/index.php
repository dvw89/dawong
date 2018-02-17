<?php include 'inc/functions.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <title> 777 Slot Machine </title>
        <style>
            @import url("css/lab2_styles.css");
        </style>
    </head>
    <body>
        <div id="main">
            <?php
                play();
            ?>
        
            <form>
                <input type="submit" value="Spin!" />
            </form>
        </div>
        <br />
        <footer>
            <img id="buddy" src="img/buddy_verified.png" alt="Buddy verification." />
            <img src="img/csumb_small_logo.jpg" alt="CSUMB logo." />
        </footer>
    </body>
</html>