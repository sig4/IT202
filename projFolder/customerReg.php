<?php
session_start();
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
<input type="button" onclick="window.location.href = 'https://web.njit.edu/~sig4/IT202/projFolder/driverHome.php';" value ="Return to HOME"/>


</form>
<?php
		
	$first_name="";
	$last_name="";
	$where="";
	$how="";
	$time="";
	$date="";
	$time="";
	$date="";
	$make="";
	$model="";
	$plate="";

	
	if(isset($_POST['firstname'])){	
	$first_name = $_POST['firstname'];
		}
	if(isset($_POST['lastname'])){
		$last_name = $_POST['lastname'];
		}
	if(isset($_POST['where'])){
		$where = $_POST['where'];
		}
	if(isset($_POST['how'])){
		$how = $_POST['how'];
		}
	if(isset($_POST['time'])){
		$time = $_POST['time'];
		}
	if(isset($_POST['date'])){
		$date = $_POST['date'];
		}
	if(isset($_POST['make'])){	
		$make = $_POST['make'];
		}
	if(isset($_POST['model'])){
		$model = $_POST['model'];
		}		
	if(isset($_POST['Plate'])){
	$plate = $_POST['Plate'];
		}
		try{
			require("config.php");
			//$username, $password, $host, $database
			$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
	
			$db = new PDO($conn_string, $username, $password);
// $stmt = $db->prepare("select First_Name, Last_Name, Where, How, Time, Date, Make, Model, Plate from `Customer1Incident` where First_Name = :first_name LIMIT 1");
	
			$stmt = $db->prepare("INSERT into `Customer1Incident` (`First_Name`, `Last_Name`, `address`, `How`, `Time`, `Date`, `Make`, `Model`, `Plate`) VALUES (:first_name, :last_name, :address, :how, :time, :date, :make, :model, :plate)");
			$result = $stmt->execute(
				array(":first_name"=>$first_name, ":last_name" =>$last_name, ":address" =>$where, ":how" => $how, ":time"=>$time, ":date" =>$date, ":make" =>$make, ":model"=>$model, ":plate"=>$plate) 
				
			);
		
         // $custProf = array("First_Name"=> $results['First_Name'], "Last_Name"=> $results['Last_Name'],
           //                                                   "Where"=> $results['Where'], "How"=> $results['How'], "Time"=> $results['Time'], "Date"=> $results['Dat$
             //                                                 "Make"=> $results['Make'], "Model"=> $results['Model'], "Plate"=> $results['Plate']
	//			);
          //                              $_SESSION['customerProf'] = $custProf;
			print_r($stmt->errorInfo());
			$results = $stmt->fetch(PDO::FETCH_ASSOC);
			
			echo "Welcome " .	$_SESSION['usr']['name'];
			//echo "Location" .  $results[":first_name"][":address"] . " ";
			echo var_export($result, true);
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	
?>
