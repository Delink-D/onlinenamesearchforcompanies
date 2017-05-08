<?php
//  Get reserved names
    $d_names = mysqli_query($db, "SELECT * FROM deleted");
    $d_count = mysqli_num_rows($d_names);
?>
<div class="container-fluid top">
	<div class="container">
		<div class="left col-md-7">
			<h2>ADMIN PANEL</h2>
		</div>
		<div class="right col-md-4">
            <ul class="nav navbar-nav navbar-right in">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle avatar" data-toggle="dropdown" aria-expanded="true"><img src="images/co.png" id="img-top"><span class="badge"></span></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-menu-header text-center">
                            <strong>Account</strong>
                        </li>
                        <li class="m_2">
                        	<a href=""><i class="fa fa-envelope-o"></i> Messages
                        		<span class="label label-info clear">Un-read 3</span>
                            </a>
                        </li>
                        <li class="m_2"><a href=""><i class="fa fa-comments"></i> Comments
                            	<span class="label label-warning">3</span>
                        	</a>
                        </li>
                        <li class="dropdown-menu-header text-center">
                            <strong>Settings</strong>
                        </li>
                        <li class="m_2"><a href="<?php echo $server; ?>?p=8"><i class="fa fa-user"></i> Profile</a></li>
                        <li class="m_2"><a href="#"><i class="fa fa-wrench"></i> Settings</a></li>
                        <li class="m_2"><a href="<?php echo $server; ?>?p=5"><i class="fa fa-usd"></i> Payments</a></li>
                        <?php if ($role == 1) { echo "<li class='m_2'><a href='$server?p=4'><i class='fa fa-file'></i> Deleted Names <span class='label label-primary'>$d_count</span></a></li>"; } ?>
                        <li class="dropdown-menu-header text-center">
                            <strong>Extra</strong>
                        </li>
                        <li class="m_2"><a href="#"><i class="fa fa-shield"></i> Deactivate Account</a></li>
                        <li class="m_2"><a href="logout/logout.php"><i class="fa fa-lock"></i> Logout</a></li>
                    </ul>
                </li>
    		</ul>
    		<h4 class="top-h4">Hi, <?php echo $name; ?></h4>
		</div>
	</div>
</div>