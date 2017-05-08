<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Company Of Registrar</title>

		<!-- jQuery Scrips -->
		<script type="text/javascript" src='js/jquery.js'></script>
		<script type="text/javascript" src='js/jquery-ui.js'></script>

		<script type="text/javascript" src='js/dist/jquery.validate.js'></script>
		<script type="text/javascript" src='js/dist/additional-methods.js'></script>

		<script type="text/javascript" src='js/myjs.js'></script>

		<!-- CSS STYLES -->
		<link rel="stylesheet" type="text/css" href="styles/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="styles/layout.css" />

		<script type="text/javascript">

			$("form").validate();

		</script>
	</head>
	<body>
		<div class="wrapper group">
			<div class="header group">
				<div class="logo group">
					<img src="images/kenya_logo.png">
				</div>
				<div class="head group">
					<img src="images/kenya_flag.png" id="flt_right">	
				</div>
			</div>
			<div class="main">
				<h1>Online Name Search For Companies</h1>
				
					<?php

						include 'includes/server.php';

						error_reporting(0);
						session_start();

						$msg  = $_GET['msg'];
						$name = $_SESSION['name'];

						if ($msg == 'good') {
							echo "
								<div class='has-success-div alert r-error'>
									The Company Name you just Searched <strong>''$name''</strong> is not in Use. You can Reserve <strong>''$name''</strong> Now <a class='btn btn-success btn-xs' href='$server/pages/reserve.php?name=$name'>Reserve</a>
								</div>
							";
						}
						if ($msg == 'saved') {
							echo "
								<div class='has-success-div alert r-error'>
									The Company Name <strong>''$name''</strong> Has been Reserved Successfuly
								</div>
							";
						}
						if ($msg == 'exist') {
							echo "
								<div class='has-error-div alert r-error'>
									The Company Name you just Searched <strong>''$name''</strong> is in Use. You can Try to Search a Different Name.
								</div>
							";
						}
						if ($msg == 'empty') {
							echo "
								<div class='has-error-div alert r-error'>
									The Company Name Cant be Empty Type in some wordings.
								</div>
							";
						}
					?>
				
				<div class="well index-search">
					<form id="indexsearch" action='includes/search.php' method="post"  name="form">
						<h4 class="small small-h4">Key in the full name you want to search...</h4>
						<div class="form-group form-group-search">
							<input type="text" name="search" placeholder="Search Name" autofocus class="form-control search">
						</div>
						<div class="form-group name-search">
							<input type="submit" value="Search" name="name_search" class="btn btn-primary">
						</div>
					</form>
				</div>
				
				<div class="nb">
					<p>
						<span>NOTE: </span><br>
						<small>The search will enable you to find whether your company name you want to register is taken or it can be used. You can proceed to reserve the name for your company, For a period of 30 Days.</small>
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