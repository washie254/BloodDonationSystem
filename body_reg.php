<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Body Registration</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
	<div class="header">
		<h2>Body Registration </h2>
	</div>
	
	<form method="post" action="body_reg.php" style="width:80%;">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username; ?>">
		</div>

		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>">
		</div>

        <div class="input-group">
			<label>Location</label>
			<input type="text" name="location">
		</div>

        <div class="input-group">
			<label>Category</label>
			<select type="text" name="category">
                <option value="Hospital">Hospital</option>
                <option value="Blood Bank">Blood Bank</option>
            </select>
		</div>

        <div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1">
		</div>

		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="reg_body">Register</button>
		</div>
		<p>
			Already registered <a href="body_login.php">Sign in</a>
		</p>
	</form>
</body>
</html>