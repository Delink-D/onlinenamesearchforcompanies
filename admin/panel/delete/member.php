<?php 
	
	include '../config/check.php';
	include '../config/server.php';
	include '../config/database.php';

	if ($role != 1) {

		if ($_GET['r']) {

			$id = $_GET['r'];

			$get = mysqli_query($db, "SELECT * FROM admin WHERE id = '$id'")or die(
				header('location:'.$server.'reporting.php?e=tbl'));

			if (mysqli_num_rows($get) == false) {

				header('location:'.$server.'reporting.php?e=tbl-false');
				exit();
			}

			$del = mysqli_query($db, "DELETE FROM admin WHERE id = '$id'");

			if ($del) {

				header('location:'.$server.'reporting.php?g=del');
				exit();

			}else
				header('location:'.$server.'reporting.php?e=del');
				exit();
		}
	}else
		header('location:'.$server.'reporting.php?e=not-admin');
		exit();