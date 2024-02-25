function plusMinus(arr) {
    let positive = arr.filter(number => number > 0).length / arr.length;
    let negative = arr.filter(number => number < 0).length / arr.length;
    let zeronums = arr.filter(number => number == 0).length / arr.length;

    return `${positive.toFixed(6)} ${negative.toFixed(6)} ${zeronums.toFixed(6)}`
}

const arr = [-4, 3, -9, 0, 4, 1];
console.log(plusMinus(arr));