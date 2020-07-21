<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Edit Renter</title>
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
		if (isset($_GET['renter_id']))
			$renter_id = $_GET['renter_id'];
		else
			$renter_id = 0;
		
		include 'connect.php';
		
		$query = "SELECT * FROM renter  where renter_id = $renter_id";
		$result = mysqli_query($con,$query) or die('SQL error RENTER');
		$row = mysqli_fetch_assoc($result);
		
?>
	<?php
		
		//to edit data
		if (isset($_POST['edit']) && isset($_POST['renter_id'])) {
			
			$renter_id = addslashes($_POST['renter_id']);
			$renter_name = addslashes($_POST['renter_name']);
			$renter_phone = addslashes($_POST['renter_phone']);
			$renter_add = addslashes($_POST['renter_add']);
			$renter_company = addslashes($_POST['renter_company']);
			
			include 'connect.php';
			
			$query= "UPDATE renter SET renter_id='$_POST[renter_id]', renter_name='$_POST[renter_name]', renter_phone='$_POST[renter_phone]',
			 renter_add='$_POST[renter_add]',renter_company='$_POST[renter_company]' WHERE renter_id=$_POST[renter_id]";
 
				
			$result = mysqli_query($con,$query);
			if ($result)
				echo 'Edit success';
			else
				echo 'Edit failed';
			 header ("refresh:2; url=renter_list.php");
		}
		
?>
		
		
<div align ="center">
	<form action = "" method = "post">
	<table border="1" cellpadding="5" cellspacing="2">
	
	<h1>Edit Renter</h1>
	<br>
	
		
		<tr>
			<td>Name : </td>
			<TD><input name="renter_name" value="<?php echo $row['renter_name']; ?>" type="text" size="50" maxlength="50"></TD>
		<tr>
		
		<tr>
			<td>Phone : </td>
			<TD><input name="renter_phone" value="<?php echo $row['renter_phone']; ?>" type="text" size="50" maxlength="50"></TD>
		</tr>
			
		<tr>
			<td> Address : </td>
			<TD><input name="renter_add" value="<?php echo $row['renter_add']; ?>" type="text" size="50" maxlength="50"></TD>
		</tr>
		
		<tr>
			<td> Company : </td>
			<TD><input name="renter_company" value="<?php echo $row['renter_company']; ?>" type="text" size="50" maxlength="50"></TD>
		</tr>
		
		<TR align="center">
					<td colspan="2">
						<input type="hidden" name="renter_id" value="<?php echo $row['renter_id']; ?>">
						<input type="submit" name="edit" value=" Edit ">
						
					
					</table>
					</form></td>
				</TR>
  </div>
  <br>
  <br>
  </table>
  <?php include 'footer.php' ?>
</body>
</html>