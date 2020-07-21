<html>
<body>

<div align = "center">
	<h1> List of Asset </h1>
	<table border =2 cellpadding =2 cellspacing =2>
	<tr>
			<th> Asset ID </th>
			<th> Asset Facility </th>
			<th> Description </th>
			<th> Date </th>
			<th> Total </th>
			<th> Price </th>
			<th> Asset Type </th>
			
	</tr>
	
	<?php
	//Create connect with MySql Database
	$con = mysqli_connect('127.0.0.1','root','');
	
	//Select database
	if(!mysqli_select_db($con,'wadah4db'))
	{
		echo "Asset not selected";
	}
	
	//select query
	$sql = "SELECT * FROM asset";
	
	//execute the SQL query
	$records = mysqli_query($con,$sql);
	
	while ($row = mysqli_fetch_array($records))
	{
		echo "<tr>";
		echo "<td>".$row['asset_id']."</td>";
		echo "<td>".$row['asset_facility']."</td>";
		echo "<td>".$row['asset_desc']."</td>";
		echo "<td>".$row['asset_date']."</td>";
		echo "<td>".$row['asset_total']."</td>";
		echo "<td>".$row['asset_price']."</td>";
		echo "<td>".$row['asset_type']."</td>"; 
		

		
	}
	
	
?>
	</table>
	
<br>
<br>
<button onclick="myFunction()">Print</button>

		<script>
		function myFunction() {
			window.print();
		}
		</script>
</body>
</html>




