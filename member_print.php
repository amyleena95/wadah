<html>
<body>

<div align = "center">
	<h1> List of Members </h1>
	<table border =2 cellpadding =2 cellspacing =2>
	<tr>
			<th> Member ID </th>
			<th> Full Name</th>
			<th> NRIC </th>
			<th> Address </th>
			<th> Contact Number</th>
			<th> Marital Status</th>
			<th> Branch</th>
	</tr>
	
	<?php
	//Create connect with MySql Database
	$con = mysqli_connect('127.0.0.1','root','');
	
	//Select database
	if(!mysqli_select_db($con,'wadah4db'))
	{
		echo "Member is not selected";
	}
	
	//select query
	$sql = "SELECT * FROM member";
	
	//execute the SQL query
	$records = mysqli_query($con,$sql);
	
	while ($row = mysqli_fetch_array($records))
	{
		echo "<tr>";
		echo "<td>".$row['mem_id']."</td>";
		echo "<td>".$row['mem_name']."</td>";
		echo "<td>".$row['mem_ic']."</td>";
		echo "<td>".$row['mem_add']."</td>";
		echo "<td>".$row['mem_phoneNo']."</td>";
		echo "<td>".$row['mem_status']."</td>";
		echo "<td>".$row['mem_branch']."</td>";
	
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




