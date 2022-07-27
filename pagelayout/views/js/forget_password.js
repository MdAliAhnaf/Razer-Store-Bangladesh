
//function validateForm(){
	
    let form=document.getElementById('form4');
	let user_name=document.getElementById('user_name');
	let OldPassword=document.getElementById('OldPassword');
	let password=document.getElementById('password');
	let conPassword=document.getElementById('conPassword');
	
	
	document.getElementById("form4").addEventListener('submit',validateForm); /*,e => {
		e.preventDefault();
		
		checkInputs();
	});*/
	function validateForm(event) { checkInputs();
	function checkInputs() {
		// trim to remove the whitespaces
		
		let user_nameValue = user_name.value.trim();
		let OldPasswordValue = OldPassword.value.trim();
		let passwordValue = password.value.trim();
		let conPasswordValue = conPassword.value.trim();

		if(user_nameValue === '') {
			setErrorFor(user_name, 'User field cannot be blank');
		} else {
			setSuccessFor(user_name);
		}

		if(OldPasswordValue === '') {
			setErrorFor(OldPassword, 'Current password field cannot be blank');
		} else {
			setSuccessFor(OldPassword);
		}
		
		if(passwordValue === '') {
			setErrorFor(password, 'New password field cannot be blank');
		} else {
			setSuccessFor(password);
		}
		
		if(conPasswordValue === '') {
			setErrorFor(conPassword, 'Password Confirmation field cannot be blank');
		} else if(passwordValue !== conPasswordValue) {
			setErrorFor(conPassword, 'Passwords does not match');
		} else{
			setSuccessFor(conPassword);
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
	