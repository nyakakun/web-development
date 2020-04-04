const operators = ['+', '-', '*', '/'];
const numbers = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '0'];
const spaces = [' ', '(', ')'];

function calcOperation(operation, firstNum, secondNum) {
	if (operation === '+') return Number(firstNum) + Number(secondNum);
	if (operation === '*') return Number(firstNum) * Number(secondNum);
	if (operation === '-') return Number(firstNum) - Number(secondNum);
	if (operation === '/') return Number(firstNum) / Number(secondNum);
}

function findOperator(expression, pos = 0) {
	let result = undefined;
	let index = pos;
	for (; index < expression.length; index++) {
		const element = expression[index];
		if (operators.indexOf(element) + 1) {

			if (result !== undefined) {
				break;
			}

			let response = findOperator(expression, index + 1);
			if (response.error !== undefined) {
				return response;
			}
			let firstNum = response.value;
			index = response.index;

			response = findOperator(expression, index);
			if (response.error !== undefined) {
				return response;
			}
			let secondNum = response.value;
			index = response.index;
			result = calcOperation(element, firstNum, secondNum);
			break;
			
		} else if (numbers.indexOf(element) + 1) {
			if (result == undefined) result = '';
			result += element;

		} else	if (spaces.indexOf(element) + 1)  {
			if (result !== undefined)	break;
		} else {
			return {error: "Неизвестный символ" + element, index: index};
		}
	}
	return {value: result, index: index}
}

findOperator('+ 37 + 4 4')