<?php # S 
$dbhost = 'localhost';
$dbuser = 'root'; //never use root user in live system
$dbpass = ''; // never use blank or simple password or password same as user name in live system
$con = mysqli_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
$dbname = 'wadah4db';
mysqli_select_db($con,$dbname);

?>
