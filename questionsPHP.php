<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Taking Input
$ownerName = $_GET['ownerName'];
$diff = $_GET['diff'];
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
	SELECT Question,A,B,C,answer,Difficultty,BranchName,UserName
	FROM `questions`, `question_account`, `account`, `branch`
	WHERE question_account.AID = account.ID 
	AND question_account.QID = questions.ID 
	AND question_account.BID = branch.ID
';

// Adding Name
if($ownerName!="")
	$queryString = $queryString.' AND UserName like "'.$ownerName.'%"';

// Adding Difficulty
$diff = str_split($diff);	//Converting string to array of characters
$firstTime = true;
for($x=0; $x<sizeof($diff); $x++)
{
	if($diff[$x]=="1")
	{
		if($firstTime == true)
		{
			$queryString = $queryString.' AND Difficultty IN ('.($x+1);
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
// echo "<br><br>";
/****************Query End  *******************/


// Executing Query
$result = mysqli_query($db, $queryString);
$row = mysqli_fetch_array($result);

if($row== "")
        echo '
    			<div class="questionStart">
    				<h5>Found Nothing!</h5>
    			</div>
    		';
else
{    
	while($row != "")
	{
	    echo'
			<!-- Q1 Start-->
			<div class="questionStart">
				<h5 class="questionInfo">
					<b>Owner:'.$row['UserName'].'<br> Branch: '.$row['BranchName'].'<br> Difficulty: '.$row['Difficultty'].' <br> Answer: '.$row['answer'].'</b> 
				</h5>
				<h5><b>'.$row['Question'].'</b></h5>

				<table>
					<tbody>
						<tr>
							<td>
								'.$row['A'].'
							</td>
							<td>
								'.$row['B'].'
							</td>
							<td>
								'.$row['C'].'
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<hr>

	    ';


	    $row = mysqli_fetch_array($result);
	}
}
//CLOSING DB
mysqli_close($db);