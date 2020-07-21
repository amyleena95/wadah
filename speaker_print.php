<html>
<body>

<div align = "center">
	<h1> List of Asset </h1>
	<table border =2 cellpadding =2 cellspacing =2>
	<tr>
			<TH>SPEAKER ID</TH>
			<TH>EVENT ID</TH>
		    <TH>TYPE</TH>
			<TH>NAME</TH>
			<TH>PHONE NO.</TH>
			<TH>ADDRESS</TH>
			
	</tr>
	
	<?php
	//Create connect with MySql Database
	$con = mysqli_connect('127.0.0.1','root','');
	
	//Select database
	if(!mysqli_select_db($con,'wadah4db'))
	{
		echo "Speaker not selected";
	}
	
	//select query
	$sql = "SELECT * FROM speaker";
	
	//execute the SQL query
	$records = mysqli_query($con,$sql);
	
	while ($row = mysqli_fetch_array($records))
	{
		echo "<tr>";
		echo "<td>".$row['speaker_id']."</td>";
		echo "<td>".$row['event_id']."</td>";
		echo "<td>".$row['speaker_type']."</td>";
		echo "<td>".$row['speaker_name']."</td>";
		echo "<td>".$row['speaker_phone_no']."</td>";
		echo "<td>".$row['speaker_add']."</td>";
		
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




