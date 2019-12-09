<html>
<head></head>
<body>
	<form method="POST"/>
	First Name:	<input type="text" name="firstname"/><br>
	<select name = "Edit">

                <option value="Select None">No Change</option>
		<option value="changeAddress">Change Address</option>
  		<option value="changeHow">Change How</option>
  		<option value="changeTime">Change Time[HH:MM:SS]</option>
		<option value="changeDate">Change Date[YYYY-MM-DD]</option>
		<option value="changeMake">Change Make</option>
		<option value="changeModel">Change Model</option>
		<option value="changePlate">Change Plate</option>
		
	</select>	
	of ID:		<input type="text" name="ID"/>	
	to:		<input type="text" name="newUpdate"/><br>
<input type="submit" name="submit" value="Submit" />

	</form>
</body>
</html>

<?php
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Firstname</th><th>Lastname</th><th>Address</th><th>How</th><th>Time</th><th>Date</th><th>Make</th><th>Model</th><th>Plate</th><th>ID</th></tr>";

class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }
}

		$user = $_POST['firstname'];
		$ID = $_POST['ID'];
		$newVal = $_POST['newUpdate'];

try {
			require("config.php");
			//$username, $password, $host, $database
			$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
   
	// $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
			$conn = new PDO($conn_string, $username, $password);
   
 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT First_Name, Last_Name, address, How, Time, Date, Make, Model, Plate, id FROM Customer1Incident WHERE First_Name= :first_name");
    $stmt->execute(array(":first_name"=> $user));

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
        echo $v;
    }
	if(isset($_POST['submit'])){
		$selected_val = $_POST['Edit'];  // Storing Selected Value In Variable
		
		if($selected_val == "changeAddress"){
			$sql = "UPDATE Customer1Incident SET address=:address WHERE id= :id";
			$stmt= $conn->prepare($sql);
			$stmt->execute(array(":address"=> $newVal, ":id"=> $ID));
			echo "Change successful refresh profile to view change";  // Displaying Selected Value
	
		}
		if($selected_val == "changeHow"){
			$sql = "UPDATE Customer1Incident SET How=:how WHERE id= :id";
                        $stmt= $conn->prepare($sql);
                        $stmt->execute(array(":how"=> $newVal, ":id"=> $ID));
			echo "Change successful refresh profile to view change";  // Displaying Selected Value	
		}
		if($selected_val == "changeTime"){
                        $sql = "UPDATE Customer1Incident SET Time=:time WHERE id= :id";
                        $stmt= $conn->prepare($sql);
                        $stmt->execute(array(":time"=> $newVal, ":id"=> $ID));
                        echo "Change successful refresh profile to view change";  // Displaying Selected Value
		 }

		if($selected_val == "changeDate"){
                        $sql = "UPDATE Customer1Incident SET Date=:date WHERE id= :id";
                        $stmt= $conn->prepare($sql);
                        $stmt->execute(array(":date"=> $newVal, ":id"=> $ID));
                        echo "Change successful refresh profile to view change";  // Displaying Selected Value
                }
		if($selected_val == "changeMake"){
                        $sql = "UPDATE Customer1Incident SET Make=:make WHERE id= :id";
                        $stmt= $conn->prepare($sql);
                        $stmt->execute(array(":make"=> $newVal, ":id"=> $ID));
                        echo "Change successful refresh profile to view change";  // Displaying Selected Value

               }
		if($selected_val == "changeModel"){
                        $sql = "UPDATE Customer1Incident SET Model=:model WHERE id= :id";
                        $stmt= $conn->prepare($sql);
                        $stmt->execute(array(":model"=> $newVal, ":id"=> $ID));
                        echo "Change successful refresh profile to view change";  // Displaying Selected Value

                }

		if($selected_val == "changePlate"){
                        $sql = "UPDATE Customer1Incident SET Plate=:plate WHERE id= :id";
                        $stmt= $conn->prepare($sql);
                        $stmt->execute(array(":plate"=> $newVal, ":id"=> $ID));
                        echo "Change successful refresh profile to view change";  // Displaying Selected Value

                }

	}


}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>
