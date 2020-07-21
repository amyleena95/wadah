<html>
<head>
<title> New Sponsor </title>
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
		if (isset($_GET['sponsor_id'])) 
			$sponsor_id = $_GET['sponsor_id'];
		else
			$sponsor_id = 0;
		
		include ('connect.php');
		
		//to add data
		if (isset ($_POST['add']) && isset ($_POST['sponsor_name'])) {
			$sponsor_name = addslashes ($_POST['sponsor_name']);
			$sponsor_date = addslashes ($_POST['sponsor_date']);
			$sponsor_email = addslashes ($_POST['sponsor_email']);
			$sponsor_phone = addslashes ($_POST['sponsor_phone']);
		
			
			include ('connect.php');
			
			$query = "INSERT INTO sponsor (sponsor_name, sponsor_date, sponsor_email, sponsor_phone)
			VALUES ('$sponsor_name', '$sponsor_date', '$sponsor_email', '$sponsor_phone')";
			
			
			$result = mysqli_query ($con, $query) or die ('SQL error SPONSOR');
			if ($result)
				echo 'Add Success';
			else
				echo 'Add failed';
			 header ("refresh:2; url=sponsor_list.php");
			
		}
	?>
	
	<div align="center">
	<h1><br>
	New Sponsor</h1>
	</br>
	
	<form action="" method="post">
			<TABLE border="1" cellpadding="5" cellspacing="2">
				
				<TR>
					<td>Name :</td>
					<TD><input name="sponsor_name" value="" type="text" size="50" maxlength="50"></TD>
				</TR>
				
				<TR>
					<td>Date Registered :</td>
					<TD><input name="sponsor_date" value="" type="date" size="50" maxlength="50"></TD>
				</TR>
				
				<TR>
					<td>Email :</td>
					<TD><input name="sponsor_email" value="" type="text" size="50" maxlength="50"></TD>
				</TR>
				
				<TR>
					<td>Telephone Number:</td>
					<TD><input name="sponsor_phone" value="" type="text" size="50" maxlength="50"></TD>
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
</body>
	
</html>