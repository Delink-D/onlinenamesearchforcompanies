<?php
	
	// Reservation of company name file..

	session_start();

	$name = $_SESSION['name'];

	session_destroy();

	$key 	= md5('australia');

	// Encrypt data to the database
	function encrypt($string, $key) {

		$string = rtrim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $string, MCRYPT_MODE_ECB)));
		return $string;
	}

	include 'server.php';
	
	if (isset($_POST['reserve'])) {
		
		include ('database.php');
		
		$cname = trim($_POST['cname']);
		$fname = trim($_POST['fname']);
		$lname = trim($_POST['lname']);
		$phone = trim($_POST['phone']);
		$natid = trim($_POST['id']);
		$email = trim($_POST['email']);

		$cname = mysqli_real_escape_string($connect,$cname);
		$fname = mysqli_real_escape_string($connect,$fname);
		$lname = mysqli_real_escape_string($connect,$lname);
		$phone = mysqli_real_escape_string($connect,$phone);
		$natid = mysqli_real_escape_string($connect,$natid);
		
		if ($cname != "" OR $cname != NULL) {

			session_start();

			@$_SESSION['name'] = $cname;
			
			if ($fname != "" OR $fname != NULL) {

				if ($lname != "" OR $lname != NULL) {
					
					if ($phone != "" OR $phone != NULL) {

						if ($natid != "" OR $natid != NULL) {

							if ($email != "" OR $email != NULL) {

								// Search if the name being reserved exist in the company list of companies
								
								$search = mysqli_query($connect, "SELECT * FROM company_names WHERE company_name = '$cname'") or die(header('location:'.$server.'includes/reporting.php?msg=table'));

								$count = mysqli_num_rows($search);

								if ($count == 0) {

									// Search if the name being reserved exist in the company list of Reserved names

									$search2 = mysqli_query($connect, "SELECT * FROM reserved_names WHERE company_name = '$cname'") or die(header('location:'.$server.'includes/reporting.php?msg=table'));

									$count2 = mysqli_num_rows($search2);

									if ($count2 == 0) {

										function radom($rad) {

			                                $chars = "ABDEFGHIJKLMNPQRSTUVWXYZabcdefghijklmnpqrstuvwxyz123456789";
			                                $qat = strlen($chars);
			                                $qat--;
			                                $hash = null;

			                                for ($x = 0; $x < $rad; $x++) {

			                                    $pos = rand(0,$qat);
			                                    $hash .= substr($chars, $pos,1);

			                                }

			                                return $hash;
			                            };

			                            $kay = radom(7) . radom(8);

			                            $code = radom(6);

										// When all things are good then proceed to reserving the name 
										// $cname = encrypt($cname,$key);
										// $fname = encrypt($fname,$key);
										// $lname = encrypt($lname,$key);
										// $natid = encrypt($natid,$key);
										// $phone = encrypt($phone,$key);
										// $email = encrypt($email,$key);

										$save = mysqli_query($connect, "INSERT INTO onhold_names(company_name, first_name, last_name, nat_id, user_phone, user_email, kay)
												VALUES('$cname','$fname','$lname','$natid','$phone','$email','$kay')") or die(header('location:'.$server.'includes/reporting.php?msg=table'));

										session_destroy();

										session_start();

										@$_SESSION['key'] = $kay;
										$_SESSION['code'] = $code;

										header('location: ' . $server . 'payment/pay-option.php');
										exit();

									}else
										
										header('location: ' . $server . 'pages/reserve.php?msg=exist-in-reserved');
										exit();

								}else
									
									header('location: ' . $server . 'pages/reserve.php?msg=exist-in-company');
									exit();

							}else
						
								header('location: ' . $server . 'pages/reserve.php?msg=missing-email-id');
								exit();
						}else
					
							header('location: ' . $server . 'pages/reserve.php?msg=missing-national-id');
							exit();
					}else
				
						header('location: ' . $server . 'pages/reserve.php?msg=missing-phone-number');
						exit();
				}else
				
					header('location: ' . $server . 'pages/reserve.php?msg=missing-last-name');
					exit();
			}else
			
				header('location: ' . $server . 'pages/reserve.php?msg=missing-first-name');
				exit();

		}else

			header('location: ' . $server . 'pages/reserve.php?msg=missing-company-name');
			exit();

	}else
		header('location: ' . $server . 'pages/reserve.php');
		exit();