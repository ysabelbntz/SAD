<?php 
include("layout2.php"); //this includes layout.php which contains the navbar and footer
?>

<div id="form_login">
	<form action="login.php" method="POST">

		<span class="glyphicon glyphicon-log-in" id="login_img"></span>

		
			<div id="login_label">
			<label class="control-label" for="username">Username </label>
			</div>
			<input type="username" name="username" class="form-control" id="username" placeholder="Email or Username">
		

		
			<div id="login_label">
			<label class="control-label" for="password">Password </label>
			</div>
			<input type="password" name="password" class="form-control" id="password" placeholder="Password">
		
			<div id="login_btn">
			<button type="submit" class="btn btn-default" id="login"> Login </button>
			</div>
	

	</form>
</div>