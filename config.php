<?php

	$dbHost = "localhost";
	$dbUser = "root";
	$dbPass = "";
	$dbName = "vms_just";

	$connect = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);

	if ($connect == false) {
		 echo "<b>Error: Database connection failed!.<b>";

	}

?>
