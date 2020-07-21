<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Edit Sponsor</title>
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
		if (isset($_GET['sponsor_id']))
			$sponsor_id = $_GET['sponsor_id'];
		else
			$sponsor_id = 0;
		
		include 'connect.php';
		
		$query = "SELECT * FROM sponsor  where sponsor_id = $sponsor_id";
		$result = mysqli_query($con,$query) or die('SQL error SPONSOR');
		$row = mysqli_fetch_assoc($result);
		
?>
	<?php
	
		if (isset($_POST['edit']) && isset($_POST['sponsor_id'])) {
			
			$sponsor_name = addslashes($_POST['sponsor_name']);
			$sponsor_date = addslashes($_POST['sponsor_date']);
			$sponsor_email = addslashes($_POST['sponsor_email']);
			$sponsor_phone = addslashes($_POST['sponsor_phone']);
			
			include 'connect.php';
			
			$query= "UPDATE sponsor SET 
			sponsor_name='$_POST[sponsor_name]', 
			sponsor_date='$_POST[sponsor_date]',
			sponsor_email='$_POST[sponsor_email]',
			sponsor_phone='$_POST[sponsor_phone]' 
			WHERE sponsor_id=$_POST[sponsor_id]";
 
				
			$result = mysqli_query($con,$query);
			if ($result)
				echo 'Edit success';
			else
				echo 'Edit failed';
			 header ("refresh:2; url=sponsor_list.php");
		}
		
?>
		
		
<div align ="center">
	<form action = "" method = "post">
	<table border="1" cellpadding="5" cellspacing="2">
	
	<h1>Edit Sponsor: <?php echo $sponsor_id ?></h1>
	<br>
	
		
		<tr>
			<td>Name : </td>
			<TD><input name="sponsor_name" value="<?php echo $row['sponsor_name']; ?>" type="text" size="50" maxlength="50"></TD>
		<tr>
		
		<tr>
			<td>Date Registered : </td>
			<TD><input name="sponsor_date" value="<?php echo $row['sponsor_date']; ?>" type="date" size="50" maxlength="50"></TD>
		</tr>
			
		<tr>
			<td>Email : </td>
			<TD><input name="sponsor_email" value="<?php echo $row['sponsor_email']; ?>" type="text" size="50" maxlength="50"></TD>
		</tr>
		
		<tr>
			<td>Telephone Number : </td>
			<TD><input name="sponsor_phone" value="<?php echo $row['sponsor_phone']; ?>" type="text" size="50" maxlength="50"></TD>
		</tr>
		
		<TR align="center">
					<td colspan="2">
						<input type="hidden" name="sponsor_id" value="<?php echo $row['sponsor_id']; ?>">
						<input type="submit" name="edit" value=" Edit ">
						
					
					</table>
					</form></td>
				</TR>
  </div>
  <br>
  <br>
</body>
</html>