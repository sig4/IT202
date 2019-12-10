<?php
session_start();
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php
	echo  "Welcome " .	$_SESSION['usr']['name'];
?>
<html>
<head></head>
<body>
	<form method="POST"/>

	<select name = "Edit">

                <option value="Select None">No Change</option>
		<option value="changeUsername">Change Username</option>
  		<option value="changePassword">Change Password</option>
  		<option value="changeFirstName">Change FirstName</option>
		
	</select>	
	of ID:		<input type="text" name="ID"/>	
	to:		<input type="text" name="newUpdate"/><br>
<input type="submit" name="submit" value="Submit" />
<input type="button" onclick="window.location.href = 'https://web.njit.edu/~sig4/IT202/projFolder/driverHome.php';" value ="Return to Home"/>


	</form>
</body>
</html>

<?php

echo "<table style='border: solid 1px black;'>";
echo "<tr><th>id</th><th>Username</th><th>Password</th><th>First Name</th>";
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
		$user = $_SESSION['usr']['name'];
		$ID = $_SESSION['usr']['id'];
		if(isset($_POST['newUpdate'])){
		$newVal = $_POST['newUpdate'];
		}


try {
			require("config.php");
			//$username, $password, $host, $database
			$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
   
	// $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
			$conn = new PDO($conn_string, $username, $password);
   
 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT id, username, password, First_Name FROM Customers WHERE First_Name= :first_name");
    $stmt->execute(array(":first_name"=> $user));
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
        echo $v;
    }
	if(isset($_POST['submit'])){
		$selected_val = $_POST['Edit'];  // Storing Selected Value In Variable
		
		if($selected_val == "changeUsername"){
			$sql = "UPDATE Customers SET username=:username WHERE id= :id";
			$stmt= $conn->prepare($sql);
			$stmt->execute(array(":username"=> $newVal, ":id"=> $ID));
			echo "Login again to see the change";  // Displaying Selected Value
	
		}
		if($selected_val == "changePassword"){
			$sql = "UPDATE Customers SET Password=:password WHERE id= :id";
                        $stmt= $conn->prepare($sql);
			$hash = password_hash($newVal, PASSWORD_BCRYPT);

                        $stmt->execute(array(":password"=> $hash, ":id"=> $ID));
                        echo "Login again to see the change";  // Displaying Selected Value
		
	echo "Change successful refresh profile to view change";  // Displaying Selected Value	
		}
		if($selected_val == "changeFirstName"){
                        $sql = "UPDATE Customers SET First_Name=:first_name WHERE id= :id";
                        $stmt= $conn->prepare($sql);
                        $stmt->execute(array(":first_name"=> $newVal, ":id"=> $ID));
                        echo "Login again to see the change";  // Displaying Selected Value

                       
		 }


	}

}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>
