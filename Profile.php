<?php
    // Start the session
    session_start();
     $_POST["validate"]=true;
    if(isset($_SESSION["username"]))
    {//if exists
        include 'navbarLogged.php';
    }
    else
    {
    include 'navbarNotLogged.php';}
 ?>
<?php
   $con= mysqli_connect("localhost", "root", "root","intreviewss");
       if(!$con)
       {  echo' could not connect';
           die('could not connect: '. mysqli_errno($link));}
          
           
          if (isset($_GET["id"])) 
{          
              $id = $_GET["id"];
              mysqli_select_db($con, "intreviewss");    
//                $sql="CALL RetriveAll($id,@UN,@email,@bid)";
//                mysqli_query($con,$sql);
                
 $call=  mysqli_prepare($con, 'CALL Retrive(?,@UN,@email,@bid)');
 mysqli_stmt_bind_param($call,'i',$id);
 mysqli_stmt_execute($call);

$select=  mysqli_query($con,'select @UN,@email,@bid');
$result=  mysqli_fetch_assoc($select);
$un=$result['@UN'];
$bname;
$em=$result['@email'];
$bid=$result['@bid'];
                $var='select * from branch where ID='.$bid;
                
                $result1= mysqli_query($con,$var);
                while($row=mysqli_fetch_array($result1))
                {
                $bname=$row['BranchName']; 
                }      
          mysqli_close($con);
          
}
?>
<html>  
   <head>
      <title>Profile Page</title>
       <style>
            body{
            background-image: url('img/main1.jpg');
            height: 100%; 

            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
  
          }
        </style>
   </head>
   
   <body style="padding-top: 10%">
       <?php 
            if(isset($_GET["id"]))
            {
                include 'profilebody.php';
            }
         else {
     echo"Profile page can't be accessed";
              }
       ?>
       

			
     
   </body>
   
</html>