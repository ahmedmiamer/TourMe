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
    {
        include 'navbarNotLogged.php';
        alert("LOG IN FIRST PLEASE");
        header("location:mainindex.php");
    }
 ?>


 
<html>
    <head>
        <title>Intreview Exam</title>
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

        <script type="text/javascript">
        	$(document).ready(function(){
        		$('#Q1').show(2000);
        		$('#Q2').delay(500).show(2000);
        		$('#Q3').delay(1000).show(2000);
        		$('#Q4').delay(1500).show(2000);
        		$('#Q5').delay(2000).show(2000);
        		$('#Qsubmit').delay(2500).show(2000);
        	});
        </script>
    </head>

    <body id="interviewExamBody">

    	<!-- Go Top Button -->
    	<button id="buttonTop" class="btn btn-default btn-lg" onclick="goTop();"><i class="fa fa-angle-double-up" aria-hidden="true"></i></button>


    	<!-- Form Starts -->
        <form class="container" action="Intreview_ExamPHP.php" method="POST">
    		<h3 align="center" id="interviewTitle">Questions</h3><br>
                
                <!--Questions Start-->
                <?php

                   // Starting DB
                  $db = mysqli_connect("localhost","root","root");
                  if (!$db)
                  {
                      die('Could not connect: ' . mysql_error());
                  }
                  mysqli_select_db($db,"intreviewss");

                  /****************Query Start*******************/
                  //Creating Query
                  $queryString = '
                           ( select Question, A, B, C, ID, Difficultty from questions where Difficultty = 1 ORDER BY RAND() LIMIT 1 )
                           UNION
                           ( select Question, A, B, C, ID, Difficultty from questions where Difficultty = 2 ORDER BY RAND() LIMIT 1 )
                           UNION
                           ( select Question, A, B, C, ID, Difficultty from questions where Difficultty = 3 ORDER BY RAND() LIMIT 1 )
                           UNION
                           ( select Question, A, B, C, ID, Difficultty from questions where Difficultty = 4 ORDER BY RAND() LIMIT 1 )
                           UNION
                           ( select Question, A, B, C, ID, Difficultty from questions where Difficultty = 5 ORDER BY RAND() LIMIT 1 )
                  ';
                  /****************Query End  *******************/

                   // Executing Query
                   $result = mysqli_query($db, $queryString);
                   $row = mysqli_fetch_array($result);

                   if($row== "")
                   {
                       echo '
                                       <div>
                                               <h5>Found Nothing!</h5>
                                       </div>
                               ';
                   }
                   else
                   {    
                       $temp=1;
                       while($row != "")
                       {
                           echo'
                                       <!-- Q1 Start -->
                                       <div id="Q'.$temp.'">
                                               <h5>Question <span class="badge badge-warning">'.$temp.'</span></h5>
                                               <div class="Question">'.$row['Question'].'</div>
                                               <!-- Choice Start -->
                                               <div class="interviewChoices">
                                                       <!-- A -->
                                                               <label class="custom-control custom-radio">
                                                                       <input name="questionAnswer'.$temp.'" value="A,'.$row['ID'].'" type="radio" required class="custom-control-input">
                                                                       <span class="custom-control-indicator"></span>
                                                                       <span class="custom-control-description">'.$row['A'].'</span>
                                                               </label><br>
                                                               <!-- B -->
                                                               <label class="custom-control custom-radio">
                                                                       <input name="questionAnswer'.$temp.'" value="B,'.$row['ID'].'" type="radio" class="custom-control-input">
                                                                       <span class="custom-control-indicator"></span>
                                                                       <span class="custom-control-description">'.$row['B'].'</span>
                                                               </label><br>
                                                               <!-- C -->
                                                               <label class="custom-control custom-radio">
                                                                       <input name="questionAnswer'.$temp.'" value="C,'.$row['ID'].'" type="radio" class="custom-control-input">
                                                                       <span class="custom-control-indicator"></span>
                                                                       <span class="custom-control-description">'.$row['C'].'</span>
                                                               </label><br>
                                                       </div>
                                                       <!-- Choice End -->
                                       </div><br>
                                       <!-- Q1 End-->
                           ';

                           $temp++;
                           $row = mysqli_fetch_array($result);
                       }
                   }
                ?>   		
                <!--Questions End-->
                
		<!--<button type="button" class="btn btn-sm btn-warning">Send Acceptance Email</button>-->
                <input id="Qsubmit" class="btn-md btn-warning" type = "submit" style="border-radius: 8px;" value = "Submit"/><br />
    	</form>
    	<!-- Form Ends -->


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
