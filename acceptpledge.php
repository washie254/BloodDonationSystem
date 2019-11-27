<?php
	include('server.php');
//session_start(); 

if(isset($_GET['id'])){
    $pledgeid = $_GET['id'];
}

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
			        <a href="admin_index.php"><img src="img/logo.png" alt="" title="" /></a>
			      </div>
			      <nav id="nav-menu-container">
			        <ul class="nav-menu">
			          <li><a href="index.php">Home</a></li>
					  <li><a href="bdonation.php">Blood Donation</a></li>
			          <li><a href="about.php">Profile</a></li>
			          <li><a href="services.php">Services</a></li>
			          <li><a href="charity.php">Charity</a></li>
					  <li><a href="emergencyreporting.php">Report Em.</a></li>
					  <li><a href="contact.php">Contact</a></li>
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
		    INFORMATION PERTAINING THE REQUEST<br>
			<?php
                // $user= $_SESSION["username"];
                
				// $sql0 = "SELECT *FROM users WHERE username='$user'";
				// $result0 = mysqli_query($db,$sql0);
				// while($rowz = mysqli_fetch_array($result0,MYSQLI_NUM)){
				// 	$uid = $rowz[0];
				// }

				$sql = "SELECT * FROM donationpledges WHERE id='$pledgeid'"; 
				$result = mysqli_query($db, $sql);
				while($row = mysqli_fetch_array($result, MYSQLI_NUM))
				{	
					$reqid = $row[1];
					$donorid = $row[2];
                    $date = $row[3];
                    $time =  $row[4];
                    $status =$row[5];
                    $dremarks = $row[6];
                    $requesterid = $row[8];  
					
					echo '
						<div class="card">
							<div class="card-body">
								Request Id : <b> '.$reqid.'</b><br>
								Donor Id: <b> '.$donorid.'</b><br>
								Date : <b> '.$date.'</b><br>
								Time : <b>'.$time.'</b><br>
								status : <b>'.$status.'</b><br>
								Donor Remarks : <b> '.$dremarks.'</b><br>
							</div>
						</div>
					';
				}
			?>
			<br>

			<form class="form-group" action="donate.php"  method="post" style="width:98%;" >
			<?php include('errors.php');?>
				<input name="reqid" value="<?=$reqid?>" style="opacity: 0.2;" readonly/>

				<div class="form-group">	
					<div class="col-xs-6">
						<label for="em_tImage"><h4>Message to donor</h4></label>
						<textarea type="text" class="form-control" name="rremarks" id="rremarks" required></textarea>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-xs-12">
						<br>
						<button class="btn btn-lg btn-success" style="width:100%;" type="submit" name="acceptpledge"><i class="glyphicon glyphicon-ok-sign"></i>Approve Pledge</button>
					</div>
				</div>
					
			</form>



		</div>
	</div>
	<br>
	</section>

	<section class="quote-area"  id="pending">
      <div class="container" style="padding: 6px 12px; border: 1px solid #ccc;">
        <div class="row justify-content-center text-left section-title-wrap"></div>
          <div class="col-lg-12">
            <!-- <p>MAAJABU</p> -->
          </div>
          <div class="container">
            <h2><b>Donation Requests</b></h2>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">ID. </th>
                  <th scope="col">BloodType</th>
                  <th scope="col">Date & Time</th>
                  <th scope="col">Title & Desciption</th>
                  <th scope="col">Location</th>
				  <th scope="col">Donors count</th>
				  <th scope="col">Contact Person</th>
				  <th scope="col">Facility</th>
				  <th scope="col">Status</th>
				  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
			  
                <?php
					$user= $_SESSION["username"];
					$sql0 = "SELECT *FROM users WHERE username='$user'";
					$result0 = mysqli_query($db,$sql0);
					while($rowz = mysqli_fetch_array($result0,MYSQLI_NUM)){
						$uid = $rowz[0];
					}

                  $sql = "SELECT * FROM donationrequests WHERE requstrid !='$uid'"; 
                  $result = mysqli_query($db, $sql);
                  while($row = mysqli_fetch_array($result, MYSQLI_NUM))
                  {	
                      $bloodtype = $row[2]."".$row[3];
                      $datetime = $row[4]." At ".$row[5]; 
                      $titledesc = "<b>".$row[6]."</b><br>".$row[7];
                      $location = $row[8];   
                      $donorcount = $row[11];
                      $contactperson = $row[16]."<br>".$row[15];
                      $facility = $row[13]."<br>Ward#". $row[14];  
                      $status = $row[12];        
                      echo '<tr>';
                          $insID= $row[0];
                          $new = basename( $row[4] );

                          echo '<td>'.$row[0].'</td>'; 
						  echo '<td>'.$bloodtype.'</td>';
						  echo '<td>'.$datetime.'</td>'; 
                          echo '<td>'.$titledesc.'</td>'; 
                          echo '<td>'.$location.'</td>'; 
						  echo '<td>'.$donorcount.'</td>'; 
                          echo '<td>'.$contactperson.'</td>'; 
						  echo '<td>'.$facility.'</td>';    
						  echo '<td>'.$status.'</td>'; 
						  echo '<td><a href="donate.php?id='.$row[0].'"><strong><button type="button" class="btn btn-success">Donate</button></td>';
                      echo '</tr>';
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>     
  </div>
</section>
<br> 
<section class="quote-area" id="inprogress">
      <div class="container" style="padding: 6px 12px; border: 1px solid #ccc;">
        <div class="row justify-content-center text-left section-title-wrap"></div>
          <div class="col-lg-12">
            <!-- <p>MAAJABU</p> -->
          </div>
          <div class="container">
            <h2><b>In Progress</b></h2>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">ID. </th>
                  <th scope="col">Image</th>
                  <th scope="col">Title</th>
                  <th scope="col">Category</th>
                  <th scope="col">Location</th>
				  <th scope="col">Date & Time</th>
				  <th scope="col">User</th>
				  <th scope="col">Mark as</th>
                </tr>
              </thead>
              <tbody>
                <!-- [ LOOP THE THE PENDING INSIDENTS ] -->
                <!-- <th scope="row"><?php echo $_SESSION['username'];?></th> -->
                <?php
              
                  $sql = "SELECT * FROM emergencies WHERE status='BEING SOLVED'";
                  $result = mysqli_query($db, $sql);
                  while($row = mysqli_fetch_array($result, MYSQLI_NUM))
                  {	
                  
                      echo '<tr>';;
                          $insID= $row[0];
                          $new = basename( $row[4] );
						  echo '<td>'.$row[0].'</td> '; //ID
						  echo '<td><img height="100" width="150" src="Empics/'.$row[3].' "> </td>'; // IMAGE
						  echo '<td>'.$row[1].'</td> '; //TITLE
                          echo '<td>'.$row[2].'</td>'; //Category
						  echo '<td>'.$row[4].'<br>lat:'.$row[5].'<br>Lng:'.$row[6].'</td>';//Location
						  echo '<td>ON: '.$row[7].'<br>At : '.$row[8].'</td>'; //Date & time
						  echo '<td>'.$row[10].'<br> userid:'.$row[9].'</td> '; //user

                          //MARK AN INCIDENT AS SOLVED
                          echo '<td><a href="completed.php?id=' . $row[0] . '"><button type="button" class="btn btn-success">Completed..</button></a> </td>';
                      echo '</tr>';
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>     
  </div>
</section><br>

<section class="quote-area" id="solved" >
      <div class="container" style="padding: 6px 12px; border: 1px solid #ccc;">
        <div class="row justify-content-center text-left section-title-wrap"></div>
          <div class="col-lg-12" >
            <!-- <p>MAAJABU</p> -->
          </div>
          <div class="container">
            <h2><b>SOVED EMERGENCIES</b></h2>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">ID. </th>
                  <th scope="col">Image</th>
                  <th scope="col">Title</th>
                  <th scope="col">Category</th>
                  <th scope="col">Location</th>
				  <th scope="col">Date & Time</th>
				  <th scope="col">User</th>
                </tr>
              </thead>
              <tbody>
                <!-- [ LOOP THE THE PENDING INSIDENTS ] -->
                <!-- <th scope="row"><?php echo $_SESSION['username'];?></th> -->
                <?php
              
                  $sql = "SELECT * FROM emergencies WHERE status='COMPLETED'";
                  $result = mysqli_query($db, $sql);
                  while($row = mysqli_fetch_array($result, MYSQLI_NUM))
                  {	
                  
                      echo '<tr>';;
                          $insID= $row[0];
                          $new = basename( $row[4] );
						  echo '<td>'.$row[0].'</td> '; //ID
						  echo '<td><img height="100" width="150" src="Empics/'.$row[3].' "> </td>'; // IMAGE
						  echo '<td>'.$row[1].'</td> '; //TITLE
                          echo '<td>'.$row[2].'</td>'; //Category
						  echo '<td>'.$row[4].'<br>lat:'.$row[5].'<br>Lng:'.$row[6].'</td>';//Location
						  echo '<td>ON: '.$row[7].'<br>At : '.$row[8].'</td>'; //Date & time
						  echo '<td>'.$row[10].'<br> userid:'.$row[9].'</td> '; //user

                          //MARK AN INCIDENT AS SOLVED
                          //echo '<td><a href="solving.php?id=' . $row[0] . '"><button type="button" class="btn btn-success">Completed..</button></a> </td>';
                      echo '</tr>';
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>     
  </div>
</section><br>

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