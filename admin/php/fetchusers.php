<?php
include "../connection.php";
//print_r($GLOBALS);
function appStatus($as){
	if($as == 1 || $as == "1")return "Complete";
	else return "Incomplete";
}
if(isset($_POST)){
	$query = "SELECT * FROM users";
	$result = mysqli_query($con, $query) or die(mysqli_error($con));
	if($result){
		while($row = mysqli_fetch_assoc($result)){
			echo "<tr class='gradeX' style='cursor:pointer' onclick='location.href=\"profile.php?uid=".$row['user_id']."\"'>
                          <td class='aligncenter'><span class='center'>
                            <input type='checkbox' />
                          </span></td>
                            <td>".ucfirst(strtolower($row['first_name']))."</td>
                            <td>".ucfirst(strtolower($row['last_name']))."</td>
                            <td>".strtolower($row['email'])."</td>
                            <td class='center'>".$row['phone_number']."</td>
                            <td class='center'>".appStatus($row['app_status'])."</td>
                        </tr>";
			//$rdata[] = $row;
		}
	}
	//echo json_encode($rdata);
}
?>