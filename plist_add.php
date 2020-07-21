<html>
<head>
<title> New Participant List: Public </title>
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
		if (isset($_GET['plist_id'])) 
			$plist_id = $_GET['plist_id'];
		else
			$plist_id = 0;
		
		include ('connect.php');
		
		$query = "SELECT event_id FROM event";
		$result1 = mysqli_query ($con, $query) or die ('SQL error ASSET');
		$col1 = mysqli_fetch_assoc ($result1);
		
		$query = "SELECT public_ic FROM public";
		$result2 = mysqli_query ($con, $query) or die ('SQL error RENTER');
		$col2 = mysqli_fetch_assoc ($result2);
		
		//to add data
		if (isset ($_POST['add']) && isset ($_POST['public_ic'])) {
			//$rent_id = addslashes ($_POST['rent_id']);
			$public_ic = addslashes ($_POST['public_ic']);
			$event_id = addslashes ($_POST['event_id']);
			
			include ('connect.php');
			
			$query = "INSERT INTO plist (event_id, public_ic)
			VALUES ('$event_id','$public_ic')";
			
			
			$result = mysqli_query ($con, $query) or die ('SQL error PARTICIPANT');
			if ($result)
				echo 'Add Success';
			else
				echo 'Add failed';
			 header ("refresh:2; url=plist_list.php");
			
		}
	?>
	
	<div align="center">
	<h1><br>Participant List: Public</h1></br>
	
	<form action="" method="post">
			<TABLE border="1" cellpadding="5" cellspacing="2">
				
				
				<TR>
					<td>Event ID :</td><TD>	 
					
					<SELECT name ="event_id">
					
					<?php while($col1 = mysqli_fetch_assoc($result1)):;?>
					
					<?php foreach ($col1 as $col): ?>
					<option value="<?php echo $col ?>"><?php echo $col ?></option>
					<?php endforeach ?>

					<?php endwhile;?>
					</SELECT>
					</TD>
				</TR>
				
				<TR>
					<td>Public NRIC :</td><TD>	
					<SELECT name="public_ic">
					
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