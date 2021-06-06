<?php
	// connect to the database
	
    $conn = mysqli_connect('localhost', 'server', 'server123', 'project1');
	// check connection
	if(!$conn){
		echo 'Connection error: '. mysqli_connect_error();
	}



?>


