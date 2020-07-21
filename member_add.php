<html>
<head>
<title> Member Management </title>
</head>

<body>

<table width="558" border="1" align="center">
  <tr>
    <td height="90" colspan="2"><img src="2.png" width="1140" height="300"/></td>
  </tr>
  <tr>
    <td width="59" height="192"><?php include 'member_sidemenu.php' ?>
    </td>
    <td width="400"><div align="center"></div>
	
	<?php
		if (isset($_GET['mem_id'])) 
			$mem_id = $_GET['mem_id'];
		else
			$mem_id = 0;
		
		include ('connect.php');
		
		//to add data
		if (isset ($_POST['add']) && isset ($_POST['mem_name'])) {
			$mem_name = addslashes ($_POST['mem_name']);
			$mem_ic = addslashes ($_POST['mem_ic']);
			$mem_add = addslashes ($_POST['mem_add']);
			$mem_phoneNo = addslashes ($_POST['mem_phoneNo']);
			$mem_status = addslashes ($_POST['mem_status']);
			$mem_branch = addslashes ($_POST['mem_branch']);
			
			include ('connect.php');
			
			$query = "INSERT INTO member (mem_name, mem_ic, mem_add, mem_phoneNo, mem_status)
			VALUES ('$mem_name', '$mem_ic', '$mem_add', '$mem_phoneNo', '$mem_status')";
			
			
			$result = mysqli_query ($con, $query) or die ('SQL error member');
			if ($result)
				echo 'Add Success';
			else
				echo 'Add failed';
			 header ("refresh:2; url=member_list.php");
			
		}
	?>
	
	<div align="center">
	<h1><br>New Member</h1></br>
	
	<form action="" method="post">
			<TABLE border="1" cellpadding="5" cellspacing="2">
				
				
				<TR>
					<td>Full Name :</td>	 
					<td>
						<input name="mem_name" value="" type="text" size="50" maxlength="50">
					</td>
				</TR>
				
				<TR>
					<td>NRIC :</td> 
					<td>
						<input name="mem_ic" value="" type="text" size="50" maxlength="50">
					</td>
				</TR>
				
				<TR>
					<td>Address :</td>	 
					<td>
						<input name="mem_add" value="" type="text" size="50" maxlength="50">
					</td>
				</TR>
				
				<TR>
					<td>Contact Number :</td>	 
					<td>
						<input name="mem_phoneNo" value="" type="text" size="50" maxlength="50">
					</td>
				</TR>
				
				<TR>
					<td>Marital Status :</td>
					<td><SELECT name = "mem_status">
					<option value ="">Select One</option>
					<option value ="Single">Single</option>
					<option value ="Married">Married</option>
					<option value ="Widowed">Widowed</option>
					<option value ="Divorced">Divorced</option>
				</TR>
				
				<TR>
					<td>Branch :</td>
					<td><SELECT name = "mem_branch">
					<option value ="">Select One</option>
					<option value="Selangor" >Selangor</option>
					<option value="Kuala Lumpur">Kuala Lumpur</option>
					<option value="Kedah">Kedah</option>
                    <option value="Melaka" >Melaka</option>
					<option value="Pahang" >Pahang</option>
					<option value="Kelantan" >Kelantan</option>
					<option value="Sabah" >Sabah</option>
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
	
</html