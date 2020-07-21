<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>EVENT</title>
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
	
	
<?php  
		//to retrived data
		if (isset($_GET['event_id']))
			$event_id = $_GET['event_id'];
		else
			$event_id = 0;
		
		include 'connect.php';
		
		$query = "SELECT * FROM event  where event_id = $event_id";
		$result = mysqli_query($con,$query) or die('SQL error EVENT');
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		
?>
	<?php
		
		//to edit data
		if (isset($_POST['edit']) && isset($_POST['event_id'])) {
			
			$event_id = addslashes($_POST['event_id']);
			$event_type = addslashes($_POST['event_type']);
			$event_topic = addslashes($_POST['event_topic']);
			$event_date= addslashes($_POST['event_date']);
			$event_time = addslashes($_POST['event_time']);
			$event_venue= addslashes($_POST['event_venue']);
			
			include 'connect.php';
			
			$query = "UPDATE event SET 
				event_id = '$event_id',
				event_type = '$event_type',
				event_topic = '$event_topic',
				event_date = '$event_date',
				event_time = '$event_time',
				event_venue = '$event_venue'
				WHERE event_id = '$event_id'";
				
			$result = mysqli_query($con,$query);
			if ($result)
				echo 'Edit success';
			else
				echo 'Edit failed';
			 header ("refresh:2; url=event_list.php");
		}
		
?>
		
		
<div align ="center">
	<form action = "" method = "post">
	<table border="1" cellpadding="5" cellspacing="2">
	
		<H1>EDIT EVENT</H1>
	
		<form action="" method="post">
			<TABLE border="1" cellpadding="5" cellspacing="2">
				
   
				<TR>
					<td>Event Type :</td>
					<TD><input name="event_type" value="<?php echo $row['event_type']; ?>" type="text" size="50" maxlength="100"></TD>
				</TR>
				
				<TR>
					<td>Topic :</td>
					<TD><input name="event_topic" value="<?php echo $row['event_topic']; ?>" type="text" size="50" maxlength="100"></TD>
				</TR>
             
				<TR>
					<td>Date :</td>
					<TD><input name="event_date" value="<?php echo $row['event_date']; ?>" type="date" size="50" maxlength="50"></TD>
				</TR>	
                
				<TR>
					<td>Time :</td>
					<TD><input name="event_time" value="<?php echo $row['event_time']; ?>" type="time" size="50" maxlength="50"></TD>
				</TR>	
                <TR>
					<td>Venue :</td>
					<TD><input name="event_venue" value="<?php echo $row['event_venue']; ?>" type="text" size="50" maxlength="100"></TD>
				</TR>	
               
                	
				<TR align="center">
					<td colspan="2">
						<input type="hidden" name="event_id" value="<?php echo $row['event_id']; ?>">
						<input type="submit" name="edit" value=" Edit ">
					
					</form></td>
				</table>
				</TR>

  </table>
  <?php include 'footer.php' ?>
</body>
</html>