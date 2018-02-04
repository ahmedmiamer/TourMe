 
<?php session_start();
$_SESSION['username']='S';
?>

<html>
   
   <head>
      <title>Update Page</title>
<?php

 if(isset($_POST['pass1']) & isset($_POST['pass2']))
 {
   $con= mysqli_connect("localhost", "root", "root","intreviewss");
       if(!$con)
       {  echo' could not connect';
           die('could not connect: '. mysqli_errno($link));}

          
           $name = $_SESSION['username'];
           $pass= $_POST['pass1'];
             mysqli_select_db($con, "intreviewss");
 $call=  mysqli_prepare($con, 'CALL UpdatePassword(?,?)');
 mysqli_stmt_bind_param($call, 'ss',$name,$pass);
 mysqli_stmt_execute($call);
  header("location:Account.php?x=true");
           
 
 }
 
 if(isset($_POST['email1']) & isset($_POST['email2']))
 {
     
    $con= mysqli_connect("localhost", "root", "root","intreviewss");
       if(!$con)
       {  echo' could not connect';
           die('could not connect: '. mysqli_errno($link));}

          
           $name = $_SESSION['username'];
           $em= $_POST['email1'];
             mysqli_select_db($con, "intreviewss");
 $call=  mysqli_prepare($con, 'CALL UpdateEmail(?,?)');
 mysqli_stmt_bind_param($call, 'ss',$name,$em);
 mysqli_stmt_execute($call);
  header("location:Account.php?y=true"); 
     
 }
 
?>

      
      </head>
   
   <body style="padding-top: 3%">
  
    
      
       
       
          

			
      

   </body>
</html>