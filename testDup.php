<?php
			require("config.php");
			//$username, $password, $host, $database
			$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
			$db = new PDO($conn_string, $username, $password);

if ($conn_string->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
echo "hello";
}			

$sql = "SELECT First_Name, Last_Name, id FROM SampleTable WHERE Last_Name='ghumwala'";
$result = $conn_string->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["First_Name"]. " " . $row["Last_Name"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn_string->close();
?>
