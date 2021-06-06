<?php
	
    $conn = mysqli_connect('localhost', 'server1', 'server123', 'project2');
	// check connection
	if(!$conn){
		echo 'Connection error: '. mysqli_connect_error();
	}
	


?>


