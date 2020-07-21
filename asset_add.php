<html>
<head>
<title> ASSET </title>
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
		if (isset($_GET['asset_id'])) 
			$asset_id = $_GET['asset_id'];
		else
			$asset_id = 0;
		
		include ('connect.php');
		
			
		//to add data
		if (isset ($_POST['add']) && isset ($_POST['asset_facility'])) {
			//$asset_id = $_POST['asset_id'];
			$asset_facility = $_POST['asset_facility'];
			$asset_desc = $_POST['asset_desc'];
			$asset_date = $_POST['asset_date'];
			$asset_total = $_POST['asset_total'];
			$asset_price = $_POST['asset_price'];
			$asset_type = $_POST['asset_type'];
					
			include ('connect.php');
			
			$query = "INSERT INTO asset (asset_id, asset_facility, asset_desc, asset_date,
			asset_total, asset_price, asset_type) VALUES ('$asset_id', '$asset_facility',
			'$asset_desc', '$asset_date', '$asset_total', '$asset_price', '$asset_type')";
			
			$result = mysqli_query ($con, $query) or die ('SQL error ASSET');
			if ($result)
				echo 'Add Success';
			else
				echo 'Add failed';
			header ("refresh:2; url=asset_list.php");
			
		}
	?>
		
	
	<div align="center">
	<h1><br> Register Asset</h1></br>
	
	<form action="" method="post">
			<TABLE border="1" cellpadding="5" cellspacing="2">
			
		
				
		<tr>
			<td>Asset Facility : </td> 
				<td><select name = "asset_facility" >
				<option value ="">Select Facility</option>
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
			<td><input type= "date" name = "asset_date"></td>
		</tr>
		
		<tr>
			<td> Total : </td> 
			<td><select name = "asset_total" >
			<option value ="">Select Total</option>
			<option value ="1">1</option>
			<option value ="2">2</option>
			<option value ="3">3</option>
			<option value ="4">4</option>
			<option value ="5">5</option>
			<option value ="6">6</option>
			<option value ="7">7</option>
			<option value ="8">8</option>
			<option value ="9">9</option>
			<option value ="10">10</option>
			</select> </td>
		</tr>
			
		<tr>
			<td> Price : </td>
			<td><input type = "text" name = "asset_price"> </td>
		</tr>
		
		<tr>
			<td>Asset Type : </td>
			<td><select name = "asset_type" >
			<option value ="">Select Type</option>
			<option value ="Fixed">Fixed</option>
			<option value ="Moveable">Moveable</option>
			</select> </td>
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
</table>
		<?php include 'footer.php' ?>	
</body>
</html>