<html>
<body>

<div align = "center">
	<h1> List of Asset </h1>
	<table border =2 cellpadding =2 cellspacing =2>
	<tr>
			 <TH>ID</TH>
			  <TH>TYPE</TH>
			  <TH>TOPIC</TH>
			  <TH>DATE</TH>
			  <TH>TIME</TH>
			  <TH>VENUE</TH>
			
	</tr>
	
	<?php
	//Create connect with MySql Database
	$con = mysqli_connect('127.0.0.1','root','');
	
	//Select database
	if(!mysqli_select_db($con,'wadah4db'))
	{
		echo "Event not selected";
	}
	
	//select query
	$sql = "SELECT * FROM event";
	
	//execute the SQL query
	$records = mysqli_query($con,$sql);
	
	while ($row = mysqli_fetch_array($records))
	{
		echo "<tr>";
		echo "<td>".$row['event_id']."</td>";
		echo "<td>".$row['event_type']."</td>";
		echo "<td>".$row['event_topic']."</td>";
		echo "<td>".$row['event_date']."</td>";
		echo "<td>".$row['event_time']."</td>";
		echo "<td>".$row['event_venue']."</td>";
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




