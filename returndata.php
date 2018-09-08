<?php
session_start();
if(!isset($_SESSION['user_id'])){
	header("Location:login.php");
}
$uid = $_SESSION['user_id']; 	
//print_r($_POST);exit;
//echo json_encode($_POST);exit;

include "functions.php";
include "connection.php";

$tables = array("biometric","biography","parental","educational","bank");
$desc = array("Biometric Data","Personal Data","Parental Data","Educational Data","Bank Data");

//$_POST = sanitize($_POST);
foreach($_POST as $var=>$val) {
    $_POST[$var] = mysqli_real_escape_string($con, $val);
}
if(isset($_POST)){
	if(!isset($uid))$uid = $_POST['user_id'];
	$fstep = $_POST['fstep'];
	//echo updateStep($fstep,$tables,$desc,$con,$uid);exit;
	//echo updateAllSteps($tables,$desc,$con,$uid);exit;
	$rdata = populateStep($con,$fstep,$uid,$tables);
	echo json_encode($rdata);exit;
}
function populateStep($con,$fstep,$uid,$tables){
	$rdata = array();
//echo $tables[$fstep-1];exit;
//for($c=4;$c<sizeof($tables);$c++){
	$query = "SELECT * FROM ".$tables[$fstep-1]." WHERE user_id='".$uid."' LIMIT 1";
	$result = mysqli_query($con, $query) or die(mysqli_error($con));
	while($row = mysqli_fetch_assoc($result)){
		$rdata[] = $row;
	}
	mysqli_free_result($result);
	return $rdata;
}

mysqli_close($con);
?>