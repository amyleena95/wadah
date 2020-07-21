<html>
<head>
<title> PUBLIC </title>
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
	
	
	
	<div align="center">
	<h1><br>Register Public</h1>
	</br>
	<?php
		if (isset($_GET['public_ic'])) 
			$public_ic = $_GET['public_ic'];
		else
			$public_ic = 0;
		
		include ('connect.php');
		
		//to add data
		if (isset ($_POST['add']) && isset ($_POST['public_ic'])) {
			$public_ic = addslashes ($_POST['public_ic']);
			$public_name = addslashes ($_POST['public_name']);
			$public_add = addslashes ($_POST['public_add']);
			$public_tel = addslashes ($_POST['public_tel']);
	
			include ('connect.php');
			
			$query = "INSERT INTO public (public_ic, public_name, public_add, public_tel)
			VALUES ('$public_ic', '$public_name', '$public_add', '$public_tel')";
			
			
			$result = mysqli_query ($con, $query) or die ('SQL error Public');
			if ($result)
				echo 'Add Success';
			else
				echo 'Add failed';
			 header ("refresh:2; url=public_list.php");
			
		}
	?>
	<form action="" method="post">
			<TABLE border="1" cellpadding="5" cellspacing="2">
				
				
				<TR>
					<td> NRIC :</td>
					<TD><input name="public_ic" value="" type="text" size="50" maxlength="50"></TD>
				</TR>
					
				<TR>
					<td>Name :</td>
					<TD><input name="public_name" value="" type="text" size="50" maxlength="50"></TD>
				</TR>
				
				<TR>
					<td>Address  :</td>
					<TD><input name="public_add" value="" type="text" size="50" maxlength="50"></TD>
				</TR>
								
				<TR>
					<td> Contact Number :</td>
					<TD><input name="public_tel" value="" type="text" size="50" maxlength="50"></TD>
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