
<?php
session_start();
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<html>
<head></head>
<body>
	



</body>
</html>


<?php
		$user = $_POST['firstname'];
//		echo $user;
  try{
                     
			 require("config.php");
                        //$username, $password, $host, $database
                        $conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
                        $db = new PDO($conn_string, $username, $password);
			$stmt = $db->prepare("select First_Name, Last_Name, address, How, Time, Date, Make, Model, Plate, id from `Customer1Incident` where First_Name = :first_name LIMIT 2");
//			$stmt = $db->prepare("select First_Name, COUNT(*) c from `Customer1Incident` GROUP BY First_Name c>1 where First_Name = :first_name ");
			//echo var_export($results, true);

                        $stmt->execute(array(":first_name"=>$user));
//			print_r($stmt->errorInfo());
                        $results = $stmt->fetch(PDO::FETCH_ASSOC);
  //                     	echo var_export($results, true);

			 echo "Welcome, " . $results["First_Name"];
  			$prof = array("First_Name"=> $results['First_Name'], "Last_Name"=> $results['Last_Name'], "Where"=> $results['address'], "How"=> $results['How'], "Time"=> $results['Time'], "Date"=> $results['Date'],
                                  "Make"=> $results['Make'], "Model"=> $results['Model'], "Plate"=> $results['Plate'], "id" =>$results['id']);
							
		
                                       $_SESSION['custProf'] = $prof;


			//	echo "Profile" . $_SESSION['custProf']['Where'];        
                          
if ($results->num_rows > 0) {
    // output data of each row
    while($row = $results->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["First_Name"]. " " . $row["Last_Name"]. "<br>";
    }
} else {
    echo "0 results";
}      
                        
                   
                }
                catch(Exception $e){
                        echo $e->getMessage();
                }
        
?>	

<html>
<head></head>
<body>
        <form method="POST"/>
       
			First Name:	<input type="text" name="firstname"/><br>

        </form>
//	 echo "Profile" . $_SESSION['custProf']['First_Name'];

</body>
</html>
