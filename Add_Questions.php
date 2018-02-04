<?php session_start();
$_POST['inserted']=true;
?>

<?php
    // Start the session
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
      <title>Add Questions</title>
      
      <style>
         body{
            background-image: url('img/main3.jpg');
            height: 100%; 

            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;

            color: white;
            font-weight: bold;
            margin-top: 5%;
  
          }
       </style>
   </head>
   
   <body background="main1.jpg" style="padding-top: 3%;  ">

     
<?php
if(isset($_POST['A'])& isset($_POST['B'])& isset($_POST['C']) & isset($_POST['QUES']))
{
   $con= mysqli_connect("localhost", "root", "root","intreviewss");
       if(!$con)
       {  echo' could not connect';
           die('could not connect: '. mysqli_errno($link));}
      $AID=$_SESSION["id"];
          $BID=$_POST["branch"];
          $A=$_POST['A'];
          $B=$_POST['B'];
          $C=$_POST['C'];
          $ans=$_POST['ANS'];
          $ques=$_POST['QUES'];
          $diff=$_POST['DIFF'];
          


 
mysqli_select_db($con, "intreviewss");
 $call=  mysqli_prepare($con, 'CALL AddQuestion(?,?,?,?,?,?,@ID)');
 mysqli_stmt_bind_param($call, 'sssssi',$A,$B,$C,$ans,$ques,$diff);
 mysqli_stmt_execute($call);
 $select=  mysqli_query($con,'select @ID');
$result=  mysqli_fetch_assoc($select);
$QID=$result['@ID'];
$call1=  mysqli_prepare($con, 'CALL AddQ_A(?,?,?)');
 mysqli_stmt_bind_param($call1, 'iii',$QID,$AID,$BID);
 mysqli_stmt_execute($call1);
 
}
     
       
?>
       <div align="center" style="font-size: 20px;">
  <form action = "" method = "post">
      <label syle="color:orange;"> Please Insert all of your question required details</label></br>
      <label>Enter the question:</label><br/>
      <textarea  name="QUES" id="QUES" required></textarea><br/>
      <label>Answer A:</label><br/>
      <textarea id="A"  name="A" required></textarea><br/>
      <label>Answer B:</label><br/>
      <textarea id="B"  name="B" required></textarea><br/>
      <label>Answer C:</label><br/>
      <textarea id="C"  name="C" required></textarea><br/><br/>
      <label>Correct Answer:</label>
      <select name="ANS" id="ANS">
                       <option value="A" default>A</option>
                        <option value="B">B</option>
                         <option value="C">C</option>                     
       </select><br /><br/>
       
       <label>Choose Difficulty:</label>
      <select name="DIFF" id="DIFF">
                       <option value="1" default>1</option>
                        <option value="2">2</option>
                         <option value="3">3</option>     
                          <option value="4">4</option>
                         <option value="5">5</option>     
       </select><br /><br/>
       <label>Choose branch  :</label>
        <select name='branch' id="branch">
                    <?php
                    $con= mysqli_connect("localhost", "root", "root","intreviewss");
                     mysqli_select_db($con, "intreviewss");
                     if($_SESSION["Priv"]==1)
                     {
                        $result=mysqli_query($con,"select * from branch");
                    while($row=mysqli_fetch_array($result))
                    {  
                        echo "<option value=".$row['ID'].">".$row['BranchName']."</option>";   
                    }
                  
                   
                     }
                         
                      else
                      {
                        $result=mysqli_query($con,"select * from branch where ID=".$_SESSION["bid"]);
                    while($row=mysqli_fetch_array($result))
                    {  
                        echo "<option value=".$row['ID'].">".$row['BranchName']."</option>";   
                    }                   
                      }
                      mysqli_close($con);  
                   
                 ?> 
            </select> <br/> <br/>
       <input type="submit" style="border-radius: 10px; background-color: darkorange; "  value="Add">
           
               </form>	
       </div>
               
      

   </body>
</html>