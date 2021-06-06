
<?php 
include('db_connect.php');
$sname=$password='';
$errors= ['servername'=>'','password'=>''];
if(isset($_POST['submit'])){
    
    if(empty($_POST['servername'])){
        $errors['servername']= "Please enter server name";
       }
    else{
        $sname =$_POST['servername'];        
        $password = $_POST['password'];
        if($sname='server'){
            if($password=='server123'){
               if($_POST['submit']=='Approve'){
                $_SESSION['status']=1;
               }
               else{
                $_SESSION['status']=0;
               }
               echo $_SESSION['status'];
            }
            else {
                $errors['password']="Incorrect password";
            }
               }
        else{
            $errors['servername']="Incorrect servername";
        }
     
    }


}



 ?>










<!DOCTYPE html>
<html>

 <?php include('templates/header.php');
 ?>

 
 <form id="my-form" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
         
         <label>Server Name</label>
         <input type="text" name="servername" value = "<?php echo htmlspecialchars($sname)?>" >
         <div class="red-text"><?php echo htmlspecialchars($errors['servername']) ?></div>
         <label>Password</label>
         <input type="password" name="password" >
         <div class="col m4 l4 row"><input type="submit" name="submit" value="Approve" class="btn brand">
         <input type="submit" name="submit" value="Remove" class="btn brand"></div>
     </form>











 </body>
<?php
include('templates/footer.php');
 ?>
</html>