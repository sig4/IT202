<!DOCTYPE html>
<html>
<head>
<script>
	function queryParam(){
		var params = new URLSearchParams(location.search);
		if(params.has('page')){
			var page = params.get('page');
			var ele = document.getElementById(page);
			if(ele){
				let home = document.getElementById('home');
				let about = document.getElementById('about');
				home.style.display="none";
				about.style.display = "none";
				ele.style.display = "block";
			}
		}
		else{
			let home = document.getElementById('home');
			home.style.display = "block";
		}
	}
</script>
</head>

<form method="POST" action="#" >

UserName: <input name="name" id="name" type="text" placeholder="Enter your name"/><br>



Password: <input type="password" name="password" placeholder="Enter password"/><br>



<input type="submit" value="Login"/>

<input type="button" onclick="window.location.href = 'https://web.njit.edu/~sig4/IT202/regProj.php';" value="Register"/>

</form>



<?php
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if(isset($_POST)){
	echo "<br><pre>" . var_export($_POST, true) . "</pre><br>";

	$name = $_POST["name"];
	$pass = $_POST["password"];
	require('config.php');
$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
try{
	$db = new PDO($conn_string, $username, $password);
	$newUser = "$name";
	$newPin = "$pass";
	
$sql = "SELECT id, username, pin FROM TestUsers1";
$result = $db->query($sql);
$stmt = $db->prepare("SELECT * FROM TestUsers1 WHERE username='$newUser' AND pin = '$newPin';");
$stmt->execute([$newUser]); 
$user = $stmt->fetch();
if ($user) {
	
	echo "LOGIN SUCCESSFUL";
	header("Location: sampleLanding.php");
}
else{
		echo "LOGIN FAILED";
	}
 
	
}
catch(Exception $e){
	echo $e->getMessage();
	echo "Something went wrong";
}
}
?>

