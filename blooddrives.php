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
		<title>RED CROSS</title>

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
					  <li><a href="bdonation.php">Blood Donation</a></li>
			          <li><a href="services.php">Services</a></li>
			          <li><a href="charity.php">Charity</a></li>
					  <li><a href="emergencyreporting.php">Report Em.</a></li>
					  <li><a href="contact.php">Contact</a></li>
			          <li><a href="about.php">Profile</a></li>
					  <li> <a href="index.php?logout='1'" style="color: red;">logout</a> </li>
					  <li><img src="img/user2.png" style="width:30px;height:30px;" alt="" title="" /><strong><?php echo $_SESSION['username']; ?></strong></li>
			        </ul>
				  </nav><!-- #nav-menu-container -->
		    	</div>
		    </div>
		  </header><!-- #header -->

			<!-- Start home-about Area -->
			<section class="home-about-area pt-120">
				<div class="container">
					<div class="row align-items-center justify-content-between">
						<div class="col-lg-6 col-md-6 home-about-left">
							<img class="img-fluid" src="img/about-img.png" alt="">
						</div>
						<div class="col-lg-5 col-md-6 home-about-right">
							<h6>Donate Blood</h6>
							<h1 class="text-uppercase">Blood Banks</h1>
							<p>
								You can save a lie by donating your blood. this occurs in several ways. you can participate in ared cross blood directive
								which are events organised by the red cross team. you can view scheduled blood drive events <a href="blooddriives.php"> here </a>and where they are to happen. 
								also you can view requests from patients on the platform and offer to donate blood to them <a href="bdoonate.php">here</a>
							</p>
							<a href="bdonate.php" class="primary-btn text-uppercase">Donate Blood</a>
							<p></p>
						</div>
					</div>
				</div>	
			</section>
			<!-- End home-about Area -->

			<!-- Start home-about Area -->
			<section class="home-about-area pt-120">
				<div class="container">
					<div class="row align-items-center justify-content-between">
						<div class="col-lg-6 col-md-6 home-about-left">
							<img class="img-fluid" src="img/about-img.png" alt="">
						</div>
						<div class="col-lg-5 col-md-6 home-about-right">
							<h6>Request for Donation</h6>
							<h1 class="text-uppercase">Request Blood</h1>
							<p>
								incase you are in need of blood in a facility, you can request other donors on the platform 
								that match with regards to your blood type for donation. fill in the form here to request for blood 
								donation <a href="brequest.php">here</a>
							</p>
							<a href="#" class="primary-btn text-uppercase">View Full Details</a>
							<p></p>
						</div>
					</div>
				</div>	
			</section>
			<!-- End home-about Area -->

			<!-- Start fact Area -->
			<section class="facts-area section-gap" id="facts-area">
				<div class="container">				
					<div class="row">
						<div class="col-lg-3 col-md-6 single-fact">
							<h1 class="counter">2536</h1>
							<p>Projects Completed</p>
						</div>
						<div class="col-lg-3 col-md-6 single-fact">
							<h1 class="counter">6784</h1>
							<p>Happy Clients</p>
						</div>
						<div class="col-lg-3 col-md-6 single-fact">
							<h1 class="counter">2239</h1>
							<p>Cups of Coffee</p>
						</div>	
						<div class="col-lg-3 col-md-6 single-fact">
							<h1 class="counter">435</h1>
							<p>Real Professionals</p>
						</div>												
					</div>
				</div>	
			</section>
			<!-- end fact Area -->	

				

			<!-- Start testimonial Area -->
		    <section class="testimonial-area section-gap">
		        <div class="container">
		            <div class="row d-flex justify-content-center">
		                <div class="menu-content pb-70 col-lg-8">
		                    <div class="title text-center">
		                        <h1 class="mb-10">Client’s Feedback About The Blood Donation System</h1>
		                        <p>It is very easy to donate blood for patients across the county.</p>
		                    </div>
		                </div>
		            </div>
		            <div class="row">
		                <div class="active-testimonial">
		                    <div class="single-testimonial item d-flex flex-row">
		                        <div class="thumb">
		                            <img class="img-fluid" src="img/elements/user1.png" alt="">
		                        </div>
		                        <div class="desc">
		                            <p>
									   I needed blood urgently. i was hospitalized at PGH Nyeri,
									    and was able to access the blod donation service with the help of this system easiily	     
		                            </p>
		                            <h4>Harriet Wanja</h4>
		                            <p>Patrol Officer</p>
		                        </div>
		                    </div>
		                    <div class="single-testimonial item d-flex flex-row">
		                        <div class="thumb">
		                            <img class="img-fluid" src="img/elements/user2.png" alt="">
		                        </div>
		                        <div class="desc">
		                            <p>
										i have used the system to pprovide blood to patients that were in need of the blood severally. 
										it is quite an efficient and effective system
		                            </p>
		                            <h4>Wanjugu Betrice</h4>
		                            <p>Student at Dedan Kimathi</p>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </section>
		    <!-- End testimonial Area -->

			<!-- Start recent-blog Area -->
			<section class="recent-blog-area section-gap">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-md-8 pb-30 header-text">
							<h1>UPCOMING EVENTS</h1>
							<p>
								All are welcome to be part of the ongoing events by the redcross team. the following are the major events to take place
							</p>
						</div>
					</div>
					<div class="row">	
						<div class="single-recent-blog col-lg-4 col-md-4">
							<div class="thumb">
								<img class="f-img img-fluid mx-auto" src="img/b1.jpg" alt="">	
							</div>
							<div class="bottom d-flex justify-content-between align-items-center flex-wrap">
								<div>
									<img class="img-fluid" src="img/user.png" alt="">
									<a href="#"><span>Mark Wiens</span></a>
								</div>
								<div class="meta">
									13th Dec
									<span class="lnr lnr-heart"></span> 15
									<span class="lnr lnr-bubble"></span> 04
								</div>
							</div>							
							<a href="#">
								<h4>Break Through Self Doubt
								And Fear</h4>
							</a>
							<p>
								Dream interpretation has many forms; it can be done be done for the sake of fun, hobby or can be taken up as a serious career.
							</p>
						</div>
						<div class="single-recent-blog col-lg-4 col-md-4">
							<div class="thumb">
								<img class="f-img img-fluid mx-auto" src="img/b2.jpg" alt="">	
							</div>
							<div class="bottom d-flex justify-content-between align-items-center flex-wrap">
								<div>
									<img class="img-fluid" src="img/user.png" alt="">
									<a href="#"><span>Mark Wiens</span></a>
								</div>
								<div class="meta">
									13th Dec
									<span class="lnr lnr-heart"></span> 15
									<span class="lnr lnr-bubble"></span> 04
								</div>
							</div>							
							<a href="#">
								<h4>Portable Fashion for
								young women</h4>
							</a>
							<p>
								You may be a skillful, effective employer but if you don’t trust your personnel and the opposite, then the chances of improving.
							</p>
						</div>
						<div class="single-recent-blog col-lg-4 col-md-4">
							<div class="thumb">
								<img class="f-img img-fluid mx-auto" src="img/b3.jpg" alt="">	
							</div>
							<div class="bottom d-flex justify-content-between align-items-center flex-wrap">
								<div>
									<img class="img-fluid" src="img/user.png" alt="">
									<a href="#"><span>Mark Wiens</span></a>
								</div>
								<div class="meta">
									13th Dec
									<span class="lnr lnr-heart"></span> 15
									<span class="lnr lnr-bubble"></span> 04
								</div>
							</div>							
							<a href="#">
								<h4>Do Dreams Serve As
								A Premonition</h4>
							</a>
							<p>
								So many of us are demotivated to achieve anything. Such people are not enthusiastic about anything. They don’t want to work involved.
							</p>
						</div>												
											
												
					</div>
				</div>	
			</section>
			<!-- end recent-blog Area -->		

		    
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