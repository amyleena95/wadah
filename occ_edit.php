<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Edit Fee</title>
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
		//to retrived data
		if (isset($_GET['occ_id']))
			$occ_id = $_GET['occ_id'];
		else
			$occ_id = 0;
		
		include 'connect.php';
		
		$query = "SELECT mem_id FROM member";
		$result1 = mysqli_query ($con, $query) or die ('SQL error MEMBER');
		$col1 = mysqli_fetch_assoc ($result1);
		
		$query = "SELECT * FROM occupation where occ_id = $occ_id";
		$result = mysqli_query($con,$query) or die('SQL error ASSET');
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		
?>
	
<?php
		
		//to edit data
		if (isset($_POST['edit']) && isset($_POST['occ_id'])) {
			
			$fee_id = $_POST['occ_id'];
			$mem_id = $_POST['mem_id'];
			$occ_department = $_POST['occ_department'];
			$occ_position = $_POST['occ_position'];
			
			include 'connect.php';
			
			$query= "UPDATE occupation SET 
			mem_id ='$_POST[mem_id]', 
			occ_department ='$_POST[occ_department]',
			occ_position = '$_POST[occ_position]'
			WHERE occ_id=$_POST[occ_id]";
				
			$result = mysqli_query($con,$query);
			if ($result)
				echo 'Edit success';
			else
				echo 'Edit failed';
			 header ("refresh:2; url=occ_list.php");
		}
?>
		
		
<div align="center">
	<h1><br>
	Edit Payment: <?php echo $occ_id ?></h1>
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
					<option value ="<?php echo $row['occ_department']; ?>">Unchanged</option>
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
					<TD><input name="occ_position" value="<?php echo $row['occ_position']; ?>" type="text" size="50" maxlength="50"></TD>
				</TR>			
				
				<TR align="center">
					<td colspan="2">
					
						<input type="hidden" name="occ_id" value="<?php echo $row['occ_id']; ?>">
						<input type="submit" name="edit" value=" Edit ">
						
					</td>
				</TR>
  
</body>
</html>