<?php
session_start();
// $_SESSION['id'] = '1';
// $id = $_SESSION['id']; 	
//$link = mysqli_connect('localhost','root','', 'bursary');
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
	//$uid = $_POST['user_id'];
	if(!isset($uid))$uid = $_POST['user_id'];
	$fstep = $_POST['fstep'];
	echo updateStep($fstep,$tables,$desc,$con,$uid);exit;
	//echo updateAllSteps($tables,$desc,$link,$uid);exit;
}



/*			FOR STEP-BY-STEP SUBMIT		*/
function updateStep($fstep,$tables,$desc,$link,$uid){
	switch($fstep){
		case 1: $msg = $desc[$fstep-1]." Uploaded Successfully.\n";break;
		case 2: $msg = execQry($tables[$fstep-1],$desc[$fstep-1],$link,$uid);break;
		case 3: $msg = execQry($tables[$fstep-1],$desc[$fstep-1],$link,$uid);break;
		case 4: $msg = execQry($tables[$fstep-1],$desc[$fstep-1],$link,$uid);break;
		case 5: $msg = execQry($tables[$fstep-1],$desc[$fstep-1],$link,$uid);break;
		default:$msg = updateAllSteps($tables,$desc,$link,$uid);
	}
	return $msg;
}

/*			FOR SINGLE SUBMIT			*/
function updateAllSteps($tables,$desc,$link,$uid){
	$r = mysqli_query($link, "UPDATE users SET app_status=1 WHERE user_id=$uid") or die(mysqli_error($link));
	$msg="";
	for($c=1;$c<sizeof($tables);$c++){
		$msg.=execQry($tables[$c],$desc[$c],$link,$uid);
	}
	return $msg;
}

function execQry($table,$desc,$link,$uid){
	//if($table == 0)return $msg = $desc[$c]." Uploaded Successfully.\n";exit;
	//$query = prepareInsertQuery($tables[$c], $link, $uid);
	$query = prepareQuery($table, $link, $uid);
	$result = mysqli_query($link,$query) or die(mysqli_error($link));
	if($result){
		$msg = $desc." Uploaded Successfully.\n";
	}else $msg = $desc." Not Uploaded.\n";
	//mysqli_free_result($result);
	return $msg;
}

/*
echo "Response from PHP : got here\n";
echo json_encode($_POST);*/
//echo json_encode($bio);

mysqli_close($con);
?>