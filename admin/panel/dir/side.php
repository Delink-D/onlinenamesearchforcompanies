<div class="col-md-3" id="side-bar">
	<h2>SideBar</h2>
	<ul class="side-li">
		<a href="<?php echo $server; ?>index.php"><li><i class="fa fa-home"></i> Dashboard</li></a>
		<hr>
		<a href="<?php echo $server; ?>?p=1"><li><i class="fa fa-list"></i> Onhold Names</li></a>
		<a href="<?php echo $server; ?>?p=2"><li><i class="fa fa-list"></i> Reserved Names</li></a>
		<a href="<?php echo $server; ?>?p=3"><li><i class="fa fa-list"></i> Registered Names</li></a>
		<hr>
		<?php if ($role == 1) { echo "<a href='$server?p=4'><li><i class='fa fa-trash'></i> Deleted Names</li></a> <hr>"; } ?>

		<a href="<?php echo $server; ?>?p=5"><li><i class="fa fa-money"></i> Payments</li></a>
		<a href="<?php echo $server; ?>?p=6"><li><i class="fa fa-paypal"></i> Paypal</li></a>
		<a href="<?php echo $server; ?>?p=7"><li><i class="fa fa-mobile"></i> M-Pesa</li></a>
		<a href="<?php echo $server; ?>?p=11"><li><i class="fa fa-mobile"></i> Airtel Money</li></a>
		<hr>
		<a href="<?php echo $server; ?>?p=8"><li><i class="fa fa-user"></i> Profile</li></a>
		<?php if ($role == 1) { echo "<a href='$server?p=9'><li><i class='fa fa-plus'></i> Add Member</li></a>"; } ?>
		<a href="<?php echo $server; ?>?p=10"><li><i class="fa fa-eye"></i> View Members</li></a>
	</ul>
</div>