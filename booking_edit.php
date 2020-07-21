<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Edit Booking</title>
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
	
<?php  
		//to retrived data
		if (isset($_GET['rent_id']))
			$rent_id = $_GET['rent_id'];
		else
			$rent_id = 0;
		
		include 'connect.php';
		
		$query = "SELECT * FROM rent  where rent_id = $rent_id";
		$result = mysqli_query($con,$query) or die('SQL error BOOKING');
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		
		$query = "SELECT asset_id FROM asset";
		$result1 = mysqli_query ($con, $query) or die ('SQL error ASSET');
		$col1 = mysqli_fetch_assoc ($result1);
		
		$query = "SELECT renter_id FROM renter";
		$result2 = mysqli_query ($con, $query) or die ('SQL error RENTER');
		$col2 = mysqli_fetch_assoc ($result2);
		
?>
	<?php
		
		//to edit data
		if (isset($_POST['edit']) && isset($_POST['rent_id'])) {
			
			$rent_id = addslashes($_POST['rent_id']);
			//$asset_id = addslashes($_POST['asset_id']);
			//$renter_id = addslashes($_POST['renter_id']);
			$rent_day = addslashes($_POST['rent_day']);
			$rent_desc = addslashes($_POST['rent_desc']);
			$rent_time = addslashes($_POST['rent_time']);
			$rent_date = addslashes($_POST['rent_date']);
			$rent_deposit = addslashes($_POST['rent_deposit']);
			$rent_payment = addslashes($_POST['rent_payment']);
			
			include 'connect.php';
			
			$query = "UPDATE rent SET 
				rent_day = '$rent_day',
				rent_desc = '$rent_desc',
				rent_time = '$rent_time',
				rent_date = '$rent_date',
				rent_deposit = '$rent_deposit',
				rent_payment = '$rent_payment'
				WHERE rent_id = '$rent_id'";
				
			$result = mysqli_query($con,$query);
			if ($result)
				echo 'Edit success';
			else
				echo 'Edit failed';
			 header ("refresh:2; url=booking_list.php");
		}
		
?>
		
		
	<div align ="center">
	<H1>Edit Booking</H1>
		<form action="" method="post">
			<TABLE border="1" cellpadding="5" cellspacing="2">
				
				<TR>
					<td>Days :</td>
					<TD><input name="rent_day" value="<?php echo $row['rent_day']; ?>" type="text" size="50" maxlength="50"></TD>
				</TR>	
				<TR>
					<td>Description :</td>
					<TD><input name="rent_desc" value="<?php echo $row['rent_desc']; ?>" type="text" size="50" maxlength="50"></TD>
				</TR>	
				<TR>
					<td>Time :</td>
					<TD><input name="rent_time" value="<?php echo $row['rent_time']; ?>" type="time" size="50" maxlength="50"></TD>
				</TR>	
				<TR>
					<td>Date :</td>
					<TD><input name="rent_date" value="<?php echo $row['rent_date']; ?>" type="date" size="50" maxlength="50"></TD>
				</TR>
				<TR>
					<td>Deposit :</td>
					<TD><input name="rent_deposit" value="<?php echo $row['rent_deposit']; ?>" type="text" size="50" maxlength="50"></TD>
				</TR>
				<TR>
					<td>Payment :</td>
					<TD><input name="rent_payment" value="<?php echo $row['rent_payment']; ?>" type="text" size="50" maxlength="50"></TD>
				</TR>
				
				<TR align="center">
					<td colspan="2">
						<input type="hidden" name="rent_id" value="<?php echo $row['rent_id']; ?>">
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