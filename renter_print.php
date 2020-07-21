<html>
<body>

<div align = "center">
	<h1> List of Renter </h1>
	<table border =2 cellpadding =2 cellspacing =2>
	
	<tr>
			<th> Renter ID </th>
			<th> Name </th>
			<th> Phone </th>
			<th> Address </th>
			<th> Company </th>
			
	</tr>
		
	<?php
	//Create connect with MySql Database
	$con = mysqli_connect('127.0.0.1','root','');
	
	//Select database
	if(!mysqli_select_db($con,'wadah4db'))
	{
		echo "Renter not selected";
	}
	
	//select query
	$sql = "SELECT * FROM renter";
	
	//execute the SQL query
	$records = mysqli_query($con,$sql);
	
	while ($row = mysqli_fetch_array($records))
	{
		echo "<tr>";
		echo "<td>".$row['renter_id']."</td>";
		echo "<td>".$row['renter_name']."</td>";
		echo "<td>".$row['renter_phone']."</td>";
		echo "<td>".$row['renter_add']."</td>";
		echo "<td>".$row['renter_company']."</td>";
			
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




