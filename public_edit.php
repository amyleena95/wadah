<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>EVENT</title>
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
		//to retrived data
		if (isset($_GET['public_ic']))
			$public_ic = $_GET['public_ic'];
		else
			$public_ic = 0;
		
		include 'connect.php';
		
		$query = "SELECT * FROM  public  where public_ic = $public_ic";
		$result = mysqli_query($con,$query) or die('SQL error EVENT');
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		
?>
	<?php
		
		//to edit data
		if (isset($_POST['edit']) && isset($_POST['public_ic'])) {
			
			$public_ic = addslashes ($_POST['public_ic']);
			$public_name = addslashes ($_POST['public_name']);
			$public_add = addslashes ($_POST['public_add']);
			$public_tel = addslashes ($_POST['public_tel']);
			
			include 'connect.php';
			
			$query = "UPDATE public SET 
			public_ic='$_POST[public_ic]',
			public_name='$_POST[public_name]', 
			public_add='$_POST[public_add]',
			public_tel='$_POST[public_tel]'
			WHERE public_ic=$_POST[public_ic]";
				
			$result = mysqli_query($con,$query);
			if ($result)
				echo 'Edit success';
			else
				echo 'Edit failed';
			 header ("refresh:2; url=public_list.php");
		}
		
?>
		
		
<div align ="center">
	<form action = "" method = "post">
	<table border="1" cellpadding="5" cellspacing="2">
	
		<H1>EDIT PUBLIC INFORMATION</H1>
	
		<form action="" method="post">
			<TABLE border="1" cellpadding="5" cellspacing="2">
				
   
				<TR>
					<td> NRIC :</td>
					<TD><input name="public_ic" value="<?php echo $row['public_ic']; ?>" type="text" size="50" maxlength="50"></TD>
				</TR>
					
				<TR>
					<td>Name :</td>
					<TD><input name="public_name" value="<?php echo $row['public_name']; ?>" type="text" size="50" maxlength="50"></TD>
				</TR>
				
				<TR>
					<td>Address  :</td>
					<TD><input name="public_add" value="<?php echo $row['public_add']; ?>" type="text" size="50" maxlength="50"></TD>
				</TR>
								
				<TR>
					<td> Contact Number :</td>
					<TD><input name="public_tel" value="<?php echo $row['public_tel']; ?>" type="text" size="50" maxlength="50"></TD>
				</TR>	
               
                	
				<TR align="center">
					<td colspan="2">
						<input type="hidden" name="public_id" value="<?php echo $row['public_id']; ?>">
						<input type="submit" name="edit" value=" Edit ">
					
					</form></td>
				</table>
				</TR>

  </table>
  <?php include 'footer.php' ?>
</body>
</html>