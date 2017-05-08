<?php
    
    //  Get searched names
    $s_names = mysqli_query($db, "SELECT search_count FROM searched_names");
    while ($row = mysqli_fetch_assoc($s_names)) {
        $s_count = $row['search_count'];
    }

    //  Get reserved names
    $r_names = mysqli_query($db, "SELECT * FROM reserved_names");
    $r_count = mysqli_num_rows($r_names);

    //  Get total amout sales
    $t_amount = mysqli_query($db, "SELECT * FROM payments");
    $t_count = 0;
    while ($row = mysqli_fetch_assoc($t_amount)) {
        $t_count += $row['amount'];
    }
?>
<div class="col-md-8" id="main">
	<div class="col_3">
        <div class="col-md-4 widget widget1">
            <div class="r3_counter_box">
                <i class="pull-left fa fa-table icon-rounded"></i>
                <div class="stats">
                  <h5><strong><?php echo $r_count; ?></strong></h5>
                  <span>New Reserved</span>
                </div>
            </div>
        </div>
        <div class="col-md-4 widget widget1">
            <div class="r3_counter_box">
                <i class="pull-left fa fa-search user1 icon-rounded"></i>
                <div class="stats">
                  <h5><strong><?php echo $s_count; ?></strong></h5>
                  <span>Search Names</span>
                </div>
            </div>
        </div>
        <div class="col-md-4 widget">
            <div class="r3_counter_box">
                <i class="pull-left fa fa-dollar dollar1 icon-rounded"></i>
                <div class="stats">
                  <h5><strong>$<?php echo $t_count; ?></strong></h5>
                  <span>Payment Today</span>
                </div>
            </div>
         </div>
        <div class="clearfix"> </div>
	</div>

	<!--  -->
	<div class="col_1 group">
		<div class="col-md-6 span_8">
			<div class="activity_box">
				
			</div>
		</div>
		<div class="col-md-6 span_8">
			<div class="activity_box">
				<div class="panel-heading">
                    <h4 class="panel-title">Browser Stats</h4>
                </div>
                <div class="panel-body">
                    <ul class="list-unstyled">
                        <li>Google Chrome<div class="text-success pull-right">12%<i class="fa fa-level-up"></i></div></li>
                        <li>Firefox<div class="text-success pull-right">15%<i class="fa fa-level-up"></i></div></li>
                        <li>Internet Explorer<div class="text-success pull-right">18%<i class="fa fa-level-up"></i></div></li>
                        <li>Safari<div class="text-danger pull-right">17%<i class="fa fa-level-down"></i></div></li>
                        <li>Opera<div class="text-danger pull-right">10%<i class="fa fa-level-down"></i></div></li>
                        <li>Mobile &amp; tablet<div class="text-success pull-right">14%<i class="fa fa-level-up"></i></div></li>
                        <li class="last">Others<div class="text-success pull-right">5%<i class="fa fa-level-up"></i></div></li> 
                    </ul>
                </div>
			</div>
		</div>
	</div>
</div>