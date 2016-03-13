	function randomArray(size) {
		theresult = new Array(size);
		numbersToTake = new Array(size);
		for (i = 0; i < size; i++) {
			numbersToTake[i] = i;
		}
		indexToFill = 0;
		return(selectAndReduce(theresult, numbersToTake, size));
	}
	function selectAndReduce(aResult, numbersToTake, aSize) {
		if (aSize == 1) {
			aResult[0] = numbersToTake[0];
			return(aResult);
		}
		r = myRand(aSize);
		aResult[aSize - 1] = numbersToTake[r];
		numbersToTake[r] = -1;
		newNumbersToTake = new Array(aSize - 1);
		for (i = 0, j = 0; i < aSize; i++) {
			if (numbersToTake[i] == -1) continue;
			newNumbersToTake[j] = numbersToTake[i];
			j++;
		}
		return(selectAndReduce(aResult, newNumbersToTake, aSize-1));
	}
	function myRand(totalResults) {
	  return(Math.floor((Math.random() * totalResults)));
	}
