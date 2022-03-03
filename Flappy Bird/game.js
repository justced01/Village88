var flappyBird = document.getElementById('flappyBird');
var title = document.getElementById('title');
var baseline = document.getElementById('baseline');
var obstacleNorth = document.getElementById('obstacleNorth');
var obstacleSouth = document.getElementById('obstacleSouth');
var ones = document.getElementById('score2');
var tens = document.getElementById('score1')

var action = 'FLYING', game = 'IDLING';
var frame = 1, score1Frame = 0, score2Frame = 0;
var flag = true, jump = false;
var gravity = 2;
var isGameOver = false;

var flappy = {
    x: 505, // left
    y: 300  // top
}
var base = {
    x: 0,   // left
    y: 400  // top
}
var pipeNorth = {
    x: 850 , // left
    y: 50    // top 
}
var pipeSouth = {
    x: 850 , // left
    y: 300   // bottom 
}


function displayAssets(){
    flappyBird.style.left = flappy.x + 'px'; 
    flappyBird.style.top = flappy.y + 'px';

    if(action == 'FLYING'){
        flappyBird.style.background = "url('./assets/sprites/yellowbird-" + frame +".png')";
        frame += 1;
        if(frame > 3){
            frame = 1;
        }
    }
    if(game == 'START'){ 
        title.style.visibility = 'hidden';
        setTimeout(displayObstacle(), 1000);
        if(jump){
            if(flappy.y >= 200 ){
                flappy.y -= 20;
            }
            flappyBird.style.animation = "rotateUp 0.2s"
            flappyBird.style.animationFillMode = "forwards";
            jump = false;
        }
        else if(jump == false){
            if(flappy.y <= base.y){
                flappyBird.style.top = (flappy.y += gravity) + 'px'; 
            }
            else if(flappy.y >= base.y){
                gameOver();
            }
            flappyBird.style.animation = "rotateDown 0.2s"
            flappyBird.style.animationFillMode = "forwards";
        }
    }
}

function displayObstacle(){
    var randomY = Math.random() * 40;
    obstacleNorth.style.left = pipeNorth.x + 'px'; 
    obstacleNorth.style.top = (pipeNorth.y+randomY) + 'px';

    obstacleSouth.style.left = pipeSouth.x + 'px'; 
    obstacleSouth.style.top = pipeSouth.y + 'px';
    
    if(pipeNorth.x >= 400){
        pipeNorth.x -= 5;
        if(pipeNorth.x == 780){
            obstacleNorth.style.visibility = 'visible';
        }
        if(pipeNorth.x == 425){
            obstacleNorth.style.visibility = 'hidden';
            pipeNorth.x = 850;
        }
        
        if(flappy.x >= pipeNorth.x){
            console.log('flappy hit pipes')
        }
    }
    if(pipeSouth.x >= 400){
        pipeSouth.x -= 5;
        if(pipeSouth.x == 780){
            obstacleSouth.style.visibility = 'visible';
        }
        if(pipeSouth.x == 425){
            obstacleSouth.style.visibility = 'hidden';
            pipeSouth.x = 850;
        }

        if(flappy.x >= pipeSouth.x){
            console.log('flappy hit pipes')
        }
    }
}

function gameOver(){
    isGameOver = true;
    console.log('Game Over');
}


function gameLoop(){
    displayAssets();
}

setInterval(displayAssets, 100);
setInterval(gameLoop, 500);

document.onkeydown = function(event){
    if(event.keyCode === 32 && flappy.y >= 200){
        game = 'START';
        jump = true;
    }
}
// 1h04min
// 1h14m39s


// function gameSounds(){
//     var gameOver = new Audio('./assets/audio/die.wav');
//     gameOver.play();
//     var fly = new Audio('./assets/audio/wing.wav');
//     fly.play();
// }

// function displayScore(){
//     if(game == 'START'){
//         ones.style.backgroundImage = "url('./assets/sprites/" + score2Frame + ".png')";
//         score2Frame += 1;
//         if(score2Frame == 10){
//             score2Frame = 0;
//             flag = true
//         }
//         if(flag){
//             tens.style.backgroundImage = "url('./assets/sprites/" + score1Frame + ".png')";
//             score1Frame += 1;
//             if(score1Frame >= 10){
//                 score1Frame = 0;
//                 flag = false
//             }
//             flag = false;
//         }
//     }
// }
