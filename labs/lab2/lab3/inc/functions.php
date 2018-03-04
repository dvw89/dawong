<?php
    // Begin by declaring global variables.
    
    class Card {
        public $cardRank;
        public $cardSuit;
    }

    $player1Cards = array();
    $player2Cards = array();
    $player3Cards = array();
    $player4Cards = array();

    // Done with global variables.
    
    //Initializing the deck with cards of suit and rank.
    $suits = array("clubs", "spades", "hearts", "diamonds");

    $deck = array();

    for ($i=0; $i<=3; $i++) {
        for ($j=1; $j<=13; $j++) {
            $card = new Card;
            $card->cardSuit = $suits[$i];
            $card->cardRank = $j;
            $deck[] = $card;
        }
    }

    //Shuffle the deck.
    shuffle($deck);
    
    function generatePlayerHand(&$deck, &$player_hand) {
        $current_card;
        $current_rank;
        $player_total = 0;
        while ($player_total <= 35) {
            $current_card = array_pop($deck);
            $current_rank = $current_card->cardRank;
            if ($current_rank >= 11) {
                $player_total += 10;
            }
            else {
                $player_total += $current_card->cardRank;
            }
            $player_hand[] = $current_card;
        }
        return $player_total;
    }
    
    function play() {
        global $deck;
        global $player1Cards;
        global $player2Cards;
        global $player3Cards;
        global $player4Cards;
        $p1_total = generatePlayerHand($deck, $player1Cards);
        $p2_total = generatePlayerHand($deck, $player2Cards);
        $p3_total = generatePlayerHand($deck, $player3Cards);
        $p4_total = generatePlayerHand($deck, $player4Cards);
        $player_totals = array($p1_total, $p2_total, $p3_total, $p4_total);
        $total_points = $p1_total + $p2_total + $p3_total + $p4_total;
        $winners = determineWinners($player_totals);
        printGameResults($player1Cards, $player2Cards, $player3Cards, $player4Cards, $winners, $player_totals, $total_points);
        echo "<hr /><br>";
        printTimes();
    }
    
    function determineWinners($player_totals) {
        $p1 = $player_totals[0];
        $p2 = $player_totals[1];
        $p3 = $player_totals[2];
        $p4 = $player_totals[3];
        $winning_num = 0;
        $current_win = 0;
        $victors = array();
        foreach($player_totals as $current_total) {
            if ($current_total <= 42 && $current_total > $current_win) {
                $current_win = $current_total;
            }
        }
        if ($p1 == $current_win) {
            $victors[] = "Connor";
        }
        if ($p2 == $current_win) {
            $victors[] = "Cristian";
        }
        if ($p3 == $current_win) {
            $victors[] = "Jordi";
        }
        if ($p4 == $current_win) {
            $victors[] = "David";
        }
        return $victors;
    }
    
    function printGameResults(&$deck_1, &$deck_2, &$deck_3, &$deck_4, $winners, $player_totals, $total_points) {
        
        $current_suit;
        $current_rank;
        
        //Connor
        echo "<div>";
        echo "<h2 class='playerName'>Connor</h2></div>";
        echo "<div><img class='playerImage' src='img/students/1.jpg'>";
        
        foreach($deck_1 as $p1_card) {
            $current_suit = $p1_card->cardSuit;
            $current_rank = $p1_card->cardRank;
            echo "<img src=img/cards/$current_suit/$current_rank.png>";
        }
        
        echo "</div>";
        
        echo "<div><h3>Points: </h3> ";
        echo "$player_totals[0]";
        echo "</div><hr /><br>";
        
        //Cristian
        echo "<div>";
        echo "<h2 class='playerName'>Cristian</h2></div>";
        echo "<div><img class='playerImage' src=img/students/2.jpg>";
        
        foreach($deck_2 as $p2_card) {
            $current_suit = $p2_card->cardSuit;
            $current_rank = $p2_card->cardRank;
            echo "<img src=img/cards/$current_suit/$current_rank.png>";
        }
        
        echo "</div>";
        
        echo "<div><h3>Points: </h3> ";
        echo "$player_totals[1]";
        echo "</div><hr /><br>";
        
        //Jordi
        echo "<div>";
        echo "<h2 class='playerName'>Jordi</h2></div>";
        echo "<div><img class='playerImage' src=img/students/3.jpg>";
        
        foreach($deck_3 as $p3_card) {
            $current_suit = $p3_card->cardSuit;
            $current_rank = $p3_card->cardRank;
            echo "<img src=img/cards/$current_suit/$current_rank.png>";
        }
        
        echo "</div>";
        
        echo "<div><h3>Points: </h3> ";
        echo "$player_totals[2]";
        echo "</div><hr /><br>";
        
        //David
        echo "<div>";
        echo "<h2 class='playerName'>David</h2></div>";
        echo "<div><img class='playerImage' src=img/students/4.jpg>";
        
        foreach($deck_4 as $p4_card) {
            $current_suit = $p4_card->cardSuit;
            $current_rank = $p4_card->cardRank;
            echo "<img src=img/cards/$current_suit/$current_rank.png>";
        }
        
        echo "</div>";
        
        echo "<div><h3>Points: </h3> ";
        echo "$player_totals[3]";
        echo "</div><hr /><br>";
        
        echo "<br>";
        echo "<hr />";
        
        echo "<div class='winnersDisplay'>";
        if (count($winners) > 0) {
            foreach($winners as $winner) {
                echo "$winner won $total_points points!<br>";
            }
        }
        else {
            echo "There were no winners! Everyone went over!<br>";
        }
        echo "</div>";
    }
    
    function printTimes() {
        $end_time = microtime(true);
        $_SESSION['numRuns'] += 1;
        $current_run =  $end_time - $_SESSION['currentRunStart'];
        $_SESSION['totalTime'] += $current_run;
        $average_time = $_SESSION['totalTime'] / $_SESSION['numRuns'];
        echo "<div>";
        echo "Time elapsed: $current_run seconds.<br />";
        echo "Average elapsed time: " . number_format($average_time, 14) . " seconds.<br />";
        echo "Number of games played: " . $_SESSION['numRuns'];
        echo "</div>";
    }
    
?>