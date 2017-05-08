<?php

	include 'includes/header.php';

?>
	<body>
		
		<?php include 'dir/top.php'; ?>

		<div class="container">
			<!-- Side-Bar -->
			<?php include 'dir/side.php'; ?>

			<!-- Main body -->
			<div class="col-md-8" id="main">
				<div class="col_3 group">
					<div class="panel-heading">
						<h2 class="c_n_h">Reporting <small>Page</small></h2>
						<hr>
					</div>
					<div class="col-md-12 widget c_n">
			            <div class="r3_counter_box">
							<?php 

								if ($_GET['e'] OR $_GET['g']) {

									$e = $_GET['e'];
									$g = $_GET['g'];

									if ($g == 'rest') {
										echo "
											<div class='alert alert-success'>
							            		<strong>DELETING SUCCESS: </strong>The company name has been <strong>Restored</strong> Successfully.
							            	</div>
										";
									}
									if ($g == 'saved') {
										echo "
											<div class='alert alert-success'>
							            		<strong>SAVED SUCCESS: </strong>The new User was <strong>Saved</strong> Successfully.
							            	</div>
										";
									}
									if ($e == 'not-admin') {
										echo "
											<div class='alert alert-danger'>
							            		<strong>YOU NOT ADMIN: </strong>You are not parmited to take that action, You are NOT an <strong>ADMIN</strong> you must be an admin.
							            	</div>
										";
									}
									if ($e == 'user-a') {
										echo "<div class='alert alert-danger margin-15' >
												<h4><strong>USER EXIST: </strong> The user name you are tring to add already exist in our database. Please use som eother names!</h4>
											</div>";
									}
									if ($e == 'email-a') {
										echo "<div class='alert alert-danger margin-15' >
												<h4><strong>EMAIL EXIST: </strong> The Email address you are tring to use already exist in our database, someone else is using the same eamil, Please use some other email!</h4>
											</div>";
									}
									if ($e == 'save-e') {
										echo "
											<div class='alert alert-danger'>
							            		<strong>SAVING ERROR: </strong>The process of saving your record was not successful, please try again later.
							            	</div>
										";
									}
									if ($e == 'tbl') {
										echo "
											<div class='alert alert-danger'>
							            		<strong>TABLE ERROR: </strong>The table you are tring to access is not available or may have encountered some errors. Table not found ~~~ contact us for help.
							            	</div>
										";
									}
									if ($e == 'tbl-false') {
										echo "
											<div class='alert alert-danger'>
							            		<strong>DATA ERROR: </strong>The table you are tring to access HAS NO RECORDED DATA ata this time  ~~~ contact us for help.
							            	</div>
										";
									}
									if ($e == 'del') {
										echo "
											<div class='alert alert-danger'>
							            		<strong>DELETING ERROR: </strong>The Record you tried deleting encountered som errors try again after some time!
							            	</div>
										";
									}
									if ($g == 'del') {
										echo "
											<div class='alert alert-success'>
							            		<strong>DELETE SUCCESS: </strong>The Record has been deleted Successfully.
							            	</div>
										";
									}
									

								}else

									include 'dir/dashboard.php';
							?>
						</div>
			        </div>
				</div>
			</div>
		</div>

		<?php include 'includes/footer.php'; ?>