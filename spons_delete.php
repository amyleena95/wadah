<?php
	//connect with MySql Database
	$con = mysqli_connect('127.0.0.1','root','');
	
	//Select database
	mysqli_select_db($con,'wadah4db');
	
	//select query
	$sql = "DELETE FROM sponsorship WHERE spons_id='$_GET[spons_id]'";
	
	//execute the SQL query
	if(mysqli_query($con,$sql))
		header ("refresh:2; url=spons_list.php");
	else
		echo "Not Deleted";
	
?>