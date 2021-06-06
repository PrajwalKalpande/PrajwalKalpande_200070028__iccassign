<?php
	include('db_connect.php');

$sql = 'SELECT title,description,salary,company FROM jobs ORDER BY salary';
if(isset($_POST['submit'])){
    
}
// get the result set (set of rows)
$result = mysqli_query($conn, $sql);

$jobs=mysqli_fetch_all($result,MYSQLI_ASSOC);
mysqli_free_result($result);

// close connection
mysqli_close($conn);



?>











<!DOCTYPE html>
<html>


 <?php include('templates/header.php');?>
 <div class="title">
		<div class="row">

			<?php  foreach($jobs as $job): ?>
                   

		
						<div class=" " style="padding: 2rem;
  background: #f4f4f4; width: 100%;border-left: 6px solid rgb(151, 24, 201);">
							<div class="  right "style="color:#c03614;" >COMPANY-<?php echo "".$job['company']?></div>
                            <div><?php echo htmlspecialchars($job['description']); ?></p>
						
                            <span class=" card-content right  " >-<?php echo "".$job['title']?></span>
                    <form >       <input type="submit" name="submit" value="apply" class="btn brand">
                    </form>
                </div>
					</div>
				
            <?php endforeach; ?>
		</div>
	</div>

    
 
 
     

<?php
include('templates/footer.php'); ?>
</html>