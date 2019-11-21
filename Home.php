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

	echo  "Welcome " .	$_SESSION['user']['name'];
		
	
?>
<html>
<head></head>
<body>
        <form method="POST"/>
        
                <input type="button" onclick="window.location.href = 'https://web.njit.edu/~sig4/IT202/sampleLanding.php';" value="EMPLOYEE QUESTIONAIRE"/>
		<input type="button" onclick="window.location.href = 'https://web.njit.edu/~sig4/IT202/customerReg.php';" value ="CUSTOMER QUESTIONAIRE"/>

        </form>
</body>
</html>

