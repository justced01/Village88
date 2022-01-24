// 1. Return the given array, after setting any negative values to zero.  
// For example resetNegatives( [1,2,-1, -3]) should return [1,2,0,0].

var arr = [5, 6, 1, 3, 9, -1];
function resetNegatives(arr) {
    for (var i = 0; i < arr.length; i++){
        if(arr[i] < 0){
            arr[i] = 0;
        }
    }
    console.log(arr);
    return arr;
}

resetNegatives(arr);

// 2. Given an array, move all values forward by one index, 
// dropping the first and leaving a ‘0’ value at the end.  
// For example moveForward( [1,2,3]) should return [2,3,0].
function moveForward(arr){
    var newarr = [];
    while(arr.length){
        newarr.push(arr.pop());
    }
    newarr.pop();
    while(newarr.length){
        arr.push(newarr.pop());
    }
    arr.push(0);

    console.log(arr);
    return arr;
}

moveForward(arr);

// 3. Given an array, return an array with values in a reversed order.  
// For example, returnReversed([1,2,3]) should return [3,2,1].

function returnReversed(arr) {
    var newarr = [];
    for (var i = 0; i < arr.length; i++) {      
        newarr[i] = arr[arr.length - i - 1];
    }   
    console.log(newarr);
    return newarr;
}

returnReversed(arr);

// 4. Create a function that changes a given array to list each original 
// element twice, retaining original order.  Have the function return 
// the new array.  For example repeatTwice( [4,”Ulysses”, 42, false] ) 
// should return [4,4, “Ulysses”, “Ulysses”, 42, 42, false, false].

arr = [4, 'Ulysses' , 42, false];
function repeatTwice(arr) {
    var newarr = [];
    for (var i = 0; i < arr.length; i++) {
        newarr.push(arr[i]);
        newarr.push(arr[i]);
    }
    console.log(newarr);
    return newarr;
}

repeatTwice(arr);