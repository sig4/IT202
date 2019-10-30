<!DOCTYPE html>
<html>
<form method="POST" action="#" >
<input name="name" id="name" type="text" placeholder="Enter your name"/>



<input type="password" name="password" placeholder="Enter password"/>



<input type="submit" value="Try it"/>
</form>
</html>

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



