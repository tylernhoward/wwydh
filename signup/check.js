
function checkFilled(){
	/*Step 1 create variables from form elements and change style if empty on submit*/
	var errors = "Missing Form Fields:"; 
	/*will take care of errors, form will not submit if valid is false*/
	var valid = true;
	var vname = document.getElementById('vname');
	var vpass = document.getElementById('password');
	var email = document.getElementById('email');
	var firstname = document.getElementById('firstname');
	var lastname = document.getElementById('lastname');
	if (vname.value == ""){
		errors = errors.concat(" *username ");
		valid = false;
	}
	if (vpass.value == ""){
		errors = errors.concat(" *password ");
		valid = false;
	}
	if (email.value == ""){
		errors = errors.concat(" *Email ");
		valid = false;
	}
	if (firstname.value == ""){
		errors = errors.concat(" *First Name ");
		valid = false;
	}
	if (lastname.value == ""){
		errors = errors.concat(" *Last Name ");
		valid = false;
	}
	var final = confirm("Are you sure you want to submit?")
	if (final == false){
		valid = false;
	}
	if(!valid){
        alert(errors);
        return valid;
    }
	else{
		vname.style.backgroundColor = "#FFFFFFFF";
		vpass.style.backgroundColor = "#FFFFFFFF";
		alert("Form Submission Complete");
		return valid;
	}
}




	


	






