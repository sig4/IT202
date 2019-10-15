<html> 
<head> 
<script> 
function validation()								 
{ 
	var name = document.forms[0]["Name"];			 
	var email = document.forms[0]["Email"];  
	var conf = document.forms[0]["confirmEmail"];		 
	var password = document.forms[0]["Password"];  
	var confirmPassword = document.forms[0]["confirmPassword"];


	if (name.value == "")								 
	{ 
		alert("Please enter your name.");
		return false; 
	} 

	if (email.value == "")								 
	{ 
		alert("Please enter a valid e-mail address."); 
		return false; 
	} 

	if (email.value.indexOf("@", 0) < 0)				 
	{ 
		alert("Please enter a valid e-mail address."); 
		return false; 
	} 

	if (email.value.indexOf(".", 0) < 0)				 
	{ 
		alert("Please enter a valid e-mail address."); 
		return false; 
	}
	if(email.value != conf.value){
	 	alert("Emails do not match");
		return false;
	}
 

	if (password.value == "")					 
	{ 
		alert("Please enter your password"); 
		return false; 
	} 
	if(password.value != confirmPassword.value){
		alert("Passwords do not match");
		return false;
	}


	return true; 
}</script> 

<body>  
<form onsubmit="return validation()" method="post"> 
	
	UserName: <input type="text"  name="Name"><br> 	 
	E-mail Address: <input type="text" name="Email"><br>
	Confirm E-mail Address: <input type = "text" name = "confirmEmail"><br> 
	Password: <input type="password" name="Password"><br>
	Confirm Password: <input type="password" name="confirmPassword"><br>	
	<p><input type="submit" name="Submit">	 
		 
</form> 
</body> 
</html> 

