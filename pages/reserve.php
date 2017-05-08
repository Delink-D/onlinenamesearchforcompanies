<?php
	
	error_reporting(0);

	session_start();

	include '../includes/server.php';

	if (!isset($_GET['name'])) {
		
		if (!$_SESSION['name']) {

			header('location: ' . $server);
			exit();

		} else

		$cname = $_SESSION['name'];
	}

		$name = $_GET['name'];

		$key 	= md5('australia');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Company Of Registrar</title>

		<!-- CSS STYLES -->
		<link rel="stylesheet" type="text/css" href="../styles/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="../styles/layout.css" />

		<!-- jQuery Scrips -->
		<script type="text/javascript" src='../js/jquery.js'></script>
		<script type="text/javascript" src='../js/jquery-ui.js'></script>

		<script type="text/javascript" src='../js/dist/jquery.validate.js'></script>
		<script type="text/javascript" src='../js/dist/additional-methods.js'></script>

		<script type="text/javascript" src='../js/myjs.js'></script>

		<script type="text/javascript">

			$("form").validate();

		</script>
	</head>
	<body>
		<div class="wrapper group">
			<div class="header group">
				<div class="logo group">
					<img src="../images/kenya_logo.png">
				</div>
				<div id="head">
						
				</div>
				<img src="../images/kenya_flag.png" id="flt_right">
			</div>
			<div class="main">
				<h1>Reserve Your Company Name Online</h1>

					<?php

						error_reporting(0);
						session_start();

						$msg  	= $_GET['msg'];

						if ($msg == 'exist-in-company') {
							echo "
								<div class='has-error-div alert r-error'>
									The Company Name you Want to Reserve <strong>''$cname''</strong> is a Registered Company. Try some other Name.
								</div>
							";
						}
						if ($msg == 'exist-in-reserved') {
							echo "
								<div class='has-error-div alert r-error'>
									The Company Name you Want to Reserve <strong>''$cname''</strong> is a Reserved Name. Try some other Name.
								</div>
							";
						}
						if ($msg == 'missing-company-name') {
							echo "
								<div class='has-error-div alert r-error'>
									You Cant Reserve a Blank Company Name Go Back <a href='$server' class='btn btn-danger btn-xs'>Home</a>
								</div>
							";
						}
						if ($msg == 'missing-first-name') {
							echo "
								<div class='has-error-div alert r-error'>
									You Missed Out Your First Name, Indicate Your First Name.
								</div>
							";
						}
						if ($msg == 'missing-last-name') {
							echo "
								<div class='has-error-div alert r-error'>
									You Missed Out Your Last Name, Indicate Your Last Name.
								</div>
							";
						}
						if ($msg == 'missing-phone-number') {
							echo "
								<div class='has-error-div alert r-error'>
									You Missed Out Your Phone Number, Indicate Your Phone Number.
								</div>
							";
						}
						if ($msg == 'missing-national-id') {
							echo "
								<div class='has-error-div alert r-error'>
									You Missed Out Your National ID, Indicate Your National ID.
								</div>
							";
						}
						if ($msg == 'missing-email-id') {
							echo "
								<div class='has-error-div alert r-error'>
									You Missed Out Your Email Address, Indicate Your Email Address.
								</div>
							";
						}

					?>
					<p class="exist" id="error"></p>
				
				<div class="well well-reserve">
					
					<form id="reserve" action='../includes/reserve.php' method="post" name="ReservForm">
						<div class="form-group group cname-group">
							<label>Company Name  </label>
							<input type="text" size='40' readonly value="<?php if (!isset($_GET['name'])) { echo $cname; }else echo $name; ?>" name='cname' class='form-control cname'>
						</div>
						<div class="form-group group col-md-6">
							<label>Your First Name : </label>
							<input type="text"  size='20' maxlength="20" name="fname" placeholder='Your First Name' autofocus class='form-control'>
						</div>
						<div class="form-group group col-md-6">
							<label>Your Last Name : </label>
							<input type="text"  size='20' maxlength="20" name="lname" placeholder='Your Last Name' autofocus class='form-control'>
						</div>
						<div class="form-group group col-md-6">
							<label>Id Number : </label>
							<input type="number"  size='15' maxlength="15" name="id" placeholder='Your ID Number' class='form-control'>
						</div>
						<div class="form-group group col-md-6">
							<label>Phone Number : </label>
							<input type="number"  size='15' maxlength="15" name="phone" placeholder='Your Phone Number' class='form-control'>
						</div>
						<div class="form-group group col-md-6">
							<label>Your Email Address : </label>
							<input type="email"  size='30' maxlength="30" name="email" placeholder='Your Email' class='form-control'>
						</div> 
						<div class="form-group group name-search2 col-md-6">
							<input type="submit" name="reserve" value="Reserve Name" class="btn btn-primary">
						</div>
						<div class="clearfix"></div>
					</form>
				</div>
				
				<div class="nb-r">
					<p>
						<span>NOTE: </span><br>
						<small>BY hiting Reserve Name You Agree to Terms And Condition, Also a charge amounting to KSH. 300.00 may dedacted from your Account.</small>
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