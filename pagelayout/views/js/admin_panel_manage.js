
//function validateForm(){
	
    let form=document.getElementById('form_admin_manage');
	let fname=document.getElementById('fname');	
	
	
	
	document.getElementById("form_admin_manage").addEventListener('submit',validateForm); /*,e => {
		e.preventDefault();
		
		checkInputs();
	});*/
	function validateForm(event) { checkInputs();
	function checkInputs() {
		// trim to remove the whitespaces
		
		let fnameValue = fname.value.trim();		
	

		if(fnameValue === '') {
			setErrorFor(fname, 'Field cannot be blank');
		} else {
			setSuccessFor(fname);
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
	