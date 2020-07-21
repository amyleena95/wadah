<?php

	//$con = mysqli_connect ("localhost","root","") or die ("could not connect");
	//$mysqli_select_db("wadahdb") or die ("could not find db");
	include 'connect.php';
	$output = '';

	//collect
	if (isset ($_POST['search'])) {
		$searchq = $_POST['search'];
		$searchq = preg_replace("#[^0-9a-z]#i","",$searchq);
	

		
		$query = "SELECT * FROM sponsor WHERE sponsor_name LIKE '%$searchq%'";
		$result = mysqli_query($con, $query);
		$count = mysqli_num_rows($result);
		if ($count == 0) {
			$output = 'There was no search result.';
		} 
		else {
			while ($row = mysqli_fetch_assoc($result)) {
				$sponsor_id = $row['sponsor_id'];
				$sponsor_name = $row['sponsor_name'];
				$sponsor_date = $row['sponsor_date'];
				$sponsor_email = $row['sponsor_email'];
				$sponsor_phone = $row['sponsor_phone'];
				
				$output .= '<div> '.$sponsor_id.' '.$sponsor_name.' '.$sponsor_date.' '.$sponsor_email.' '.$sponsor_phone.' </div> ';
			}
	}
	
	}
?>


<!DOCTYPE HTML>
<html>
<head>
	<title> Search Sponsor </title>
</head>
<body>
	
	<?php
		print ("$output");
	?>
	<td><a href = "sponsor_list.php">Back</a></td>
</body>
</html>