<?php
include "../../connection.php";
//print_r($GLOBALS);exit;

if(isset($_POST['uid'])){
	$query = "SELECT * FROM users, biometric, biography, educational WHERE users.user_id=".$_POST['uid']." AND users.user_id=biometric.user_id AND users.user_id=biography.user_id AND users.user_id=educational.user_id ";
	$result = mysqli_query($con, $query) or die(mysqli_error($con));
	if($result){
		while($row = mysqli_fetch_assoc($result)){
			$rdata[] = $row;
		}
	}
	echo json_encode($rdata);
}
?>