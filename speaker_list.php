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
		$asc_query = "SELECT * FROM speaker ORDER BY speaker_type ASC";
		$output = executeQuery($asc_query);
	}
	
	elseif (isset($_POST ['DESC']))
	{
		$desc_query = "SELECT * FROM speaker ORDER BY speaker_type DESC";
		$output = executeQuery($desc_query);
	}
	
	else
	{
		$default_query = "SELECT * FROM speaker";
		$output = executeQuery($default_query);
	}
	
	$search = mysqli_real_escape_string($con, $_REQUEST['search']);
	$sql = "SELECT * FROM speaker WHERE speaker_type LIKE '%".$search."%'";
	$r_query = mysqli_query($con, $sql);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>WADAH</title>
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
	<h1> List of Speakers </h1>
	<table border =2 cellpadding =2 cellspacing =2>
	
	<form action="speaker_list.php" method="post">
		
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
			<TR>
			 
           	  <TH>SPEAKER ID</TH>
			   <TH>EVENT ID</TH>
			   <TH>TYPE</TH>
			  <TH>NAME</TH>
			  <TH>PHONE NO.</TH>
			  <TH>ADDRESS</TH>
			  
              <th colspan ="2"> Action </th>
            </TR>
			<?php if (!empty($_REQUEST['search']))
	{		
		while ($row = mysqli_fetch_assoc($r_query))
		{
			echo "<tr>";
			echo "<td>".$row['speaker_id']."</td>";
			echo "<td>".$row['event_id']."</td>";
			echo "<td>".$row['speaker_type']."</td>";
			echo "<td>".$row['speaker_name']."</td>";
			echo "<td>".$row['speaker_phone_no']."</td>";
			echo "<td>".$row['speaker_add']."</td>";
		
		echo "<td><a href = speaker_edit.php?speaker_id=".$row['speaker_id']."><img src='edit.png' width='32' height='32'></a></td>";
		echo "<td><a href = speaker_delete.php?speaker_id=".$row['speaker_id']."><img src='del.png' width='32' height='32'></a></td>";	
		echo "</tr>";
		}
	}
	else 
	{
		while ($row = mysqli_fetch_assoc($output))
		{
			echo "<tr>";
			echo "<td>".$row['speaker_id']."</td>";
			echo "<td>".$row['event_id']."</td>";
			echo "<td>".$row['speaker_type']."</td>";
			echo "<td>".$row['speaker_name']."</td>";
			echo "<td>".$row['speaker_phone_no']."</td>";
			echo "<td>".$row['speaker_add']."</td>";
		
		echo "<td><a href = speaker_edit.php?speaker_id=".$row['speaker_id']."><img src='edit.png' width='32' height='32'></a></td>";
		echo "<td><a href = speaker_delete.php?speaker_id=".$row['speaker_id']."><img src='del.png' width='32' height='32'></a></td>";	
		echo "</tr>";
		}
	}
	?>
	</form>
	</table>
	<br>
	<br>
	<a href = "speaker_print.php"><img src="print.png" width="48" height="48" align="center"/><a>
	</div>
	</td>
	</tr>
	</table>
<?php include 'footer.php' ?>
</body>
</html>

