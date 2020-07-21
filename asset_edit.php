<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Edit Asset</title>
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
		//to retrived data
		if (isset($_GET['asset_id']))
			$asset_id = $_GET['asset_id'];
		else
			$asset_id = 0;
		
		include 'connect.php';
		
		$query = "SELECT * FROM asset  where asset_id = $asset_id";
		$result = mysqli_query($con,$query) or die('SQL error ASSET');
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		
?>
	<?php
		
		//to edit data
		if (isset($_POST['edit']) && isset($_POST['asset_id'])) {
			
			$asset_id = $_POST['asset_id'];
			$asset_facility = $_POST['asset_facility'];
			$asset_desc = $_POST['asset_desc'];
			$asset_date = $_POST['asset_date'];
			$asset_total = $_POST['asset_total'];
			$asset_price = $_POST['asset_price'];
			$asset_type = $_POST['asset_type'];
			
			include 'connect.php';
			
			$query= "UPDATE asset SET asset_id='$_POST[asset_id]',asset_facility='$_POST[asset_facility]',asset_desc='$_POST[asset_desc]',
			 asset_date='$_POST[asset_date]',asset_total='$_POST[asset_total]',asset_price='$_POST[asset_price]',asset_type='$_POST[asset_type]'
			 WHERE asset_id=$_POST[asset_id]";
				
			$result = mysqli_query($con,$query);
			if ($result)
				echo 'Edit success';
			else
				echo 'Edit failed';
			 header ("refresh:2; url=asset_list.php");
		}
		
?>
		
		
<div align ="center">
	<form action = "" method = "post">
	<table border="1" cellpadding="5" cellspacing="2">
	
	<h1>Edit Asset</h1>
	<br>
	
		
		<tr>
			<td>Asset Facility : </td>  
				<td><select name = "asset_facility">
				<option value ="<?php echo $row['asset_facility']; ?>">Unchanged</option>
				<option value ="Fan">Fan</option>
				<option value ="Table">Table</option>
				<option value ="Speaker">Speaker</option>
				<option value ="Chair">Chair</option> 
				</select> </td>
		</tr>
		
		<tr>
			<td>Description : </td>
			<td><input type="radio" name="asset_desc" value="Available"> Available <br>
			<input type="radio" name="asset_desc" value="Not Available"> Not Available <br></td>
			
		</tr>
		
		<tr>
			<td>Date : </td>
			<TD><input name="asset_date" value="<?php echo $row['asset_date']; ?>" type="date" size="50" maxlength="50"></TD>
		</tr>
		
		<tr>
			<td> Total : </td> 
			<td><select name = "asset_total" >
			<option value ="<?php echo $row['asset_total']; ?>">Unchanged</option>
			<option value ="1">1</option>
			<option value ="2">2</option>
			<option value ="3">3</option>
			<option value ="4">4</option>
			<option value ="5">5</option>
			<option value ="6">6</option>
			<option value ="7">7</option>
			</select> </td>
		</tr>
			
		<tr>
			<td> Price : </td>
			<TD><input name="asset_price" value="<?php echo $row['asset_price']; ?>" type="text" size="50" maxlength="50"></TD>
		</tr>
		
		<tr>
			<td>Asset Type : </td>
			<td><select name = "asset_type" >
			<option value ="<?php echo $row['asset_type']; ?>">Unchanged</option>
			<option value ="Fixed">Fixed</option>
			<option value ="Moveable">Moveable</option>
			</select> </td>
		</tr>
		
		<TR align="center">
					<td colspan="2">
						<input type="hidden" name="asset_id" value="<?php echo $row['asset_id']; ?>">
						<input type="submit" name="edit" value=" Edit ">
						
					
					</td></form>
						</table>
				</TR>

  </table>
  <?php include 'footer.php' ?>
</body>
</html>