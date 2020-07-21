<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>WADAH</title>
</head>

<body>
<table width="558" border="1" align="center">
  <tr>
    <td height="90" colspan="2"><img src="3.png" width="1140" height="300" /></td>
  </tr>
  <tr>
    <td width="59" height="192"><?php include 'activity_menu.php' ?>
    </td>
    <td width="400"><div align="center">
    
      <?php  
		//to retrived data
		if (isset($_GET['speaker_id']))
			$speaker_id = $_GET['speaker_id'];
		else
			$speaker_id = 0;
		
		include 'connect.php';
		
		$query = "SELECT * FROM speaker WHERE speaker_id = $speaker_id";
		
		$result = mysqli_query($con, $query) or die('SQL error');
		$row = mysqli_fetch_assoc($result);
		
		
		//to edit data
		if (isset($_POST['edit']) && isset($_POST['speaker_id'])) {
			
			//$speaker_id = addslashes($_POST['speaker_id']);
			//$event_id = addslashes($_POST['event_id']);
			$speaker_type = addslashes($_POST['speaker_type']);
			$speaker_name = addslashes($_POST['speaker_name']);
			$speaker_phone_no = addslashes($_POST['speaker_phone_no']);
		    $speaker_add= addslashes($_POST['speaker_add']);
		
			include 'connect.php';
			$query = "UPDATE speaker SET 
				speaker_type = '$speaker_type',
				speaker_name = '$speaker_name',
				speaker_phone_no = '$speaker_phone_no',
				speaker_add = '$speaker_add'
				where speaker_id = '$speaker_id'";
				
				
			$result = mysqli_query($con, $query);
			if ($result)
				echo 'Edit success';
			else
				echo mysqli_error($con);
			header ("refresh:2; url=speaker_list.php");
		}
		
?>

		
		<H1>EDIT SPEAKER</H1>
	
		<form action="" method="post">
			<TABLE border="1" cellpadding="5" cellspacing="2">
				
				
				<TR>
					<td> Speaker Type :</td>
					<TD>
						<select name="speaker_type"> <?php echo $row['speaker_type']; ?>
							<option value ="<?php echo $row['speaker_type']; ?>">Unchanged</option>
							<option value="Speaker" >SPEAKER</option>
							<option value="Naqib">NAQIB</option>
                            
						</select>
	
					</TD>
				</TR>
				<TR>
					<td>Name :</td>
					<TD><input name="speaker_name" value="<?php echo $row['speaker_name']; ?>" type="text" size="50" maxlength="100"></TD>
				</TR>
				<TR>
					<td>Phone No. :</td>
					<TD><input name="speaker_phone_no" value="<?php echo $row['speaker_phone_no']; ?>" type="text" size="50" maxlength="50"></TD>
				</TR>	
                
				<TR>
					<td>Address :</td>
					<TD><input name="speaker_add" value="<?php echo $row['speaker_add']; ?>" type="text" size="50" maxlength="50"></TD>
				</TR>	
               
                	
				<TR align="center">
					<td colspan="2">
						<input type="hidden" name="speaker_id" value="<?php echo $row['speaker_id']; ?>">
						<input type="submit" name="edit" value=" Edit ">
					
					</form></td>
				</TR>
	
			</TABLE>
	
	</td>
  </tr>
      
    </div>
    </td>
  </tr>
</table>
</body>
</html>




