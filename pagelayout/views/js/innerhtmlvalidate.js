function isValid(pForm) {

	/*let user_nameErr = document.getElementById("user_nameErr");*/
	let fnameErr = document.getElementById("fnameErr")

	/*let user_name = pForm.user_name.value;*/
	let fname = pForm.fname.value;

	/*user_nameErr.innerHTML = "";*/
	fnameErr.innerHTML = "";

	let flag = true;

	/*if (user_name === "") {
		fnameErr.innerHTML = "Username can not be empty";
		flag = false;
	}*/
	if (fname === "") {
		fnameErr.innerHTML = "Full Name can not be empty";
		flag = false;
	}

	return flag;
}