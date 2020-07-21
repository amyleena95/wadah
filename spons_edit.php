<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Edit Sponsorship</title>
</head>

<body>
	
<?php  
		//to retrived data
		if (isset($_GET['spons_id']))
			$spons_id = $_GET['spons_id'];
		else
			$spons_id = 0;
		
		include 'connect.php';
		
		$query = "SELECT * FROM sponsorship where spons_id = $spons_id";
		$result = mysqli_query($con,$query) or die('SQL error FEE');
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		
		$query = "SELECT sponsor_id FROM sponsor";
		$result1 = mysqli_query ($con, $query) or die ('SQL error SPONSOR');
		$col1 = mysqli_fetch_assoc ($result1);
		
		$query = "SELECT event_id FROM event";
		$result2 = mysqli_query ($con, $query) or die ('SQL error SPONSOR');
		$col2 = mysqli_fetch_assoc ($result2);
		
?>
	<?php
		
		//to edit data
		if (isset ($_POST['edit']) && isset ($_POST['spons_id'])) 
		{
			$spons_id = addslashes ($_POST['spons_id']);
			$sponsor_id = addslashes ($_POST['sponsor_id']);
			$spons_desc = addslashes ($_POST['spons_desc']);
			$spons_amt = addslashes ($_POST['spons_amt']);
			$spons_date = addslashes ($_POST['spons_date']);
			$event_id = addslashes ($_POST['event_id']);
			
			include 'connect.php';
			
			$query= "UPDATE sponsorship SET 
			spons_desc = '$_POST[spons_desc]',
			spons_amt = '$_POST[spons_amt]',
			spons_date ='$_POST[spons_date]',
			event_id = '$_POST[event_id]'
			WHERE spons_id= $_POST[spons_id]";
				
			$result = mysqli_query($con,$query);
			if ($result)
				echo 'Edit success';
			else
				echo 'Edit failed';
			 header ("refresh:2; url=spons_list.php");
		}
		
?>
		
		
	<div align ="center">
	<H1>Edit Sponsorship: <?php echo $spons_id?></H1>
		<form action="" method="post">
			<TABLE border="1" cellpadding="5" cellspacing="2">
				
				<TR>
					<td>Description :</td>
					<td><SELECT name = "spons_desc">
					<option value ="<?php echo $row['spons_desc']; ?>">Unchanged</option>
					<option value ="Cash">Cash</option>
					<option value ="Cheque">Cheque</option>
					<option value ="Fund Transfer (Online)">Fund Transfer (Online)</option>
					<option value ="Fund Transfer (CDM)">Fund Transfer (CDM)</option>
				</TR>	
				
				<TR>
					<td>Amount Received :</td>
					<TD><input name="spons_amt" value="<?php echo $row['spons_amt']; ?>" type="text" size="50" maxlength="50"></TD>
				</TR>	
			
			
				<TR>
					<td>Date :</td>
					<TD><input name="spons_date" value="<?php echo $row['spons_date']; ?>" type="date" size="50" maxlength="50"></TD>
				</TR>
				
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
				
				<TR align="center">
					<td colspan="2">
						<input type="hidden" name="spons_id" value="<?php echo $row['spons_id']; ?>">
						<input type="submit" name="edit" value=" Edit ">
					
					</form></td>
				</TR>
	
			</TABLE>
		</div>
		
	
	</td>
  </tr>

	
</body>
</html>