<?php

	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	
	session_start();
	$mysqli = new mysqli('localhost', 'root', 'root', 'co2');
	$conn = mysqli_connect('localhost', 'root', 'root');

	if(isset($_SESSION['counter'])){
		$_SESSION['counter'] += 1;
	}
	else{
		$_SESSION['counter'] = 1;	
	}
	
		$counter = $_SESSION['counter'];


		$co2_value = $mysqli->query("SELECT * FROM tblSensorData where id = $counter");

		$pollution = $mysqli->query("SELECT * FROM tblGPSData where id = $counter");


		while ($row = mysqli_fetch_array($co2_value)) {
			$date = $row['DATE'];
			$co2 = $row['CO2'];
		}

		while ($row = mysqli_fetch_array($pollution)) {
			$x = $row['ValueX'];
			$y = $row['ValueY'];
		}

		$pollution = $mysqli->query("INSERT INTO POLLUTION (DATE, CO2, ValueX, ValueY) VALUES ('$date', $co2, $x, $y)");

		echo 'counter je ' . $_SESSION['counter'];

 ?>
 <html>
 <head>
 	<meta http-equiv="refresh" content="6">
 </head>

 <body>
 	<h1>dsad</h1>
 </body>
 </html>