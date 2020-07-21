<html>
<head>
<title> Sponsorship </title>
</head>

<body>

<table width="558" border="1" align="center">
  <tr>
    <td height="90" colspan="2"><img src="acct.png" width="1140" height="300"/></td>
  </tr>
  <tr>
    <td width="59" height="192"><?php include 'acct_sidemenu.php' ?>
    </td>
    <td width="400"><div align="center"></div>
	
	<?php
		if (isset($_GET['spons_id'])) 
			$spons_id = $_GET['spons_id'];
		else
			$spons_id = 0;
		
		include ('connect.php');
		
		$query = "SELECT sponsor_id FROM sponsor";
		$result1 = mysqli_query ($con, $query) or die ('SQL error SPONSOR');
		$col1 = mysqli_fetch_assoc ($result1);
		
		$query = "SELECT event_id FROM event";
		$result2 = mysqli_query ($con, $query) or die ('SQL error SPONSOR');
		$col2 = mysqli_fetch_assoc ($result2);
		
		//to add data
		if (isset ($_POST['add']) && isset ($_POST['sponsor_id'])) {
			//$rent_id = addslashes ($_POST['rent_id']);
			$sponsor_id = addslashes ($_POST['sponsor_id']);
			$spons_desc = addslashes ($_POST['spons_desc']);
			$spons_amt = addslashes ($_POST['spons_amt']);
			$spons_date = addslashes ($_POST['spons_date']);
			$event_id = addslashes ($_POST['event_id']);
			
			
			include ('connect.php');
			
			$query = "INSERT INTO sponsorship (sponsor_id, spons_desc, spons_amt, spons_date,event_id)
			VALUES ('$sponsor_id', '$spons_desc', '$spons_amt', '$spons_date', '$event_id')";
			
			
			$result = mysqli_query ($con, $query) or die ('SQL error SPONSORSHIP');
			if ($result)
				echo 'Add Success';
			else
				echo 'Add failed';
			 header ("refresh:2; url=spons_list.php");
			
		}
	?>
	
	<div align="center">
	<h1><br>New Sponsorship</h1></br>
	
	<form action="" method="post">
			<TABLE border="1" cellpadding="5" cellspacing="2">
				
				
				<TR>
					<td>Sponsor ID :</td><TD>	 
					
					<SELECT name ="sponsor_id">
					
					<?php while($col1 = mysqli_fetch_assoc($result1)):;?>
					
					<?php foreach ($col1 as $col): ?>
					<option value="<?php echo $col ?>"><?php echo $col ?></option>
					<?php endforeach ?>

					<?php endwhile;?>
					</SELECT>
					</TD>
				</TR>
				
				<TR>
					<td>Description :</td>
					<td><SELECT name = "spons_desc">
					<option value ="">Select One</option>
					<option value ="Cash">Cash</option>
					<option value ="Cheque">Cheque</option>
					<option value ="Fund Transfer (Online)">Fund Transfer (Online)</option>
					<option value ="Fund Transfer (CDM)">Fund Transfer (CDM)</option>
				</TR>
				
				<TR>
					<td>Amount Received :</td>
					<td><input name="spons_amt" value="" type="text" size="50" maxlength="50"></td>
				</TR>
				
				<TR>
					<td>Date Received :</td>
					<TD><input name="spons_date" value="" type="date" size="50" maxlength="50"></TD>
				</TR>
				
				<TR>
					<td>Event ID :</td><TD>	 
					
					<SELECT name ="event_id">
					
					<?php while($col2 = mysqli_fetch_assoc($result2)):;?>
					
					<?php foreach ($col2 as $col): ?>
					<option value="<?php echo $col ?>"><?php echo $col ?></option>
					<?php endforeach ?>

					<?php endwhile;?>
					</SELECT>
					</TD>
				</TR>
		
				<TR align="center">
					<td colspan="2">
						
					<input id="submit" type="submit" name="add" value=" Submit ">
					</td>
				</TR>
				
			</TABLE>
			</form>
			</div>
			</td>
			</tr>
			</table>
</body>
	
</html