<?php
session_start();
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<form method="POST">
  Incident Number: <br>
  <input type="text" name= "incident"><br>

  Was anyone injured in the accident:<br>
  <input type="text" name="injuries"><br>
  Any possible foul play between drivers:<br>
  <input type="text" name="foulPlay"><br>
  Where did incident occur:<br>
  <input type="text" name="where"><br>
  How did incident occur:<br>
  <input type="text" name="how" width="48" height="48"><br>
  Time of Incident:<br>
  <input type="time" name="time"><br>
  Date of Incident:<br>
  <input type="date" name="date"><br>

  Make of car1:<br>
  <input type="text" name="make"><br>
  Model of car1:<br>
  <input type="text" name="model"><br>
  Licence Plate of car1:<br>
  <input type="text" name="Plate"><br>
  
  Make of car2:<br>
  <input type="text" name="make2"><br>
  Model of car2:<br>
  <input type="text" name="model2"><br>
  Licence Plate of car2:<br>
  <input type="text" name="Plate2"><br>

  Any environemental damage such as trees/dividers/rocks:<br>
  <input type="text" name="environDamage"><br>

  Description of Damage:<br>
  <input type="text" name="Damage"><br>
<input type="submit" value="Register"/>
<input type="button" onclick="window.location.href = 'https://web.njit.edu/~sig4/IT202/projFolder/sampleLanding.php';" value="Back to Employee Dashboard"/>


</form>
<?php
		$incident="";
		$where="";
		$how="";
		$time="";
		$date="";
		
		if(isset($_POST['incident'])){		
		$incident = $POST['incident'];
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
		$make="";
		$model="";
		$plate="";
		$make2="";
		$model2="";
		$plate2="";
                if(isset($_POST['make'])){
		$make = $_POST['make'];
		}
                if(isset($_POST['model'])){
		$model = $_POST['model'];
		}
                if(isset($_POST['Plate'])){
		$plate = $_POST['Plate'];
		}
                if(isset($_POST['make2'])){
		$make2 = $_POST['make2'];
		}
                if(isset($_POST['model2'])){
                $model2 = $_POST['model2'];
		}
                if(isset($_POST['Plate2'])){
                $plate2 = $_POST['Plate2'];
		}
		$environDamage="";
		$damage="";
                if(isset($_POST['environDamage'])){
		$environDamage = $_POST['environDamage'];
		}
                if(isset($_POST['Damage'])){
		$damage = $_POST['Damage'];		
		}
		try{
			require("config.php");
			//$username, $password, $host, $database
			$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
	
			$db = new PDO($conn_string, $username, $password);
// $stmt = $db->prepare("select id, Where, How, Time, Date, Make, Model, Plate, Make2 from `employeeIncident` where First_Name = :first_name LIMIT 1");
	
			$stmt = $db->prepare("INSERT into `employeeIncident` (`id`, `address`, `How`, `Time`, `Date`, `Make`, `Model`, `Plate`, `Make2`, `Model2`, `Plate2`, `environDamage`, `Damage`) VALUES (:id, :address, :how, :time, :date, :make, :model, :plate, :make2, :model2, :plate2, :environDamage, :damage)");
			$result = $stmt->execute(
				array(":id"=>$incident, ":address" =>$where, ":how" => $how, ":time"=>$time, ":date" =>$date, ":make" =>$make, ":model"=>$model, ":plate"=>$plate, ":make2"=>$make2, ":model2"=>$model2, ":plate2"=>$plate2, ":environDamage"=>$environDamage, ":damage"=>$damage) 
				
			);
		
         // $custProf = array("First_Name"=> $results['First_Name'], "Last_Name"=> $results['Last_Name'],
           //                                                   "Where"=> $results['Where'], "How"=> $results['How'], "Time"=> $results['Time'], "Date"=> $results['Dat$
             //                                                 "Make"=> $results['Make'], "Model"=> $results['Model'], "Plate"=> $results['Plate']
	//			);
          //                              $_SESSION['customerProf'] = $custProf;
			print_r($stmt->errorInfo());
			$results = $stmt->fetch(PDO::FETCH_ASSOC);
			
			echo "Welcom" .	$_SESSION['usr']['name'];
			//echo "Location" .  $results[":first_name"][":address"];
			echo var_export($result, true);
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	
?>
