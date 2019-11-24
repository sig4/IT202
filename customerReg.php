<?php
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<form method="POST">
  First name:<br>
  <input type="text" name="firstname"><br>
  Last name:<br>
  <input type="text" name="lastname"><br>
  Where did incident occur:<br>
  <input type="text" name="where"><br>
  How did incident occur:<br>
  <input type="text" name="how" width="48" height="48"><br>
  Time of Incident:<br>
  <input type="time" name="time"><br>
  Date of Incident:<br>
  <input type="date" name="date"><br>

  Make of car:<br>
  <input type="text" name="make"><br>
  Model of car:<br>
  <input type="text" name="model"><br>
  Licence Plate:<br>
  <input type="text" name="Plate"><br>
  Description of Damage:<br>
  <input type="text" name="Damage"><br>
<input type="submit" value="Register"/>


</form>
<?php
		
		$first_name = $_POST['firstname'];
		$last_name = $_POST['lastname'];
		$where = $_POST['where'];
		$how = $_POST['how'];
		$time = $_POST['time'];
		$date = $_POST['date'];
		$make = $_POST['make'];
		$model = $_POST['model'];
		$plate = $_POST['Plate'];

			
		try{
			require("config.php");
			//$username, $password, $host, $database
			$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
	
			$db = new PDO($conn_string, $username, $password);

	
			$stmt = $db->prepare("INSERT into `Customer1Incident` (`First_Name`, `Last_Name`, `Where`, `How`, `Time`, `Date`, `Make`, `Model`, `Plate`) VALUES (:first_name, :last_name, :address, :how, :time, :date, :make, :model, :plate)");
			$result = $stmt->execute(
				array(":first_name"=>$first_name, ":last_name" =>$last_name, ":address" =>$where, ":how" => $how, ":time"=>$time, ":date" =>$date, ":make" =>$make, ":model"=>$model, ":plate"=>$plate) 
				
			);
			print_r($stmt->errorInfo());
			
			echo var_export($result, true);
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	
?>
