<?php

	if (isset($_POST['ASC']))
	{
		$asc_query = "SELECT * FROM rent ORDER BY rent_desc ASC";
		$result = executeQuery($asc_query);
	}
	
	elseif (isset($_POST ['DESC']))
	{
		$desc_query = "SELECT * FROM rent ORDER BY rent_desc DESC";
		$result = executeQuery($desc_query);
	}
	
	else
	{
		$default_query = "SELECT * FROM rent";
		$result = executeQuery($default_query);
	}


	function executeQuery($query)
	{
		$con = mysqli_connect("localhost", "root", "", "wadahdb");
		$result = mysqli_query ($con, $query);
		return $result;
	}
	
	
?>

<html>
<head>
	<title> Sort Table Data </title>
	<style>
		table,tr,th,td
		{
			border: 1px solid black;
		}
	</style>
</head>

<body>
	
	<form action = "booking_sort.php" method = "post">
	
		<input type = "submit" name ="ASC" value = "Ascending"> <br><br>
		<input type = "submit" name ="DESC" value = "Descending"> <br><br>
		
		<table>
			<tr>
				<th> Rent ID </th>
				<th> Asset ID </th>
				<th> Renter ID </th>
				<th> Days </th>
				<th> Description </th>
				<th> Time </th>
				<th> Date </th>
				<th> Deposit </th>
				<th> Payment </th>
			</tr>
		
		<?php while ($row = mysqli_fetch_array($result)):?>
		<tr>
			<td><?php echo $row[0];?></td>
			<td><?php echo $row[1];?></td>
			<td><?php echo $row[2];?></td>
			<td><?php echo $row[3];?></td>
			<td><?php echo $row[4];?></td>
			<td><?php echo $row[5];?></td>
			<td><?php echo $row[6];?></td>
			<td><?php echo $row[7];?></td>
			<td><?php echo $row[8];?></td>
		</tr>
		
			<?php endwhile; ?>
		
		</table>
		</form>
		
		<td><a href = "booking_list.php">Back</a></td>
		
</body>
</html>
