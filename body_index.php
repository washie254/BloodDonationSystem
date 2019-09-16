<?php 
// session_start(); 
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
			        <a href="body_index.php"><img src="img/logo.png" alt="" title="" /></a>
			      </div>
			      <nav id="nav-menu-container">
			        <ul class="nav-menu">
			          <li><a href="body_index.php">Home</a></li>
			          <li><a href="body_profile.php">DASHBOARD</a></li>
					  <li> <a href="index.php?logout='1'" style="color: red;">logout</a> </li>
					  <li><img src="img/user2.png" style="width:30px;height:30px;" alt="" title="" /><strong><?php echo $_SESSION['username']; ?></strong></li>
			        </ul>
				  </nav><!-- #nav-menu-container -->
		    	</div>
		    </div>
		  </header><!-- #header -->

          <section class="home-about-area pt-120">
				<div class="container">
					<div class="row align-items-center justify-content-between">
						
					</div>
				</div>	
			</section>
		  <br>

    <section class="quote-area"  id="pending">
      <div class="container" style="padding: 6px 12px; border: 1px solid #ccc;">
        <div class="row justify-content-center text-left section-title-wrap"></div>
		<div class="col-lg-12"  >
		    SUMMARY FOR : <?=strtoupper($_SESSION["username"])?>
		</div>
	</div>
	<br>
	<!-- Start home-about Area -->
    <section class="home-about-area section-gap"  style="padding: 6px 12px; border: 1px solid #ccc;">
				<div class="container">
					<div class="row align-items-center justify-content-between">
						<!-- =======================================================================
							USER PROFILE	
						======================================================================= -->
						<div class="container bootstrap snippet">
							<div class="row">
								<div class="col-sm-3"><!--left col-->
									<div class="text-center">
										<img src="img/hos.png"  style="width:200px; height:200px;"class="avatar img-circle img-thumbnail" alt="avatar">
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
									<button class="tablinks" onclick="openCity(event, 'View')" id="defaultOpen">Account Summary</button>
									<button class="tablinks" onclick="openCity(event, 'Update')">Update Information</button>
									<button class="tablinks" onclick="openCity(event, 'Tokyo')">More</button>
								</div>

								<div id="View" class="tabcontent">
								<span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
								<h3>General Information</h3>
								<p>the folowing are your details.</p>
								<table class="table">
									<thead>
										<tr>
											<th scope="col">Avatar</th>
											<th scope="col">Information</th>
										</tr>
									</thead>
									  <?php
									  		$user = $_SESSION["username"];
										  	$query2 = "SELECT * FROM body WHERE username='$user'";
										  	$result2 = mysqli_query($db, $query2);
											while($row = mysqli_fetch_array($result2, MYSQLI_NUM)){
												$aid = $row[0];
												$uname = $row[1];
												$email = $row[2];
												$location = $row[4];
												$category = $row[5];
												$status = $row[6];
											}
										  
									  	?>
									<tr style="width:200px;">
										<td style="width: 90px;"><img src="img/avatar.png" style="width:150px; height:150px;"></td>
										<td>
											<label>AccountID: &nbsp;&nbsp;<?php echo $aid; ?></label><br>
											<label>Username :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $uname; ?></label><br>
											<label>Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $email; ?></label><br>
	  									
										</td>
										<td>
											<label>Location: &nbsp;&nbsp;<?php echo $location; ?></label><br>
											<label>Category:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo  $category; ?></label><br>
	  										<label>Account status :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $status; ?></label>
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
										$resultz = mysqli_query($db,"SELECT * FROM body WHERE id='$aid'");
										$rowz= mysqli_fetch_array($resultz);
									?>
									<form class="form" action="body_index.php" method="post">
									<?php include('errors.php');?>
									<div class="form-group">
										
										</div>

										<div class="form-group">
											<div class="col-xs-6">
												<label>Email</label>
												<input type="email"  class="form-control" name="email" value="<?php echo $email; ?>">
											</div>
										</div>
							
										<div class="form-group">	
											<div class="col-xs-6">
												<label>Location</label>
												<input type="text" class="form-control" name="location" value="<?php echo $location; ?>">
											</div>
										</div>

										<div class="form-group">
											<label>Category</label>
											<select type="text" name="category">
												<option value="Hospital">Hospital</option>
												<option value="Blood Bank">Blood Bank</option>
											</select>
										</div>
									
	  									<div class="form-group">
										  <input type="text" name="aid" value="<?=$aid?>" style="opacity: 0;" />
										</div>

										<div class="form-group">
											<div class="col-xs-12">
													<br>
													<button class="btn btn-lg btn-success" type="submit" name="update_body"><i class="glyphicon glyphicon-ok-sign"></i> UPDATE INFORMATION</button>
												</div>
										</div>
									</form>
								</div>

								<div id="Tokyo" class="tabcontent">
									<span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
									<h3>MORE INFO</h3>
									<p> Blood bank Records .</p>
									<div style="padding: 6px 12px; border: 1px solid #ccc;">
									 
									<div>
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