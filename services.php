<?php 
session_start(); 

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
			<link rel="stylesheet" href="css/nice-select.css">							
			<link rel="stylesheet" href="css/animate.min.css">
			<link rel="stylesheet" href="css/owl.carousel.css">			
			<link rel="stylesheet" href="css/jquery-ui.css">			
			<link rel="stylesheet" href="css/main.css">
		</head>
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
		  	  

			<!-- Start services Area -->
			<section class="services-area section-gap">
				<div class="container">
		            <div class="row d-flex justify-content-center">
		                <div class="menu-content  col-lg-7">
		                    <div class="title text-center">
		                        <h1 class="mb-10">Red-Cross Services</h1>
		                        <p>there are various services and events carried out by our system. these include but not limited to: </p>
		                    </div>
		                </div>
		            </div>						
					<div class="row">
						<div class="col-lg-4 col-md-6">
							<div class="single-services">
								<span class="lnr lnr-pie-chart"></span>
								<a href="#"><h4>Blood Donation</h4></a>
								<p>
									we carry out blod donationi drives across the various parts of the country, ehereby we get citizens can participatein donating blood
								</p>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="single-services">
								<span class="lnr lnr-laptop-phone"></span>
								<a href="emergencyreporting.php"><h4>Emergency Reporting</h4></a>
								<p>
								   Using our system., the citizens can be able to report emergencies and we can help in the manner we can
								</p>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="single-services">
								<span class="lnr lnr-camera"></span>
								<a href="#"><h4>Charity Activities</h4></a>
								<p>
									we also carry out charityevents like walks where we involve our members to take part in this events
								</p>
							</div>	
						</div>
																	
					</div>
				</div>	
			</section>
			<!-- End services Area -->				

			<!-- Start fact Area -->
			<section class="facts-area section-gap" id="facts-area">
				<div class="container">				
					<div class="row">
						<div class="col-lg-3 col-md-6 single-fact">
							<h1 class="counter">450</h1>
							<p>Projects Completed</p>
						</div>
						<div class="col-lg-3 col-md-6 single-fact">
							<h1 class="counter">8270</h1>
							<p>Red-cross members</p>
						</div>
						<div class="col-lg-3 col-md-6 single-fact">
							<h1 class="counter">320</h1>
							<p>Bood drive events</p>
						</div>	
						<div class="col-lg-3 col-md-6 single-fact">
							<h1 class="counter">150</h1>
							<p>partners & supporters</p>
						</div>												
					</div>
				</div>	
			</section>
			<!-- end fact Area -->						

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