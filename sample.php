<?php
include"connection.php";

function sendMessage($url){
//echo $url;exit;
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$output = curl_exec($ch);
	//if(!curl_exec($ch)){
	//	die('Error: "'.curl_error($ch).'" - Code: '.curl_errno($ch));
	//}
	curl_close($ch);
	return $output;
}

function updateSMS($con,$email,$val){
	$query = "UPDATE users SET sms=$val WHERE email LIKE '%$email%' LIMIT 1";
	$rs = mysqli_query($con, $query) or die(mysqli_error($con));
	if($rs && mysqli_affected_rows($con)>0){echo 'yes';exit;}else{echo 'no';exit;}
}

 function validPhone($phone){
 	if(strlen($phone)==11) return true;
 	else return false;
}

function formatPhone($phone){
	if(substr($phone,0,1) == 0){
		return '234'.substr($phone,1,11);
	}
	else return "";
}

function sendSMS($email,$password,$mobile){
	$text = "Your account has been created. Your username is : ".$email.". Your password is : ".$password;
	$text = urlencode($text);
	$username= 'xtreemhackzone@gmail.com';
	$password='password';
	$sender='BSSBGOV';	
	if(validPhone($mobile)){
		$mobile = formatPhone($mobile);
		if(!empty($mobile)){
			 $url="http://sms.bbnplace.com/bulksms/bulksms.php?username=$username&password=$password&mobile=$mobile&sender=$sender&message=$text";
			 echo $url."<br>";
			 //echo sendMessage($url)."<br>";
			 //print file_get_contents($url);
			 //$reply = sendMessage($url);
			 $reply = 1801;
			 if($reply == "1801" || $reply == 1801) return true;
			 else return false;
		}
		else return false;
	}
	else return false;
}

 $query = "select * from users";
 $result = mysqli_query($con, $query) or die(mysqli_error($con));
 if($result){
	$count = 0;
 	while($row = mysqli_fetch_assoc($result)){
 		if(!sendSMS($row['email'],$row['clearpass'],$row['phone_number'])) updateSMS($con,$row['email'],0);//continue;
		else{ echo ++$count.'Sent<br><br>';updateSMS($con,$row['email'],1);}
		break;
 	}
 }
?>