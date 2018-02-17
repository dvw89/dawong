<!DOCTYPE html>
<html>
    <head>
        <?php 

    function randomCard() {
        $rank_index = rand() % 5;
        $suit_index = rand() % 4;
        
        $rank = "";
        $suit = "";
        switch($rank_index) {
            case 0 : $rank = "ten.png";
                    break;
            case 1 : $rank = "jack.png";
                    break;
            case 2 : $rank = "queen.png";
                    break;
            case 3 : $rank = "king.png";
                    break;
            case 4 : $rank = "ace.png";
                    break;
        }
        
        switch($suit_index) {
            case 0 : $suit = "clubs";
                    break;
            case 1 : $suit = "diamonds";
                    break;
            case 2 : $suit = "hearts";
                    break;
            case 3 : $suit = "spades";
                    break;
        }
        
        echo "<img src="pics/cards/clubs/ten" ref=""/>";
        
    }
    
?>
        <link href="css/styles.css" rel="stylesheet">
        <title> </title>
    </head>
    <body>
        <h1>Random Card Game</h1>
        <div id="row">
            <div class="column">
                Human
                <?php
                    randomCard();
                ?>
            </div>
            <div class="column">
                Computer
                <?php
                    randomCard();
                ?>
            </div>
        </div>

    </body>
</html>