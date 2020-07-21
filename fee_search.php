<?php

	//$con = mysqli_connect ("localhost","root","") or die ("could not connect");
	//$mysqli_select_db("wadahdb") or die ("could not find db");
	include 'connect.php';
	$output = '';

	//collect
	if (isset ($_POST['search'])) {
		$searchq = $_POST['search'];
		$searchq = preg_replace("#[^0-9a-z]#i","",$searchq);
	

		
		$query = "SELECT * FROM asset WHERE asset_facility LIKE '%$searchq%'";
		$result = mysqli_query($con, $query);
		$count = mysqli_num_rows($result);
		if ($count == 0) {
			$output = 'There was no search result.';
		} 
		else {
			while ($row = mysqli_fetch_assoc($result)) {
				$fee_id = $row['fee_id'];
				$mem_id = $row['mem_id'];
				$fee_amt = $row['fee_amt'];
				$fee_date = $row['fee_date'];
				$fee_status = $row['fee_status'];
				
				$output .= '<div> '.$fee_id.' '.$mem_id.' '.$fee_amt.' '.$fee_amt.' '.$fee_date.' '.$fee_status.'</div> ';
			}
	}
	
	}
?>


<!DOCTYPE HTML>
<html>
<head>
	<title> Search Fee </title>
</head>
<body>
	<?php
		print ("$output");
	?>
	<td><a href = "fee_list.php">Back</a></td>
</body>
</html>