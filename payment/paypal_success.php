<?php

	// error_reporting(0);

	include '../includes/server.php';
	include '../includes/database.php';

	session_start();

	// encripting data and passwords using.
    $key 	= md5('australia');

	// Decrypt
    function decrypt($string, $key) {

        $string = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, base64_decode($string), MCRYPT_MODE_ECB));
        return $string;
    }

	if (!$_SESSION['id']) {

		echo "Go back to the begging of times";
		exit();
	}

	$code = $_SESSION['id'];

	// Get customer details from on holdNames table
	$get_n = "SELECT * FROM reserved_names WHERE payment_id = '$code'";

	$query = mysqli_query($connect, $get_n)or die($connect);

	$num = mysqli_num_rows($query);

	if ($num == 0) {

		echo "Go back";
		exit();

	}

	while ($row = mysqli_fetch_assoc($query)) {
		$cname = decrypt($row['company_name'],$key);
		$fname = decrypt($row['first_name'],$key);
		$email = decrypt($row['user_email'],$key);
	}

?>
<!DOCTYPE html>
<html>
	<head>

		<title>Company Of Registrar Paypal success</title>
		<!-- CSS STYLES -->
		<link rel="stylesheet" type="text/css" href="<?php echo $server; ?>/styles/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $server; ?>/styles/layout.css" />
		<style type="text/css">
			.margin-15 {
				margin: 3% auto;
				width: 70%;
			}
			p {
				color: #333;
				padding: 10px;
				line-height: 27px;
			}
		</style>
	</head>
	<body>
		<div class="wrapper group">
			<div class="header group">
				<div class="logo group">
					<img src="<?php echo $server; ?>/images/kenya_logo.png">
				</div>
				<div class="head group">
                    <img src="<?php echo $server;?>/images/kenya_flag.png" id="flt_right">
                </div> 
			</div>
			<div class="main">
				<h2 class="pay-top">Company of Registrar Paypal payment Successful</h2>
				<div class="well well-sm margin-15">
					<p>
						<strong>Hi <?php echo $fname;?>,</strong><br>
						Your PayPal payment was received successfuly, And your company name <strong>"<?php echo $cname;?>"</strong> was reserved in our database. You have only <strong>30 Days</strong> to complete the process of registaring your company Otherwise we will no longer hold your name.
					</p>
					<p>
						A confirmation email was sent to <strong><?php echo $email;?></strong>. Thank you for Trusting Us.
					</p>

					<div>
						<strong><a href="<?php echo $server; ?>" class="btn btn-success btn-block">Back Home</a></strong>
					</div>
				</div>
				<div class="nb">
					<p>
						<span>NOTE: </span><br>
						<small>Your Trancactions was successful, payment received. Now your name will be reserved for 30 Days to give you time to register your Company. Thank You For yousing Our Services.</small>
					</p>
				</div>
			</div>
			<div class="footer">
				All Rights Reserved, Company of Registrar <br> &copy; <?php echo date('Y'); ?>
				<span>Designed By: <a href="http://www.facebook.com/delinkwebArts">Delink</a></span>
			</div>
		</div>
		<script type="text/javascript">
			history.pushState(null, null, location.href);
				window.onpopstate = function(event) {
				    history.go(1);
			};
		</script>
	</body>
</html>