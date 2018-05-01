var monkey_01;
var gameTimer;
var output;
var numHits = 0;
var numMisses = 0;

function init() {
    monkey_01 = document.getElementById('monkey_01');
    output = document.getElementById('output');
    
    gameTimer = setInterval(gameloop, 50);
    
    placeMonkey();
}

function placeMonkey() {
    var x = Math.floor(Math.random() * 421);
    monkey_01.style.left = x + 'px';
    monkey_01.style.top = '350px';
}

function gameloop() {
    var y = parseInt(monkey_01.style.top) - 15;
    if (y < -100) {
        placeMonkey();
        numMisses++;
        if (numMisses >= 5) {
            alert("You lose!");
            numHits = 0;
            numMisses = 0;
        }
    }
    else {
        monkey_01.style.top = y + 'px';
    }
}

function hitMonkey() {
    numHits++;
    if (numHits >= 3) {
        alert('You win!');
        numHits = 0;
        numMisses = 0;
    }
    placeMonkey();
}