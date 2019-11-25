
<?php
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<html>
<head>
<script>
function checkPasswords(form){
	let isOk = form.password.value == form.confirm.value;
	if(!isOk){ alert("Passwords don't match");}
	return isOk;
}
</script>
</head>
<body>
	<form method="POST" onsubmit="return checkPasswords(this);"/>
	UserName:	<input type="text" name="username"/> <br>
	First Name:	<input type="text" name="First Name"/> <br>
	Password:	<input type="password" name="password"/> <br>
	Confirm Password:	<input type="password" name="confirm"/><br>
<select name="who">
  <option value="Customer">Customer</option>
  <option value="Employee">Employee</option>
  
</select>
			<input type="submit" value="Register"/>

	</form>
</body>
</html>
<?php
	if(isset($_POST['username']) 
		&& isset($_POST['password'])
		&& isset($_POST['confirm'])){
			
		$user = $_POST['username'];
		$pass = $_POST['password'];
		$First_Name = $_POST['First_Name'];

		$confirm = $_POST['confirm'];
		$who = $_POST['who'];
		echo $who . "hello";

		if($pass != $confirm){
				echo "Passwords don't match";
				exit();
		}
		//do further validation?
		try{
			//do hash of password
			$hash = password_hash($pass, PASSWORD_BCRYPT);
			require("config.php");
			//$username, $password, $host, $database
			$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
			$db = new PDO($conn_string, $username, $password);
			$stmt = $db->prepare("INSERT into `TestUsers1` (`username`, `pin`, `First_Name`, `who`) VALUES(:username, :password, :First_Name, :who)");
			$result = $stmt->execute(
				array(":username"=>$user,
					":password"=>$hash, ":First_Name"=>$First_Name, ":who"=>$who
				)
			);
			print_r($stmt->errorInfo());
			
			echo var_export($result, true);
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}
?>
