<html>
<body>

<div align = "center">
	<h1> List of Booking </h1>
	<table border =2 cellpadding =2 cellspacing =2>
	<tr>
			<th> Rent ID </th>
			<th> Asset ID </th>
			<th> Renter ID </th>
			<th> Days </th>
			<th> Description </th>
			<th> Time </th>
			<th> Date </th>
			<th> Deposit </th>
			<th> Payment </th>
			
		</tr>
	
	<?php
	//Create connect with MySql Database
	$con = mysqli_connect('127.0.0.1','root','');
	
	//Select database
	if(!mysqli_select_db($con,'wadah4db'))
	{
		echo "Rent not selected";
	}
	
	//select query
	$sql = "SELECT * FROM rent";
	
	//execute the SQL query
	$records = mysqli_query($con,$sql);
	
	while ($row = mysqli_fetch_array($records))
	{
		echo "<tr>";
		echo "<td>".$row['rent_id']."</td>";
		echo "<td>".$row['asset_id']."</td>";
		echo "<td>".$row['renter_id']."</td>";
		echo "<td>".$row['rent_day']."</td>";
		echo "<td>".$row['rent_desc']."</td>";
		echo "<td>".$row['rent_time']."</td>";
		echo "<td>".$row['rent_date']."</td>";
		echo "<td>".$row['rent_deposit']."</td>";
		echo "<td>".$row['rent_payment']."</td>"; 
		
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




