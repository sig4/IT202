<?php
session_start();
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>


<div class="header">
  <h1>SIG INSURANCE</h1>
  <p>Dont make the accident of not choosing US</p>
  <p>CUSTOMER LOGIN</p>

</div>
<style>
.header {
  padding: 60px;
  text-align: center;
  background: #1abd4a;
  color: black;
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
		<input type="button" onclick="window.location.href = 'https://web.njit.edu/~sig4/IT202/projFolder/regDriver.php';" value="Register as new CUSTOMER"/>
		<input type="button" onclick="window.location.href = 'https://web.njit.edu/~sig4/IT202/projFolder/Home.php';" value="GO BACK TO HOME"/>
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
			$stmt = $db->prepare("select id, username, password, First_Name from `Customers` where username = :username LIMIT 1");
			$stmt->execute(array(":username"=>$user));
			//print_r($stmt->errorInfo());
			$results = $stmt->fetch(PDO::FETCH_ASSOC);
			//echo var_export($results, true);
			if($results && count($results) > 0){
				//$hash = password_hash($pass, PASSWORD_BCRYPT);
				if(password_verify($pass, $results['password'])){
					echo "Welcome, " . $results["username"];
					echo "[" . $results["id"] . "]";
					$user = array("id"=> $results['id'],
								"name"=> $results['First_Name']
								);
					$_SESSION['usr'] = $user;
					echo var_export($user, true);
					echo var_export($_SESSION, true);
					header("Location: customerReg.php");
					
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
