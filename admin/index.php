<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	    <link rel="shortcut icon" type="image/x-icon" href="../../images/icon-title.jpg" />
		<title>Signin To Admin Panel</title>
		<script src="js/jquery.min.js"></script>
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
		<h1>Signin Account Admin</h1>
		<div class="has-error" style="width: 22.2%;margin: 0 auto;"></div>
		<div class="login">
			<div class="rib"></div>
			<div class='error'>
			<?php
				error_reporting(0);

				$msg = $_GET['msg'];

				if($msg == "input-email"){
					echo"
						<div class='alert alert-danger' role='alert'>
							You Must Provide your E-Mail.
						</div>
					";
				}
				if($msg == "input-password"){
					echo"
						<div class='alert alert-danger' role='alert'>
							You Must Provide your Password.
						</div>
					";
				}
				if($msg == "wrong-email"){
					echo"
						<div class='alert alert-danger' role='alert'>
							The User Does not Exist
						</div>
					";
				}
				if($msg == "wrong-password"){
					echo"
						<div class='alert alert-danger' role='alert'>
							The password is Incorrect
						</div>
					";
				}
			?>
			</div>
			<h2>Sign in to your account</h2>
			<form action="login.php" method="post">
				<input type="email" name="email" placeholder="User email"/>
				<input type="password" name="pword" placeholder="Your Password"/>
				<div class="remember">
					<span class="checkbox1">
						<a href="get-email.php" class="a-in">Forgot Password!</a>
					</span>
					<div class="send">
						<input type="submit" value="Sign In" name="login">
					</div>
					<div class="clear"> </div>
				</div>
			</form>
		</div>	
	</body>
</html>
