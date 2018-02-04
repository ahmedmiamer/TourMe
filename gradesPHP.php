<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Taking Input
$ownerName = $_GET['ownerName'];
$grades = $_GET['grade'];
$branchName = $_GET['branchName'];

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
	SELECT UserName, Grade, BranchName, Email
	FROM `account`, `grade`, `branch`
	WHERE 
	AccountID = account.ID
	AND grade.BranchID = branch.ID
';

// Adding Name
if($ownerName!="")
	$queryString = $queryString.' AND UserName like "'.$ownerName.'%"';

// Adding Difficulty
$grades = str_split($grades);	//Converting string to array of characters
$firstTime = true;
for($x=0; $x<sizeof($grades); $x++)
{
	if($grades[$x]=="1")
	{
		if($firstTime == true)
		{
			$queryString = $queryString.' AND Grade IN ('.($x+1);
			$firstTime = false;
		}
		else
			$queryString = $queryString. ', '.($x+1);			
	}
}
if($firstTime != true)
	$queryString = $queryString.')';

// Adding Branch
if($branchName != "" && $branchName != "All")
	$queryString = $queryString.' AND BranchName = "'.$branchName.'"';

// echo $queryString;
//echo "<br><br>";
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
			<div>
				<h5>['.$temp.'] '.$row['UserName'].'</h5>
				<h5 class="gradesInfo">Grade: '.$row['Grade'].'</h5>
				<h5 class="gradesInfo">Branch: '.$row['BranchName'].'</h5>
				<a href="mailto:'.$row['Email'].'?subject=Acceptance Email&body=You Have Been Accepted" type="button" class="btn-sm btn-warning">Send Acceptance Email</a>
			</div>
			<hr>
	    ';

	    $temp++;
	    $row = mysqli_fetch_array($result);
	}
}
//CLOSING DB
mysqli_close($db);