<div class="col-md-8" id="main">
	<div class="col_3 group">
		<div class="panel-heading">
			<h2 class="c_n_h">View <small>All Members</small></h2>
			<hr>
		</div>
		<div class="col-md-12 widget c_n">
            <div class="r3_counter_box">
                <table class="table">
                	<thead>
                		<tr>
                			<th>N/A</th>
                			<th>User Name</th>
                			<th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <?php if ($role == 1) { echo "<th>Action</th>"; } ?>
                		</tr>
                	</thead>
                	<tbody>
                		<?php
                			
                            error_reporting(0);

                			$get = mysqli_query($db, "SELECT * FROM admin");

                			$count = 0;

                			while ($row = mysqli_fetch_assoc($get)) {
                                $id     = $row['id'];
                				$u_name = decrypt($row['user_name'],$key);
                                $f_name = decrypt($row['first_name'],$key);
                				$l_name = decrypt($row['last_name'],$key);
                                $email1 = decrypt($row['user_email'],$key);
                				$role1 	= $row['role'];
                				
                				$count++;

                                if ($role1 == 1) {

                                    $rolee = "Admin";

                                }else {

                                    $rolee = "Member";
                                }

                				echo "
	                				<tr>
			                			<td>$count.</td>
			                			<td>$u_name</td>
                                        <td>$f_name</td>
			                			<td>$l_name</td>
                                        <td>$email1</td>
                                        <td>$rolee</td>
                                ";

                                if ($role == 1 AND $email1 != $email) { echo "<td><a href='delete/member.php?r=$id' class='btn btn-xs btn-danger'>Delete</a></td>"; }

                                echo "
			                		</tr>
		                		";
                			}
                		?>
                	</tbody>
                </table>
            </div>
        </div>
	</div>
</div>