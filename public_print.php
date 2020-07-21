<html>
<body>

<div align = "center">
	<h1> List of Public </h1>
	<table border =2 cellpadding =2 cellspacing =2>
	<tr>
			<th> NRIC</th>
			<th> Full Name</th>
			<th> Address </th>
			<th> Contact Number </th>
			
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
	$sql = "SELECT * FROM public";
	
	//execute the SQL query
	$records = mysqli_query($con,$sql);
	
	while ($row = mysqli_fetch_array($records))
	{
		echo "<tr>";
		echo "<td>".$row['public_ic']."</td>";
		echo "<td>".$row['public_name']."</td>";
		echo "<td>".$row['public_add']."</td>";
		echo "<td>".$row['public_tel']."</td>";
		echo "</tr>";

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




