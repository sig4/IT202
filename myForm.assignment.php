<?php
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
function getName(){
	if(isset($_GET['name'])){
		echo "<p>Hello, " . $_GET['name'] . "</p>";
	}
}
function checkPassword(){
        if($_GET['password'] != $_GET['cpassword']){
                echo "Passwords do not match";
        }
	else{
		echo "Passwords match";
	}


}


?>
<html>
<head></head>
<body><?php getName();?>
<form method="GET" action="#">
<input name="name" type="text" placeholder="Enter your name"/>
<input type="password" name="password" placeholder="Enter your password"/>
<input type="password" name="cpassword" placeholder="Re-Enter your password"/>
<!-- add password field-->
<!-- add confirm password field-->
<!-- ensure passwords match before sending the form
		AND/OR
	validate password matches confirmation on php side
-->
<!-- change form submit type to post, adjust php checks for change in type-->

<input type="submit" value="Try it"/>
</form method ="POST" action="#">
</body><?php checkPassword();?>
</html>

<?php
if(isset($_POST)){
	echo "<br><pre>" . var_export($_POST, true) . "</pre><br>";
}
?>
