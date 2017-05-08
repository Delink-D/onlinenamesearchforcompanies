<?php
	
	include '../config/check.php';
	include '../config/database.php';
	include '../config/server.php';

	// 	collect data from form

	$uname = trim($_POST['uname']);
	$fname = trim($_POST['fname']);
	$lname = trim($_POST['lname']);
	$email = trim($_POST['email']);
	$role2 = trim($_POST['role']);
	$pass  = trim($_POST['password']);

	// Encypt
	$uname = encrypt($uname,$key);
	$fname = encrypt($fname,$key);
	$lname = encrypt($lname,$key);
	$email = encrypt($email,$key);
	
	$pass  = hashword($pass,$salt);

	if ($role == 1) {
		
		if (isset($_POST['new'])) {
			
			$check = mysqli_query($db, "SELECT * FROM admin WHERE user_name = '$uname'");

			if (mysqli_num_rows($check)==true) {
				header('location:'.$server.'reporting.php?e=user-a');
				exit();
			}
				$check1 = mysqli_query($db, "SELECT * FROM admin WHERE user_email = '$email'");
				
				if (mysqli_num_rows($check1)==true) {
					header('location:'.$server.'reporting.php?e=email-a');
					exit();
				}

				$inst = mysqli_query($db, "INSERT INTO admin (user_name,first_name,last_name,user_email,user_pass,role)
					VALUES('$uname','$fname','$lname','$email','$pass','$role2')") or die(header('location:'.$server.'reporting.php?e=save-e'));

				header('location:'.$server.'reporting.php?g=saved');
				exit();

		}else
			header('location:'.$server);
			exit();
	}else
		header('location:'.$server.'reporting.php?e=not-admin');
		exit();