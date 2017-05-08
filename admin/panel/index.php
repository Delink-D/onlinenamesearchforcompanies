<?php

	include 'includes/header.php';

?>
	<body>
		
		<?php include 'dir/top.php'; ?>

		<div class="container">
			<!-- Side-Bar -->
			<?php include 'dir/side.php'; ?>

			<!-- Main body -->
			<?php 

				if ($_GET['p']) {

					$p = $_GET['p'];

					if ($p == 1) {

						include 'dir/hold.php';
					}
					if ($p == 2) {

						include 'dir/reserved.php';
					}
					if ($p == 3) {

						include 'dir/registered.php';
					}
					if ($p == 4 AND $role == 1) {

						include 'dir/deleted.php';
					}
					if ($p == 5) {

						include 'dir/payment.php';
					}
					if ($p == 6) {

						include 'dir/paypal.php';
					}
					if ($p == 7) {

						include 'dir/mpesa.php';
					}
					if ($p == 8) {

						include 'dir/profile.php';
					}
					if ($p == 9) {

						include 'dir/add-member.php';
					}
					if ($p == 10) {

						include 'dir/view-member.php';
					}
					if ($p == 11) {

						include 'dir/airtel.php';
					}

				}else

					include 'dir/dashboard.php';
			?>

		</div>

		<?php include 'includes/footer.php'; ?>