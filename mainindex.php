<!DOCTYPE html>

<!-- 
	Ana: main, questions, grades, intreview_exam
	Questions.php: Allows adminstrators to view all questions added for specific department
	Grades.php: A page used by admins or employees to check highest grades after grading the customers intreview exam
	Intreview_exam.php: A page used by the customers to take their online intreview exam
 -->
 
 <?php
    // Start the session
    session_start();
    
    
    if(isset($_SESSION["username"]))    //if exists
        include 'navbarLogged.php';
    else
        include 'navbarNotLogged.php';
 ?>

<html>
    <head>
        <title>Welcome</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--============================ CDN START ============================-->
	    <!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

		<!-- jQuery -->
		<script
		  	src="https://code.jquery.com/jquery-3.2.1.js"
		  	integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
		  	crossorigin="anonymous">
		</script>

		<!-- Bootstrap Javascript -->
		<script 
			src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous">
		</script>

		<!-- Font Awesome -->
		<script src="https://use.fontawesome.com/b8fef9f667.js"></script>

		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700" rel="stylesheet">

		<!-- Nice Scroll JS -->
		<script type="text/javascript" src="js/jquery.nicescroll.min.js"></script>

		<!-- My JS -->
		<script type="text/javascript" src="js/script.js"></script>

		<!-- My CSS -->
		<link rel="stylesheet" type="text/css" href="css/app.css">


        <!--============================ CDN END   ============================-->

    	<style>
			body, html {
			    height: 100%;
			    margin: 0;
			}
		</style>

		<script type="text/javascript">
        	$(document).ready(function(){
        		$('#welcomeText').delay(500).fadeIn(2000);
        	});
        </script>

    </head>
    <body>

    	<!-- Go Top Button -->
    	<button id="buttonTop" class="btn btn-default btn-lg" onclick="goTop();"><i class="fa fa-angle-double-up" aria-hidden="true"></i></button>


    	<!-- Parallex Intro Start --> 
		<div id="parallaxMainIntro">
			<div id="welcomeText">
				Your Journey<br> Begins Here
			</div>
		</div>
		<!-- Parallex Intro End -->

                
		<!-- 1st Section Start -->
		<div style="background-color:#F6F6F6; padding:1%;">
			<div class="container">
				<div class="row">
					<!--=========Introduction Start=========-->
					<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
						<h2>
							<b><span style="color:orange;font-size:50px;">W</span>elcome</b>
						</h2>
						<hr id="borderhrintro">
						<p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					</div>
					<!--=========Introduction End=========-->

					<!-- News Start -->
					<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
						<!-- Header Row -->
						<ul id="clothing-nav" class="nav nav-tabs" role="tablist">
							<!-- First Tab -->
							<li class="nav-item">
							<a class="nav-link active" href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">News</a>
							</li>
							<!-- Second Tab -->
							<li class="nav-item">
							<a class="nav-link" href="#hats" role="tab" id="hats-tab" data-toggle="tab" aria-controls="hats">Events</a>
							</li>
							<!-- Third Dropdown Tab -->
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
								Alerts
								</a>
								<div class="dropdown-menu">
								<a class="dropdown-item" href="#dropdown-shoes" role="tab" id="dropdown-shoes-tab" data-toggle="tab" aria-controls="dropdownShoes">New Pages</a>
								<a class="dropdown-item" href="#dropdown-boots" role="tab" id="dropdown-boots-tab" data-toggle="tab" aria-controls="dropdownBoots">Notices</a>
								</div>
							</li>
						</ul>

						<!-- Content Panels Row -->
						<div id="clothing-nav-content" class="tab-content">
							<!-- First Panel -->
							<div role="tabpanel" class="tab-pane fade show active" id="home" aria-labelledby="home-tab">
								<!--FirstNews-->
								<div class="media">
			                      <div class="media-left">
			                        <a class="news_img" href="#">
			                          <img class="media-object" src="img/profile.png" alt="img">
			                        </a>
			                      </div>
			                      <div class="media-body">
			                       <a href="#" class="newsTitleTab">Dummy text</a>
			                       <p class="text-muted"><em>27.02.15</em></p>
			                      </div>
			                    </div> 
			                    <!--SecondNews-->
			                    <div class="media">
			                      <div class="media-left">
			                        <a class="news_img" href="#">
			                          <img class="media-object" src="img/profile.png" alt="img">
			                        </a>
			                      </div>
			                      <div class="media-body">
			                       <a href="#" class="newsTitleTab">Dummy text</a>
			                       <p class="text-muted"><em>27.02.15</em></p>
			                      </div>
			                    </div> 
			                    <!--ThirdNews-->
			                    <div class="media">
			                      <div class="media-left">
			                        <a class="news_img" href="#">
			                          <img class="media-object" src="img/profile.png" alt="img">
			                        </a>
			                      </div>
			                      <div class="media-body">
			                       <a href="#" class="newsTitleTab">Dummy text</a>
			                       <p class="text-muted"><em>27.02.15</em></p>
			                      </div>
			                    </div> 
							</div>
							<!-- Second Panel -->
							<div role="tabpanel" class="tab-pane fade" id="hats" aria-labelledby="hats-tab">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
							</div>
							<!-- Third Panel -->
							<div role="tabpanel" class="tab-pane fade" id="dropdown-shoes" aria-labelledby="dropdown-shoes-tab">
								<p>Lorem ips reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
							</div>
							<!-- Fourth Panel -->
							<div role="tabpanel" class="tab-pane fade" id="dropdown-boots" aria-labelledby="dropdown-boots-tab">
								<p>Lorem ipsum dolor sit </p>
							</div>
						</div>
					</div>
					<!-- News End -->
				</div>
			</div>
		</div>
		<!-- 1st Section End -->


		<!-- 2nd parrallax -->
		<div class="mainParallax2"></div>


		<!--============================== Footer Section Starts ===================================-->
		<div class="footerinfo">
			<div class="container">
				<div class="row">
					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
						<h4>About Us</h4>
						<br>
						<p id="footerinfoaboutus">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
					</div>
					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
						<h4>Community</h4>
						<br>
						<p><a href="#" class="footerlink">Team</a></p>
						<p><a href="#" class="footerlink">Forum</a></p>
						<p><a href="#" class="footerlink">News and Media</a></p>
					</div>
					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
						<h4>Others</h4>
						<br>
						<p><a href="#" class="footerlink">Privacy Policy</a></p>
						<p><a href="#" class="footerlink">Terms and Conditions</a></p>
						<p><a href="#" class="footerlink">Frequently Asked Questions</a></p>

					</div>
					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
						<h4>Follow Us @</h4>
						<br>
						<a href="#" title="Facebook" ><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
						<a href="#" title="Twitter"  ><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
						<a href="#" title="Youtube"  ><i class="fa fa-youtube-square" aria-hidden="true"></i></a>
						<a href="#" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
					</div>
				</div>
			</div>
		</div>
		<!--============================== Footer Section Ends ===================================-->

		<!-- Footer Starts-->
		<div class="copyrightt">
		  <div class="container">
		  	<div class="row">
			    <div class="col-md-6">
			      <p>Copyright © 2017 - All Rights Reserved to Ahmed & Sahar</p>
			    </div>
			</div>
		  </div>
		</div>
		<!-- Footer Ends -->

    </body>
</html>