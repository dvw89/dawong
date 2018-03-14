<!DOCTYPE html>
<?php include 'inc/functions.php'; ?>
<?php 
session_start();

if (!isset($_SESSION['human_total'])) {
    $_SESSION['human_total'] = 0;
    $_SESSION['computer_total'] = 0;
}

$background_image = "img/backgrounds/star_wars.jpg";

if (isset($_POST['background'])) {
    if ($_POST['background'] == "Star Wars") {
        $background_image = "img/backgrounds/star_wars.jpg";
    }
    else if ($_POST['background'] == "Battlefield 1") {
        $background_image = "img/backgrounds/battlefield1.jpg";
    }
    else if ($_POST['background'] == "Doom") {
        $background_image = "img/backgrounds/doom.jpg";
    }
    else if ($_POST['background'] == "Overwatch") {
        $background_image = "img/backgrounds/overwatch.jpg";
    }
    else if ($_POST['background'] == "StarCraft 2") {
        $background_image = "img/backgrounds/starcraft2.jpg";
    }
    else if ($_POST['background'] == "Warhammer") {
        $background_image = "img/backgrounds/warhammer.jpg";
    }
}

function checkCategory($category) {
    if ($category == $_POST['background']) {
        echo " selected";
    }
}

?>
<html lang="en">
    <head>
        <title> Attack/Defense </title>
        <meta charset="utf-8">
        <link href="https://fonts.googleapis.com/css?family=Play|Black+Ops+One" rel="stylesheet">
    </head>
    <body>
        <style>
        @import url("https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css");
        @import url("css/hw3_styles.css");
        body { 
            background-image: url(<?=$background_image?>);
            background-size: 100% 100%;
            background-attachment: fixed;
        }
        </style>
        <header>
            <h1><u>Attack/Defense: The Game</u></h1>
            Attack and Defense is a very simple game played by two players who each have eight 
            six-sided dice. Each player begins with a set amount of points (or "hit points", for 
            those who regularly play video games) and the first player whose points decrease to 
            zero loses the game.<br />
            At the beginning of each round, both players secretly decide how many of their eight dice 
            to commit to attack and how many to defense, with the added restriction that they have 
            to use all of their eight dice for either attack or defense. Then all of the dice are 
            rolled while keeping track of which dice are commited to which priority. To determine 
            how much "damage was dealt" to an opponent, the number of pips on the attack dice of 
            each player are added up and compared to the number of total pips on his/her opponent's 
            defense dice. The amount of damage dealt is equal to how much the attacker's attack 
            pips total exceeded the defender's defense pips total.<br />
            A normal game of Attack and Defense uses the rules explained above to determine a 
            winner, but, for purposes of simplicity, this game will instead keep a running tally  
            of how much damage was dealt by each player. That running tally will be each player's 
            "score", so inflicting damage on your opponent will result in a higher score.<br />
            This webpage pits you as the player against an AI opponent, with controls provided for you 
            to select how many of your eight dice are devoted to attack, (the remainder will be set 
            to your defense) a submit button to be used after you have commited your dice, a display
            of the last roll's results for both you and the computer opponent, and a running total 
            of how much damage you and the computer have dealt to each other (the scores). Finally, 
            by selecting a checkbox the user can reset the total points of both the computer and 
            himself. <br />
            A selection of background images from different popular video game titles is also 
            provided via a drop-down menu.<br />
        </header>
        <main>
            <hr />
            <form method="POST">
                Choose how many dice to commit to attack (the remaining dice will go to defense):<br />
                <div>
                    <input type="radio" name="attack" value=1 id="1" <?=($_POST['attack']==1)?"checked":"" ?>>
                    <label for="1"> 1 </label>
                    <input type="radio" name="attack" value=2 id="2" <?=($_POST['attack']==2)?"checked":"" ?>> 
                    <label for="2"> 2 </label>
                    <input type="radio" name="attack" value=3 id="3" <?=($_POST['attack']==3)?"checked":"" ?>>
                    <label for="3"> 3 </label>
                    <input type="radio" name="attack" value=4 id="4" <?=($_POST['attack']==4)?"checked":"" ?>> 
                    <label for="4"> 4 </label>
                    <input type="radio" name="attack" value=5 id="5" <?=($_POST['attack']==5)?"checked":"" ?>>
                    <label for="5"> 5 </label>
                    <input type="radio" name="attack" value=6 id="6" <?=($_POST['attack']==6)?"checked":"" ?>> 
                    <label for="6"> 6 </label>
                    <input type="radio" name="attack" value=7 id="7" <?=($_POST['attack']==7)?"checked":"" ?>>
                    <label for="7"> 7 </label>
                    <input type="radio" name="attack" value=8 id="8" <?=($_POST['attack']==8)?"checked":"" ?>> 
                    <label for="8"> 8 </label>
                </div>
          
                Choose a background for this page:
                <select name="background">
                    <option value="">  Select One </option>
                    <option <?=checkCategory('Star Wars')?>> Star Wars </option>
                    <option <?=checkCategory('Battlefield 1')?>> Battlefield 1 </option>
                    <option <?=checkCategory('Doom')?>> Doom </option>
                    <option <?=checkCategory('Overwatch')?>> Overwatch </option>
                    <option <?=checkCategory('StarCraft 2')?>> StarCraft 2 </option>
                    <option <?=checkCategory('Warhammer')?>> Warhammer </option>
                </select>
                
                <br />
                
                Would you like to reset the total points beginning next round?
                <input type="checkbox" name="resetButton" value="Yes">
                
                <br />
                
                <input type="submit" value="Submit"/>
            </form>
            <hr />
            <?php
                if ($_POST['resetButton'] == 'Yes') {
                    resetGame();
                    echo "<h1> Game reset! </h1>";
                }
                else if(isset($_POST['attack'])) {
                    displayResults();
                }
                else if(!isset($_POST['attack'])) {
                    echo "<h1> Enter a number of dice to attack with to begin the game! </h1>";
                }
            ?>
        </main>
        <hr />
        <footer>
            <div>
            <img src="img/csumb_logo2.jpg" alt="CSUMB logo"/>
            </div>
            This webpage was created as a project by David Wong for the Spring 2018 CST 336: Internet Programming
            class taught by Miguel Lara.
        </footer>
    </body>
</html>