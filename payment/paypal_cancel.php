<?php
	
	error_reporting(0);

	include '../includes/server.php';
	include '../includes/database.php';
?>
<!DOCTYPE html>
	<html>
	<head>
		<title>PayPal Cancelation!</title>
		<link rel="stylesheet" type="text/css" href="/name_search/styles/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="/name_search/styles/layout.css">

		<style type="text/css">
			.margin-15 {
				margin: 3% auto;
				width: 70%;
			}
			.center {
				text-align: center;
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
				<div id="head">
						
				</div>
				<img src="<?php echo $server; ?>/images/kenya_flag.png" id="flt_right">
			</div>
			<div class="main">
				<h2 class="pay-top red">Company of Registrar PayPal payment Canceled!</h2>
				<div class="well well-sm margin-15">
					<p>
						You did not complete the process of paypal payment. If you wish to start all over again you can do that from the button below.
					</p>
					<p>
						Names will be Reserved once payment are received. Please complete the payment process. Thank You!
					</p>
					<div>
						<strong><a href="<?php echo $server; ?>" class="btn btn-danger btn-block">Back Home</a></strong>
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
	</body>
</html>