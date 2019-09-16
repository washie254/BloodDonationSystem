<?php require('server.php');
error_reporting(0);
 ?>
<?php 
//session_start(); 

if (!isset($_SESSION['username'])) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['username']);
	header("location: login.php");
}
?>
	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Personal</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/jquery-ui.css">				
			<link rel="stylesheet" href="css/nice-select.css">							
			<link rel="stylesheet" href="css/animate.min.css">
			<link rel="stylesheet" href="css/owl.carousel.css">					
			<link rel="stylesheet" href="css/main.css">
			<link rel="stylesheet" href="tabs.css">
	</head>

	<!-- :::::::::: get currently logedin USER DETAILS :::::::::::::::::::: -->
	<?php
	  $username = $_SESSION['username'];
	  $con = mysqli_connect('localhost', 'root', '', 'blood_donation_system');
	  $query = "SELECT * FROM users WHERE username='$username'";
	  $result = mysqli_query($con, $query);
	  while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
		  $uid = $row[0]; //user id
		  $uname = $row[1]; //username
		  $uemail = $row[2]; //email
	  }
	?>
    <body>	
		<header id="header">
		    <div class="container main-menu">
		    	<div class="row align-items-center justify-content-between d-flex">
			      <div id="logo">
			        <a href="index.html"><img src="img/logo.png" alt="" title="" /></a>
			      </div>
			      <nav id="nav-menu-container">
			        <ul class="nav-menu">
			          <li><a href="index.php">Home</a></li>
			          <li><a href="about.php">Profile</a></li>
			          <li><a href="services.php">Services</a></li>
					  <li><a href="emergencyreporting.php">Report Em.</a></li>
					  <li><a href="contact.php">Contact</a></li>
					  <li> <a href="index.php?logout='1'" style="color: red;">logout</a> </li>
					  <li><img src="img/user2.png" style="width:30px;height:30px;" alt="" title="" /><strong><?php echo $_SESSION['username']; ?></strong></li>
			        </ul>
				  </nav><!-- #nav-menu-container -->
		    	</div>
		    </div>
		  </header><!-- #header -->	

			<!-- Start home-about Area -->
			<section class="home-about-area section-gap">
				<div class="container">
					<div class="row align-items-center justify-content-between">
						<!-- =======================================================================
							USER PROFILE	
						======================================================================= -->
						<div class="container bootstrap snippet">
							<div class="row">
								<div class="col-sm-3"><!--left col-->
									<div class="text-center">
										<img src="img/user2.png" class="avatar img-circle img-thumbnail" alt="avatar">
									</div><br>
								
									<ul class="list-group">
										<li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
										<li class="list-group-item text-right"><span class="pull-left"><strong>Shares</strong></span> 125</li>
									</ul> 
			
								</div><!--/col-3-->

								<div class="col-sm-9">
        
								<hr>
								<link rel="stylesheet" href="tabs.css">
								<h2>Tabs</h2>
								<p>Click on the x button in the top right corner to close the current tab:</p>

								<div class="tab">
									<button class="tablinks" onclick="openCity(event, 'View')" id="defaultOpen">View Profile</button>
									<button class="tablinks" onclick="openCity(event, 'Update')">Update Profile</button>
									<button class="tablinks" onclick="openCity(event, 'Tokyo')">More</button>
								</div>

								<div id="View" class="tabcontent">
								<span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
								<h3>Bio Information</h3>
								<p>the folowing are your details.</p>
								<table class="table">
									<thead>
										<tr>
											<th scope="col">Avatar</th>
											<th scope="col">Information</th>
										</tr>
									</thead>
									  <?php
										  	$query2 = "SELECT * FROM userprofile WHERE userID='$uid'";
										  	$result2 = mysqli_query($con, $query2);
											while($row = mysqli_fetch_array($result2, MYSQLI_NUM)){
												$names = $row[4]." ".$row[5];
												$bt = $row[7];
												$rh = $row[8];
												$dob = $row[9];
												$county = $row[10];
												$phone = $row[6];

											}
										  
									  	?>
									<tr style="width:200px;">
										<td style="width: 90px;"><img src="img/avatar.png" style="width:150px; height:150px;"></td>
										<td>
											<label>User ID: &nbsp;&nbsp;<?php echo $uid; ?></label><br>
											<label>Username :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $uname; ?></label><br>
											<label>Other Names:&nbsp;<?php echo $names; ?></label><br>
											<label>Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $uemail; ?></label><br>
	  									
										</td>
										<td>
											<label>Blood Type: &nbsp;&nbsp;<?php echo $bt." ".$rh; ?></label><br>
											<label>Date of Birth  :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $dob; ?></label><br>
											<label>County:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo  $county; ?></label><br>
	  										<label>TEL :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $phone; ?></label>
										</td>
									</tr>
								</table>

								</div>

								<div id="Update" class="tabcontent">
								<span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
								<h3>Update Profile</h3>
								<p>Update your Bio Information.</p> 
								<style>
								  	.error {
										width: 100%; 
										margin: 0px auto; 
										padding: 10px; 
										border: 1px solid #a94442; 
										color: #a94442; 
										background: #f2dede; 
										border-radius: 5px; 
										text-align: left;
									}
								</style>
								 <?php require('errors.php'); ?>
								 	<?php 
										$resultz = mysqli_query($con,"SELECT * FROM userprofile WHERE userID='$uid'");
										$rowz= mysqli_fetch_array($resultz);
									?>
									<form class="form" action="about.php" method="post">
									<div class="form-group">
										
										<div class="col-xs-6">
											<label for="first_name"><h4>First name</h4></label>
											<input type="text" class="form-control" name="fname" id="first_name" value="<?php echo $rowz['firstName']; ?>">
										</div>
										</div>
										<div class="form-group">
											
											<div class="col-xs-6">
												<label for="last_name"><h4>Last name</h4></label>
												<input type="text" class="form-control" name="lname" id="last_name" value="<?php echo $rowz['lastName']; ?>">
											</div>
										</div>
							
										<div class="form-group">	
											<div class="col-xs-6">
												<label for="phone"><h4>Phone</h4></label>
												<input type="text" class="form-control" name="phone" id="phone" value="<?php echo $rowz['telNo']; ?>">
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-6">
												<label for="email"><h4>Email</h4></label>
												<input type="email" class="form-control" name="email" id="email" value="<?php echo $rowz['userEmail']; ?>">
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-6">
												<label for="bloodtype"><h4>Blood Type</h4></label>
												<select class="form-control" name="bloodtype" id="bloodType">
													<strong>
													<option>A</option>
													<option>B</option>
													<option>AB</option>
													<option>O</option>
													</strong>
												</select>
												<label for="rhFactor"><h4>RH Factor</h4></label><br>
												<input type="radio" name="rh" value="+" checked><strong> + </strong>( positive )<br>
												<input type="radio" name="rh" value="-"> <strong> - </strong>( negative )<br>
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-6">
												<label for="county"><h4>County of Residence</h4></label>
												<input type="text" class="form-control" name="county" value="<?php echo $rowz['location']; ?>">
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-6">
												<label for="dateofbirth"><h4>Date Of Birth</h4></label>
												<input type="date"   class="form-control" id="datepicker" name='dob' size='9' value="<?php echo $rowz['dob']; ?>" />
											</div>
										</div>
	  									<div class="form-group">
										  <input type="text" name="uname" value="<?=$uname?>" style="opacity: 0;" />
										  <input type="text" name="uid" value="<?=$uid?>" style="opacity: 0;" />
										  <input type="text" name="uemail" value="<?=$uemail?>" style="opacity: 0;" />
										</div>

										<div class="form-group">
											<div class="col-xs-12">
													<br>
													<button class="btn btn-lg btn-success" type="submit" name="Add_prof"><i class="glyphicon glyphicon-ok-sign"></i> UPDATE PROFILE</button>
												</div>
										</div>
									</form>
								</div>

								<div id="Tokyo" class="tabcontent">
								<span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
								<h3>MORE INFO</h3>
								<p> hajh hj hajhaj .</p>
								</div>

								<script>
									function openCity(evt, cityName) {
										var i, tabcontent, tablinks;
										tabcontent = document.getElementsByClassName("tabcontent");
										for (i = 0; i < tabcontent.length; i++) {
											tabcontent[i].style.display = "none";
										}
										tablinks = document.getElementsByClassName("tablinks");

										for (i = 0; i < tablinks.length; i++) {
											tablinks[i].className = tablinks[i].className.replace(" active", "");
										}
										document.getElementById(cityName).style.display = "block";
										evt.currentTarget.className += " active";
									}

									// Get the element with id="defaultOpen" and click on it
									document.getElementById("defaultOpen").click();
								</script>
							</div><!--/col-9-->
						</div><!--/row-->
					</div>
				</div>	
			</section>
		<!-- End home-about Area -->	
	

		<!-- start footer Area -->
		<!-- start footer Area -->
		<footer class="footer-area section-gap">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-6 col-sm-6">
                            <div class="single-footer-widget">
                                <h4>About Me</h4>
                                <p>
								During a regular blood donation, we can give around 470 ml of whole blood. 
							This occupies nearly 8 or 9 percent of the average blood volume of an adult person. 
							Soon after the regeneration of blood process will starts. 
                                </p>
                                <p class="footer-text"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6 col-sm-6">
                            <div class="single-footer-widget">
                                <h4>Newsletter</h4>
                                <p>Stay updated with RedCross Events</p>
								<div class="" id="mc_embed_signup">
									 <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get">
									  <div class="input-group">
									    <input type="text" class="form-control" name="EMAIL" placeholder="Enter Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email Address '" required="" type="email">
									    <div class="input-group-btn">
									      <button class="btn btn-default" type="submit">
									        <span class="lnr lnr-arrow-right"></span>
									      </button>    
									    </div>
									    	<div class="info"></div>  
									  </div>
									</form> 
								</div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6 social-widget">
                            <div class="single-footer-widget">
                                <h4>Follow Me</h4>
                                <p>Let us be social</p>
                                <div class="footer-social d-flex align-items-center">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-dribbble"></i></a>
                                    <a href="#"><i class="fa fa-behance"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- End footer Area -->		

		<script src="js/vendor/jquery-2.2.4.min.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/vendor/bootstrap.min.js"></script>			
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>			
		<script src="js/easing.min.js"></script>			
		<script src="js/hoverIntent.js"></script>
		<script src="js/superfish.min.js"></script>	
		<script src="js/jquery.ajaxchimp.min.js"></script>
		<script src="js/jquery.magnific-popup.min.js"></script>	
		<script src="js/jquery.tabs.min.js"></script>						
		<script src="js/jquery.nice-select.min.js"></script>	
		<script src="js/isotope.pkgd.min.js"></script>			
		<script src="js/waypoints.min.js"></script>
		<script src="js/jquery.counterup.min.js"></script>
		<script src="js/simple-skillbar.js"></script>							
		<script src="js/owl.carousel.min.js"></script>							
		<script src="js/mail-script.js"></script>	
		<script src="js/main.js"></script>


	</body>
</html>