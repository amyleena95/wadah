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
		$asc_query = "SELECT * FROM occupation ORDER BY occ_department ASC";
		$output = executeQuery($asc_query);
	}
	
	elseif (isset($_POST ['DESC']))
	{
		$desc_query = "SELECT * FROM occupation ORDER BY occ_department DESC";
		$output = executeQuery($desc_query);
	}
	
	else
	{
		$default_query = "SELECT * FROM occupation";
		$output = executeQuery($default_query);
	}
	
	$search = mysqli_real_escape_string($con, $_REQUEST['search']);
	$sql = "SELECT * FROM occupation WHERE occ_department LIKE '".$search."'";
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
    <td height="90" colspan="2"><img src="2.png" width="1140" height="300" /></td>
  </tr>
  <tr>
    <td width="59" height="192"><?php include 'member_sidemenu.php' ?>
    </td>
    <td width="400"><div align="center"></div>
	
	<div align = "center">
	<br>
	<h1> List of Occupation </h1>
	<table border =2 cellpadding =2 cellspacing =2>
	
	<form action="occ_list.php" method="post">
		
		<input type="text" name="search" placeholder="Search department"/>
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
			<th> Occupation ID </th>
			<th> Member ID</th>
			<th> Department</th>
			<th> Position </th>
			
			<th colspan ="2"> Action </th>
		</tr>
		
	<?php if (!empty($_REQUEST['search']))
	{		
		while ($row = mysqli_fetch_assoc($r_query))
		{
			echo "<tr>";
			echo "<td>".$row['occ_id']."</td>";
			echo "<td>".$row['mem_id']."</td>";
			echo "<td>".$row['occ_department']."</td>";
			echo "<td>".$row['occ_position']."</td>";

		echo "<td><a href = occ_edit.php?occ_id=".$row['occ_id']."><img src='edit.png' width='32' height='32'></a></td>";
		echo "<td><a href = occ_delete.php?occ_id=".$row['occ_id']."><img src='del.png' width='32' height='32'></a></td>";	
		echo "</tr>";
		}
	}
	else 
	{
		while ($row = mysqli_fetch_assoc($output))
		{
			echo "<tr>";
			echo "<td>".$row['occ_id']."</td>";
			echo "<td>".$row['mem_id']."</td>";
			echo "<td>".$row['occ_department']."</td>";
			echo "<td>".$row['occ_position']."</td>";

		echo "<td><a href = occ_edit.php?occ_id=".$row['occ_id']."><img src='edit.png' width='32' height='32'></a></td>";
		echo "<td><a href = occ_delete.php?occ_id=".$row['occ_id']."><img src='del.png' width='32' height='32'></a></td>";	
		echo "</tr>";
		
		}
	}
	?>
	</form>
	</table>
	<br>
	<br>
	<a href = "occ_print.php"><img src="print.png" width="48" height="48" align="center"/><a>
	</div>
	</td>
	</tr>
	</table>
<?php include 'footer.php' ?>
</body>
</html>