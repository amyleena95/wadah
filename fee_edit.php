<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Edit Fee</title>
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
		//to retrived data
		if (isset($_GET['fee_id']))
			$fee_id = $_GET['fee_id'];
		else
			$fee_id = 0;
		
		include 'connect.php';
		
		$query = "SELECT * FROM fee where fee_id = $fee_id";
		$result = mysqli_query($con,$query) or die('SQL error FEE');
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		
?>
	
<?php
		
		//to edit data
		if (isset($_POST['edit']) && isset($_POST['fee_id'])) {
			
			$fee_id = $_POST['fee_id'];
			$mem_id = $_POST['mem_id'];
			$fee_amt = $_POST['fee_amt'];
			$fee_date = $_POST['fee_date'];
			$fee_status = $_POST['fee_status'];
			
			include 'connect.php';
			
			$query= "UPDATE fee SET 
			fee_amt='$_POST[fee_amt]',
			fee_date='$_POST[fee_date]', 
			fee_status='$_POST[fee_status]'
			WHERE fee_id=$_POST[fee_id]";
				
			$result = mysqli_query($con,$query);
			if ($result)
				echo 'Edit success';
			else
				echo 'Edit failed';
			 header ("refresh:2; url=fee_list.php");
		}
?>
		
		
<div align="center">
	<h1><br>
	Edit Payment: <?php echo $fee_id ?></h1>
	</br>
	
	<form action="" method="post">
			<TABLE border="1" cellpadding="5" cellspacing="2">	
				<TR>
					<td>Amount Paid:</td>
					<TD><input name="fee_amt" value="<?php echo $row['fee_amt']; ?>" type="text" size="50" maxlength="50"></TD>
				</TR>	
				<TR>
					<td>Date Paid :</td>
					<TD><input name="fee_date" value="<?php echo $row['fee_date']; ?>" type="date" size="50" maxlength="50"></TD>
				</TR>
				<TR>
					<td>Fee Status :</td>
					<TD>
					<select name = "fee_status">
					<option value ="<?php echo $row['fee_status']; ?>">No changes</option>
					<option value ="Paid">Paid</option>
					<option value ="Unpaid">Unpaid</option>
					</select> </td>
				</TR>
				
				<TR align="center">
					<td colspan="2">
					
						<input type="hidden" name="fee_id" value="<?php echo $row['fee_id']; ?>">
						<input type="submit" name="edit" value=" Edit ">
						
					</td>
				</TR>
  
</body>
</html>