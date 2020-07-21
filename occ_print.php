<html>
<body>

<div align = "center">
	<h1> Occupation List </h1>
	<table border =2 cellpadding =2 cellspacing =2>
	<tr>
			<th> Occupation ID</th>
			<th> Member ID</th>
			<th> Department</th>
			<th> Position </th>			
	</tr>
	
	<?php
	//Create connect with MySql Database
	$con = mysqli_connect('127.0.0.1','root','');
	
	//Select database
	if(!mysqli_select_db($con,'wadah4db'))
	{
		echo "Occupation ID is not selected";
	}
	
	//select query
	$sql = "SELECT * FROM occupation";
	
	//execute the SQL query
	$records = mysqli_query($con,$sql);
	
	while ($row = mysqli_fetch_array($records))
	{
		echo "<tr>";
		echo "<td>".$row['occ_id']."</td>";
		echo "<td>".$row['mem_id']."</td>";
		echo "<td>".$row['occ_department']."</td>";
		echo "<td>".$row['occ_position']."</td>";
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




