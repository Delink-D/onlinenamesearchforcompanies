<!DOCTYPE html>
<html>
	<head>
		<title>Error!</title>
		<link rel="stylesheet" type="text/css" href="http://localhost/namesearch/styles/layout.css">
		<style type="text/css">
			.results {
				margin-top: 10%;
				padding: 10px;
				border: 1px solid red;
			}
			.results p {
				line-height: 27px;
				padding: 10px;
			}
		</style>
	</head>
	<body>
		<div class="wrapper group">
			<div class="main">
				<div class="results">
					<?php

						error_reporting(0);
						session_start();

						$msg  = $_GET['msg'];
						$name = $_SESSION['name'];

						if ($msg == 'good') {
							echo "<p class='good'>The Company Name you just Searched <span>''$name''</span> is not in Use. You can Reserve <span>''$name''</span> Now <a href='http://localhost/namesearch/pages/reserve.php?name=$name'>Reserve</a></p>";						}
						if ($msg == 'saved') {
							echo "<p class='good'>The Company Name <span>''$name''</span> Has been Reserved</p>";
						}
						if ($msg == 'exist') {
							echo "<p class='exist'>The Company Name you just Searched <span>''$name''</span> is in Use. You can Try to Search a Different Name.</p>";
						}
						echo '<p><a href="">yes</a></p>';
					?>
				</div>

			</div>
			home
		</div>
	</body>
</html>