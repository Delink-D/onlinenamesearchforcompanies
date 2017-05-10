<?php
	
	error_reporting(0);
	
	// connecting with the database...

	include 'server.php';

	$host 	= 'localhost';
	$user 	= 'root';
	$pass 	= '';
	$db 	= 'name_search';

	$connect = mysqli_connect($host, $user, $pass, $db);

	if (!$connect) {

		header('location: ' . $server . '/includes/reporting.php?msg=database');
		exit();
	}