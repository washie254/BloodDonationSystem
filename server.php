<?php 
	session_start();

	// variable declaration
	$username = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	$cdate = date("Y-m-d");
	$ctime = date("h:i:s");

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'dkut_blood_donation_system');

	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO users (username, email, password) 
					  VALUES('$username', '$email', '$password')";
			mysqli_query($db, $query);

			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: index.php');
		}

	}

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: index.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}

	if (isset($_POST['reg_admin'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO admins (username, email, password) 
					  VALUES('$username', '$email', '$password')";
			mysqli_query($db, $query);


			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: admin_index.php');
		}

	}

	// ... 

	
	// LOGIN THE ADMINISTRATOR
	if (isset($_POST['login_admin'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM admins WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: admin_index.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}
	

	// LOGIN USER [ DONE ]
	if (isset($_POST['Add_prof'])) {
		$fname = mysqli_real_escape_string($db, $_POST['fname']);
		$lname = mysqli_real_escape_string($db, $_POST['lname']);
		$phone = mysqli_real_escape_string($db, $_POST['phone']);
		$bloodtype =mysqli_real_escape_string($db, $_POST['bloodtype']);
		$rh = mysqli_real_escape_string($db, $_POST['rh']);
		$county =mysqli_real_escape_string($db, $_POST['county']);
		$dob = mysqli_real_escape_string($db, $_POST['dob']);
		
		$email = mysqli_real_escape_string($db, $_POST['uemail']);;
		$userid =mysqli_real_escape_string($db, $_POST['uid']);;
		$username = mysqli_real_escape_string($db, $_POST['uname']); ;

		if (empty($fname)) { array_push($errors, "First name is required"); }
		if (empty($lname)) { array_push($errors, "Last Name is required"); }
		if (empty($phone)) { array_push($errors, "Phone Required"); }
		if (empty($bloodtype)) { array_push($errors, "Select your blood type"); }
		if (empty($county)) { array_push($errors, "Insert county of residence"); }
		
		// form validation: ensure that the form is correctly filled
		function validate_phone_number($phone)
		{
			// Allow +, - and . in phone number
			$filtered_phone_number = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
			// Remove "-" from number
			$phone_to_check = str_replace("-", "", $filtered_phone_number);
			// Check the lenght of number
			// This can be customized if you want phone number from a specific country
			if (strlen($phone_to_check) < 9 || strlen($phone_to_check) > 14) {
			return false;
			} else {
			return true;
			}
		}
		//VALIDATE PHONE NUMBER 
		if (validate_phone_number($phone) !=true) {
			array_push($errors, "Invalid phone number");
		}

		if (count($errors) == 0) {
			$query = "UPDATE users
						SET  firstName = '$fname', lastName ='$lname', telNo ='$phone', bloodType='$bloodtype', rh='$rh', dob='$dob', location='$county'
						WHERE username ='$username'";
			$result = mysqli_query($db, $query);
		
			header('location:about.php');
		}


	}


	//  :::::::::::::::::::::::;REPORT EMERGENCY :::::::::::: 
	if (isset($_POST['ReportEmer'])) {
		$title = mysqli_real_escape_string($db, $_POST['emTitle']);
		$category = mysqli_real_escape_string($db, $_POST['emCategory']);
		$location = mysqli_real_escape_string($db, $_POST['emLocation']);
		$description = mysqli_real_escape_string($db, $_POST['emDescription']);
		$username = mysqli_real_escape_string($db, $_POST['userName']);
		$userid = mysqli_real_escape_string($db, $_POST['userId']);

		$stat = 'PENDING';

		$lat = $_POST['lat'];
		$lng = $_POST['lng'];

		$image = $_FILES['image']['name'];
		$target = "Empics/".basename($image);
		//VALIDATION OF INPUTS
		if (empty($title)) { array_push($errors, "insert title"); }
		if (empty($location)) { array_push($errors, "Add location"); }
		if (empty($description)) { array_push($errors, "Add a brief description"); }

		if (count($errors) == 0) {
			$sql = "INSERT INTO emergencies (title, category, image, location, lat, lng, datereported, timereported, userid, username, status ) 
								  VALUES ('$title','$category','$image','$location','$lat','$lng','$cdate','$ctime','$userid','$username', '$stat')";
			// execute query
			if(mysqli_query($db, $sql)){
			  header('location: emergencyreporting.php');
			}
			if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
			  $msg = "Image uploaded successfully";
			}else{
			  $msg = "Failed to upload image";
			}
		  }

	}

	//::::::::::::::::::::::::: REGISTER BODY ::::::::::::
	if (isset($_POST['reg_body'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$location = mysqli_real_escape_string($db, $_POST['location']);
		$category = mysqli_real_escape_string($db, $_POST['category']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
		$stat = 'PENDING APPROVAL';
		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }
		if (empty($location)) { array_push($errors, "Location is required"); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO body (username, email, password, location, category, status) 
					  VALUES('$username', '$email', '$password','$location','$category','$stat')";
			mysqli_query($db, $query);


			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: body_index.php');
		}

	}
	
	//::::::::::::::::::::::::::  LOGIN A BODY ::::::::::::::::::::::
	if (isset($_POST['login_body'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM body WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: body_index.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}

	if(isset($_POST['update_body'])){
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$location =mysqli_real_escape_string($db, $_POST['location']);
		$category = mysqli_real_escape_string($db, $_POST['category']);
		$aid = mysqli_real_escape_string($db, $_POST['aid']);

		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($location)) { array_push($errors, "Location required"); }

		if (count($errors) == 0) {
			$query = "UPDATE body
						SET   email='$email', category = '$category', location ='$location'
						WHERE id ='$aid'";
			$result = mysqli_query($db, $query);
		
			header('location:body_index.php');
		}
	}

	//REQUEST BLOOD
	//prequest
	//  :::::::::::::::::::::::;REPORT EMERGENCY :::::::::::: 
	if (isset($_POST['prequest'])) {
		$requstrid =mysqli_real_escape_string($db, $_POST['userId']);

		$query0 = "SELECT * FROM users WHERE id='$requstrid'";
		$result0 = mysqli_query($db, $query0);
		
		while($row = mysqli_fetch_array($result0, MYSQLI_NUM)){
			$bloodgroup=$row[7];
			$rh=$row[8];
		}
		
		$title = mysqli_real_escape_string($db, $_POST['title']);
		$description  = mysqli_real_escape_string($db, $_POST['description']);
		$location = mysqli_real_escape_string($db, $_POST['location']);
		$lat = $_POST['lat'];
		$lng = $_POST['lng'];
		$status = 'PENDING';	
		$facilityname = mysqli_real_escape_string($db, $_POST['facilityname']);
		$wardno	=mysqli_real_escape_string($db, $_POST['wardno']);
		$contactpersontel =mysqli_real_escape_string($db, $_POST['contactpersontel']);
		$contactpersonnames	= mysqli_real_escape_string($db, $_POST['contactpersonnames']);
		$nature	= mysqli_real_escape_string($db, $_POST['nature']);

		$phone = $contactpersontel;
		function validate_phone_number($phone)
		{
			// Allow +, - and . in phone number
			$filtered_phone_number = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
			// Remove "-" from number
			$phone_to_check = str_replace("-", "", $filtered_phone_number);
			// Check the lenght of number
			// This can be customized if you want phone number from a specific country
			if (strlen($phone_to_check) < 9 || strlen($phone_to_check) > 14) {
			return false;
			} else {
			return true;
			}
		}
		//VALIDATE PHONE NUMBER 
		if (validate_phone_number($phone) !=true) { array_push($errors, "Invalid phone number"); }
		//VALIDATION OF INPUTS
		if (empty($rh)) { array_push($errors, "Udate your profile first !"); }

		if (count($errors) == 0) {
			$sql = "INSERT INTO donationrequests 
			(requstrid, bloodgroup, rh, date, time, title, description, location, lat, lng, status, facilityname, wardno,contactpersontel, contactpersonnames, nature ) 
			VALUES 
			('$requstrid', '$bloodgroup', '$rh', '$cdate', '$ctime', '$title','$description', '$location', '$lat', '$lng', '$status', '$facilityname', '$wardno','$contactpersontel', '$contactpersonnames', '$nature' )";
			// execute query
			if(mysqli_query($db, $sql)){
			  header('location: about.php');
			}
		  }

	}
?>