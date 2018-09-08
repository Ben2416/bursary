<?php
include "../connection.php";
//print_r($GLOBALS);

if(isset($_POST)){
	$query = "SELECT * FROM users, educational WHERE users.user_id=educational.user_id AND users.app_status=1";
	$result = mysqli_query($con, $query) or die(mysqli_error($con));
	if($result){
		while($row = mysqli_fetch_assoc($result)){
			echo "<tr class='gradeX' >
                          <td class='aligncenter'><span class='center'>
                            <input type='checkbox' />
                          </span></td>
                            <td>".ucfirst(strtolower($row['first_name']))." ".ucfirst(strtolower($row['last_name']))."</td>
                            <td>".ucwords(strtolower($row['name_of_institution']))."</td>
                            <td class='center'>".$row['course_of_study']."</td>
                            <td class='center'>".$row['course_startdate']."</td>
							<td class='center'>".$row['expected_graduation']."</td>
							<td><a href='profile.php?uid=".$row['user_id']."'>View Details</a></td>
                        </tr>";
			//$rdata[] = $row;
		}
	}
	//echo json_encode($rdata);
}
?>