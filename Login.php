<?php
    // Start the session
    session_start();
    //print_r($_SESSION);
     session_unset();
     $_POST["validate"]=true;
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
      <title>Login Page</title>
       
       <style>
         body{
            background-image: url('img/main2.jpg');
            height: 100%; 

            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
  
          }
       </style>
   </head>
   
   <body style="padding-top: 3%">
<?php
   $con= mysqli_connect("localhost", "root", "root","intreviewss");
       if(!$con)
       {  echo' could not connect';
           die('could not connect: '. mysqli_errno($link));}
      
         //mmkn akb jquery 3ady gwa php :)
           //echo  $_POST;
          if (isset($_POST["name"]) && isset($_POST["pass"]))
{          
              $name = $_POST["name"];
           $pass= $_POST["pass"];
   //Select database first before query
                mysqli_select_db($con, "intreviewss");        
              //  $result= mysqli_query($con,"select * from account where UserName='".$name."'and Pass='".$pass."'");
 $call=  mysqli_prepare($con, 'CALL userlogin(?,?,@i)');
 mysqli_stmt_bind_param($call, 'ss',$name,$pass);
 mysqli_stmt_execute($call);
$select=  mysqli_query($con,'select @i');
$result=  mysqli_fetch_assoc($select);
$idd=$result['@i'];
            if($idd>0)
                {
                   $_SESSION['username']=$name;
                   
                    $var="select * from account where UserName= '".$name."'";
               
                     $result2= mysqli_query($con,$var);

               while($row=mysqli_fetch_array($result2))
                   {
                
                   $_SESSION['id']=$row['ID'];
                   $_SESSION['priv']=$row['Privilige'];
                   $_SESSION['bid']=$row['Branch_ID'];
                   $_SESSION['Email']=$row['Email'];
                    mysqli_close($con); 
                   }
                  
                    header("location:mainindex.php");
                }
                    else
                {
                    $_POST["validate"]=false;   
                }         
   }    
?>
       
    
   <div class="container">
            <div style = "margin:30px">
               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "name" id="name" class = "box"   required/><br /><br />
                  <label>Password  :</label><input type = "password" name = "pass" id="pass" class = "box"  required/><br/><br />
                  <input type = "submit" value = " Login " id="button"/><br />
               </form>	
            
              <?php
               if($_POST["validate"]==false)
                {
               echo" <div >Incorrect user name or password!</div>";
               $_POST["validate"]=true;
                }
              ?>
</div>
           <form action = "Register.php" method = "post">
                  
                  <input type = "submit" value = " Create Account " id="button"/><br />
               </form>	

			
     
   </body>
</html>