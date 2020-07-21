<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Member Participants Edit</title>
</head>

<body>

<table width="558" border="1" align="center">
  <tr>
    <td height="90" colspan="2"><img src="5.png" width="1140" height="300" /></td>
  </tr>
  <tr>
    <td width="59" height="192"><?php include 'activity_menu.php' ?>
    </td>
    <td width="400"><div align="center"></div>
	
<?php  
		//to retrived data
		if (isset($_GET['participant_id']))
			$participant_id = $_GET['participant_id'];
		else
			$participant_id = 0;
		
		include 'connect.php';
		
		$query = "SELECT * FROM participant where participant_id = $participant_id";
		$result = mysqli_query($con,$query) or die('SQL error BOOKING');
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		
		$query = "SELECT mem_id FROM member";
		$result1 = mysqli_query ($con, $query) or die ('SQL error Member');
		$col1 = mysqli_fetch_assoc ($result1);
		
		$query = "SELECT event_id FROM event";
		$result2 = mysqli_query ($con, $query) or die ('SQL error Event');
		$col2 = mysqli_fetch_assoc ($result2);
		
?>
	<?php
		
		//to edit data
		if (isset ($_POST['add']) && isset ($_POST['mem_id'])) {
			//$rent_id = addslashes ($_POST['rent_id']);
			$mem_id = addslashes ($_POST['mem_id']);
			$event_id = addslashes ($_POST['event_id']);
			
			include 'connect.php';
			
			$query = "UPDATE participant SET 
				mem_id = '$mem_id',
				event_id = '$event_id'
				WHERE participant_id = '$participant_id'";
				
			$result = mysqli_query($con,$query);
			if ($result)
				echo 'Edit success';
			else
				echo 'Edit failed';
			 header ("refresh:2; url=participant_list.php");
		}
		
?>
		
		
	<div align ="center">
	<H1>Edit Participant List: <?php echo $participant_id ?></H1>
		<form action="" method="post">
			<TABLE border="1" cellpadding="5" cellspacing="2">
				
				<TR>
					<td>Member ID :</td>
					<TD>	 
					<SELECT name ="mem_id">
					
					<?php while($col1 = mysqli_fetch_assoc($result1)):;?>
					
					<?php foreach ($col1 as $col): ?>
					<option value="<?php echo $col ?>"><?php echo $col ?></option>
					<?php endforeach ?>

					<?php endwhile;?>
					</SELECT>
					</TD>
				</TR>	
				
				<TR>
					<td>Event ID :</td>
					<TD>	 
					<SELECT name ="event_id">
					
					<?php while($col2 = mysqli_fetch_assoc($result2)):;?>
					
					<?php foreach ($col2 as $col): ?>
					<option value="<?php echo $col ?>"><?php echo $col ?></option>
					<?php endforeach ?>

					<?php endwhile;?>
					</SELECT>
					</TD>
				</TR>
				
				<TR align="center">
					<td colspan="2">
						<input type="hidden" name="participant_id" value="<?php echo $row['participant_id']; ?>">
						<input type="submit" name="edit" value=" Edit ">
					
					</form></td>
				</TR>
	
			</TABLE>
		</div>
		
	
	</td>
  </tr>

	</table>
	<?php include 'footer.php' ?>
</body>
</html>