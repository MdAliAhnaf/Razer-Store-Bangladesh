
//function validateForm(){
	
    let form=document.getElementById('form5');
	let user_name=document.getElementById('user_name');	
	let password=document.getElementById('password');
	
	
	
	document.getElementById("form5").addEventListener('submit',validateForm); /*,e => {
		e.preventDefault();
		
		checkInputs();
	});*/
	function validateForm(event) { checkInputs();
	function checkInputs() {
		// trim to remove the whitespaces
		
		let user_nameValue = user_name.value.trim();		
		let passwordValue = password.value.trim();
		

		if(user_nameValue === '') {
			setErrorFor(user_name, 'User field cannot be blank');
		} else {
			setSuccessFor(user_name);
		}

	
		if(passwordValue === '') {
			setErrorFor(password, 'Password field cannot be blank');
		} else {
			setSuccessFor(password);
		}
		

	}
	
	function setErrorFor(input, message) {
		const formControl = input.parentElement;
		const small = formControl.querySelector('small');
		formControl.className = 'form-control error';
		small.innerText = message;
	}
	
	function setSuccessFor(input) {
		const formControl = input.parentElement;
		formControl.className = 'form-control success';
	}

}
	