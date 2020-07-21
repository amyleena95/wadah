<?php

	//$con = mysqli_connect ("localhost","root","") or die ("could not connect");
	//$mysqli_select_db("wadahdb") or die ("could not find db");
	include 'connect.php';
	$output = '';

	//collect
	if (isset ($_POST['search'])) {
		$searchq = $_POST['search'];
		$searchq = preg_replace("#[^0-9a-z]#i","",$searchq);
	

		
		$query = "SELECT * FROM sponsorship WHERE spons_desc LIKE '%$searchq%'";
		$result = mysqli_query($con, $query);
		$count = mysqli_num_rows($result);
		if ($count == 0) {
			$output = 'There was no search result.';
		} 
		else {
			while ($row = mysqli_fetch_assoc($result)) {
				$spons_id = $row['spons_id'];
				$sponsor_id = $row['sponsor_id'];
				$spons_desc = $row['spons_desc'];
				$spons_amt = $row['spons_amt'];
				$spons_date = $row['spons_date'];
				$event_id = $row['event_id'];
				
				$output .= '<div> '.$spons_id.' '.$sponsor_id.' '.$spons_desc.' '.$spons_amt.' '.$spons_date.' '.$event_id.' </div> ';
			}
	}
	
	}
?>


<!DOCTYPE HTML>
<html>
<head>
	<title> Search Result</title>
</head>
<body>
	
	<?php
		print ("$output");
	?>
	<td><a href = "spons_list.php">Back</a></td>
</body>
</html>