<?php

	session_start();
	error_reporting(0);

	include'../includes/server.php';
    include'../includes/database.php';

    require 'vendor/autoload.php';

	$mail = new PHPMailer;

	$mail->isSMTP();
	$mail->SMTPAuth = true;

	$mail->Host = 'smtp.gmail.com';
	$mail->Username = 'ngimwan@gmail.com';
	$mail->Password = 'mum1234,./';
	$mail->SMTPSecure = 'tls';
	$mail->Port = 587;

	$key 	= md5('australia');
	$salt 	= md5('australia');

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

	if (isset($_GET['p']) == false) {

		header('location: '. $server.'/admin/login/get-email.php');
		exit();

	}

	$kay = $_GET['p'];

	$get = mysqli_query($dbconnect, "SELECT * FROM mj_admin WHERE activation_key = '$kay'");

	if (mysqli_num_rows($get) == false) {

		header('location: '. $server.'/admin/login/get-email.php');
		exit();
	}

	while ($rowp = mysqli_fetch_assoc($get)) {
		$id 	= $rowp['id'];
		$uname 	= decrypt($rowp['user_name'],$key);
		$pass 	= $rowp['password'];
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	    <link rel="shortcut icon" type="image/x-icon" href="../../images/icon-title.jpg" />
		<title>Reset Your Password!</title>
		<script src="js/jquery-1.11.0.min.js"></script>
		<link href="css/bootstra.css" rel="stylesheet" type="text/css" media="all"/>
		<link href="css/login.style.css" rel="stylesheet" type="text/css" media="all"/>
		<!--google fonts-->
		<link href='//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
		<!--close effect -->
		<script>
			$(document).ready(function(c) {
				$('.log-close').on('click', function(c){
					$('.login-bottom').fadeOut('slow', function(c){
				  		$('.login-bottom').remove();
					});
				});	  
			});
		</script>
	</head>
	<body>
		<h1>Reset Password Form</h1>
		<div class="has-error" style="width: 22.2%;margin: 0 auto;"></div>
		<div class="login">
			<div class="rib"></div>
			<div class='error'>
			<?php

				if (isset($_POST['reset'])) {
					
					$p1 = trim($_POST['pword1']);
					$p2 = trim($_POST['pword2']);

					if ($p1 != "" || $p1 != NULL) {
						if ($p1 === $p2) {

							$p = hashword($p1, $salt);

							if ($p != $pass) {

								$updatep = mysqli_query($dbconnect, "UPDATE mj_admin SET password = '$p' WHERE id = '$id'");
								$updatek = mysqli_query($dbconnect, "UPDATE mj_admin SET activation_key = '' WHERE id = '$id'");

								// send mail here code..
								$mail->setFrom('service@majirani.com', 'Password Reset!');
								$mail->addAddress('delinkdeveloper@gmail.com', $uname);
								$mail->addReplyTo('info@majirani.com', 'Info');
								$mail->isHTML(true);

								$mail->Subject = $uname.', Your password was successfuly reset';
								$mail->Body    = "
								<div style='background:#dfdfdf;padding:5% 0;'>
									<h2 style='margin:0 auto; margin-bottom:10px; width:75%;'>Majirani Music Site</h2>
									<div style='width:75%;margin:0 auto;background:#fff;padding:15px;'>
										<h3>Hay $uname,</h3>
										<p style='font-size:17px;color:#333;'>
											<b>Thank you,</b> This is to confirm that you have susscessfuly changed your password. Your password is now set to the new one.
										</p>
									</div>
								</div>";

								$mail->AltBody = 'Password reset successful';

								if ($mail->send()) {

									header('location: '. $server . '/admin/login/index.php');
									exit();
								}
									header('location: '. $server . '/admin/login/index.php');
									exit();
							}else
								echo "
									<div class='alert alert-danger' role='alert' style='margin-top: 15px;'>
										New password cant be as Old one!
									</div>
								";

						}else
							echo "
								<div class='alert alert-danger' role='alert' style='margin-top: 15px;'>
									Password does <strong>NOT!</strong> match!!!
								</div>
							";
					}else
						echo "
							<div class='alert alert-danger' role='alert' style='margin-top: 15px;'>
								Make sure you enter password!!
							</div>
						";
				}
			?>
			</div>
			<h2>Reset Your Password</h2>
			<form action="#" method="post">

				<input type="password" name="pword1" placeholder="New password"/>
				<input type="password" name="pword2" placeholder="Re-Enter Password"/>

				<div class="remember">
					<div class="send">
						<input type="submit" value="Reset Password" name="reset">
					</div>
					<div class="clear"> </div>
				</div>

			</form>

			<?php
				session_destroy();
			?>
		</div>	
	</body>
</html>