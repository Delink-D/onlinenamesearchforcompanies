<?php 
	
	include '../config/check.php';
	include '../config/server.php';
	include '../config/database.php';

	if ($role == 1) {

		if ($_GET['r']) {

			$id = $_GET['r'];

			$get = mysqli_query($db, "SELECT * FROM reserved_names WHERE id = '$id'")or die(
				header('location:'.$server.'reporting.php?e=tbl'));

			if (mysqli_num_rows($get) == false) {

				header('location:'.$server.'reporting.php?e=tbl-false');
				exit();
			}

			while ($row = mysqli_fetch_assoc($get)) {
				
				$id 		= $row['id'];
				$c_name 	= $row['company_name'];
				$f_name 	= $row['first_name'];
				$l_name 	= $row['last_name'];
				$nat_id 	= $row['nat_id'];
				$u_phone 	= $row['user_phone'];
				$u_email 	= $row['user_email'];
				$trx_id		= $row['payment_id'];
				$created  	= $row['created_at'];

				$insert = mysqli_query($db, "INSERT INTO deleted (company_name,first_name,last_name,nat_id,user_phone,user_email,payment_id,created_at)
					VALUES('$c_name','$f_name','$l_name','$nat_id','$u_phone','$u_email','$trx_id','$created')") or die(mysqli_error($db));

				if ($insert) {

					$del = mysqli_query($db, "DELETE FROM reserved_names WHERE id = '$id'");

					if ($del) {

						header('location:'.$server.'reporting.php?g=del');
						exit();

					}else
						header('location:'.$server.'reporting.php?e=del');
						exit();
				}else

					header('location:'.$server.'reporting.php?e=del');
					exit();
			}

		}else
			header('location:'.$server);
			exit();
	}else
		header('location:'.$server.'reporting.php?e=role');
		exit();