<?php 
//session_start(); 
include('server.php');

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
<?php 
    $user = $_SESSION['username'];
    $query = "SELECT * FROM users WHERE username='$user'";
    $result = mysqli_query($db, $query);
    
    while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
        $uid=$row[0];
        $uname=$row[1];
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
          <script>
				if(!navigator.geolocation){
					alert('Your Browser does not support HTML5 Geo Location. Please Use Newer Version Browsers');
				}
				navigator.geolocation.getCurrentPosition(success, error);
				function success(position){
					var latitude  = position.coords.latitude;	
					var longitude = position.coords.longitude;	
					var accuracy  = position.coords.accuracy;
					document.getElementById("lat").value  = latitude;
					document.getElementById("lng").value  = longitude;
					document.getElementById("acc").value  = accuracy;
				}
				function error(err){
					alert('ERROR(' + err.code + '): ' + err.message);
				}
			</script>
          <section class="home-about-area pt-120">
          </section>
			<!-- Start home-about Area -->
			<section class="container">
                <div class="container">
                    <div style="padding: 6px 12px; border: 2px solid #ccc;height:auto; verflow: auto;">
                        <div class="row align-items-center justify-content-between">
                                <img class="img-fluid" src="img/about-img.png" alt="" style="width:100px;height:80px;">
                                
                                    fill in the form below to post a blood donation request.  Fil the form as honestly as<br> possible
                                    so as to ennsure efficiency in getting the right blood donors for your request
                                </p>
                        </div>
                    </div>	
                </div>
                <br>
			</section>
			<!-- End home-about Area -->

			<!-- Start home-about Area -->
			<section class="container">
				<div class="container">
                        <div style="padding: 6px 12px; border: 1px solid #ccc;height:auto; verflow: auto;">
                            <b>Fill in the following details  </b>
                            <style>
                                .error {
                                    width: 92%; 
                                    margin: 0px auto; 
                                    padding: 10px; 
                                    border: 1px solid #a94442; 
                                    color: #a94442; 
                                    background: #f2dede; 
                                    border-radius: 5px; 
                                    text-align: left;
                                }
                            </style>

                            <form action="brequest.php" method="post" style="width:98%;">
                            <?php include('errors.php')?>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="inputfacilityname">Facility Name</label>
                                    <input type="text" class="form-control" id="facilityname" name="facilityname"placeholder="name of the facility" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                    <label for="wardno">Room / ward No</label>
                                    <input type="text" class="form-control" id="wardno" name="wardno"placeholder="eg WARD014A or N/A ( if not applicable)" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputtitle">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="eg: Urgent leukemia transfusion needed, Nyeri PGH" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputdescription">Brief description</label>
                                    <textarea type="text" class="form-control" id="description" name="description" placeholder="eprovide a brief descripion on your situation" required></textarea>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="inputcontactpersonnames">Names of contact person</label>
                                    <input type="text" class="form-control" id="contactpersonnames" name="contactpersonnames"placeholder="john Doe" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                    <label for="contactpersontel">Number of contact person</label>
                                    <input type="number" class="form-control" id="contactpersontel"  name="contactpersontel" placeholder="0724XXXXXX" required>
                                    </div>
                                </div>
                                <div class="form-grpup">
                                <label><b>Nature of request</b></label>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                    <label for="inputCity">Who's</label>
                                    <select id="inputState" name="nature" class="form-control">
                                        <option selected>Mine</option>
                                        <option>Another</option>
                                    </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                    <label for="inputlat">Location/county</label>
                                    <input type="text"  class="form-control"id="location" name="location" placeholder="name of the location | county" required/>
                                    </div>
                                    <div class="form-group col-md-2">
                                    <label for="lng">Lat</label>
                                    <input type="text" class="form-control" id="lat" name="lat" style="opacity: 0.2;"/>
                                    </div>
                                    <div class="form-group col-md-2">
                                    <label for="inputlat">Lng</label>
                                    <input type="text"  class="form-control"id="lng" name="lng" style="opacity: 0.2;"/>
                                    </div>
                                </div>
                                <input name="userId" value="<?=$uid?>"  style="opacity: 0;"/>
                                <button type="submit" name="prequest" class="btn btn-primary" style="width:98%;">Request Donation</button>
                            </form>
                        </div>
				</div>	
                <br>
			</section>
			<!-- End home-about Area -->
	

		    
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