<?php
session_start();
?>
<html>
<head>
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script>



$(document).ready(function(){
	var nav = ["Home", "About", "Logout"];
	nav.forEach(function(item, index){
			let ele = $("<a>");
			ele.attr("href", item + ".php");
			ele.text(item);
			$("body").append(ele[0]);
	});
	
});
</script>
</head>
<body>
Hello there, <?php echo $_SESSION['usr']['name'];?><br>
		<input type="button" onclick="window.location.href = 'https://web.njit.edu/~sig4/IT202/projFolder/testDup2.php';" value="View Driver Profile"/><br>
                <input type="button" onclick="window.location.href = 'https://web.njit.edu/~sig4/IT202/projFolder/employeeQuestionaire.php';" value="Fill out Employee Questionaire"/><br>
		
<form method="post" >
    Put link for image to upload:
    <input type="text" name="fileToUpload" 
    <input type="submit" value="Upload Image" name="submit">
</form>

	

<?php
		$img = $_POST['fileToUpload'];

try{
	
	require("config.php");
	$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
			$db = new PDO($conn_string, $username, $password);
			$stmt = $db->prepare("INSERT into `images` (link) VALUES(:link)");
			$result = $stmt->execute(
				array(":link"=>$img
				)
			);
//			print_r($stmt->errorInfo());
			
//			echo var_export($result, true);
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
	
?>


</body>
</html>
