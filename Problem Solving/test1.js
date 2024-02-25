function minMaxSum(arr) {
    let max = arr[0];
    let min = arr[0];
    let sum = 0;
    for (let i = 0; i < 5; i++){
        if (max < arr[i]){
            max = arr[i];
        }
        if (min > arr[i]){
            min = arr[i];
        }
        sum += arr[i];
    }
    let maxSum = sum - min;
    let minSum = sum - max;
    return `${minSum} ${maxSum}`;
}

const arr = [1, 2, 3, 4, 5];
console.log(minMaxSum(arr));