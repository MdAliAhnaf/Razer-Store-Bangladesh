
//function validateForm(){
	
let form=document.getElementById('formz');
let  zname=document.getElementById('fullname');
let  email=document.getElementById('email');
let commentz=document.getElementById('commentz'); 

document.getElementById("formz").addEventListener('submit',validateForm); /*,e => {
	e.preventDefault();
	
	checkInputs();
});*/
function validateForm(event) { checkInputs();
function checkInputs() {
	// trim to remove the whitespaces
	let znameValue = zname.value.trim();
	let emailValue = email.value.trim();
	let commentzValue = commentz.value.trim();;
	
	if(znameValue === '') {
		setErrorFor(zname, 'Name cannot be blank');
	} else {
		setSuccessFor(zname);
	}
	
	if(emailValue === '') {
		setErrorFor(email, 'Email cannot be blank');
	} else if (!isEmail(emailValue)) {
		setErrorFor(email, 'Not a valid email');
	} else {
		setSuccessFor(email);
	}

	if(commentzValue === '') {
		setErrorFor(commentz, 'Comment field cannot be blank');
	} else {
		setSuccessFor(commentz);
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
	
function isEmail(email) {
	return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}
}
