<?php

	session_start();
	#error_reporting(0);

	include '../includes/database.php';
	include '../includes/server.php';

	// encripting data and passwords using.
    $key 	= md5('australia');

    // Encrypt
    function encrypt($string, $key) {

        $string = rtrim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $string, MCRYPT_MODE_ECB)));
        return $string;
    }

    // Decrypt
    function decrypt($string, $key) {

        $string = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, base64_decode($string), MCRYPT_MODE_ECB));
        return $string;
    }

	require 'vendor/autoload.php';

	$mail = new PHPMailer;

	$mail->isSMTP();
	$mail->SMTPAuth = true;

	$mail->Host = 'smtp.gmail.com';
	$mail->Username = 'ngimwan@gmail.com';
	$mail->Password = 'mum1234,./';
	$mail->SMTPSecure = 'tls';
	$mail->Port = 587;

	if (isset($_GET['approval'])) {
		
		$approval = $_GET['approval'] == 'true';

		if ($approval) {

			$kay = $_SESSION['key'];

			$get = mysqli_query($connect,"SELECT * FROM onhold_names WHERE kay = '$kay'");

			if (mysqli_num_rows($get) == false) {

				header('location:'.$server.'includes/reporting.php?msg=session');
				exit();
			}

			while ($rowg = mysqli_fetch_assoc($get)) {
				$cname = $rowg['company_name'];
				$fname = $rowg['first_name'];
				$lname = $rowg['last_name'];
				$natid = $rowg['nat_id'];
				$email = $rowg['user_email'];
				$phone = $rowg['user_phone'];
			}

			// Collect the posted data from the paypal
			$payer_name 	= $_POST['address_name'];
			$amount 		= $_POST['payment_gross'];
			$payer_email 	= $_POST['payer_email'];
			$trx_id 		= $_POST['txn_id'];
			$item  			= $_POST['item_name'];
			$currency 		= $_POST['mc_currency'];
			
			if ($amount == 3.00) {

				// Insert in the reserve table now!
				$reserv = mysqli_query($connect, "INSERT INTO reserved_names(company_name, first_name, last_name, nat_id, user_phone, user_email, payment_id)
					VALUES('$cname','$fname','$lname ','$natid','$phone','$email','$trx_id')") or die(mysqli_error($connect));

				$payer_name 	= encrypt($payer_name,$key);
				$payer_email 	= encrypt($payer_email,$key);
				$item 			= encrypt($item,$key);

				$insert = mysqli_query($connect, "INSERT INTO paypal(payer_name, payer_email, trx_id, amount, currency, c_name)
							VALUES('$payer_name','$payer_email','$trx_id ','$amount','$currency','$item')");

				$insert = mysqli_query($connect, "INSERT INTO payments(payer_name, payer_email, trx_id, amount, currency, c_name)
							VALUES('$payer_name','$payer_email','$trx_id ','$amount','$currency','$item')");

				if ($insert) {

					// send mail here code..
					$mail->setFrom('ngimwan@gmail.com', 'Company of Registrar');
					$mail->addAddress('delinkdeveloper@gmail.com', $payer_name);
					$mail->addReplyTo('info@coregistrar.co.ke', 'Info');
					$mail->isHTML(true);

					$payer_name = decrypt($payer_name,$key);
					$item = decrypt($item,$key);

					$mail->Subject = 'Payment Received!';
					$mail->Body    = "
					<div style='background:#dfdfdf;padding:5% 0;'>
						<h2 style='margin:0 auto; margin-bottom:10px; width:75%;'>Company Of Registrar Online Name Search</h2>
						<div style='width:75%;margin:0 auto;background:#fff;padding:15px;'>
							<h3>Hay $payer_name,</h3>
							<p style='font-size:17px;color:#333;'>
								<b>Thank you,</b> Your paypal payment was received successfuly! Your company name '$item' was reserved in our database, You have 30 Days to complete your company registration otherwise we will not hold your reserved name any longer.
							</p>
						</div>
					</div>";

					$mail->AltBody = 'Thank you';

					$mail->send();

					mysqli_close($connect);

					$_SESSION['id'] = $trx_id;

					header("location:".$server.'payment/paypal_success.php');
					exit();

				}else
					header('location: ' . $server . 'includes/reporting.php?msg=notsaved');
					exit();

			}else
				
				header('location:'.$server.'payment/paypal_cancel.php?');
				exit();

		}else
			header('location:'.$server.'payment/paypal_cancel.php');
			exit();

	}else
		header('location:'.$server.'payment/paypal_cancel.php');
		exit();