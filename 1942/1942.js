// Position of Hero
var hero = {
    x: 450,
    y: 500
}

var bullets = [];
var score = 0;
var explosionTimeout = null;

// Position of Enemies
var enemies = [{
        x: 50,
        y: -10
    },{
        x: 250,
        y: -20
    },{
        x: 350,
        y: -30
    },{
        x: 450,
        y: -40
    },{
        x: 150,
        y: -50
    },{
        x: 850,
        y: -60
    },{
        x: 550,
        y: -70
    }
]

var otherEnemies = [{
        x: 20,
        y: -25
    },{
        x: 60,
        y: -5
    },{
        x: 110,
        y: -56
    },{
        x: 358,
        y: -63
    },{
        x: 663,
        y: -224
    },{
        x: 152,
        y: -112
    },{
        x: 405,
        y: -321
}]

// Display Hero
function displayHero(){
    document.getElementById('hero').style.left = hero.x + 'px'; // Horizontal position
    document.getElementById('hero').style.top = hero.y + 'px';  // Vertical position
}

// Display Enemies 
function displayEnemies(){
    var display = '';
    for(var i = 0; i < enemies.length; i++){
        display += "<div class='enemy1' style='top:" + enemies[i].y + "px; left:" + enemies[i].x + "px;'></div>";
    }
    document.getElementById('enemies').innerHTML = display;
}
// Display Other Enemies
function displayOtherEnemies(){
    var display = '';
    for(var i = 0; i < otherEnemies.length; i++){
        display += "<div class='enemy2' style='top:" + otherEnemies[i].y + "px; left:" + otherEnemies[i].x + "px;'></div>";
    }
    document.getElementById('otherEnemies').innerHTML = display;
}

// Display Bullets
function displayBullet(){
    var display = '';
    for(var i = 0; i < bullets.length; i++){
        display += "<div class='bullet' style='top:" + bullets[i].y + "px; left:" + bullets[i].x + "px;'></div>";
    }
    document.getElementById('bullet').innerHTML = display;
}

// Display Score
function displayScore(){
    document.getElementById('score').innerHTML = score;
}

// Function to move enemies
function moveEnemies(){
    for(var i = 0; i < enemies.length; i++){
        enemies[i].y += 5;
        if(enemies[i].y > 530){
            enemies[i].y = 0;
            enemies[i].x = Math.random() * 950;
        }
    }
}

// Function to move other enemies
function moveOtherEnemies(){
    for(var i = 0; i < otherEnemies.length; i++){
        otherEnemies[i].y += 5;
        if(otherEnemies[i].y > 530){
            otherEnemies[i].y = 0;
            otherEnemies[i].x = Math.random() * 950;
        }
    }
}

// Function to move bullets
function moveBullets(){
    for (var i = 0; i < bullets.length; i++){
        bullets[i].y -= 5;
        if(bullets[i].y < 0){
            bullets[i] = bullets[bullets.length - 1];
            bullets.pop();
        }
    }
}

// Function to hero collision
function detectHeroCollision(){
    for(var i = 0; i < enemies.length; i++){
        if(Math.abs(hero.x - enemies[i].x) < 20 && Math.abs(hero.y - enemies[i].y) < 20){
            score -= 500;
        }
        
    }
}

// Function to hero other enemies collision
function detectHeroOtherEnemyCollision(){
    for(var i = 0; i < otherEnemies.length; i++){
        if(Math.abs(hero.x - otherEnemies[i].x) < 20 && Math.abs(hero.y - otherEnemies[i].y) < 20){
            score -= 500;
        }
    }
}

// Function of collision detection
function detectEnemyCollision(){
    for(var i = 0; i < bullets.length; i++){
        for(var j = 0; j < enemies.length; j++){
            if(Math.abs(bullets[i].x - enemies[j].x) < 10 && Math.abs(bullets[i].y - enemies[j].y) < 10){
                score += 10;     

                var display = "<div class='explosion' style='top:" + bullets[i].y + "px; left:" + bullets[i].x + "px;'></div>";
                document.getElementById('explosion').innerHTML = display;
                soundExplosion();
                enemies[j] = enemies[enemies.length - 1];
                enemies.pop();
                bullets[i] = bullets[bullets.length - 1];
                bullets.pop();
            }
        }
    }
}

// Function of ither enemy collision detection
function detectOtherEnemies(){
    for(var i = 0; i < bullets.length; i++){
        for(var j = 0; j < otherEnemies.length; j++){
            if(Math.abs(bullets[i].x - otherEnemies[j].x) < 10 && Math.abs(bullets[i].y - otherEnemies[j].y) < 10){
                score += 20;

                var display = "<div class='explosion' style='top:" + bullets[i].y + "px; left:" + bullets[i].x + "px;'></div>";
                document.getElementById('explosion').innerHTML = display;
                soundExplosion();
                otherEnemies[j] = otherEnemies[otherEnemies.length - 1];
                otherEnemies.pop();
                bullets[i] = bullets[bullets.length - 1];
                bullets.pop();
            }
        }
    }
}

function soundExplosion(){
    var explosion = new Audio("blast.wav");
    explosion.play();
}

function gameLoop(){
    moveEnemies();
    moveOtherEnemies();
    moveBullets();
    displayHero();
    displayEnemies();
    displayOtherEnemies();
    displayBullet();
    displayScore();
    detectHeroCollision();
    detectEnemyCollision();
    detectOtherEnemies();
    detectHeroOtherEnemyCollision();
}
setInterval(gameLoop, 30);

document.onkeydown = function(event){
    // Left && Right
    if(event.keyCode == 37){
        hero.x -= 10;
    } else if(event.keyCode == 39){
        hero.x += 10;
    }

    // Up && Down
    if(event.keyCode == 38){
        hero.y -= 10;
    } else if(event.keyCode == 40){
        hero.y += 10;
    }

    // Shooting bullets;
    if(event.keyCode == 32){
        bullets.push({x: hero.x+5, y: hero.y-5});
    }
}

