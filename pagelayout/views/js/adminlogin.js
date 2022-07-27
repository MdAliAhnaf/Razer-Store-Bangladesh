
//function validateForm(){
	
    let form=document.getElementById('form6');
	let user_admin_name=document.getElementById('user_admin_name');	
	let adminpassword=document.getElementById('adminpassword');
	
	
	
	document.getElementById("form6").addEventListener('submit',validateForm); /*,e => {
		e.preventDefault();
		
		checkInputs();
	});*/
	function validateForm(event) { checkInputs();
	function checkInputs() {
		// trim to remove the whitespaces
		
		let user_admin_nameValue = user_admin_name.value.trim();		
		let adminpasswordValue = adminpassword.value.trim();
		

		if(user_admin_nameValue === '') {
			setErrorFor(user_admin_name, 'User Admin field cannot be blank');
		} else {
			setSuccessFor(user_admin_name);
		}

	
		if(adminpasswordValue === '') {
			setErrorFor(adminpassword, 'Admin Password field cannot be blank');
		} else {
			setSuccessFor(adminpassword);
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
	