<?php
echo "<pre>" . var_export($_GET, true) . "</pre>";
if(isset($_GET['name'])){
	echo "<br>Hello, " . $_GET['name'] . "<br>";
}
if(isset($_GET['number'])){
	$number = $_GET['number'];
	echo "<br>" . $number . " should be a number...";
	echo "<br>but it might not be<br>";
}
if(isset($_GET['addNumber1'])){
	$num1 = $_GET['addNumber1'];
	if(is_numeric($num1)) {
	echo "<br>" . $num1 . " is numeric<br>";
	}else {
        echo "<br>" . $num1 . " is NOT numeric<br>";
    }
}
if(isset($_GET['addNumber2'])){
	$num2 = $_GET['addNumber2'];
	if(is_numeric($num2)) {
	echo "<br>" . $num2 . " is numeric<br>";
	}else{
	echo "<br>" . $num2 . " is NOT numeric<br>";
	}
}
if(isset($_GET['sum'])){
	$z = $num1 +$num2;
	echo "Sum: ", $z;
}

if(isset($_GET['conc1'])){
	$x1 = $_GET['conc1'];
//	echo "<br>" .  conc1 . "<br>" ;
}
if(isset($_GET['conc2'])){             
	$x2 = $_GET['conc2'];
//	echo "<br>" . conc2 . "<br>"; 
}
if(isset($_GET['conc'])){

	
	echo "<br>" . $x1 . $x2 . "<br>";

}
?>

