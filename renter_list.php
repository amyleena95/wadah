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
		$asc_query = "SELECT * FROM renter ORDER BY renter_name ASC";
		$output = executeQuery($asc_query);
	}
	
	elseif (isset($_POST ['DESC']))
	{
		$desc_query = "SELECT * FROM renter ORDER BY renter_name DESC";
		$output = executeQuery($desc_query);
	}
	
	else
	{
		$default_query = "SELECT * FROM renter";
		$output = executeQuery($default_query);
	}
	
	$search = mysqli_real_escape_string($con, $_REQUEST['search']);
	$sql = "SELECT * FROM renter WHERE renter_name LIKE '%".$search."%'";
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
	<h1> List of Renter </h1>
	<table border =2 cellpadding =2 cellspacing =2>
	
	<form action="renter_list.php" method="post">
		
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
			<th> Renter ID </th>
			<th> Name </th>
			<th> Phone </th>
			<th> Address </th>
			<th> Company </th>
	
			<th colspan ="2"> Action </th>
		</tr>
		
	<?php if (!empty($_REQUEST['search']))
	{		
		while ($row = mysqli_fetch_assoc($r_query))
		{
			echo "<tr>";
			echo "<td>".$row['renter_id']."</td>";
			echo "<td>".$row['renter_name']."</td>";
			echo "<td>".$row['renter_phone']."</td>";
			echo "<td>".$row['renter_add']."</td>";
			echo "<td>".$row['renter_company']."</td>";
		
		echo "<td><a href = renter_edit.php?renter_id=".$row['renter_id']."><img src='edit.png' width='32' height='32'></a></td>";
		echo "<td><a href = renter_delete.php?renter_id=".$row['renter_id']."><img src='del.png' width='32' height='32'></a></td>";	
		echo "</tr>";
		}
	}
	else 
	{
		while ($row = mysqli_fetch_assoc($output))
		{
			echo "<tr>";
			echo "<td>".$row['renter_id']."</td>";
			echo "<td>".$row['renter_name']."</td>";
			echo "<td>".$row['renter_phone']."</td>";
			echo "<td>".$row['renter_add']."</td>";
			echo "<td>".$row['renter_company']."</td>";
		
		echo "<td><a href = renter_edit.php?renter_id=".$row['renter_id']."><img src='edit.png' width='32' height='32'></a></td>";
		echo "<td><a href = renter_delete.php?renter_id=".$row['renter_id']."><img src='del.png' width='32' height='32'></a></td>";	
		echo "</tr>";
		}
	}
	?>
	</form>
	</table>
	<br>
	<br>
	<a href = "renter_print.php"><img src="print.png" width="48" height="48" align="center"/><a>
	</div>
	</td>
	</tr>
	</table>
<?php include 'footer.php' ?>
</body>
</html>