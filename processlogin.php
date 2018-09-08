<?php
error_reporting(0);
include "connection.php";
include "functions.php";

//print_r($_POST);//exit;

$_POST = sanitize($_POST);

function createPass( $length = 6 ) {
    //$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $password = substr( str_shuffle( $chars ), 0, $length );
    return $password;
}

//echo createPass(8);exit;

function fetchInfo($con,$email,$pass){
	$query = "SELECT * FROM users WHERE email LIKE '%$email%' AND password=password('$pass') LIMIT 1";
	$result = mysqli_query($con, $query) or die(mysqli_error($con).' - f');
	if($result && mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_assoc($result)){
			$rdata = $row;
		}
		mysqli_free_result($result);
	}
	return $rdata;
}

function checkExist($con,$email){
	$query = "SELECT * FROM users WHERE email LIKE '%$email%' LIMIT 1";
	$result = mysqli_query($con, $query) or die(mysqli_error($con).' - f');
	if($result && mysqli_num_rows($result)>0){
		mysqli_free_result($result);
		return true;
	}else return false;
	
}

function updateInfo($con,$email){
	if(checkExist($con, $email)){
		$pass = createPass(8);
		$query = "UPDATE users SET password=password('$pass'), clearpass='$pass' WHERE email='$email' LIMIT 1";
		$result = mysqli_query($con, $query) or die(mysqli_error($con).' - u');
		if(mysqli_affected_rows($con)){
			//if(mail());
				return true;//fetchInfo($con,$email,$pass);
			//}
		}
	}else return false;
}

function updateNames($con,$uid,$fn,$ln){
	$query = "UPDATE biography SET first_name='$fn', surname_name='$ln' WHERE user_id='$uid'";
	$result = mysqli_query($con, $query) or die(mysqli_errror($con).' - names');
	if($result && mysqli_affected_rows($con)>0){
		return true;
	}else return false;
}

function addInfo($con,$fname,$sname,$phone,$email,$pass){
if(!checkExist($con, $email)){
	$message = "Dear $fname $sname\n\nCongrations! Your registration is successful.";
	$message.= "\n\nYour username is : $email\nYour password is : $pass";
	$message.= "\n\nYou can now log in with your details.\nGoodluck.\n\nAdmin.";
	//if(mail($email,"Bayelsa Scholarship Board Registration",$message)){
		$query = "INSERT INTO users (first_name,last_name,phone_number,email,password,clearpass) VALUES ('$fname','$sname','$phone','$email',password('$pass'),'$pass')";
		$result = mysqli_query($con, $query) or die(mysqli_error($con).' - i');
		if(mysqli_affected_rows($con)>0){
			$info = fetchInfo($con,$email,$pass);
			if(firstInsert($con,$info['user_id'])){
				if(updateNames($con,$info['user_id'],$fname,$sname)){
					return true;//$info;
				}else return false;
			}else return false;
		}else return false;
	//}else{ echo "Mail not sent.";}
}else return false;
}

function initSession($rdata){
	session_start();
	$_SESSION['user_id']      = $rdata['user_id'];
	$_SESSION['first_name']   = $rdata['first_name'];
	$_SESSION['last_name']    = $rdata['last_name'];
	$_SESSION['email']        = $rdata['email'];
	$_SESSION['phone_number'] = $rdata['phone_number'];
	//header('Location:fingerprint.html');
}

function allowAccess($con,$email,$pass){
	if(checkExist($con, $email)){
		$dt = fetchInfo($con,$email,$pass);
		if(isset($dt['user_id'])){
			initSession($dt);
			return true;
		}else return false;
	}else return false;
}

if(isset($_POST)){
	//header("Content-Type: text/javascript; charset=utf-8");
	if(isset($_POST['f1'])){
		//echo "login";exit;
		//$rdata =/*echo json_encode(*/fetchInfo($con,$_POST['email'],$_POST['password'])/*)*/;
		//initSession($rdata);
		if(allowAccess($con,$_POST['email'],$_POST['password'])){
			echo '{"from":"f1","status":"1","message":"Welcome"}';
		}else echo '{"from":"f1","status":"0","message":"You are not allowed access"}';
	}else if(isset($_POST['f2'])){
		//echo "forgot";exit;
		//echo json_encode(updateInfo($con,$_POST['email'],$_POST['password']));
		if(updateInfo($con,$_POST['email'])){
			echo '{"from":"f2","status":"1","message":"A new password has been sent to the specified email."}';
		}else echo '{"from":"f2","status":"0","message":"User email does not exists. Please check again."}';
	}else if(isset($_POST['f3'])){
		//echo "register";exit;
		/*json_encode(*///print_r(addInfo($con,$_POST['first_name'],$_POST['last_name'],$_POST['phone_number'],$_POST['email'],createPass(8)));/*)*/;
		if(addInfo($con,$_POST['first_name'],$_POST['last_name'],$_POST['phone_number'],$_POST['email'],createPass(8))){
			echo '{"from":"f3","status":"1","message":"Registration Successful."}';
		}else{
			echo '{"from":"f3","status":"0","message":"User cannot be registered.\nUser may already exists."}';
		}
	}else{
		echo '{"status":"ok"}';
	}
}

mysqli_close($con);
?>