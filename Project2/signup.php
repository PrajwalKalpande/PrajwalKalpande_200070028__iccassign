<?php
	include('db_connect.php');

$errors=['fullname'=>'','password'=>'','email'=>'','exist'=>''];
$fname='';
$password='';
$email='';
if(isset(($_POST['submit']))){
    if(!session_id()) session_start();
    
   
    
    $_SESSION['fname'] =$_POST['fullname'];
    
   
   if(empty($_POST['fullname'])){
    $errors['fullname']= "Please enter your name";
   }
   else{

   $fname  = $_POST['fullname'];
    
    if(!preg_match("/^[a-zA-Z\s]+$/",$_POST['fullname'])){
        $errors['fullname']="Name must consist of letters and spaces";
    }
   }
   if(empty($_POST['email'])){
    $errors['email']= "Please enter email";
   }
   else{
       $email = $_POST['email'];
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = "Invalid email format";
      }
   else{
       $email  = $_POST['email'];}
    
   }
   if(empty($_POST['password'])){
    $errors['password']= "Please enter a password";
}
    else{
        $password = $_POST['password'];
        
    }

    if(array_filter($errors)){}
    else{
        $fnamesql = mysqli_real_escape_string($conn,$_POST['fullname']);
        $passwordsql = mysqli_real_escape_string($conn,$_POST['password']);
        $emailsql= mysqli_real_escape_string($conn,$_POST['email']);
        $sql1="SELECT * FROM users  WHERE email =$emailsql";
        $result=mysqli_query($conn,$sql1);
        
        
        if($result)
        {
             echo"Name already exists";
        }
        else
        {   $sql="INSERT INTO users (username,pass,email) VALUES ('$fname','$password','$email')";  
            header("Location:index.php");
        }
        
        if(mysqli_query($conn,$sql)){
            
    
            }
        else{
            $errors['exist']="User already exists";
        }
    
    }
    $sql3 = 'SELECT * FROM users ORDER BY created_at';
    
    // get the result set (set of rows)
    $result = mysqli_query($conn, $sql3);
    
    // fetch the resulting rows as an array
    if(!$result){
        
    }
    else{
        global $usernames;
        $usernames = mysqli_fetch_all($result, MYSQLI_ASSOC);
       
        mysqli_close($conn);
        
    }
}







?>











<!DOCTYPE html>
<html>

 <?php include('templates/header.php');?>
 
 <div class ="red-text"><?php echo $errors['exist']?></div>
     <form id="my-form"class="container" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
         <h5> Sign Up : </h5>
         <label>Your Full Name</label>
         <input type="text" name="fullname" value= "<?php echo htmlspecialchars($fname)?>" >
         <div class="red-text"><?php echo htmlspecialchars($errors['fullname']) ?></div>
         <label>Your Email id</label>
         <input type="text" name="email" value= "<?php echo htmlspecialchars($email)?>" >
         <div class ="red-text"><?php echo $errors['email']?></div>
         <label>Your Password</label>
         <input type="password" name="password" value= "<?php echo htmlspecialchars($password)?>" >
         <div class ="red-text"><?php echo $errors['password']?></div>
         <input type="submit" name="submit" value="submit" class="btn brand">
     </form>
 
 
     

</body>
<?php
include('templates/footer.php');
 ?>
</html>