<html>
<body>

<div align = "center">
	<h1> List of Family Members </h1>
	<table border =2 cellpadding =2 cellspacing =2>
	<tr>
			<th> NRIC </th>
			<th> Member ID</th>
			<th> Full Name </th>
			<th> Address </th>
			<th> Contact Number </th>
			<th> Relationship </th>
			<th> NGO </th>
			
	</tr>
	
	<?php
	//Create connect with MySql Database
	$con = mysqli_connect('127.0.0.1','root','');
	
	//Select database
	if(!mysqli_select_db($con,'wadah4db'))
	{
		echo "Family member is not selected";
	}
	
	//select query
	$sql = "SELECT * FROM family";
	
	//execute the SQL query
	$records = mysqli_query($con,$sql);
	
	while ($row = mysqli_fetch_array($records))
	{
		echo "<tr>";
		echo "<td>".$row['fam_ic']."</td>";
		echo "<td>".$row['mem_id']."</td>";
		echo "<td>".$row['fam_name']."</td>";
		echo "<td>".$row['fam_add']."</td>";
		echo "<td>".$row['fam_phoneNo']."</td>";
		echo "<td>".$row['fam_relationship']."</td>";
		echo "<td>".$row['fam_ngoName']."</td>";
	
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




