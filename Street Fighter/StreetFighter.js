var action = 'STANDING';
var enemy_action = 'STANDING';
var which_frame = 0;
var enemy_frame = 0;
var hadouken = [];

var character1 =  {
    top: 325,
    left: 350,
    health: 100
}
var character2 =  {
    top: 325,
    left: 850,
    health: 100
}

function gameLoop(){
    moveHadouken();
    displayHadouken();
    displayAssets();
    hadoukenCollision();
}
setInterval(gameLoop, 100);

function displayAssets(){
    document.getElementById('character1').style.top = character1.top + 'px';
    document.getElementById('character1').style.left = character1.left + 'px';

    document.getElementById('character2').style.top = character2.top + 'px';
    document.getElementById('character2').style.left = character2.left + 'px';

    document.getElementById('healthbar1').style.width = character1.health * 2.3;
    document.getElementById('healthbar2').style.width = character2.health * 2.3;

    // MOVEMENT
    if(action == 'STANDING'){
        document.getElementById('character1').style.background = "url('./img/ken.png') -" + which_frame * 70 + "px -80px";
        which_frame += 1;
        if(which_frame >= 4){
            which_frame = 0;
        }
    }
    else if(action == 'WALK_LEFT'){
        document.getElementById('character1').style.background = "url('./img/ken.png') -" + which_frame * 70 + "px -240px";
        which_frame += 1;
        if(which_frame >= 5){
            which_frame = 0;
            action = 'STANDING';
        }    
    }
    else if(action == 'WALK_RIGHT'){
        document.getElementById('character1').style.background = "url('./img/ken.png') -" + which_frame * 70 + "px -240px";
        which_frame += 1;
        if(which_frame >= 5){
            which_frame = 0;
            action = 'STANDING';
        } 
    }
    else if(action == 'JUMP'){
        which_frame += 1;
        if(which_frame <= 4){
            document.getElementById('character1').style.background = "url('./img/ken.png') -" + which_frame * 70 + "px -640px";
            for(var i = 0; i <= 30; i++){
                if(character1.top > 230){
                    character1.top -= 1;
                }
            }
        } 
        else if(which_frame >= 5 && which_frame <= 7){
            document.getElementById('character1').style.background = "url('./img/ken.png') -" + which_frame * 70 + "px -640px";
            for(var i = 0; i < 5; i++){
                if(character1.top <= 325){
                    character1.top += 7;
                }
            }
        }
        else {
            which_frame = 0;
            action = 'STANDING';
        }
    }
    else if(action == 'KNEEL'){
        document.getElementById('character1').style.background = "url('./img/ken.png') 0px -720px";
        which_frame += 1;
        if(which_frame >= 1){
            which_frame = 0;
            action = 'STANDING';   
        }
    }
    // ATTACK
    else if(action == 'LEFT_PUNCH'){
        if(which_frame == 2 && character1.left > character2.left - 50 && character1.left < character2.left + 10){
            punchSound();
            character2.health -= 5;
            document.getElementById('healthbar2').style.width = character2.health * 2 + 'px';
            if(character2.health <= 0){
                alert("Game Over!!");
                document.location.reload();
            }
        }
        document.getElementById('character1').style.background = "url('./img/ken.png') -" + which_frame * 70 + "px -160px";
        which_frame += 1;
        if(which_frame >= 3){
            fistSound();
            which_frame = 0;
            action = 'STANDING';
        } 
    }
    else if(action == 'KICK'){
        if(which_frame == 3 && character1.left > character2.left - 50 && character1.left < character2.left + 10){
            punchSound();
            character2.health -= 8;
            document.getElementById('healthbar2').style.width = character2.health * 2 + 'px';
            if(character2.health <= 0){
                alert("Game Over!!");
                document.location.reload();
            }
        }
        document.getElementById('character1').style.background = "url('./img/ken.png') -" + which_frame * 70 + "px -480px";
        which_frame += 1;
        if(which_frame >= 5){
            fistSound();
            which_frame = 0;
            action = 'STANDING';
        } 
    }
    else if(action == 'REVERSE_KICK'){
        if(which_frame == 3 && character1.left > character2.left - 50 && character1.left < character2.left + 10){
            punchSound();
            character2.health -= 8;
            document.getElementById('healthbar2').style.width = character2.health * 2 + 'px';
            if(character2.health <= 0){
                alert("Game Over!!");
                document.location.reload();
            }
        }
        document.getElementById('character1').style.background = "url('./img/ken.png') -" + which_frame * 70 + "px -560px";
        which_frame += 1;
        if(which_frame >= 5){
            fistSound();
            which_frame = 0;
            action = 'STANDING';
        } 
    }
    else if(action == 'HADOUKEN'){
        document.getElementById('character1').style.background = "url('./img/ken.png') -" + which_frame * 70 + "px 0px";
        which_frame += 1;
        if(which_frame >= 4){
            hadoukenSound();
            which_frame = 0;
            action = 'STANDING';
        }         
    }
    if(enemy_action == 'STANDING'){
        document.getElementById('character2').style.transform = "rotateY(180deg)";
        document.getElementById('character2').style.background = "url('./img/ken.png') -" + enemy_frame * 70 + "px -80px";
        enemy_frame += 1;
        if(enemy_frame >= 4){
            enemy_frame = 0;
        }
    }
}

function displayHadouken(){
    var display = '';
    for(var i = 0; i < hadouken.length; i++){
        display += "<div class='hadouken' style='top:" + hadouken[i].top + "px; left:" + hadouken[i].left + "px;'></div>";
    }
    document.getElementById('hadouken').innerHTML = display;
}

function moveHadouken(){
    for(var i = 0; i < hadouken.length; i++){
        hadouken[i].left += 10;
        if(hadouken[i].left > 980){
            hadouken[i] = hadouken[hadouken.length - 1];
            hadouken.pop();
        }
    }
}

function hadoukenCollision(){
    for(var i = 0; i < hadouken.length; i++){
        if(hadouken[i].left + 20 >= character2.left){
            hitSound();
            character2.health -= 10;
            document.getElementById('healthbar2').style.width = character2.health * 2 + 'px';
            if(character2.health == 0){
                alert("Game Over!!");
                document.location.reload();
            }
            hadouken[i] = hadouken[hadouken.length - 1];
            hadouken.pop();
        }
    }
}

function hadoukenSound(){
    var hadouken = new Audio("hadouken.mp3");
    hadouken.play();
}

function punchSound(){
    var punch = new Audio("punch.mp3");
    punch.play();
}

function hitSound(){
    var hit = new Audio("hit.wav");
    hit.play();
}

function fistSound(){
    var fist = new Audio("fist.wav");
    fist.play();
}

// Function to control
document.onkeydown = function(event){
    if(event.keyCode == 37 && character1.left > 240){
        character1.left -= 10;
        action = 'WALK_LEFT';
    }
    else if(event.keyCode == 39 && character1.left < 980){
        character1.left += 10;
        action = 'WALK_RIGHT';
    }
    else if(event.keyCode == 32 && character1.top > 260){
        // character1.top -= 10;
        action = 'JUMP';
    }
    else if(event.keyCode == 40 && character1.top <= 326){
        action = 'KNEEL';
    }
    // PUNCH
    else if(event.keyCode == 65){
        action = 'LEFT_PUNCH';
    }
    // KICK
    else if(event.keyCode == 81){
        action = 'KICK';
    }
    else if(event.keyCode == 87){
        action = 'REVERSE_KICK';
    }
    // SKILL
    else if(event.keyCode == 90){
        hadouken.push({top: character1.top - 5, left: character1.left + 45});
        action = 'HADOUKEN';
    }
    which_frame = 0;
}
displayAssets();