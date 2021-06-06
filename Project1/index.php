<?php
	include('db_connect.php');

$errors=['fullname'=>'','comment'=>''];
$name='';
$comment='';
if(isset(($_POST['submit']))){
    if(!session_id()) session_start();
    $approval=1;
    $_SESSION['status']=$approval;
    $_SESSION['comment']=$_POST['comment'];
    
    $_SESSION['fname'] =$_POST['fullname'];
    
   
   if(empty($_POST['fullname'])){
    $errors['fullname']= "Please enter your name";
   }
   else{

   $name  = $_POST['fullname'];
    
    if(!preg_match("/^[a-zA-Z\s]+$/",$_POST['fullname'])){
        $errors['fullname']="Name must consist of letters and spaces";
    }
   }
   if(empty($_POST['comment'])){
    $errors['comment']= "Please enter a comment";
}
    else{
        $comment = $_POST['comment'];
        
    }

if(array_filter($errors)){}
else{
    $namesql = mysqli_real_escape_string($conn,$_SESSION['fname']);
    $commentsql = mysqli_real_escape_string($conn,$_SESSION['comment']);
    $statussql= mysqli_real_escape_string($conn,$_SESSION['status']);
    $sql=" INSERT INTO comments (full_name,comment,approval) VALUES ('$namesql','$commentsql','$statussql')";
    if(mysqli_query($conn,$sql)){

        }
    else{
        echo 'Query error :'.mysqli_error($conn);
    }

}
$sql = 'SELECT * FROM comments ORDER BY created_at';

// get the result set (set of rows)
$result = mysqli_query($conn, $sql);

// fetch the resulting rows as an array
if(!$result){

}
else{
    global $comments;
    $comments = mysqli_fetch_all($result, MYSQLI_ASSOC);
   
    mysqli_close($conn);
    
}
}
// close connection







?>











<!DOCTYPE html>
<html>

 <?php include('templates/header.php');?>
 <div class="title">
		<div class="row">

			<?php if(!empty($comments)) {'<ul>'; foreach($comments as $com):
                    if($com['approval']==1){'<li>' ;?>

				<div width="90%" class="col s6 m12">
					<div class=" card z-depth-0">
						<div class="card-content " style="width: 100%;border-left: 6px solid rgb(151, 24, 201);">
							<p><?php echo htmlspecialchars($com['comment']); ?></p>
						
							<span class=" card-content right " >-<?php echo "".$com['full_name']?></span>
						</div>
					</div>
				</div>
            <?php '</li>';}?>
			<?php  endforeach; }?>

		</div>
	</div>

     <form id="my-form" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
         <h5> Add Comment : </h5>
         <label>Your Full Name</label>
         <input type="text" name="fullname" value= "<?php echo htmlspecialchars($name)?>" >
         <div class="red-text"><?php echo htmlspecialchars($errors['fullname']) ?></div>
         <label>Your Comment</label>
         <input type="text" name="comment" value= "<?php echo htmlspecialchars($comment)?>" >
         <div class ="red-text"><?php echo $errors['comment']?></div>
         <input type="submit" name="submit" value="submit" class="btn brand">
     </form>
 
 
     

</body>
<?php
include('templates/footer.php');
 ?>
</html>