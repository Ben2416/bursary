<?php
//session_start();
//if(!isset($_SESSION['user_id'])){
//	header("Location:login.php");
//}
function cleanInput($input) {
 
  $search = array(
    '@<script[^>]*?>.*?</script>@si',   // Strip out javascript
    '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
    '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
    '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
  );
 
    $output = preg_replace($search, '', $input);
    return $output;
}

function sanitize($input) {
	$output = null;
    if (is_array($input)) {
        foreach($input as $var=>$val) {
            $output[$var] = sanitize($val);
        }
    }
    else {
        if (get_magic_quotes_gpc()) {
            $input = stripslashes($input);
        }
        $input  = cleanInput($input);
        $output = mysql_real_escape_string($input);
    }
    return $output;
}

function stepInsert($pst = array(),$iu, $uid){
	$step = $pst['fstep'];
	switch($step){
		case 1:{
			if($iu==1){prepareInsertQuery("biometric");break;}else{prepareUpdateQuery("biometric");break;}
		};
		case 2:{	
			if($iu==1){prepareInsertQuery("biography");break;}else{prepareUpdateQuery("biography");break;}
		}
		case 3:{
			if($iu==1){prepareInsertQuery("parental");break;}else{prepareUpdateQuery("parental");break;}
		};
		case 4:{
			if($iu==1){prepareInsertQuery("educational");break;}else{prepareUpdateQuery("educational");break;}
		}
		case 5:{
			if($iu==1){prepareInsertQuery("bank");break;}else{prepareUpdateQuery("bank");break;}
		}
		default:{}
	}	
}

function prepareUpdateQuery($table, $link, $uid){
$allowed = array('user_id','admission_letter_url','course_registration_url','student_id_card_url','local_govt_id_url','int_passport_nationalID_url','birth_certificate_url','semester_report_url','highest_academic_certificate_url');
	$query = "SELECT column_name FROM information_schema.columns WHERE table_name='".$table."'";
		$result = mysqli_query($link, $query) or die(mysqli_error($link));
		if($result){
			$rows = mysqli_num_rows($result);
			while($row = mysqli_fetch_array($result)){
				$bio[] = $row;
			}
			$qq = "UPDATE ".$table." SET ";
			for($i=0;$i<$rows;$i++){
				if(!in_array($bio[$i][0], $allowed)){
					if($i == ($rows-1)){ $qq .=$bio[$i][0]."='".$_POST[$bio[$i][0]]."'";break;}
					else $qq.=$bio[$i][0]."='".$_POST[$bio[$i][0]]."',";
				}
			}
			$qq.=" WHERE user_id = '".$uid."' LIMIT 1";
			//echo $qq;
			mysqli_free_result($result);
			return $qq;
		}
}

function prepareInsertQuery($table, $link, $uid){
$allowed = array('user_id','admission_letter_url','course_registration_url','student_id_card_url','local_govt_id_url','int_passport_nationalID_url','birth_certificate_url','semester_report_url','highest_academic_certificate_url');
	$query = "SELECT column_name FROM information_schema.columns WHERE table_name='".$table."'";
		$result = mysqli_query($link, $query) or die(mysqli_error($link));
		if($result){
			$rows = mysqli_num_rows($result);
			while($row = mysqli_fetch_array($result)){
				$bio[] = $row;
			}
			$qq = "INSERT INTO ".$table." (user_id,";
			for($i=0;$i<$rows;$i++){
				if(!in_array($bio[$i][0], $allowed)){
					if($i == ($rows-1)){ $qq .=$bio[$i][0];break;}
					else $qq.=$bio[$i][0].", ";
				}
			}
			$qq.=") VALUES ('$uid',";
			for($i=0;$i<$rows;$i++){
				if(!in_array($bio[$i][0], $allowed)){
					if($i == ($rows-1)){ $qq .="'".$_POST[$bio[$i][0]]."'";break;}
					else $qq.="'".$_POST[$bio[$i][0]]."', ";
				}
			}
			$qq.=")";
			//echo $qq;
			mysqli_free_result($result);
			return $qq;
		}
}

function prepareQuery($table, $link, $uid){
$allowed = array('user_id','admission_letter_url','course_registration_url','student_id_card_url','local_govt_id_url','int_passport_nationalID_url','birth_certificate_url','semester_report_url','highest_academic_certificate_url');
	$query = "SELECT column_name FROM information_schema.columns WHERE table_name='".$table."'";
		$result = mysqli_query($link, $query) or die(mysqli_error($link));
		if($result){
			$rows = mysqli_num_rows($result);
			while($row = mysqli_fetch_array($result)){
				$bio[] = $row;
			}
			$qq = "INSERT INTO ".$table." (user_id,";
			for($i=0;$i<$rows;$i++){
				if(!in_array($bio[$i][0], $allowed)){
					if($i == ($rows-1)){ $qq .=$bio[$i][0];break;}
					else $qq.=$bio[$i][0].", ";
				}
			}
			$qq.=") VALUES ('$uid',";
			for($i=0;$i<$rows;$i++){
				if(!in_array($bio[$i][0], $allowed)){
					if($i == ($rows-1)){ $qq .="'".$_POST[$bio[$i][0]]."'";break;}
					else $qq.="'".$_POST[$bio[$i][0]]."', ";
				}
			}
			$qq.=")  ON DUPLICATE KEY UPDATE ";
			for($i=0;$i<$rows;$i++){
				if(!in_array($bio[$i][0], $allowed)){
					if($i == ($rows-1)){ $qq .=$bio[$i][0]."='".$_POST[$bio[$i][0]]."'";break;}
					else $qq.=$bio[$i][0]."='".$_POST[$bio[$i][0]]."',";
				}
			}
			//echo $qq;
			mysqli_free_result($result);
			return $qq;
		}
}

function firstInsert($link,$uid){
	$bool = false;
	$tables = array("biometric","biography","parental","educational","bank");
	for($i=0;$i<sizeof($tables);$i++){
		$query = totalInsertQuery($tables[$i],$link,$uid);
		$result = mysqli_query($link, $query) or die(mysqli_error($link));
		if($result && mysqli_affected_rows($link)>0){
			$bool = true;
		}else{$bool = false;}
	}
	return $bool;
}

function totalInsertQuery($table, $link, $uid){
$allowed = array('user_id','admission_letter_url','course_registration_url','student_id_card_url','local_govt_id_url','int_passport_nationalID_url','birth_certificate_url','semester_report_url','highest_academic_certificate_url');
	$query = "SELECT column_name FROM information_schema.columns WHERE table_name='".$table."'";
		$result = mysqli_query($link, $query) or die(mysqli_error($link));
		if($result){
			$rows = mysqli_num_rows($result);
			while($row = mysqli_fetch_array($result)){
				$bio[] = $row;
			}
			$qq = "INSERT INTO ".$table." (user_id,";
			for($i=0;$i<$rows;$i++){
				if(!in_array($bio[$i][0], $allowed)){
					if($i == ($rows-1)){ $qq .=$bio[$i][0];break;}
					else $qq.=$bio[$i][0].", ";
				}
			}
			$qq.=") VALUES ('$uid',";
			for($i=0;$i<$rows;$i++){
				if(!in_array($bio[$i][0], $allowed)){
					if($i == ($rows-1)){ $qq .="''";break;}
					else $qq.="'', ";
				}
			}
			$qq.=")";
			//echo $qq;
			mysqli_free_result($result);
			return $qq;
		}
}
?>