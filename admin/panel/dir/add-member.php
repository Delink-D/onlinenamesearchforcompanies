<div class="col-md-8" id="main">
	<div class="col_3 group">
		<div class="panel-heading">
			<h2 class="c_n_h">Add <small>Members</small></h2>
			<hr>
		</div>
		<div class="col-md-7 widget c_n">
            <div class="r3_counter_box group">
                <form class="form form-user" action="insert/member.php" method="post" id="newmember">
                     <h3 class="form-h">Add New User</h3>
                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" class="form-control" name="uname" placeholder="User Name">
                    </div>
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" name="fname" placeholder="First Name">
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="lname" placeholder="Last Name">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select class="form-control" name="role">
                            <option value="">Select Role</option>
                            <option value="1">Admin</option>
                            <option value="2">Member</option>
                        </select>
                    </div>
                     <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                     <div class="form-group">
                        <input type="submit" name="new" value="Add User" class="btn btn-success pull-right">
                    </div>
                </form>
            </div>
        </div>
	</div>
</div>