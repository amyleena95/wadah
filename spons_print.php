<html>
<body>

<div align = "center">
	<h1> List of Sponsorship</h1>
	<table border =2 cellpadding =2 cellspacing =2>
	<tr>
			<th> Sponsorship ID</th>
			<th> Sponsor ID </th>
			<th> Description </th>
			<th> Amount Received </th>
			<th> Date Received </th>
			<th> Eevent ID</th>
			
		</tr>
	
	<?php
	//Create connect with MySql Database
	$con = mysqli_connect('127.0.0.1','root','');
	
	//Select database
	if(!mysqli_select_db($con,'wadah4db'))
	{
		echo "Sponsorship is not selected";
	}
	
	//select query
	$sql = "SELECT * FROM sponsorship";
	
	//execute the SQL query
	$records = mysqli_query($con,$sql);
	
	while ($row = mysqli_fetch_array($records))
	{
		echo "<tr>";
		echo "<td>".$row['spons_id']."</td>";
		echo "<td>".$row['sponsor_id']."</td>";
		echo "<td>".$row['spons_desc']."</td>";
		echo "<td>".$row['spons_amt']."</td>";
		echo "<td>".$row['spons_date']."</td>";
		echo "<td>".$row['event_id']."</td>";

		
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




