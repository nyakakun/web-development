let primeNumbers = new Array(2, 3);

function calculateNewPrimeNumber() {
	let newPrimeNumber = primeNumbers[primeNumbers.length-1];
	let find = false;
	while (!find) {
		find = true;
		newPrimeNumber += 2;
		for (const number of primeNumbers) {
			if (Math.sqrt(newPrimeNumber) < number) break;
			if (newPrimeNumber % number === 0) {
				find = false;
				break;
			}
		}
	}
	primeNumbers.push(newPrimeNumber);
}

function isPrimeNumber(numbers) {
	if (Number.isInteger(numbers)) {
		let prime = true;
		numbers = Math.abs(numbers);
		for (let index = 0; index < primeNumbers.length; index++) {
			let sqrtNum = Math.sqrt(numbers);
			let currentElement = primeNumbers[index];
			if (primeNumbers[primeNumbers.length-1] < sqrtNum) calculateNewPrimeNumber();
			if (sqrtNum < currentElement) break;
			if (numbers % currentElement === 0) {
				prime = false;
				break
			}
		}
		let response = prime ? "is prime" : "is not prime";
		console.log(`Результут: ${numbers} ${response} number`);
	} else if (Array.isArray(numbers)) {
		for (number of numbers) {
			isPrimeNumber(number);
		}
	}
}