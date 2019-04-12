<?php echo validation_errors(); ?>
<?php echo form_open('users/register'); ?>
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h2 class="text-center"><?php echo $title ?></h2>
			<div class="form-group">
				<label>Firstname</label>
				<input type="text" class="form-control" name="fname" placeholder="Firstname" />
			</div>
			<div class="form-group">
				<label>Middlename</label>
				<input type="text" class="form-control" name="mname" placeholder="Middlename" />
			</div>
			<div class="form-group">
				<label>Lastname</label>
				<input type="text" class="form-control" name="lname" placeholder="Lastname" />
			</div>
			<div class="form-group">
				<label>Birthday</label>
				<input type="text" class="form-control" name="bday" placeholder="Birthday" />
			</div>
			<div class="form-group">
		    	<label>Gender</label>
		    	<select name="gender" class="form-control">
		    			<option value="M">Male</option>
		    			<option value="F">Female</option>
		    	</select>
		    </div>
		    <div class="form-group">
				<label>Address</label>
				<input type="text" class="form-control" name="address" placeholder="Home Address" />
			</div>
			<div class="form-group">
				<label>Username</label>
				<input type="text" class="form-control" name="username" placeholder="Username" />
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" class="form-control" name="password" placeholder="Password" />
			</div>
			<div class="form-group">
				<label>Confirm Password</label>
				<input type="password" class="form-control" name="conpassword" placeholder="Confirm Password" />
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="email" class="form-control" name="email" placeholder="Email" />
			</div>
			<button type="submit" class="btn btn-success btn-block">Register</button>
		</div>
	</div>
<?php echo form_close();?>