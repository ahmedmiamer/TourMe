<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();


//Taking Input
$questionAnswer = array(0, 0, 0, 0, 0);
if(isset($_POST['questionAnswer1']))
{
    $questionAnswer[0] = $_POST['questionAnswer1'];
    $questionAnswer[0] = explode(',', $questionAnswer[0]);
}
if(isset($_POST['questionAnswer2']))
{
    $questionAnswer[1] = $_POST['questionAnswer2'];
    $questionAnswer[1] = explode(',', $questionAnswer[1]);
}
if(isset($_POST['questionAnswer3']))
{
    $questionAnswer[2] = $_POST['questionAnswer3'];
    $questionAnswer[2] = explode(',', $questionAnswer[2]);
}
if(isset($_POST['questionAnswer4']))
{
    $questionAnswer[3] = $_POST['questionAnswer4'];
    $questionAnswer[3] = explode(',', $questionAnswer[3]);
}
if(isset($_POST['questionAnswer5']))
{
    $questionAnswer[4] = $_POST['questionAnswer5'];
    $questionAnswer[4] = explode(',', $questionAnswer[4]);
}

if($questionAnswer[0] == 0)     //All questions are empty
{
    echo "<h2>No input Detected<br></h2>";
    die();
}




$db = mysqli_connect("localhost","root","root");
if (!$db)
{
    die('Could not connect: ' . mysql_error());
}
mysqli_select_db($db,"intreviewss");


/****************Query Start*******************/
$queryString = '';
for($x = 0; $x < 5; $x++) {
   if($questionAnswer[$x]==0)   //No more questions. less than 5
       break;
   
   if($x==0) //First time
       $queryString = $queryString.'( select answer, ID from questions where questions.ID = '.$questionAnswer[$x][1].' )';
   else
   {
       $queryString = $queryString.'UNION ( select answer, ID from questions where questions.ID = '.$questionAnswer[$x][1].' )';
   }
}
/****************Query End*******************/

// Executing Query
$result = mysqli_query($db, $queryString);
$row = mysqli_fetch_array($result);

$quizResult=0;

if($row== "")
{
        echo '
    			Something went wrong
    		';
}
else
{
    $temp=0;
	while($row != "")
	{
	    if($row['answer']==$questionAnswer[$temp][0])
                $quizResult++;
	    $temp++;
	    $row = mysqli_fetch_array($result);
	}
}


$queryString2 = "INSERT INTO `grade` (`Grade`, `AccountID`, `Date`, `BranchID`) VALUES ('".$quizResult."', '".$_SESSION['id']."', NULL, '".$_SESSION['bid']."')";
$resulttt = mysqli_query($db, $queryString2);


echo "Successfully Added Your Result. Thanks<br>";


/////Sending email
$msg = "Your Grade is\n".$quizResult;
if( ! @mail($_SESSION['Email'],"TourMe - Your Grade",$msg, "From: ahmadmismail@yahoo.com") )
        echo"Your device doesnt have SMTP. Couldnt Send Email with your grade. You can wait till you get your acceptance mail";

mysqli_close($db);