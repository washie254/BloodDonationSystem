<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>

	<div class="header">
		<h2>~ BODY LOGIN ~</h2>
	</div>
	
	<form method="post" action="body_login.php">

		<?php include('errors.php');?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_body">Login</button>
		</div>
		<p>
			Not Registered ? <a href="body_reg.php">Sign up</a>
		</p>
		<p><a href="admin_login.php">ADMIN LOGIN</a></p>
        
	</form>


</body>
</html>