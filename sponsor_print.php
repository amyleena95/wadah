<html>
<body>

<div align = "center">
	<h1> List of Sponsors </h1>
	<table border =2 cellpadding =2 cellspacing =2>
	
	<tr>
			<th> Sponsor ID </th>
			<th> Name </th>
			<th> Date Registered </th>
			<th> Email </th>
			<th> Telephone Number </th>
			
	</tr>
		
	<?php
	//Create connect with MySql Database
	$con = mysqli_connect('127.0.0.1','root','');
	
	//Select database
	if(!mysqli_select_db($con,'wadah4db'))
	{
		echo "Sponsor is not selected";
	}
	
	//select query
	$sql = "SELECT * FROM sponsor";
	
	//execute the SQL query
	$records = mysqli_query($con,$sql);
	
	while ($row = mysqli_fetch_array($records))
	{
		echo "<tr>";
		echo "<td>".$row['sponsor_id']."</td>";
		echo "<td>".$row['sponsor_name']."</td>";
		echo "<td>".$row['sponsor_date']."</td>";
		echo "<td>".$row['sponsor_email']."</td>";
		echo "<td>".$row['sponsor_phone']."</td>";
			
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




