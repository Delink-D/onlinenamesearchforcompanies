<div class="col-md-8" id="main">
	<div class="col_3 group">
		<div class="panel-heading">
			<h2 class="c_n_h">Airtel Money<small>Payments</small></h2>
			<hr>
		</div>
		<div class="col-md-12 widget c_n">
            <div class="r3_counter_box">
                <table class="table">
                	<thead>
                		<tr>
                			<th>N/A</th>
                			<th>Company Name</th>
                            <th>Payer Name</th>
                			<th>Payer NO.</th>
                			<th>Payer Email</th>
                            <th>Currency</th>
                            <th>Amount</th>
                		</tr>
                	</thead>
                	<tbody>
                		<?php
                			
                			$get = mysqli_query($db, "SELECT * FROM mpesa");

                			$count = 0;
                			$total = 0;
                			while ($row = mysqli_fetch_assoc($get)) {
                                $c_n    = decrypt($row['c_name'],$key);
                				$num 	= decrypt($row['payer_no'],$key);
                				$name 	= decrypt($row['payer_name'],$key);
                                $email  = decrypt($row['payer_email'],$key);
                                $amount = $row['amount'];
                				$currency= $row['currency'];
                                $total += $row['amount'];
                				
                				$count++;

                				echo "
	                				<tr>
			                			<td>$count.</td>
			                			<td>$c_n</td>
                                        <td>$name</td>
			                			<td>$num</td>
			                			<td>$email</td>
                                        <td>$currency</td>
                                        <td>$amount</td>
			                		</tr>
		                		";
                			}
                		?>
                            <tr>
                                <tfoot>
                                    <th colspan="5"></th>
                                    <th class="font-f">TOTAL</th>
                                    <th class="font-f">$ <?php echo $total; ?></th>
                                </tfoot>
                            </tr>
                	</tbody>
                </table>
            </div>
        </div>
	</div>
</div>