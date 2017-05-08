<div class="col-md-8" id="main">
	<div class="col_3 group">
		<div class="panel-heading">
			<h2 class="c_n_h">Reserved <small>Company Names</small></h2>
			<hr>
		</div>
		<div class="col-md-12 widget c_n">
            <div class="r3_counter_box">
                <table class="table">
                	<thead>
                		<tr>
                			<th>N/A</th>
                			<th>Company Name</th>
                			<th>First Name</th>
                			<th>User Email</th>
                			<th>Date/Time</th>
                			<?php if ($role == 1) { echo "<th>Action</th>"; } ?>
                		</tr>
                	</thead>
                	<tbody>
                		<?php
                			
                			$get = mysqli_query($db, "SELECT * FROM reserved_names");

                			$count = 0;
                			
                			while ($row = mysqli_fetch_assoc($get)) {
                				$id 	= $row['id'];
                				$c_n 	= decrypt($row['company_name'],$key);
                				$name 	= decrypt($row['first_name'],$key);
                				$email 	= decrypt($row['user_email'],$key);
                				$time 	= $row['created_at'];
                				$count++;

                				echo "
	                				<tr>
			                			<td>$count.</td>
			                			<td>$c_n</td>
			                			<td>$name</td>
			                			<td>$email</td>
			                			<td>$time</td>
			                		";
			                			if ($role == 1) {
			                				echo "<td><a href='delete/delete.php?r=$id' class='btn btn-xs btn-danger'>Delete</a></td>";
			                			}
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