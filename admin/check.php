<?php
	
	include'../includes/server.php';
    include'../includes/database.php';

    require 'vendor/autoload.php';

	$mail = new PHPMailer;

	$mail->isSMTP();
	$mail->SMTPAuth = true;

	$mail->Host = 'mx.000webhost.com';
	$mail->Username = 'info@delinkdesign.comli.com';
	$mail->Password = 'delinksite1';
	$mail->SMTPSecure = 'tls';
	$mail->Port = 587;

	// Get valiables
	$email = $_POST['email'];

	$key 	= md5('australia');
	$salt 	= md5('australia');

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

	// hashing passwords
	function hashword($string, $salt) {

		$string = crypt($string, '$1$' . $salt . '$');
		return $string;
	}

	if (isset($_POST['get'])) {

		if ($email != "") {

			$email1 = encrypt($email, $key);

			$check = mysqli_query($connect, "SELECT * FROM admin WHERE user_email = '$email1'");

			if (mysqli_num_rows($check) == false) {

				header('location:'.$server.'admin/get-email.php?msg=no-email');
				exit();

			}else

				while ($row = mysqli_fetch_assoc($check)) {
					$id = $row['id'];
					$user = decrypt($row['user_name'], $key);
					$email = decrypt($row['email'], $key);
					$key = $row['activation_key'];
				}

				function radom($rad) {
					$chars = "ABDEFGHIJKLMNPQRSTUVWXYZ123456789abcdefghijklmnpqrstuvwxyz";
					$qat = strlen($chars);
					$qat--;
					$hash = null;
					for ($x = 0; $x < $rad; $x++) { 
						$pos = rand(0,$qat);
						$hash .= substr($chars, $pos,1);
					}
					return $hash;
				}

				$hash = radom(17);

				$alt = mysqli_query($connect,"UPDATE admin SET activation_key = '$hash' WHERE id = '$id'");

				$link = $server."admin/new-pass.php?p=$hash";

				if ($alt) {
					
					// send mail here code..
					$mail->setFrom('info@delinkdesign.comli.com', 'Reset password!');
					$mail->addAddress('delinkdesigns@gmail.com', $user);
					$mail->addReplyTo('info@mysite.com', 'Info');
					$mail->isHTML(true);

					$mail->Subject = 'Password Reset Request!';
					$mail->Body    = "
					<div style='background:#dfdfdf;padding:5% 0;'>
						<h2 style='margin:0 auto; margin-bottom:10px; width:75%;'>Majirani Music Site</h2>
						<div style='width:75%;margin:0 auto;background:#fff;padding:15px;'>
							<h3>Hay $user,</h3>
							<p style='font-size:17px;color:#333;'>
								You requested the change of your pssword.<br>
								You are one step away from reseting your password, just follow the link provided below and make the change of your password.
							</p>
							<p style='padding:10px;'>
								Link: $link
							</p>
						</div>
					</div>";

					$mail->AltBody = 'Only one time reset password for this url';

					if ($mail->send()) {

						session_start();

						$_SESSION['email'] = $email;

						header('location:'.$server.'admin/get-email.php?msg=sent');
						exit();

					}else
						header('location:'.$server.'admin/get-email.php?msg=down');
						exit();

				}else
					header('location:'.$server.'admin/get-email.php?msg=down');
					exit();

		}else
			header('location:'.$server.'admin/get-email.php?msg=input-email');
			exit();

	}else
		header('location:'.$server.'admin/get-email.php');
		exit();