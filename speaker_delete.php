<?php
	//connect with MySql Database
	$con = mysqli_connect('127.0.0.1','root','');
	
	//Select database
	mysqli_select_db($con,'wadah4db');
	
	//select query
	$sql = "DELETE FROM speaker WHERE speaker_id='$_GET[speaker_id]'";
	
	//execute the SQL query
	if(mysqli_query($con,$sql))
		header ("refresh:2; url=speaker_list.php");
	else
		echo "Not Deleted";
	
?>