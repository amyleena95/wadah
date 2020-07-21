<html>
<head>
<title> BOOKING </title>
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
		if (isset($_GET['rent_id'])) 
			$rent_id = $_GET['rent_id'];
		else
			$rent_id = 0;
		
		include ('connect.php');
		
		$query = "SELECT asset_id FROM asset";
		$result1 = mysqli_query ($con, $query) or die ('SQL error ASSET');
		$col1 = mysqli_fetch_assoc ($result1);
		
		$query = "SELECT renter_id FROM renter";
		$result2 = mysqli_query ($con, $query) or die ('SQL error RENTER');
		$col2 = mysqli_fetch_assoc ($result2);
		
		//to add data
		if (isset ($_POST['add']) && isset ($_POST['asset_id'])) {
			//$rent_id = addslashes ($_POST['rent_id']);
			$asset_id = addslashes ($_POST['asset_id']);
			$renter_id = addslashes ($_POST['renter_id']);
			$rent_day = addslashes ($_POST['rent_day']);
			$rent_desc = addslashes ($_POST['rent_desc']);
			$rent_time = addslashes ($_POST['rent_time']);
			$rent_date = addslashes ($_POST['rent_date']);
			$rent_deposit = addslashes ($_POST['rent_deposit']);
			$rent_payment = addslashes ($_POST['rent_payment']);
			
			include ('connect.php');
			
			$query = "INSERT INTO rent (rent_id, asset_id, renter_id, rent_day, rent_desc, rent_time, rent_date, rent_deposit, rent_payment)
			VALUES ('$rent_id', '$asset_id', '$renter_id', '$rent_day', '$rent_desc', '$rent_time', '$rent_date', '$rent_deposit', '$rent_payment')";
			
			
			$result = mysqli_query ($con, $query) or die ('SQL error RENT');
			if ($result)
				echo 'Add Success';
			else
				echo 'Add failed';
			 header ("refresh:2; url=booking_list.php");
			
		}
	?>
	
	<div align="center">
	<h1><br>Booking</h1></br>
	
	<form action="" method="post">
			<TABLE border="1" cellpadding="5" cellspacing="2">
				
				
				<TR>
					<td>Asset ID :</td><TD>	 
					
					<SELECT name ="asset_id">
					
					<?php while($col1 = mysqli_fetch_assoc($result1)):;?>
					
					<?php foreach ($col1 as $col): ?>
					<option value="<?php echo $col ?>"><?php echo $col ?></option>
					<?php endforeach ?>

					<?php endwhile;?>
					</SELECT>
					</TD>
				</TR>
				
				<TR>
					<td>Renter ID :</td><TD>	
					<SELECT name="renter_id">
					
					<?php while($col2 = mysqli_fetch_assoc($result2)):;?>
					
					<?php foreach ($col2 as $col): ?>
					<option value="<?php echo $col ?>"><?php echo $col ?></option>
					
					<?php endforeach ?>

					<?php endwhile;?>
					</SELECT>
					</TD>
				</TR>
				
				<TR>
					<td>Days :</td>
					<td><input name="rent_day" value="" type="text" size="50" maxlength="50"></td>
				</TR>
				
				<TR>
					<td>Description :</td>
					<td><input name="rent_desc" value="" type="text" size="50" maxlength="50"></td>
				</TR>
				
				<TR>
					<td>Time :</td>
					<TD><input name="rent_time" value="" type="time" size="50" maxlength="50"></TD>
				</TR>
				
				<TR>
					<td>Date :</td>
					<TD><input name="rent_date" value="" type="date" size="50" maxlength="50"></TD>
				</TR>
				
				<TR>
					<td>Deposit :</td>
					<TD><input name="rent_deposit" value="" type="text" size="50" maxlength="50"></TD>
				</TR>
				
				<TR>
					<td>Payment :</td><TD>	
					<input name="rent_payment" value="" type="text" size="50" maxlength="50">
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