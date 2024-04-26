// 1.   Use conditions to check if a given number is even. If so , print with
// console.log “ The Number (TheNumberYouWrote)  is even ". If the
// number is not even, print " The Number (TheNumberYouWrote) is not
// even".

let x = 8;

if (x % 2 == 0) {
  console.log(`The number ${x} is even`);
} else {
  console.log(`The number ${x} is not even`);
}

console.log("------------------------------------------------------");
// 2.   Check which numbers from 10 to 100 are even and divisible by 3. Print
// with console.log all those that meet these conditions.

for (i = 10; i <= 100; i++) {
  if (i % 2 == 0 && i % 3 == 0) {
    console.log(i);
  }
}

console.log("------------------------------------------------------");
// 3.   From the given 3 numbers , find the smallest and largest, and check
// are they prime.

let num1 = 75;
let num2 = 23;
let num3 = 21;

let numbers = [num1, num2, num3];
let lowest = numbers[0];
let highest = numbers[0];

numbers.forEach((num) => {
  if (num < lowest) {
    lowest = num;
  }
  if (num > highest) {
    highest = num;
  }
});

function isPrime(num) {
  if (num > 1) {
    for (let i = 2; i < num; i++) {
      if (num % i === 0) {
        return "it isn't";
      }
    }
    return "it is";
  }
  return "it isn't";
}

let lowestPrime = isPrime(lowest);
let highestPrime = isPrime(highest);
console.log(`${highest} is the highest number and ${highestPrime} prime`);
console.log(`${lowest} is the lowest number and ${lowestPrime} prime`);
