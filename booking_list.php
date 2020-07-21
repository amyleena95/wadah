<?php
	$con = mysqli_connect("localhost", "root", "", "wadah4db") or die ($con);
	
	function executeQuery($query)
	{
		$con = mysqli_connect("localhost", "root", "", "wadah4db");
		$output = mysqli_query($con, $query);
		return $output;
	}
	
	if (isset($_POST['ASC']))
	{
		$asc_query = "SELECT * FROM rent ORDER BY rent_desc ASC";
		$output = executeQuery($asc_query);
	}
	
	elseif (isset($_POST ['DESC']))
	{
		$desc_query = "SELECT * FROM rent ORDER BY rent_desc DESC";
		$output = executeQuery($desc_query);
	}
	
	else
	{
		$default_query = "SELECT * FROM rent";
		$output = executeQuery($default_query);
	}
	
	$search = mysqli_real_escape_string($con, $_REQUEST['search']);
	$sql = "SELECT * FROM rent WHERE rent_desc LIKE '%".$search."%'";
	$r_query = mysqli_query($con, $sql);
?>


<html>
<head>
	<title> DATA SEARCH </title>
	<style>	
		table, tr, th, td
		{
			border: 1px solid black;
		}
	</style>
</head>

<body>
	<table width="558" border="1" align="center">
  <tr>
    <td height="90" colspan="2"><img src="5.png" width="1140" height="300" /></td>
  </tr>
  <tr>
    <td width="59" height="192"><?php include 'asset_menu.php' ?>
    </td>
    <td width="400"><div align="center"></div>
	
	<div align = "center">
	<br>
	<h1> List of Booking </h1>
	<table border =2 cellpadding =2 cellspacing =2>
	
	<form action="booking_list.php" method="post">
		
		<input type="text" name="search" placeholder="Search description"/>
		<input type="submit" value="Submit"/>
		<br>
		<br>
		<?php echo 'Sort: &nbsp;&nbsp;&nbsp;&nbsp;' ?>
		<button type = "submit" name ="ASC" style="padding: 0; border; none;"><img src="asc.png" width = "32" height = "32" /></button> 
		<?php echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' ?>
		<button type = "submit" name ="DESC" style="padding: 0; border; none;"><img src="des.png" width = "32" height = "32" /></button>
		
		<br><br>
		<br>
		<br>
		<tr>
			<th> Rent ID </th>
			<th> Asset ID </th>
			<th> Renter ID </th>
			<th> Day </th>
			<th> Description </th>
			<th> Time </th>
			<th> Date </th>
			<th> Deposit </th>
			<th> Payment </th>
	
			<th colspan ="2"> Action </th>
		</tr>
		
	<?php if (!empty($_REQUEST['search']))
	{		
		while ($row = mysqli_fetch_assoc($r_query))
		{
			echo "<tr>";
			echo "<td>".$row['rent_id']."</td>";
			echo "<td>".$row['asset_id']."</td>";
			echo "<td>".$row['renter_id']."</td>";
			echo "<td>".$row['rent_day']."</td>";
			echo "<td>".$row['rent_desc']."</td>";
			echo "<td>".$row['rent_time']."</td>";
			echo "<td>".$row['rent_date']."</td>";
			echo "<td>".$row['rent_deposit']."</td>";
			echo "<td>".$row['rent_payment']."</td>";
		
		echo "<td><a href = booking_edit.php?rent_id=".$row['rent_id']."><img src='edit.png' width='32' height='32'></a></td>";
		echo "<td><a href = booking_delete.php?rent_id=".$row['rent_id']."><img src='del.png' width='32' height='32'></a></td>";	
		echo "</tr>";
		}
	}
	else 
	{
		while ($row = mysqli_fetch_assoc($output))
		{
			echo "<tr>";
			echo "<td>".$row['rent_id']."</td>";
			echo "<td>".$row['asset_id']."</td>";
			echo "<td>".$row['renter_id']."</td>";
			echo "<td>".$row['rent_day']."</td>";
			echo "<td>".$row['rent_desc']."</td>";
			echo "<td>".$row['rent_time']."</td>";
			echo "<td>".$row['rent_date']."</td>";
			echo "<td>".$row['rent_deposit']."</td>";
			echo "<td>".$row['rent_payment']."</td>";
		
		echo "<td><a href = booking_edit.php?rent_id=".$row['rent_id']."><img src='edit.png' width='32' height='32'></a></td>";
		echo "<td><a href = booking_delete.php?rent_id=".$row['rent_id']."><img src='del.png' width='32' height='32'></a></td>";	
		echo "</tr>";
		}
	}
	?>
	</form>
	</table>
	<br>
	<br>
	<a href = "booking_print.php"><img src="print.png" width="48" height="48" align="center"/><a>
	</div>
	</td>
	</tr>
	</table>
<?php include 'footer.php' ?>
</body>
</html>