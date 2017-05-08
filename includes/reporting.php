<!DOCTYPE html>
<html>
	<head>
		<title>Error Reporting!</title>
		<link rel="stylesheet" type="text/css" href="http://localhost/namesearch/styles/layout.css">
		<link rel="stylesheet" type="text/css" href="http://localhost/namesearch/styles/bootstrap.css">
	</head>
	<style type="text/css">
		.container {
			width: 1000px;
			min-height: 500px;
			background: #e4f0f5;
			border: 1px solid #4882b4;
		}
	</style>
	<body>
		<div class="container group">
			<?php

				include "server.php";
				
				error_reporting(0);
				session_start();

				$msg  = $_GET['msg'];
				$name = $_SESSION['name'];

				if ($msg == 'database') {
					echo "<div class='alert alert-danger margin-15'>
							<h3><strong>Database Connection Error:</strong> Database Encountered a problem when trying to Load.Contact your host If its Not a Network problem.</h3>
						</div>";
				}
				if ($msg == 'table') {
					echo "<div class='alert alert-danger margin-15' >
							<h4><strong>Table Connection Error: </strong> Table Encountered a problem when trying to Load.Table data was not loaded please contact us for help.</h4>
						</div>";
				}
				
				if ($msg == 'notsaved') {
					echo "<div class='alert alert-danger margin-15' >
							<h4><strong>Save Error: </strong> Table Encountered a problem when trying to Save.Your payment data information was not saved. Please contact us for such error!</h4>
						</div>";
				}
				if ($msg == 'notsent') {
					echo "<div class='alert alert-danger margin-15' >
							<h4><strong>Email Error: </strong> Payment received but email Was not sent, we encountered an error in sending you confirmation email. Please contact us to solve such errors in future. Thank you!</h4>
						</div>";
				}

				echo "<a href='$server' class='btn btn-primary btn-block'>Back Home</a>";
			?>
		</div>
	</body>
</html>