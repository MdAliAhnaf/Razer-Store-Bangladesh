
//function validateForm(){
	
let form=document.getElementById('form2');
let  zname=document.getElementById('fullname');
let  email=document.getElementById('email');
let dob=document.getElementById('dob');
let gender=document.getElementById('gender');
let phone=document.getElementById('phone');
let religion=document.getElementById('religion');
let preadd=document.getElementById('preadd'); 

document.getElementById("form2").addEventListener('submit',validateForm); /*,e => {
	e.preventDefault();
	
	checkInputs();
});*/
function validateForm(event) { checkInputs();
function checkInputs() {
	// trim to remove the whitespaces
	let znameValue = zname.value.trim();
	let emailValue = email.value.trim();
	let dobValue = dob.value.trim();
	let genderValue = gender.value.trim();
	let phoneValue = phone.value.trim();
	let religionValue = religion.value.trim();
	let preaddValue = preadd.value.trim();;
	
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
	if(dobValue === '') {
		setErrorFor(dob, 'Date of Birth cannot be blank');
	} else {
		setSuccessFor(dob);
	}
	/*if(genderValue === '') {
		setErrorFor(gender, 'Gender not selected');
	} else {
		setSuccessFor(gender);
	}*/
	if(phoneValue === '') {
		setErrorFor(phone, 'Phone Number cannot be blank');
	} else {
		setSuccessFor(phone);
	}
	
	if(religionValue === '') {
		setErrorFor(religion, 'Religion not selected');
	} else {
		setSuccessFor(religion);
	}

	if(preaddValue === '') {
		setErrorFor(preadd, 'Current Address field cannot be blank');
	} else {
		setSuccessFor(preadd);
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
