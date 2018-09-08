<?php
include "../../connection.php";
//print_r($GLOBALS);
if(isset($_GET)){
	if($_GET['p'] == 'tr')
	$query = "SELECT * FROM users";
	else if($_GET['p'] == 'tc')
	$query = "SELECT * FROM users WHERE app_status=1";
	else if($_GET['p'] == 'ti')
	$query = "SELECT * FROM users WHERE app_status=0";
	else{ echo "Invalid";exit;}
	$result = mysqli_query($con, $query) or die(mysqli_error($con));
	if($result){
		echo "Total : ".mysqli_num_rows($result);
	}
	exit();
	//echo json_encode($rdata);
}
?>