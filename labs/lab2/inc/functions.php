<?php
    function displayPoints($randomValue1, $randomValue2, $randomValue3) {
        echo "<div id='output'>";
        if($randomValue1 == $randomValue2 && $randomValue2 == $randomValue3) {
            switch ($randomValue1) {
                case 0: $totalPoints = 1000;
                    echo "<h1>Jackpot!</h1>";
                    echo "<audio autoplay> <source src='sounds/fanfare.wav' type=audio/wav> Your browser doesn't support the victory audio! </audio>";
                    break;
                case 1: $totalPoints = 500;
                    echo "<audio autoplay> <source src='sounds/fanfare.wav' type=audio/wav> Your browser doesn't support the victory audio! </audio>";
                    break;
                case 2: $totalPoints = 250;
                    echo "<audio autoplay> <source src='sounds/fanfare.wav' type=audio/wav> Your browser doesn't support the victory audio! </audio>";
                    break;
                case 3: $totalPoints = 900;
                    echo "<audio autoplay> <source src='sounds/fanfare.wav' type=audio/wav> Your browser doesn't support the victory audio! </audio>";
                    break;
            }
                    
            echo "<h2>You won $totalPoints points!</h2>";
        } else {
            echo "<h3> Try Again! </h3>";
        }
        echo "</div>";
    }
        
    function displaySymbol($randomValue, $pos) {
        switch($randomValue) {
            case 0: $symbol = "seven";
            break;
            case 1: $symbol = "cherry";
            break;
            case 2: $symbol = "lemon";
            break;
            case 3: $symbol = "bar";
        }
        echo "<img id='reel$pos' src='img/$symbol.png' alt='$symbol' title='$symbol' width='70' >";
    }

    function play() {
        for($i=1; $i<4; $i++) {
            ${"randomValue" . $i } = rand(0,3);
            displaySymbol(${"randomValue" . $i}, $i);
        }
        displayPoints($randomValue1, $randomValue2, $randomValue3);
    }
?>