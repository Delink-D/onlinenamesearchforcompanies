<?php

	// 	Connecting to the database...

	$h = $_SERVER['SERVER_NAME'];
	$u = "root";
	$p = "";
	$d = "name_search";

	$db = mysqli_connect($h, $u, $p, $d);