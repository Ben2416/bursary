<?php
//print_r($_FILES);exit;
//print_r($GLOBALS);exit;
session_start();
if(!isset($_SESSION['user_id'])){
	header("Location:login.php");
}
include "connection.php";
//$_SESSION['id'] = '1';
$id = $_SESSION['user_id']; 
//$con = mysqli_connect('localhost','root','', 'bursary');
	//echo "{'status':'nothing to show'}";exit;
	//if($_POST) {
	$fe = $_GET['fe'];
	$atname = $_GET['atname'];
    $allowed = array('jpg', 'jpeg', 'png', 'gif', 'bmp');

    if(isset($_FILES[$atname]) && $_FILES[$atname]['error'] == 0){

        $extension = pathinfo($_FILES[$atname]['name'], PATHINFO_EXTENSION);

        if(!in_array(strtolower($extension), $allowed)){
            echo '{"status":"0","message":"File type not allowed."}';
            exit;
        }
		$newname = fileFolder($fe).$id.".".$extension;

        if(move_uploaded_file($_FILES[$atname]['tmp_name'], $newname)){
			//$sql="insert into entry (id,images) values ('$id','$newname') on duplicate key update images='$newname'";
			$sql = sqlQuery($fe,$id,$newname);
			$result=mysqli_query($con,$sql) or die(mysqli_error($con));
			$value=mysqli_insert_id($con);
			//$_SESSION["myvalue"]=$value;
			
            echo '{"status":"1","message":"File uploaded Successfully."}';
            exit;
        }
        echo '{"status":"-1","message":"File not Uploaded."}';
		exit;
    }else{
		if(isset($_POST['user_id'])){
			$query = "SELECT ".$_POST['t_col']." FROM ".$_POST['t_nm']." WHERE user_id='".$_POST['user_id']."'";
			//echo $query;exit;
			$result = mysqli_query($con, $query) or die(mysqli_error($con));
			if($result){
				$nrow = mysqli_num_rows($result);
				if($nrow>0){
					$row = mysqli_fetch_assoc($result);
					if(isset($row[$_POST['t_col']]) && !empty($row[$_POST['t_col']]))
					echo '{"status":"1","message":"File has been uploaded."}';
					else echo '{"status":"0","message":"No File has been uploaded."}';
				}
			}
		}
	}
    exit();
	
	function fileFolder($fe){
		switch($fe){
			case 1: $ff="signatures/";break;
			case 2: $ff="admissionletters/";break;
			case 3: $ff="courseregistrations/";break;
			case 4: $ff="studentids/";break;
			case 5: $ff="localgovtids/";break;
			case 6: $ff="nationalids/";break;
			case 7: $ff="birthcertificates/";break;
			case 8: $ff="semesterreports/";break;
			case 9: $ff="highestcertificates/";break;
			case 10:$ff="fingerprints/";break;
			default:$ff="images/";
		}
		return $ff;
	}
	
	function sqlQuery($fe,$id,$newname){
		switch($fe){
			case 1: $sql="INSERT INTO biometric (user_id,signature_url) VALUES ('$id','$newname') ON DUPLICATE KEY UPDATE signature_url='$newname'";break;
			case 2: $sql="INSERT INTO educational (user_id,admission_letter_url) VALUES ('$id','$newname') ON DUPLICATE KEY UPDATE admission_letter_url='$newname'";break;
			case 3: $sql="INSERT INTO educational (user_id,course_registration_url) VALUES ('$id','$newname') ON DUPLICATE KEY UPDATE course_registration_url='$newname'";break;
			case 4: $sql="INSERT INTO educational (user_id,student_id_card_url) VALUES ('$id','$newname') ON DUPLICATE KEY UPDATE student_id_card_url='$newname'";break;
			case 5: $sql="INSERT INTO educational (user_id,local_govt_id_url) VALUES ('$id','$newname') ON DUPLICATE KEY UPDATE local_govt_id_url='$newname'";break;
			case 6: $sql="INSERT INTO educational (user_id,int_passport_nationalID_url) VALUES ('$id','$newname') ON DUPLICATE KEY UPDATE int_passport_nationalID_url='$newname'";break;
			case 7: $sql="INSERT INTO educational (user_id,birth_certificate_url) VALUES ('$id','$newname') ON DUPLICATE KEY UPDATE birth_certificate_url='$newname'";break;
			case 8: $sql="INSERT INTO educational (user_id,semester_report_url) VALUES ('$id','$newname') ON DUPLICATE KEY UPDATE semester_report_url='$newname'";break;
			case 9: $sql="INSERT INTO educational (user_id,highest_academic_certificate_url) VALUES ('$id','$newname') ON DUPLICATE KEY UPDATE highest_academic_certificate_url='$newname'";break;
			case 10:$sql="INSERT INTO biometric (user_id,fingerprint_url) VALUES ('$id','$newname') ON DUPLICATE KEY UPDATE fingerprint_url='$newname'";break;
			default:null;
		}
		return $sql;
	}
	
	function sqlInsertQuery($fe,$id,$newname){
		switch($fe){
			case 1: $sql="INSERT INTO biometric (user_id,signature_url) VALUES ('$id','$newname')";break;
			case 2: $sql="INSERT INTO educational (user_id,admission_letter_url) VALUES ('$id','$newname')";break;
			case 3: $sql="INSERT INTO educational (user_id,course_registration_url) VALUES ('$id','$newname')";break;
			case 4: $sql="INSERT INTO educational (user_id,student_id_card_url) VALUES ('$id','$newname')";break;
			case 5: $sql="INSERT INTO educational (user_id,local_govt_id_url) VALUES ('$id','$newname')";break;
			case 6: $sql="INSERT INTO educational (user_id,int_passport_nationalID_url) VALUES ('$id','$newname')";break;
			case 7: $sql="INSERT INTO educational (user_id,birth_certificate_url) VALUES ('$id','$newname')";break;
			case 8: $sql="INSERT INTO educational (user_id,semester_report_url) VALUES ('$id','$newname')";break;
			case 9: $sql="INSERT INTO educational (user_id,highest_academic_certificate_url) VALUES ('$id','$newname')";break;
			case 10:$sql="INSERT INTO biometric (user_id,fingerprint_url) VALUES ('$id','$newname')";break;
			default:null;
		}
		return $sql;
	}
	
	function sqlUpdateQuery($fe,$id,$newname){
		switch($fe){
			case 1: $sql="UPDATE biometric SET signature_url='$newname' WHERE user_id='$id'";break;
			case 2: $sql="UPDATE educational admission_letter_url='$newname' WHERE user_id='$id'";break;
			case 3: $sql="UPDATE educational course_registration_url='$newname' WHERE user_id='$id'";break;
			case 4: $sql="UPDATE educational student_id_card_url='$newname' WHERE user_id='$id'";break;
			case 5: $sql="UPDATE educational local_govt_id_url='$newname' WHERE user_id='$id'";break;
			case 6: $sql="UPDATE educational int_passport_nationalID_url='$newname' WHERE user_id='$id'";break;
			case 7: $sql="UPDATE educational birth_certificate_url='$newname' WHERE user_id='$id'";break;
			case 8: $sql="UPDATE educational semester_report_url='$newname' WHERE user_id='$id'";break;
			case 9: $sql="UPDATE educational highest_academic_certificate_url='$newname' WHERE user_id='$id'";break;
			case 10:$sql="UPDATE biometric SET fingerprint_url='$newname' WHERE user_id='$id'";break;
			default:null;
		}
		return $sql;
	}
//}
?>