<?php include 'inc/functions.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <title> War: the Card Game </title>
        <style>
            @import url("css/hw2_styles.css");
        </style>
        <link href="https://fonts.googleapis.com/css?family=Amaranth|Dancing+Script|Kalam" rel="stylesheet">
    </head>
    <body>
        <header>
            <h1> WAR: The Card Game </h1>
            <p>"War" is a simple game of chance played entirely with one deck of normal playing cards.
            Two or more players simply divide the deck evenly between themselves and reveal one card 
            at a time from each of their decks and then compare them. The winner of a round is the 
            player whose card has the highest rank. The winner gets the prize of taking all the played
            cards. However, if there are any ties, the tying players each put a card face down and then 
            play a new card to determine who wins both the face down cards and the original cards. Repeated 
            ties are handled by simply having each tying player put an additional card face down and then.
            playing a new face-up card. The winner of the entire game is the player who has all the cards.</p>
            <p>This website simulates one round of war between two players. Every time the page is loaded, 
            one card is "dealt" to each of the two players and a comparison between the ranks of each 
            player's cards is made to determine a winner. The rules for tying are also implemented, with 
            face down cards also shown as cards with their backs upwards and multiple ties resulting in 
            multiple draws and comparisons until one player has a higher rank.</p>
        </header>
        <hr />
        <main>
            <?php
                play();
            ?>
        </main>
        <br />
        <hr />
        <footer>
            <img id="csumb" src="img/csumb_small_logo.jpg" alt="CSUMB logo." />
        </footer>
    </body>
</html>