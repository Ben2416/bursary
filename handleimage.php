<?php
session_start();
//$_SESSION['id']="1";
$id=$_SESSION['user_id'];
include 'connection.php';
$name = date('YmdHis');
//if(!$con)exit;
//print_r($GLOBALS);EXIT;
//$newname="images/".$name.".jpg";
$newname="images/".$id.".jpg";
$file = file_put_contents( $newname, file_get_contents('php://input') );
if (!$file) {
	print "Error occured here";
	exit();
}
else
{
    //$sql="insert into entry (id,images) values ('$id','$newname') on duplicate key update images='$newname'";
	$sql="insert into biometric (user_id,passport_image_url) values ('$id','$newname') on duplicate key update passport_image_url='$newname'";
	//$sql = "UPDATE biometric SET passport_image_url='$newname' WHERE user_id='$id'";
    $result=mysqli_query($con,$sql) or die(mysqli_error($con));
    $value=mysqli_insert_id($con);
    $_SESSION["myvalue"]=$value;
	
}

$url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']) . '/' . $newname;
print "$url\n";

?>
