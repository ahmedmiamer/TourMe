<?php session_start();
$_POST['inserted']=true;

if(isset($_SESSION["username"]))    //if exists
        include 'navbarLogged.php';
    else
        include 'navbarNotLogged.php';
?>

<html>
   
   <head>
      <title>Register</title>
      
      
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

       <script src="jquery-3.2.1.min.js"></script>
<script>
    $(document).ready(function(){
    $('#msg').hide();
    });
    </script>
<?php
   $con= mysqli_connect("localhost", "root", "root","intreviewss");
       if(!$con)
       {  echo' could not connect';
           die('could not connect: '. mysqli_errno($link));}
      
         //mmkn akb jquery 3ady gwa php :)
           //echo  $_POST;
          if (isset($_POST["name"]) && isset($_POST["pass"]) && isset($_POST["email"]))
{
 
           $name = $_POST["name"];
           
           ///////need to check user name is unique at first
           mysqli_select_db($con, "intreviewss");        
              //  $result= mysqli_query($con,"select * from account where UserName='".$name."'and Pass='".$pass."'");
 $call=  mysqli_prepare($con, 'CALL CheckUN(?,@i)');
 mysqli_stmt_bind_param($call, 's',$name);
 mysqli_stmt_execute($call);
$select=  mysqli_query($con,'select @i');
$result=  mysqli_fetch_assoc($select);
$idd=$result['@i'];
            if($idd>0)//user already is in the system so please choose another username
                {
           echo 'Please choose another username';
                }
                else
                {
           
           $pass= $_POST["pass"];
           $email=$_POST["email"];
           $bid=$_POST["branch"];
           $priv=0;
           //before inserting should check if user name already exists or not
               $call=  mysqli_prepare($con, 'CALL CreateAccount(?,?,?,?,?)');
 mysqli_stmt_bind_param($call, 'ssisi',$pass,$name,$bid,$email,$priv);
 mysqli_stmt_execute($call);
 
 echo '<br><br><br><br>Account Created Succesffuly<br>';

 
 mysqli_close($con);
//$select=  mysqli_query($con,'select @i');
//$result=  mysqli_fetch_assoc($select);
//                if($result)
//                {
//                    $_POST['inserted']=false;
//                    
//                }ount created successfuly
 
header("location:mainindex.php");
 //out acc
                }
   }

       
?>
       
  
    
      <div align = "center">

            <div style = "margin:30px">
               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "name" id="name" class = "box" required/><br /><br />
                  <label>Password  :</label><input type = "password" name = "pass" id="pass" class = "box"  required/><br/><br />
                  <label>Email :</label><input type = "email" name = "email" id="email" class = "box"  required/><br/><br />
                  <label>Choose branch  :</label>
                  <select name='branch'>
                    <?php
                    $con= mysqli_connect("localhost", "root", "root","intreviewss");
                     mysqli_select_db($con, "intreviewss");
                    $result=mysqli_query($con,"select * from branch");
                    while($row=mysqli_fetch_array($result))
                    {  
                        echo "<option value=".$row['ID'].">".$row['BranchName']."</option>";   
                    }
                    mysqli_close($con);  
                    ?>   
                   </select> <br/>
                   
                   <input class="btn-sm btn-warning" style="border-raduis: 10px;" type = "submit" value = " Register" id="button"/><br />
               </form>	
                <?php
               if($_POST["inserted"]==false)
                {
               echo" <div  id='msg'>Account created Successfully  !</div>";
               $_POST["inserted"]=true;
                }
              ?>
            </div>		
      </div>

   </body>
</html>