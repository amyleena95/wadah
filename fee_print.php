<html>
<body>

<div align = "center">
	<h1> List of Fees </h1>
	<table border =2 cellpadding =2 cellspacing =2>
	<tr>
			<th> Fee ID </th>
			<th> Member ID</th>
			<th> Amount Paid </th>
			<th> Date of Fee </th>
			<th> Fee Status </th>
			
	</tr>
	
	<?php
	//Create connect with MySql Database
	$con = mysqli_connect('127.0.0.1','root','');
	
	//Select database
	if(!mysqli_select_db($con,'wadah4db'))
	{
		echo "Fee ID is not selected";
	}
	
	//select query
	$sql = "SELECT * FROM fee";
	
	//execute the SQL query
	$records = mysqli_query($con,$sql);
	
	while ($row = mysqli_fetch_array($records))
	{
		echo "<tr>";
		echo "<td>".$row['fee_id']."</td>";
		echo "<td>".$row['mem_id']."</td>";
		echo "<td>".$row['fee_amt']."</td>";
		echo "<td>".$row['fee_date']."</td>";
		echo "<td>".$row['fee_status']."</td>";
	
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




