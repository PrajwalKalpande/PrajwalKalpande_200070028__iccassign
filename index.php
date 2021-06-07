<?php 
include('db_connect.php');
$errors=['email'=>'','password'=>''];
$email='';
$password='';

if(isset($_POST['submit'])){
    if(!session_id()) session_start();
    $_SESSION['password']=$_POST['password'];
    
    $_SESSION['email'] =$_POST['email'];
    if(empty($_POST['email'])){
        $errors['email']= "Please enter your email";
       }
    else{
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $errors['email'] = "Invalid email format";
          }
       else{
           $email  = $_POST['email'];}}
       if(empty($_POST['password'])){
        $errors['password']= "Please enter a password";
    }
        else{
            $password = $_POST['password'];
            
        }
        if(array_filter($errors)){}
else{ 
     $emailsql = mysqli_real_escape_string($conn,$_POST['email']);
    $passwordsql = mysqli_real_escape_string($conn,$_POST['password']);
    $sql1="SELECT * FROM users  WHERE email =$emailsql AND pass =$passwordsql";
    $result=mysqli_query($conn,$sql1);
    
    
    if(!$result)
    {
        header("Location:home.php");
    }
    else
    {  
        echo "Incorrect email or password";
    }
    
}

}
?>




<!DOCTYPE html>
<html>

<?php include('templates/header.php');?>

<form id="my-form" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
         <h5> Sign in : </h5>
         <label>Your Email id</label>
         <input type="text" name="email" value= "<?php echo htmlspecialchars($email)?>" >
         <div class="red-text"><?php echo htmlspecialchars($errors['email']) ?></div>
         <label>Password</label>
         <input type="password" name="password" value= "<?php echo htmlspecialchars($password)?>" >
         <div class ="red-text"><?php echo $errors['password']?></div>
         <input type="submit" name="submit" value="Login" class="btn brand">
</form>


     

</body>
<?php
include('templates/footer.php');
 ?>
</html>