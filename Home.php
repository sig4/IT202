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

	echo  "Welcome " .	$_SESSION['usr']['name'];
//	echo "To fully get an indept report of the accident get reports from the two drivers in the accident \n";
//	echo "Once that is complete, fill out your own questionaire to record your own observations";
		
	
?>
<html>
<head></head>
<body>
<br> To fully get an indepth report of the accident get reports from the two drivers in the accident<br>
 Once that is complete, fill out your own questionaire to record your own observations

        <form method="POST"/>
        
                <input type="button" onclick="window.location.href = 'https://web.njit.edu/~sig4/IT202/sampleLanding.php';" value="EMPLOYEE DASHBOARD"/>
		<input type="button" onclick="window.location.href = 'https://web.njit.edu/~sig4/IT202/driver1Login.php';" value ="Driver1 QUESTIONAIRE"/>
                <input type="button" onclick="window.location.href = 'https://web.njit.edu/~sig4/IT202/driver1Login.php';" value ="Driver2 QUESTIONAIRE"/>
		<input type="button" onclick="window.location.href = 'https://web.njit.edu/~sig4/IT202/tryLogin.php';" value ="Return to Login"/>
        </form>
</body>
</html>

