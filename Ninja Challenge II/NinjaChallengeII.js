var leftValue = 150;
var topValue = 150;
var walkValue = 1;
document.onkeydown = function(e){
    console.log(e);
    if (walkValue == 1){
        walkValue = 2;
    }
    else if (walkValue == 2){
        walkValue = 1;
    }
    if(e.keyCode == 37 && leftValue > 0){
        // Left
        leftValue = leftValue - 25;
        document.getElementById("character").style.left = leftValue+"px";
        document.getElementById("character").style.backgroundImage = "url('img/left"+walkValue+".png')";
    }
    else if (e.keyCode == 39 && leftValue <= 840){
        // Right
        leftValue = leftValue + 25;
        document.getElementById("character").style.left = leftValue+"px";
        document.getElementById("character").style.backgroundImage = "url('img/right"+walkValue+".png')";
    }
    else if (e.keyCode == 38 && topValue > 0){
        // Top
        topValue = topValue - 25;
        document.getElementById("character").style.top = topValue+"px";
        document.getElementById("character").style.backgroundImage = "url('img/top"+walkValue+".png')";
    }
    else if (e.keyCode == 40 && topValue <= 650){
        // Bottom
        topValue = topValue + 25;
        document.getElementById("character").style.top = topValue+"px";
        document.getElementById("character").style.backgroundImage = "url('img/down"+walkValue+".png')";
    }
}