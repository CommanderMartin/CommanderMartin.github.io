//Checks if user has pressed update without entering fields
function clearFields(target) {
	if (target.style.borderColor == 'rgb(227, 81, 82)') {
		target.value = '';
	}
}

	
function validateForm(){
	const inputIDs = ['fName', 'lName', 'eMail', 'description', 'phoneNumber', 'ticketCat'];
	const formError = document.querySelector('#formError');
	
	if (inputIDs.some(inputID => document.getElementById(inputID).value.length == 0)) {
		formError.style.display = "block";
		return false;
	} else {
		formError.style.display = 'none';
		return true;
	}
}
 	
function checkFields(){
	validateFName(document.getElementById('fName'));
	validateLName(document.getElementById('lName'));
	validateEmail(document.getElementById('eMail'));
	validatePhoneNum(document.getElementById('phoneNumber'));
	validateQuestion(document.getElementById('description'));
	validateQuestion(document.getElementById('ticketCat'));
	
}

function validateFName(x){
	var re = /[a-zA-Z]$/;
	
	if (x.value == ""){
		x.style.borderColor = '#e35152';
		x.style.background = '#ffe6e6';		
		x.value = "Please fill in first name";
		return false;
			} else {
				if (!re.test(x.value)){
					x.style.borderColor = '#e35152';
					x.style.background = '#ffe6e6';
					x.value = "Please use only letters of the alphabet";
					return false;
						} else {
							x.style.borderColor = 'white';
							x.style.background = 'white';
							x.style.color = 'black';
							return true;
							}
				}
}

function validateLName(x){
	var re = /[a-zA-Z]$/;
	
	if (x.value == ""){
		x.style.borderColor = '#e35152';
		x.style.background = '#ffe6e6';
		x.value = "Please fill in last name";
			} else {
				if (!re.test(x.value)){
					x.style.borderColor = '#e35152';
					x.style.background = '#ffe6e6';
					x.value = "Please use only letters of the alphabet";
						} else {
							x.style.borderColor = 'white';							
							x.style.background = 'white';
							x.style.color = 'black';
							}
				}
}

function validateEmail(x){
	var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	if (x.value == ""){
		x.style.borderColor = '#e35152';
		x.style.background = '#ffe6e6';
		x.value = "Please fill in email";
		return false;	
			} else {
				if (!re.test(x.value)){
					x.style.borderColor = '#e35152';
					x.style.background = '#ffe6e6';
					x.value = "You must enter a valid email";
					return false;
						} else {
							x.style.borderColor = 'white';							
							x.style.background = 'white';
							x.style.color = 'black';
							return true;
							}
				}	
}


function validatePhoneNum(x) {
	var re = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
	
	if(x.value == "") {
		x.style.borderColor = '#e35152';
		x.style.background = '#ffe6e6';
		x.value = "Please enter a 10-digit phone number";
		return false;
			} else {
				if (!re.test(x.value)){
					x.style.borderColor = '#e35152';
					x.style.background = '#ffe6e6';
					x.value = "Please enter a 10-digit phone number";					
					return false;
						} else {
							x.style.borderColor = 'white';							
							x.style.background = 'white';
							x.style.color = 'black';
							return true;							
						}
	}
}

function validateQuestion(x) {
	
	if(x.value == "") {
			x.style.borderColor = '#e35152';
			x.style.background = '#ffe6e6';
			return false;
				} else {
					if (!re.test(x.value)){
						x.style.borderColor = '#e35152';
						x.style.background = '#ffe6e6';
						return false;
										}
					}
}

	


	