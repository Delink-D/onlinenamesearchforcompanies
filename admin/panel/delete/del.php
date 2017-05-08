<?php

include '../config/check.php';
include '../config/database.php';
include '../config/server.php';

if ($role == 1) {

		if ($_GET['r']) {

			$id = $_GET['r'];

			$del = mysqli_query($db, "DELETE FROM deleted WHERE id = '$id'");

			header('location:'.$server.'reporting.php?g=del');
			exit();
		}
}