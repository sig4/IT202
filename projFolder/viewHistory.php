<?php
session_start();
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php
echo "Welcome " . $_SESSION['usr']['name'] . " this is your driving history in the database if you would like to edit speak to an employee";

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
		$user = $_SESSION['usr']['name'];
		$ID = $_SESSION['usr']['id'];
		
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

}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>
