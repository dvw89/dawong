<?php
    function displayResults() {
        $human_attack_dice = array();
        $computer_attack_dice = array();
        $human_defense_dice = array();
        $computer_defense_dice = array();
        $human_attack = 0;
        $human_defense = 0;
        $computer_attack = 0;
        $computer_defense = 0;
        
        $computer_num_attack_dice = rand(1,8);
        $computer_num_defense_dice = 8 - $computer_num_attack_dice;
        $human_num_attack_dice = $_POST['attack'];
        $human_num_defense_dice = 8 - $human_num_attack_dice;
        
        for ($i = 1; $i <= $computer_num_attack_dice; $i++) {
            $current = rand(1,6);
            $computer_attack += $current;
            $computer_attack_dice[] = $current;
        }
        
        for ($i = 1; $i <= $computer_num_defense_dice; $i++) {
            $current = rand(1,6);
            $computer_defense += $current;
            $computer_defense_dice[] = $current;
        }
        
        for ($i = 1; $i <= $human_num_attack_dice; $i++) {
            $current = rand(1,6);
            $human_attack += $current;
            $human_attack_dice[] = $current;
        }
        
        for ($i = 1; $i <= $human_num_defense_dice; $i++) {
            $current = rand(1,6);
            $human_defense += $current;
            $human_defense_dice[] = $current;
        }
        
        $_SESSION['human_total'] += max(0, $human_attack - $computer_defense);
        $_SESSION['computer_total'] += max(0, $computer_attack - $human_defense);
        
        echo "<h1> Human total: " . $_SESSION['human_total'] . "</h1>";
        echo "<br />";

        echo "<h1>Human Attack Dice: </h1>";
        echo "<div>";
        foreach($human_attack_dice as $die) {
            echo "<img src=img/sides/$die.png>";
        }
        echo "Human attack total: " . $human_attack;
        echo "</div>";
        
        echo "<br />";
    
        echo "<h1>Human Defense Dice: </h1>";
        echo "<div>";
        foreach($human_defense_dice as $die) {
            echo "<img src=img/sides/$die.png>";
        }
        echo "Human defense total: " . $human_defense;
        echo "</div>";
        
        echo "<hr>";
        
        echo "<h1> Computer total: " . $_SESSION['computer_total'] . "</h1>";
        echo "<br />";
        
        echo "<h1>Computer Attack Dice: </h1>";
        echo "<div>";
        foreach($computer_attack_dice as $die) {
            echo "<img src=img/sides/$die.png>";
        }
        echo "Computer attack total: " . $computer_attack;
        echo "</div>";
        
        echo "<br />";

        echo "<h1>Computer Defense Dice: </h1>";
        echo "<div>";
        foreach($computer_defense_dice as $die) {
            echo "<img src=img/sides/$die.png>";
        }
        echo "Computer defense total: " . $computer_defense;
        echo "</div>";
    }
    
    function resetGame() {
        $_SESSION['human_total'] = 0;
        $_SESSION['computer_total'] = 0;
    }

?>