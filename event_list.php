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
		$asc_query = "SELECT * FROM event ORDER BY event_type ASC";
		$output = executeQuery($asc_query);
	}
	
	elseif (isset($_POST ['DESC']))
	{
		$desc_query = "SELECT * FROM event ORDER BY event_type DESC";
		$output = executeQuery($desc_query);
	}
	
	else
	{
		$default_query = "SELECT * FROM event";
		$output = executeQuery($default_query);
	}
	
	$search = mysqli_real_escape_string($con, $_REQUEST['search']);
	$sql = "SELECT * FROM event WHERE event_type LIKE '%".$search."%'";
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
    <td height="90" colspan="2"><img src="3.png" width="1140" height="300" /></td>
  </tr>
  <tr>
    <td width="59" height="192"><?php include 'activity_menu.php' ?>
    </td>
    <td width="400"><div align="center"></div>
	
	<div align = "center">
	<br>
	<h1> List of Events </h1>
	<table border =2 cellpadding =2 cellspacing =2>
	
	<form action="event_list.php" method="post">
		
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
           	  <TH>ID</TH>
			  <TH>TYPE</TH>
			  <TH>TOPIC</TH>
			  <TH>DATE</TH>
			  <TH>TIME</TH>
			  <TH>VENUE</TH>
			
			<th colspan ="2"> Action </th>
		</tr>
		
	<?php if (!empty($_REQUEST['search']))
	{		
		while ($row = mysqli_fetch_assoc($r_query))
		{
			echo "<tr>";
			echo "<td>".$row['event_id']."</td>";
			echo "<td>".$row['event_type']."</td>";
			echo "<td>".$row['event_topic']."</td>";
			echo "<td>".$row['event_date']."</td>";
			echo "<td>".$row['event_time']."</td>";
			echo "<td>".$row['event_venue']."</td>";
		
		echo "<td><a href = event_edit.php?event_id=".$row['event_id']."><img src='edit.png' width='32' height='32'></a></td>";
		echo "<td><a href = event_delete.php?event_id=".$row['event_id']."><img src='del.png' width='32' height='32'></a></td>";	
		echo "</tr>";
		}
	}
	else 
	{
		while ($row = mysqli_fetch_assoc($output))
		{
			echo "<tr>";
			echo "<td>".$row['event_id']."</td>";
			echo "<td>".$row['event_type']."</td>";
			echo "<td>".$row['event_topic']."</td>";
			echo "<td>".$row['event_date']."</td>";
			echo "<td>".$row['event_time']."</td>";
			echo "<td>".$row['event_venue']."</td>";
		
		echo "<td><a href = event_edit.php?event_id=".$row['event_id']."><img src='edit.png' width='32' height='32'></a></td>";
		echo "<td><a href = event_delete.php?event_id=".$row['event_id']."><img src='del.png' width='32' height='32'></a></td>";	
		echo "</tr>";
		}
	}
	?>
	</form>
	</table>
	<br>
	<br>
	<a href = "event_print.php"><img src="print.png" width="48" height="48" align="center"/><a>
	</div>
	</td>
	</tr>
	</table>
<?php include 'footer.php' ?>
</body>
</html>