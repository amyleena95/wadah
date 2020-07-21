<html>
<body>

<div align = "center">
	<h1> List of Public Print </h1>
	<table border =2 cellpadding =2 cellspacing =2>
	<tr>
			<th> Participant ID </th>
			<th> Event ID </th>
			<th> Event Name</th>
			<th> NRIC </th>
			<th> Name </th>
				
	</tr>
	
	<?php
	//Create connect with MySql Database
	$con = mysqli_connect('127.0.0.1','root','');
	
	//Select database
	if(!mysqli_select_db($con,'wadah4db'))
	{
		echo "List not selected";
	}
	
	//select query
	$sql = "SELECT plist.plist_id, event.event_id, event.event_topic, public.public_ic, public.public_name
			FROM plist, event, public
			WHERE plist.event_id=event.event_id AND
			plist.public_ic=public.public_ic;";
	
	//execute the SQL query
	$records = mysqli_query($con,$sql);
	
	while ($row = mysqli_fetch_assoc($records))
	{
		echo "<tr>";
		echo "<td>".$row['plist_id']."</td>";
		echo "<td>".$row['event_id']."</td>";
		echo "<td>".$row['event_topic']."</td>";
		echo "<td>".$row['public_ic']."</td>";
		echo "<td>".$row['public_name']."</td>";
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




