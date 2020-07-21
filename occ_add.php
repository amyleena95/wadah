<html>
<head>
<title> Members' Occupation </title>
</head>

<body>

<table width="558" border="1" align="center">
  <tr>
    <td height="90" colspan="2"><img src="2.png" width="1140" height="300" /></td>
  </tr>
  <tr>
    <td width="59" height="192"><?php include 'member_sidemenu.php' ?>
    </td>
    <td width="400"><div align="center"></div>
	
	<?php
		if (isset($_GET['occ_id'])) 
			$occ_id = $_GET['occ_id'];
		else
			$occ_id = 0;
		
		include ('connect.php');
		
		$query = "SELECT mem_id FROM member";
		$result1 = mysqli_query ($con, $query) or die ('SQL error MEMBER');
		$col1 = mysqli_fetch_assoc ($result1);
		
		//to add data
		if (isset ($_POST['add']) && isset ($_POST['mem_id'])) {
			$mem_id = addslashes ($_POST['mem_id']);
			$occ_department = addslashes ($_POST['occ_department']);
			$occ_position = addslashes ($_POST['occ_position']);
			
			include ('connect.php');
			
			$query = "INSERT INTO occupation (mem_id, occ_department, occ_position)
			VALUES ('$mem_id', '$occ_department', '$occ_position')";
			
			$result = mysqli_query ($con, $query) or die ('SQL error FEE');
			if ($result)
				echo 'Add Success';
			else
				echo 'Add failed';
			 header ("refresh:2; url=occ_list.php");
			
		}
	?>
	
	<div align="center">
	<h1><br>New Occupation</h1>
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
					<td>Department :</td>	
					<td><select name = "occ_department" >
					<option value ="">Select Department</option>
					<option value ="IT">IT</option>
					<option value ="Accounting">Accounting</option>
					<option value ="Management">Management</option>
					<option value ="Human Resources">Human Resources</option>
					<option value ="Marketing">Marketing</option>
					<option value ="Operation">Others</option>
					</select> </td>
				</TR>
				
				<TR>
					<td>Position :</td>
					<TD><input name="occ_position" value="" type="text" size="50" maxlength="50"></TD>
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