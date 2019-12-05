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
<br> CUSTOMER USER SCREEN<br>
 

        <form method="POST"/>
       
		<input type="button" onclick="window.location.href = 'https://web.njit.edu/~sig4/IT202/viewHistory.php';" value ="VIEW HISTORY"/>
                <input type="button" onclick="window.location.href = 'https://web.njit.edu/~sig4/IT202/editProfile.php';" value ="CHANGE PROFILE INFORMATION"/>
		<input type="button" onclick="window.location.href = 'https://web.njit.edu/~sig4/IT202/tryLogin.php';" value ="Return to Login"/>
        </form>
</body>
</html>
