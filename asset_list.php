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
		$asc_query = "SELECT * FROM asset ORDER BY asset_facility ASC";
		$output = executeQuery($asc_query);
	}
	
	elseif (isset($_POST ['DESC']))
	{
		$desc_query = "SELECT * FROM asset ORDER BY asset_facility DESC";
		$output = executeQuery($desc_query);
	}
	
	else
	{
		$default_query = "SELECT * FROM asset";
		$output = executeQuery($default_query);
	}
	
	$search = mysqli_real_escape_string($con, $_REQUEST['search']);
	$sql = "SELECT * FROM asset WHERE asset_facility LIKE '%".$search."%'";
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
	<h1> List of Assets </h1>
	<table border =2 cellpadding =2 cellspacing =2>
	
	<form action="asset_list.php" method="post">
		
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
			<th> Asset ID </th>
			<th> Asset Facility </th>
			<th> Description </th>
			<th> Date </th>
			<th> Total </th>
			<th> Price</th>
			<th> Asset Type </th>
			
			<th colspan ="2"> Action </th>
		</tr>
		
	<?php if (!empty($_REQUEST['search']))
	{		
		while ($row = mysqli_fetch_assoc($r_query))
		{
			echo "<tr>";
			echo "<td>".$row['asset_id']."</td>";
			echo "<td>".$row['asset_facility']."</td>";
			echo "<td>".$row['asset_desc']."</td>";
			echo "<td>".$row['asset_date']."</td>";
			echo "<td>".$row['asset_total']."</td>";
			echo "<td>".$row['asset_price']."</td>";
			echo "<td>".$row['asset_type']."</td>";
		
		echo "<td><a href = asset_edit.php?asset_id=".$row['asset_id']."><img src='edit.png' width='32' height='32'></a></td>";
		echo "<td><a href = asset_delete.php?asset_id=".$row['asset_id']."><img src='del.png' width='32' height='32'></a></td>";	
		echo "</tr>";
		}
	}
	else 
	{
		while ($row = mysqli_fetch_assoc($output))
		{
			echo "<tr>";
			echo "<td>".$row['asset_id']."</td>";
			echo "<td>".$row['asset_facility']."</td>";
			echo "<td>".$row['asset_desc']."</td>";
			echo "<td>".$row['asset_date']."</td>";
			echo "<td>".$row['asset_total']."</td>";
			echo "<td>".$row['asset_price']."</td>";
			echo "<td>".$row['asset_type']."</td>";
		
		echo "<td><a href = asset_edit.php?asset_id=".$row['asset_id']."><img src='edit.png' width='32' height='32'></a></td>";
		echo "<td><a href = asset_delete.php?asset_id=".$row['asset_id']."><img src='del.png' width='32' height='32'></a></td>";	
		echo "</tr>";
		}
	}
	?>
	</form>
	</table>
	<br>
	<br>
	<a href = "asset_print.php"><img src="print.png" width="48" height="48" align="center"/><a>
	</div>
	</td>
	</tr>
	</table>
<?php include 'footer.php' ?>
</body>
</html>