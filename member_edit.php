<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Edit Member</title>
</head>

<body>
	
<?php  
		//to retrived data
		if (isset($_GET['mem_id']))
			$mem_id = $_GET['mem_id'];
		else
			$mem_id = 0;
		
		include 'connect.php';
		
		$query = "SELECT * FROM member where mem_id = $mem_id";
		$result = mysqli_query($con,$query) or die('SQL error Member');
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>
	<?php
		
		//to edit data
		if (isset ($_POST['edit']) && isset ($_POST['mem_id'])) 
		{
			$mem_id = addslashes ($_POST['mem_id']);
			$mem_name = addslashes ($_POST['mem_name']);
			$mem_ic = addslashes ($_POST['mem_ic']);
			$mem_add = addslashes ($_POST['mem_add']);
			$mem_phoneNo = addslashes ($_POST['mem_phoneNo']);
			$mem_status = addslashes ($_POST['mem_status']);
			$mem_branch = addslashes ($_POST['mem_branch']);
			
			include 'connect.php';
			
			$query= "UPDATE member SET 
			mem_name = '$_POST[mem_name]',
			mem_ic = '$_POST[mem_ic]',
			mem_add ='$_POST[mem_add]',
			mem_phoneNo = '$_POST[mem_phoneNo]',
			mem_status = '$_POST[mem_status]',
			mem_branch = '$_POST[mem_branch]'
			WHERE mem_id = $_POST[mem_id]";
				
			$result = mysqli_query($con,$query);
			if ($result)
				echo 'Edit success';
			else
				echo 'Edit failed';
			 header ("refresh:2; url=member_list.php");
		}
		
?>
		
		
	<div align ="center">
	<H1>Edit Member: <?php echo $mem_id?></H1>
		<form action="" method="post">
			<TABLE border="1" cellpadding="5" cellspacing="2">
				
		<TR>
					<td>Full Name :</td>	 
					<td>
						<input name="mem_name" value="<?php echo $row['mem_name']; ?>" type="text" size="50" maxlength="50">
					</td>
				</TR>
				
				<TR>
					<td>NRIC :</td> 
					<td>
						<input name="mem_ic" value="<?php echo $row['mem_ic']; ?>" type="text" size="50" maxlength="50">
					</td>
				</TR>
				
				<TR>
					<td>Address :</td>	 
					<td>
						<input name="mem_add" value="<?php echo $row['mem_add']; ?>" type="text" size="50" maxlength="50">
					</td>
				</TR>
				
				<TR>
					<td>Contact Number :</td>	 
					<td>
						<input name="mem_phoneNo" value="<?php echo $row['mem_phoneNo']; ?>" type="text" size="50" maxlength="50">
					</td>
				</TR>
				
				<TR>
					<td>Marital Status :</td>
					<td><SELECT name = "mem_status">
					<option value ="<?php echo $row['mem_status']; ?>">Select One</option>
					<option value ="Single">Single</option>
					<option value ="Married">Married</option>
					<option value ="Widowed">Widowed</option>
					<option value ="Divorced">Divorced</option>
				</TR>
				
				<TR>
					<td>Branch :</td>
					<td><SELECT name = "mem_branch">
					<option value ="<?php echo $row['mem_branch']; ?>">Select One</option>
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
						<input type="hidden" name="mem_id" value="<?php echo $row['mem_id']; ?>">
						<input type="submit" name="edit" value=" Edit ">
					
					</form></td>
				</TR>
	
			</TABLE>
		</div>
		
	
	</td>
  </tr>

	
</body>
</html>