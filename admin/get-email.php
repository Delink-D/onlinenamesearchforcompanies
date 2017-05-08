<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	    <link rel="shortcut icon" type="image/x-icon" href="../../images/icon-title.jpg" />
		<title>Change Password!</title>
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
				error_reporting(0);
				session_start();

				$msg = $_GET['msg'];

				if($msg == "input-email"){
					echo"
						<div class='alert alert-danger' role='alert'>
							You Must Provide your E-Mail.
						</div>
					";
				}
				if($msg == "no-email"){
					echo"
						<div class='alert alert-danger' role='alert'>
							The Email is not in our Database!
						</div>
					";
				}
				if($msg == "sent"){

					$email = $_SESSION['email'];

					echo"
						<div class='alert alert-info' role='alert'>
							A reset link has been sent to <strong>$email</strong>
						</div>
					";
				}
				if($msg == "down"){
					echo"
						<div class='alert alert-danger' role='alert'>
							The server is down Try later
						</div>
					";
				}
			?>
			</div>
			<h2>Provide Your Email</h2>
			<form action="check.php" method="post">
				<input type="email" name="email" placeholder="User email"/>
				<div class="remember">
					<span class="checkbox1">
						<span class="lbl-in">Have Account </span><a href="index.php" class="a-in"> LogIn!</a>
					</span>
					<div class="send">
						<input type="submit" value="Submit" name="get">
					</div>
					<div class="clear"> </div>
				</div>
			</form>
		</div>	
	</body>
</html>
