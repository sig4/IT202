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
		<input type="button" onclick="window.location.href = 'https://web.njit.edu/~sig4/IT202/testDup2.php';" value="View Driver Profile"/><br>
<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>
