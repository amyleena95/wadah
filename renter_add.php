<html>
<head>
<title> RENTER </title>
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
		if (isset($_GET['renter_id'])) 
			$renter_id = $_GET['renter_id'];
		else
			$renter_id = 0;
		
		include ('connect.php');
		
			
		//to add data
		if (isset ($_POST['add']) && isset ($_POST['renter_name'])) {
			//$renter_id = $_POST['renter_id'];
			$renter_name = $_POST['renter_name'];
			$renter_phone = $_POST['renter_phone'];
			$renter_add = $_POST['renter_add'];
			$renter_company = $_POST['renter_company'];
					
			include ('connect.php');
			
			$query = "INSERT INTO renter (renter_id, renter_name, renter_phone, renter_add, renter_company) VALUES 
		('$renter_id', '$renter_name', '$renter_phone', '$renter_add', '$renter_company')";
			
			$result = mysqli_query ($con, $query) or die ('SQL error ASSET');
			if ($result)
				echo 'Add Success';
			else
				echo 'Add failed';
			header ("refresh:2; url=renter_list.php");
			
		}
	?>
	
	<div align ="center">
	<form action = "" method = "post">
	<table border="1" cellpadding="5" cellspacing="2">
	
	<h1>Register Renter</h1>
	<br>

		
		<tr>
			<td>Name : </td>
			<td><input type = "text" name = "renter_name"></td>
		</tr>
		
		<tr>
			<td>Phone : </td>
			<td><input type = "text" name = "renter_phone"></td>
		</tr>
		
		<tr>
			<td>Address: </td>
			<td><input type = "text" name = "renter_add"></td>
		</tr>
		
		<tr>
			<td> Company : </td>
			<td><input type = "text" name = "renter_company"></td>
		</tr>
		
			
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
		<br>
		<br>
		</table>
		
		<?php include 'footer.php' ?>
</body>
</html>