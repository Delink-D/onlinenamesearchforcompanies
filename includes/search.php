<?php
	error_reporting(0);
	session_start();

	$name = $_SESSION['name'];

	session_destroy();

	$key 	= md5('australia');

	// Encrypt data to the database
	function encrypt($string, $key) {

		$string = rtrim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $string, MCRYPT_MODE_ECB)));
		return $string;
	}

	// Decrypt
    function decrypt($string, $key) {

        $string = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, base64_decode($string), MCRYPT_MODE_ECB));
        return $string;
    }
	
	if (isset($_POST['name_search'])) {
		
		include('database.php');

		$name = trim($_POST['search']);

		if ($name == "" OR $name == NULL) {
			
			header('location: '.$server.'index.php?msg=empty');
			exit();
		}

		$name = encrypt($name,$key);

		// Delete all names older than 20 Minutes from onhold names table
		$sql = "SELECT * FROM onhold_names WHERE created_at <= CURRENT_TIME - INTERVAL 20 MINUTE";
		$query = mysqli_query($connect,$sql);

		$num = mysqli_num_rows($query);

		if ($num > 0) {

			while ($row = mysqli_fetch_array($query,MYSQLI_ASSOC)) {

				$nid = $row['id'];
				$nname = $row['company_name'];
				
				$del = "DELETE FROM onhold_names WHERE id = '$nid' AND company_name = '$nname' LIMIT 1";

				$delquery = mysqli_query($connect,$del);
			}
		}

		// Delete all names older than 30 Days from Reserved names table
		$sql2 	= "SELECT * FROM reserved_names  WHERE created_at <= CURRENT_TIME - INTERVAL 30 DAY";
		$query2 = mysqli_query($connect,$sql2);

		$num2 = mysqli_num_rows($query2);

		if ($num2 > 0) {

			while ($row = mysqli_fetch_array($query2,MYSQLI_ASSOC)) {

				$nid2 	= $row['id'];
				$nname2 = $row['company_name'];
				
				$del2 = "DELETE FROM reserved_names WHERE id = '$nid2' AND company_name = '$nname2' Limit 1";

				$delquery2 = mysqli_query($connect,$del2);
			}
		}

		// Add count to searched names..
		$s_count = "UPDATE searched_names SET search_count = search_count+1 WHERE id = 1";
		
		$s_query = mysqli_query($connect, $s_count) or die("ERROR!!");

		// 	Start the search of name
		$search = mysqli_query($connect, "SELECT * FROM company_names WHERE company_name = '$name'") or die(header('location:'.$server.'includes/reporting.php?msg=table'));

		$count = mysqli_num_rows($search);

		if ($count == 0) {
			
			$search2 = mysqli_query($connect, "SELECT * FROM reserved_names WHERE company_name = '$name'") or die(header('location:'.$server.'includes/reporting.php?msg=table'));

			$count2 = mysqli_num_rows($search2);

			if ($count2 == 0) {

				$search3 = mysqli_query($connect, "SELECT * FROM onhold_names WHERE company_name = '$name'") or die(header('location:'.$server.'includes/reporting.php?msg=table'));

				$count3 = mysqli_num_rows($search3);

				if ($count3 == 0) {

					session_start();

					// $name = decrypt($name,$key);
					
					@$_SESSION['name'] = $name;

					header('location: '.$server.'index.php?msg=good');
					exit();

				} else

					session_start();

					// $name = decrypt($name,$key);

					@$_SESSION['name'] = $name;
					
					header('location: '.$server.'index.php?msg=exist');
					exit();
			} else

				session_start();

				// $name = decrypt($name,$key);

				@$_SESSION['name'] = $name;
				
				header('location: '.$server.'index.php?msg=exist');
				exit();

		} else

			session_start();

			// $name = decrypt($name,$key);

			@$_SESSION['name'] = $name;
			
			header('location: '.$server.'index.php?msg=exist');
			exit();

	} else
		header('location: '.$server);
		exit();