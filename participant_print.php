<html>
<body>

<div align = "center">
	<h1> List of Member Participant Print </h1>
	<table border =2 cellpadding =2 cellspacing =2>
	<tr>
			<th> Participant ID </th>
			<th> Event ID </th>
			<th> Event Name</th>
			<th> Member ID </th>
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
	$sql = "SELECT participant.participant_id, event.event_id, event.event_topic, member.mem_id, member.mem_name
			FROM participant, event, member
			WHERE participant.event_id=event.event_id AND
			member.mem_id=participant.mem_id";
	
	//execute the SQL query
	$result = mysqli_query($con,$sql);
	
	while ($row = mysqli_fetch_array($result))
	{
		echo "<tr>";
		echo "<td>".$row['participant_id']."</td>";
		echo "<td>".$row['event_id']."</td>";
		echo "<td>".$row['event_topic']."</td>";
		echo "<td>".$row['mem_id']."</td>";
		echo "<td>".$row['mem_name']."</td>";
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




