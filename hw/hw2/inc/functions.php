<?php
    function play() {
        // Begin by declaring global variables.

        $player1Cards = array();
        $player2Cards = array();
        
        class Card {
            public $cardRank;
            public $cardSuit;
        }
        
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
        
        
        // Test code for detecting behavior in case of ties.
        
        /*
        function addTestCard($test_rank, $test_suit, &$testDeck) {
            $card = new Card;
            $card->cardSuit = $test_suit;
            $card->cardRank = $test_rank;
            $testDeck[] = $card;
        }
        
        addTestCard(8, "clubs", $deck);
        addTestCard(8, "clubs", $deck);
        addTestCard(3, "diamonds", $deck);
        addTestCard(1, "spades", $deck);
        addTestCard(8, "clubs", $deck);
        addTestCard(8, "diamonds", $deck);
        addTestCard(8, "clubs", $deck);
        addTestCard(8, "hearts", $deck);
        addTestCard(8, "hearts", $deck);
        addTestCard(8, "clubs", $deck);
        addTestCard(8, "diamonds", $deck);
        addTestCard(8, "spades", $deck);
        */
        
        
        //Done initializing.
        
        //Shuffle the deck.
        shuffle($deck);
        
        // Generally useful functions.
        //Test function "printCards()":
        /*
        function printCards($cards) {
            foreach ($cards as $value) {
                echo "Card rank: " . $value->cardRank . " Card suit: " . $value->cardSuit;
                echo "<br />";
            }
        }
        */
    
        function playNextHand(&$the_deck, &$P1_deck, &$P2_deck) {
            $winner = "Tie";
            $currentPlayer1 = array_pop($the_deck);
            $currentPlayer2 = array_pop($the_deck);
            $P1_deck[] = $currentPlayer1;
            $P2_deck[] = $currentPlayer2;
            $player1Strength;
            $player2Strength;
            
            if ($currentPlayer1->cardRank == 1) {
                $player1Strength = 14;
            }
            else {
                $player1Strength = $currentPlayer1->cardRank;
            }
            if ($currentPlayer2->cardRank == 1) {
                $player2Strength = 14;
            }
            else {
                $player2Strength = $currentPlayer2->cardRank;
            }
            
            if ($player1Strength > $player2Strength) {
                $winner = "P1";
            }
            else if ($player2Strength > $player1Strength) {
                $winner = "P2";
            }
            else {
                $winner = "Tie";
            }
            return $winner;
        }
        
        function printPlayerCards($winner, &$P1_deck, &$P2_deck){
            if ($winner == "Tie" ) {
                echo "<h2> The game was miraculously tied because the deck ran out! </h2> <br />";
            }
            
            else {
                echo "<h2>The winner was " . $winner . "</h2><br />";
            }
            
            echo "<div>";
            echo "Player 1's Cards: <br />";
            
            $currentRank;
            $currentSuit;
            $turnedOver = false;
            foreach($P1_deck as $card) {
                if ($turnedOver == false) {
                    $currentRank = $card->cardRank;
                    $currentSuit = $card->cardSuit;
                    echo "<img src=img/cards/$currentSuit/$currentRank.png alt='One of Player 1's cards.' />";
                }
                else {
                    echo "<img src=img/cards/card_back.png alt='One of Player 1's flipped over cards.' />";
                }
                $turnedOver = !$turnedOver;
            }
            
            echo "</div>";
            
            echo "<div>";
            echo "Player 2's Cards: <br />";
            
            $turnedOver = false;
            foreach($P2_deck as $card) {
                if ($turnedOver == false) {
                    $currentRank = $card->cardRank;
                    $currentSuit = $card->cardSuit;
                    echo "<img src=img/cards/$currentSuit/$currentRank.png alt='One of Player 1's cards.' />";
                }
                else {
                    echo "<img src=img/cards/card_back.png alt='One of Player 1's flipped over cards.' />";
                }
                $turnedOver = !$turnedOver;
            }
            
            echo "</div>";
        }
        
        function playGame(&$given_deck, &$P1_deck, &$P2_deck) {
            $winner = "Tie";
            $continueGame = true;
            while($continueGame) {
                if (sizeof($given_deck) == 0) {
                    $continueGame = false;
                    $deckRanOut = true;
                    $winner = "Tie";
                }
                else {
                    $nextResult = playNextHand($given_deck, $P1_deck, $P2_deck);
                    switch ($nextResult) {
                        case "P1" :
                            $continueGame = false;
                            $winner = "Player 1";
                            break;
                        case "P2" :
                            $continueGame = false;
                            $winner = "Player 2";
                            break;
                        case "Tie" :
                            $continueGame = true;
                            $P1_deck[] = array_pop($given_deck);
                            $P2_deck[] = array_pop($given_deck);
                            break;
                    }
                }
            }
            printPlayerCards($winner, $P1_deck, $P2_deck);
        }
        
        playGame($deck, $player1Cards, $player2Cards);
    }
?>