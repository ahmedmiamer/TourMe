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
    {
        include 'navbarLogged.php';
        $prev= $_SESSION["prev"];
    }
    else
    {
        include 'navbarNotLogged.php';
        $prev= 0;
    }
 ?>
 
<html>
    <head>
        <title>Questions</title>
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

		<!-- Popper Js -->
		<script 
		src="https://cdn.bootcss.com/popper.js/1.9.3/umd/popper.min.js" integrity="sha384-knhBOwpf8/28D6ygAjJeb0STNDZqfPbKaWQ8wIz/xgSc0xXwKsKhNype8fmfMka2" crossorigin="anonymous">
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

        <script>
        	$(document).ready(function(){
        		showUser();
        	});

        	function showUser() {
        		// Take Input Name
    			var ownerName = document.getElementsByName("actorName")[0].value;
    			// Take Input Difficulty
    			var diff="";
    			var diffElements= document.getElementsByClassName("custom-control-input");
    			for(var i=0; i<diffElements.length; i++)
    			{
    				if(diffElements[i].checked==true)
    					diff = diff+"1";
    				else
    					diff = diff+"0";
    			}
    			// Take Input Branch
    			var branchName = document.getElementsByName("branchName")[0];
    			if(branchName == null)	//incase prev not 1
    				branchName = "";
    			else
    				branchName = branchName.value;

    			// AJAX
	           	xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
	            if (this.readyState == 4 && this.status == 200) {
		                document.getElementById("questionResultsHere").innerHTML = this.responseText;
		            }
		            $(document).ready(function(){
		        		$('.questionStart').fadeIn(500);
		        	});
		        };
		        xmlhttp.open("GET","questionsPHP.php?ownerName="+ownerName+"&diff="+diff+"&branchName="+branchName,true);
        		xmlhttp.send();
        	}
        </script>
    </head>

    <body id="questionsBody">
        
    	<!-- Go Top Button -->
    	<button id="buttonTop" class="btn btn-default btn-lg" onclick="goTop();"><i class="fa fa-angle-double-up" aria-hidden="true"></i></button>

    	<!-- Parallax  -->
    	<div class="parallaxquestion">
    		<a href="Add_Questions.php"><button class="btn btn-warning btn-lg" style="margin:40% 15%; font-size:200%">Add Question</button></a>
    	</div>


    	<!-- Container Starts -->
		<div class="container">
			<!-- Row starts -->
			<div class="row">

				<!-- Column 1 start -->
				<div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3" style="margin:5% 2% 5% 0%;">
					<h2 style="color:darkorange; text-shadow: 3px 1px 19px rgba(255,140,0, 0.5);" align="center">
						<b><span style="color:darkorange;font-size:50px;">C</span>ategory</b>
					</h2>
					<!-- Category Start -->
					<div style="border:1px solid lightgrey; border-radius:8px">
						<div style="margin:3%" class="form-group">

							<input oninput="showUser()" type="text" name="actorName" placeholder="Question Owner Name.." class="form-control" style="float:left; width:85%">
							<button class="icon btn btn-sm btn-outline-secondary" ><i class="fa fa-search"></i></button>
							<br><br>

							<b>Difficulty:</b><br>

							<label class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" value="diff1" onchange="showUser()" name="diff1">
								<span class="custom-control-indicator"></span>
								1
							</label><br>

							<label class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" value="diff2" onchange="showUser()" name="diff2">
								<span class="custom-control-indicator"></span>
								2
							</label><br>

							<label class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" value="diff3" onchange="showUser()" name="diff3">
								<span class="custom-control-indicator"></span>
								3
							</label><br>

							<label class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" value="diff4" onchange="showUser()" name="diff4">
								<span class="custom-control-indicator"></span>
								4
							</label><br>

							<label class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" value="diff5" onchange="showUser()" name="diff5">
								<span class="custom-control-indicator"></span>
								5
							</label><br>

							<?php
								if($prev==1)
									echo'
										<b>Branch:</b><br>
										<select name="branchName" onchange="showUser()" id="branchName" class="form-control">
											<option value="All">All</option>
										    <option value="HR">HR</option>
										    <option value="TourGuide">TourGuide</option>
										    <option value="Social Media">Social Media</option>
										</select>
									';
							?>
						</div>
					</div>
					<!-- Category End -->
				</div>
				<!-- Column 1 end -->


				<!-- Column 2 start -->
				<div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8" style="margin:5% 0% 5% 0%;">
					<h2 style="color:darkorange; text-shadow: 3px 1px 19px rgba(255,140,0, 0.5);" align="center">
						<b><span style="color:darkorange;font-size:50px;">Q</span>uestions</b>
					</h2>
					<!-- Question Start -->
					<div class="QuestionsDiv" id="questionResultsHere" >
						<!-- Questions Displayed Here -->
					</div>
					<!-- Question End -->
				</div>
				<!-- Column 2 end -->

			</div>
			<!-- Rows ends -->
		</div>
		<!-- Container ends -->


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
