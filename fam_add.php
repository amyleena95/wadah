<html>
<head>
<title> FAMILY </title>
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
		if (isset($_GET['fam_ic'])) 
			$fam_ic = $_GET['fam_ic'];
		else
			$fam_ic = 0;
		
		include ('connect.php');
		
		$query = "SELECT mem_id FROM member";
		$result1 = mysqli_query ($con, $query) or die ('SQL error MEMBER');
		$col1 = mysqli_fetch_assoc ($result1);
		
		//to add data
		if (isset ($_POST['add']) && isset ($_POST['fam_ic'])) 
		{
			$fam_ic = addslashes ($_POST['fam_ic']);
			$mem_id = addslashes ($_POST['mem_id']);
			$fam_name = addslashes ($_POST['fam_name']);
			$fam_add = addslashes ($_POST['fam_add']);
			$fam_phoneNo = addslashes ($_POST['fam_phoneNo']);
			$fam_relationship = addslashes ($_POST['fam_relationship']);
			$fam_ngoName = addslashes ($_POST['fam_ngoName']);
		
			
			include ('connect.php');
			
			$query = "INSERT INTO family (fam_ic, mem_id, fam_name, fam_add, fam_phoneNo, fam_relationship, fam_ngoName)
			VALUES ('$fam_ic', '$mem_id', '$fam_name', '$fam_add', '$fam_phoneNo', '$fam_relationship', '$fam_ngoName')";
			
			$result = mysqli_query ($con, $query) or die ('SQL error FAMILY');
			if ($result)
				echo 'Add Success';
			else
				echo 'Add failed';
			 header ("refresh:2; url=fam_list.php");
			
		}
	?>
	
	<div align="center">
	<h1><br>New Family Member</h1>
	</br>
	
	<form action="" method="post">
			<TABLE border="1" cellpadding="5" cellspacing="2">
				
				<TR>
					<td>NRIC :</td>
					<TD><input name="fam_ic" value="" type="text" size="50" maxlength="50"></TD>
				</TR>
				
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
					<td>Full Name :</td>
					<TD><input name="fam_name" value="" type="text" size="50" maxlength="50"></TD>
				</TR>
				
				<TR>
					<td>Address :</td>
					<TD><input name="fam_add" value="" type="text" size="50" maxlength="50"></TD>
				</TR>
				
				<TR>
					<td>Contact Number :</td>
					<TD><input name="fam_phoneNo" value="" type="text" size="50" maxlength="50"></TD>
				</TR>
				
				<TR>
					<td>Relationship :</td>	
					<td><select name = "fam_relationship">
					<option value ="">Select Relationship</option>
					<option value ="Parents">Parents</option>
					<option value ="Children">Children</option>
					<option value ="Siblings">Siblings</option>
					<option value ="Spouse">Spouse</option>
					</select> </td>
				</TR>
				
				<TR>
					<td>NGO :</td>	
					<td><select name = "fam_ngoName">
					<option value ="">Select one</option>
					<option value ="WADAH">WADAH</option>
					<option value ="SALWA">SALWA</option>
					<option value ="Others">Others</option>
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