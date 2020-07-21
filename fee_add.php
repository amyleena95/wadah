<html>
<head>
<title> FEE </title>
</head>

<body>

<table width="558" border="1" align="center">
  <tr>
    <td height="90" colspan="2"><img src="acct.png" width="1140" height="300" /></td>
  </tr>
  <tr>
    <td width="59" height="192"><?php include 'acct_sidemenu.php' ?>
    </td>
    <td width="400"><div align="center"></div>
	
	<?php
		if (isset($_GET['fee_id'])) 
			$fee_id = $_GET['fee_id'];
		else
			$fee_id = 0;
		
		include ('connect.php');
		
		$query = "SELECT mem_id FROM member";
		$result1 = mysqli_query ($con, $query) or die ('SQL error MEMBER');
		$col1 = mysqli_fetch_assoc ($result1);
		
		//to add data
		if (isset ($_POST['add']) && isset ($_POST['mem_id'])) {
			$mem_id = addslashes ($_POST['mem_id']);
			$fee_amt = addslashes ($_POST['fee_amt']);
			$fee_date = addslashes ($_POST['fee_date']);
			$fee_status = addslashes ($_POST['fee_status']);
		
			
			include ('connect.php');
			
			$query = "INSERT INTO fee (mem_id, fee_amt, fee_date, fee_status)
			VALUES ('$mem_id', '$fee_amt', '$fee_date', '$fee_status')";
			
			$result = mysqli_query ($con, $query) or die ('SQL error FEE');
			if ($result)
				echo 'Add Success';
			else
				echo 'Add failed';
			 header ("refresh:2; url=fee_list.php");
			
		}
	?>
	
	<div align="center">
	<h1><br>New Fee Payment</h1>
	</br>
	
	<form action="" method="post">
			<TABLE border="1" cellpadding="5" cellspacing="2">
				
				
				<TR>
					<td>Member ID :</td><TD>	 
					
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
					<td>Fee Amount :</td>
					<TD><input name="fee_amt" value="" type="text" size="50" maxlength="50"></TD>
				</TR>
				
				<TR>
					<td>Date Paid :</td>
					<TD><input name="fee_date" value="" type="date" size="50" maxlength="50"></TD>
				</TR>
				
				<TR>
					<td>Fee Status:</td>	
					<td><select name = "fee_status" >
					<option value ="">Select Status</option>
					<option value ="Paid">Paid</option>
					<option value ="Unpaid">Unpaid</option>
					</select> </td>
	
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
			<?php include ('footer.php');?>
</body>
	
</html>