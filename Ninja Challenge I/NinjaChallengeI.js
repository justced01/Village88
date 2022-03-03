var leftValue = 450, topValue = 100;

function update(){
    document.getElementById("character").style.left = leftValue+"px";
    document.getElementById("character").style.top = topValue+"px";
}

document.onkeydown = function(e){
    console.log(e);
    if(e.keyCode == 37 && leftValue > 0){ // LEFT
        leftValue = leftValue - 10;
    }
    else if (e.keyCode == 39 && leftValue <= 500){ // RIGHT
        leftValue = leftValue + 10;    		
    }
    else if (e.keyCode == 40 && topValue <= 500){ // DOWN
        topValue = topValue + 10;
    } 
    else if (e.keyCode == 38 && topValue > 0){ //UP
        topValue = topValue - 10; 
    }
    // ...
    update();
}