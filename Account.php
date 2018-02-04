<?php
    // Start the session
    session_start();
    //print_r($_SESSION);
    
    if(isset($_SESSION["username"]))
    {//if exists
        include 'navbarLogged.php';
    }
    else
    {
    include 'navbarNotLogged.php';}
 ?>

<html>
   
   <head>
      <title>Update Your Account</title>
      <script src="jquery-3.2.1.min.js"></script>
    <script>
   
    function validatePassword()
    {
    var password = document.getElementById("pass1").value;
    var confirmpassword = document.getElementById("pass2").value;
        if(password!=confirmpassword)
        {
            document.getElementById("form1Warning").innerHTML = "<b> WRONG CONFIRM</b>";
        }
            
            else
            {
               document.getElementById("form1Warning").innerHTML = "<b> </b>";
            }
    }
    
    
    
    function  validateEmail()
    {
     var email = document.getElementById("email1").value;
    var confirmemail = document.getElementById("email2").value;
 
        
        if( email!=confirmemail)
        {
            document.getElementById("form1Warning2").innerHTML = "<b> WRONG CONFIRM</b>";
            return false;
            
        }
            
            else
            {
               document.getElementById("form1Warning2").innerHTML = "<b> </b>";
                 return true;
              
            }
        
        
    }
    
    
    
    </script>
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
   
   <body style="padding-top: 5%">
  
    
      <div align="center" >
          <div align="center" style="width: 275px; background-color:#FFA500; border-radius: 25px; ">Change Password </div>
          <form action="Update.php"  method="post" style="align-content: center;">
                   To change your account password, enter your current password, then enter your new password and confirm it. <br/><br/>
                   <?php ?>
                   <label>New Password  :</label><input type = "password"  name="pass1" id="pass1" class = "box"  onchange="validatePassword()" required/><br /><br />
                   <label>Confirm New Password  :</label><input  type="password"   name = "pass2" id="pass2" class = "box" onkeyup="validatePassword()" required/><span  id="form1Warning"></span><br/><br />
                   <input type = "submit" value = " Update Password " id="button"/><br /><br/>
                   <?php 
                   if(isset($_GET["x"]))
                   {
                       
                       echo'<span> Password updated successfully !</span>';                       
                   }
                   
                   
                   ?>
          </form>
               
            </div>
       
       
        <div align="center" >
          <div  align="center" style="width: 275px; background-color:#FFA500; border-radius: 25px;">  Change Email </div>
          <form action="Update.php"  method="post">
              You are already registered with the following email:
              
              <?php 
              
              $con= mysqli_connect("localhost", "root", "root","intreviewss");
       if(!$con)
       {  echo' could not connect';
           die('could not connect: '. mysqli_errno($link));}
           if (isset($_SESSION['id'])) 
{          
              $id = $_SESSION['id'];
              mysqli_select_db($con, "interviewes");    
 $call=  mysqli_prepare($con, 'CALL Retrive(?,@UN,@email,@bid)');
 mysqli_stmt_bind_param($call,'i',$id);
 mysqli_stmt_execute($call);

$select=  mysqli_query($con,'select @UN,@email,@bid');
$result=  mysqli_fetch_assoc($select);
$em=$result['@email'];
          mysqli_close($con);
          echo'<b>'.$em.'</b>';
}
              
              ?>
                   If you would like to sign-in and receive emails on a different address, write this new email here:<br/><br/>
                   <label>New Email  :</label><input type = "email"  id="email1" name="email1" class = "box"  onchange="validateEmail()"  required/><br /><br />
                  <label>Confirm New Email :</label><input type = "email"   id="email2" name="email2" class = "box" onkeyup="validateEmail()"  required/><span  id="form1Warning2"></span><br/><br />
                   <input type = "submit" value = " Update Email " id="button"/><br />
                   <?php 
                   if(isset($_GET["y"]))
                   { 
                       echo'<span> Email updated successfully !</span>';                       
                   }
                   ?>
               </form>	
 
               
            </div>
        

       
          

			
      

   </body>
</html>