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
    <td width="400"><div align="center">		
		<?php   
		//TO ADD DATA
		if (isset($_GET['speaker_id'])) 
			$speaker_id = $_GET['speaker_id'];
		else
			$speaker_id = 0;
		
		include 'connect.php';
		
			$query = "SELECT event_id FROM event";
			$result2 = mysqli_query ( $con, $query) or die ('SQL error event');
			$col2 = mysqli_fetch_assoc ($result2); 
		
		if (isset($_POST['add']) && isset ($_POST['event_id'])) {
			//$speaker_id = addslashes($_POST['speaker_id']);
			$event_id = addslashes($_POST['event_id']);
			$speaker_type = addslashes($_POST['speaker_type']);
			$speaker_name = addslashes($_POST['speaker_name']);
			$speaker_phone_no = addslashes($_POST['speaker_phone_no']);
			$speaker_add = addslashes($_POST['speaker_add']);
			
			include 'connect.php';
			
			$query = "INSERT INTO speaker (speaker_id, event_id, speaker_type, speaker_name, speaker_phone_no, speaker_add ) VALUES 
				('$speaker_id', '$event_id', '$speaker_type', '$speaker_name', '$speaker_phone_no', '$speaker_add')";
			
			$result = mysqli_query($con, $query) or die ('SQL error SPEAKER');
			if ($result)
				echo 'Add success';
			else
				echo 'Add failed';
			header ("refresh:2; url=speaker_list.php");
		}
		?>
		
		<H1>REGISTER SPEAKER</H1>
	
		<form action="speaker_add.php" method="post">
			<TABLE border="1" cellpadding="5" cellspacing="2">
				<TR>
					<td>Event ID :</td><TD>	
					<SELECT name="event_id">
					
					<?php while($col2 = mysqli_fetch_assoc($result2)):;?>
					
					<?php foreach ($col2 as $col): ?>
					<option value="<?php echo $col ?>"><?php echo $col ?></option>
					
					<?php endforeach ?>

					<?php endwhile;?>
					</SELECT>
					</TD>
				</TR>
				<TR>
					<td> Speaker Type :</td>
					<TD>
						<select name="speaker_type">
							
							<option value="Speaker" >SPEAKER</option>
							<option value="Naqib">NAQIB</option>
                            
						</select>
	
					</TD>
				</TR>
				<TR>
					<td> Name :</td>
					<td><input name="speaker_name" value="" type="text" size="50" maxlength="50"></td>
				</TR>
				<TR>
					<td>Phone No. :</td>
					<TD><input name="speaker_phone_no" value="" type="text" size="50" maxlength="50"></TD>
				</TR>
				<TR>
					<td>Address :</td>
					<TD><input name="speaker_add" value="" type="text" size="50" maxlength="50"></TD>
				</TR>
				
				
				
				<TR align="center">
					<td colspan="2">
						
						<input type="submit" name="add" value=" ADD ">
					
					</td>
				</TR> </div>
    </td>
  </tr>
</table>
</body>
</html>
