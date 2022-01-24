// Algorithm V
// 1. Given an array and a value Y, count and print the number of array values greater than Y.
var arr = [5, 6, 1, 3, 9, -1];
var y = 2;
function greaterY (arr, y) {
    count = 0;
    for (var i = 0; i < arr.length; i++) {
        if(arr[i] > y){
            console.log("Greater than Y:", arr[i]);
            count++;
        }
    }
    console.log("Count:" , count);
}

greaterY(arr, y);

// 2. Given an array, print the max, min and average values for that array.
function max_min_average (arr) {
    var max = arr[0], min = arr[0], sum = 0, average = 0;
    for(var i = 0; i < arr.length; i++) {
        if(arr[i] >= max){
            max = arr[i];
        }
        if(arr[i] <= min){
            min = arr[i];
        }
        sum += arr[i];
    }

    console.log("Max value:", max);
    console.log("Min value:", min);
    console.log("Average:", average = sum / arr.length);
}

max_min_average(arr);

// 3. Given an array of numbers, create a function that returns a new array 
// where negative values were replaced with the string ‘Dojo’.
// For example, replaceNegatives( [1,2,-3,-5,5]) should return [1,2, "Dojo", "Dojo", 5].
function replaceNegatives(arr) {
    for (var i = 0; i < arr.length; i++) {
        if(arr[i] < 0){
            arr[i] = 'Dojo';
        }
    }
    console.log(arr);
    return arr;
}

replaceNegatives(arr);

// 4. Given array, and indices start and end, remove values in that index range, 
// working in-place (hence shortening the array).  For example, 
// removeVals([20,30,40,50,60,70],2,4) should return [20,30,70].

var start = 2, end = 4;
function removeVals(arr, start, end){
    for (var i = start; i <= end; i++) {
        for (var j = start; j < arr.length; j++) {
            arr[j] = arr[j + 1];
        }
        arr.length--;
    }
    console.log(arr);
    return arr;
}

removeVals(arr, start, end);