<html>
<head>
<title> EVENTS </title>
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
		if (isset($_GET['event_id'])) 
			$event_id = $_GET['event_id'];
		else
			$event_id = 0;
		
		include ('connect.php');
		
			
		//to add data
		if (isset ($_POST['add']) && isset ($_POST['event_type'])) {
			$event_type = addslashes($_POST['event_type']);
			$event_topic = addslashes($_POST['event_topic']);
			$event_date = addslashes($_POST['event_date']);
			$event_time = addslashes($_POST['event_time']);
			$event_venue = addslashes($_POST['event_venue']);
					
			include ('connect.php');
			
			$query = "INSERT INTO event (event_id, event_type, event_topic, event_date, event_time, event_venue ) VALUES 
				('$event_id', '$event_type', '$event_topic', '$event_date', '$event_time', '$event_venue' )";
				
			$result = mysqli_query ($con, $query);
			if ($result)
				echo 'Add success';
			else
				echo 'Add failed';
			header ("refresh:2; url=event_list.php");
		}
		?>
		
	
	<div align="center">
		<H1>REGISTER EVENT</H1>
	
		<form action="event_add.php" method="post">
			<TABLE border="1" cellpadding="5" cellspacing="2">
				
				<TR>
					<td>Event Type  :</td>
					<td><input name="event_type" value="" type="text" size="50" maxlength="50"></td>
				</TR>
				
				<TR>
					<td> Title :</td>
					<td><input name="event_topic" value="" type="text" size="50" maxlength="50"></td>
				</TR>
				
				<TR>
					<td> Date :</td>
					<TD><input name="event_date" value="" type="date" size="50" maxlength="50"></TD>
				</TR>
				<TR>
					<td> Time :</td>
					<TD><input name="event_time" value="" type="time" size="50" maxlength="50"></TD>
				</TR>
				<TR>
					<td> Venue :</td>
					<TD><input name="event_venue" value="" type="text" size="50" maxlength="50"></TD>
				</TR>
				
				<TR align="center">
					<td colspan="2">
						
						<input id="submit" type="submit" name="add" value=" Submit ">
						
					</td>
				</TR>
				
			</TABLE>
			</form>
			</div>
</td>
</tr>
</table>
		<?php include 'footer.php' ?>	
</body>
</html>