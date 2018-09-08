<?php
include "connection.php";
if(isset($_POST['uni'])){
	$query = "SELECT university_name FROM universities WHERE university_zone='".strtolower($_POST['uni'])."' OR university_zone='".strtoupper($_POST['uni'])."'";
	//echo $query;exit;
	$result = mysqli_query($con, $query) or die(mysqli_error($con));
	if($result){
		while($row = mysqli_fetch_assoc($result)){
			$rdata[] = $row;
		}
		//print_r($rdata);exit;
		mysqli_free_result($result);
	}
	echo json_encode($rdata);exit;
}
exit();
?>