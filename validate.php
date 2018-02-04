 <?php
   $con= mysqli_connect("localhost", "root", "root","intreviewss");
       if(!$con)
       {  echo' could not connect';
           die('could not connect: '. mysqli_errno($link));}
      
       

          // $name = $_POST["name"];
          // $pass= $_POST["pass"];
           $name='S';

         //Select database first before query
                mysqli_select_db($con, "intreviewss");
                
              //  $result= mysqli_query($con,"select * from account where UserName='".$name."'and Pass='".$pass."'");
 $call=  mysqli_prepare($con, 'CALL UpdatePassword(?,?)');
 mysqli_stmt_bind_param($call, 'ss',$name,$pass);
 mysqli_stmt_execute($call);

           
     echo('updated');
           
 

       
?>
