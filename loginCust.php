<?php
session_start();
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<div class="header">
  <h1>SIG INSURANCE</h1>
  <p>Dont make the accident of not choosing US</p>
  <p>Customer login</p>

</div>
<style>
.header {
  padding: 60px;
  text-align: center;
  background: #1abc9c;
  color: white;
  font-size: 30px;
}
</style>

<html>
<head></head>
<body>
	<form method="POST"/>
	User Name:	<input type="text" name="username"/><br>
	Password: 	<input type="password" name="password"/><br>
		<input type="submit" value="Login"/>
		<input type="button" onclick="window.location.href = 'https://web.njit.edu/~sig4/IT202/regProj.php';" value="Register as  Customer"/>

	</form>
</body>
</html>


<?php
	if(isset($_POST['username']) && isset($_POST['password'])){
		$user = $_POST['username'];
		$pass = $_POST['password'];
		//do further validation?
		try{
			require("config.php");
			//$username, $password, $host, $database
			$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
			$db = new PDO($conn_string, $username, $password);
			
			$stmt = $db->prepare("select id, username, pin, First_Name, who from `TestUsers1` where username = :username LIMIT 1");
			
			$stmt->execute(array(":username"=>$user));
			//print_r($stmt->errorInfo());
			$results = $stmt->fetch(PDO::FETCH_ASSOC);
			//echo var_export($results, true);
//			echo $pass;
			$x= $results['who'];
//			echo $x == "Customer";			
			if($results && count($results) > 0){
				$hash = password_hash($results['pin'], PASSWORD_BCRYPT);
				if(password_verify($pass, $hash)){
					echo "Welcome, " . $results["First_Name"];
				//	echo "[" . $results["id"] . "]";
					$user = array("id"=> $results['id'], "UserName"=> $results['username'],
								"name"=> $results['First_Name']
								);
					
					$_SESSION['usr'] = $user;
				//	echo var_export($user, true);
				//	echo var_export($_SESSION, true);
					header("Location: Home.php");
//
//               				 <input type="submit" value="Go TO WEB"/>
	
							
	}
				else{
					echo "Invalid password";
				}
			}
			else{
					echo "Invalid username";
			}
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	}
?>
