<?php
	$uid = $_GET['id'];
if(isset($uid)){
	include "../connection.php";
	require('fpdf.php');
	$query = "SELECT * FROM users,biography,parental,educational,bank,biometric ";
	$query.= "WHERE users.user_id=$uid ";	
	$query.= "AND users.user_id=biography.user_id "; 
	$query.= "AND users.user_id=parental.user_id ";
	$query.= "AND users.user_id=educational.user_id ";
	$query.= "AND users.user_id=bank.user_id ";
	$query.= "AND users.user_id=biometric.user_id";
	$result = mysqli_query($con, $query) or die(mysqli_error($con));
	if($result){
		while($row = mysqli_fetch_assoc($result)){
			$rdata = $row;
		}
	}
	//print_r($rdata);exit;
	
	$pdf = new FPDF();
	$pdf->AddPage();
	
	//HEADER
	$title = strtoupper($rdata[last_name].' '.$rdata[first_name].' '.$rdata[other_name]);
	$pdf->SetFont('Arial','B',18);
    $w = $pdf->GetStringWidth($title)+6;
    $pdf->SetX((210-$w)/2);
    $pdf->SetDrawColor(0,80,180);
    $pdf->SetFillColor(230,230,0);
    $pdf->SetTextColor(220,50,50);
    $pdf->SetLineWidth(1);
    $pdf->Cell($w,9,$title,1,1,'C',true);
    $pdf->Ln(10);
    // Save ordinate
    $pdf->y0 = $pdf->GetY();
	
	$pdf->SetTextColor(0,0,0);
	
	//LOGIN INFORMATION
	$pdf->SetFont('Arial','B',14);
	$pdf->SetFillColor(200,220,255);
	$pdf->Cell(0,6,"LOGIN INFORMATION",0,1,'L',true);
	$pdf->Ln(2);
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(60,10,'Email :');$pdf->Cell(60,10,''.$rdata[email],0,1);
	$pdf->Cell(60,10,'Password :');$pdf->Cell(60,10,''.$rdata[clearpass],0,1);
	
	//PASSPORT AND SIGNATURE
	if(!empty($rdata[passport_image_url]))$pdf->Image('../'.$rdata[passport_image_url],170,65,30);
	if(!empty($rdata[signature_url]))$pdf->Image('../'.$rdata[signature_url],170,100,30);
	//PERSONAL INFORMATION
	$pdf->SetFont('Arial','B',14);
	$pdf->SetFillColor(200,220,255);
	$pdf->Cell(0,6,"PERSONAL INFORMATION",0,1,'L',true);
	$pdf->Ln(2);
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(60,10,'Salute :');$pdf->Cell(60,10,''.asalute($rdata[salute]),0,1);
	$pdf->Cell(60,10,'First Name :');$pdf->Cell(60,10,''.$rdata[first_name],0,1);
	$pdf->Cell(60,10,'Last Name :');$pdf->Cell(60,10,''.$rdata[last_name],0,1);
	$pdf->Cell(60,10,'Other Names :');$pdf->Cell(60,10,''.$rdata[other_name],0,1);
	$pdf->Cell(60,10,'Date of Birth :');$pdf->Cell(60,10,''.$rdata[dob],0,1);
	$pdf->Cell(60,10,'Sex :');$pdf->Cell(60,10,''.$rdata[sex],0,1);
	$pdf->Cell(60,10,'State of Origin :');$pdf->Cell(60,10,''.$rdata[state_of_origin],0,1);
	$pdf->Cell(60,10,'Local Government :');$pdf->Cell(60,10,''.$rdata[lga_of_origin],0,1);
	$pdf->Cell(60,10,'Place of Birth :');$pdf->Cell(60,10,''.$rdata[place_of_birth],0,1);
	$pdf->Cell(60,10,'Electorial Ward :');$pdf->Cell(60,10,''.$rdata[electorial_ward],0,1);
	$pdf->Cell(60,10,'Village/Town :');$pdf->Cell(60,10,''.$rdata[village_town],0,1);
	$pdf->Cell(60,10,'Compound :');$pdf->Cell(60,10,''.$rdata[compund],0,1);
	$pdf->Cell(60,10,'Disability Status :');$pdf->Cell(60,10,''.$rdata[disability_status],0,1);
	if($rdata[disability_status] == "yes"){$pdf->Cell(60,10,'Disability Description :');$pdf->Cell(60,10,''.$rdata[desc_disability],0,1);}
	$pdf->Cell(60,10,'Marital Status :');$pdf->Cell(60,10,''.$rdata[marital_status],0,1);
	$pdf->Ln(2);
	if($rdata[marital_status] == "married"){
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(0,6,"SPOUSE DETAILS",0,1);
		$pdf->Ln(2);$pdf->SetFont('Arial','',12);
		$pdf->Cell(50,10,'Spouse Name :');$pdf->Cell(50,10,''.$rdata[spouse_name],0,1);
		$pdf->Cell(50,10,'Spouse Home Town :');$pdf->Cell(50,10,''.$rdata[spouse_home_town]);
		$pdf->Cell(50,10,'Spouse LGA :');$pdf->Cell(50,10,''.$rdata[spouse_lga],0,1);
		$pdf->Cell(50,10,'Spouse Maiden Name :');$pdf->Cell(50,10,''.$rdata[spouse_maiden]);
		$pdf->Cell(50,10,'Spouse Military :');$pdf->Cell(50,10,''.$rdata[spouse_military_status],0,1);
		$pdf->Cell(50,10,'Spouse Rank :');$pdf->Cell(50,10,''.$rdata[spouse_rank]);
		$pdf->Cell(50,10,'Spouse Disability :');$pdf->Cell(50,10,''.$rdata[spouse_disability],0,1);
		$pdf->Cell(50,10,'Spouse Current Address :');$pdf->Cell(50,10,''.$rdata[spouse_current_address],0,1);
	}
	
	
	$pdf->AddPage();
	//PARENT'S INFORMATION
	$pdf->SetFont('Arial','B',14);
	$pdf->SetFillColor(200,220,255);
	$pdf->Cell(0,6,"PARENT'S INFORMATION",0,1,'L',true);
	$pdf->Ln();
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(100,10,'MOTHER\'S DETAILS');			$pdf->Cell(50,10,'FATHER\'S  DETAILS',0,1);
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(50,10,'Maternal First Name :');		$pdf->Cell(50,10,''.$rdata[maternal_firstname]);
	$pdf->Cell(50,10,'Paternal First Name :');		$pdf->Cell(50,10,''.$rdata[paternal_firstname],0,1);
	$pdf->Cell(50,10,'Maternal Surname :');			$pdf->Cell(50,10,''.$rdata[maternal_surname]);
	$pdf->Cell(50,10,'Paternal Surname :');			$pdf->Cell(50,10,''.$rdata[paternal_surname],0,1);
	$pdf->Cell(50,10,'Maternal Maiden Name :');		$pdf->Cell(50,10,''.$rdata[maternal_maiden]);
	$pdf->Cell(50,10,'Paternal Paternal Name :');	$pdf->Cell(50,10,''.$rdata[paternal_paternal_name],0,1);
	$pdf->Cell(50,10,'Maternal Village/Town :');	$pdf->Cell(50,10,''.$rdata[maternal_village_town]);
	$pdf->Cell(50,10,'Paternal Village/Town :');	$pdf->Cell(50,10,''.$rdata[paternal_village_town],0,1);
	$pdf->Cell(50,10,'Maternal Clan :');			$pdf->Cell(50,10,''.$rdata[maternal_clan]);
	$pdf->Cell(50,10,'Paternal Clan :');			$pdf->Cell(50,10,''.$rdata[paternal_clan],0,1);
	$pdf->Cell(50,10,'Maternal LGA :');				$pdf->Cell(50,10,''.$rdata[maternal_lga]);
	$pdf->Cell(50,10,'Paternal LGA :');				$pdf->Cell(50,10,''.$rdata[paternal_lga],0,1);

	$pdf->Ln();
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(100,10,'MOTHER\'S FATHER DETAILS');	$pdf->Cell(50,10,'FATHER\'S FATHER DETAILS',0,1);
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(50,10,'First Name :');				$pdf->Cell(50,10,''.$rdata[mothers_father_firstname]);
	$pdf->Cell(50,10,'First Name :');				$pdf->Cell(50,10,''.$rdata[fathers_father_firstname],0,1);
	$pdf->Cell(50,10,'Surname :');					$pdf->Cell(50,10,''.$rdata[mothers_father_surname]);
	$pdf->Cell(50,10,'Surname :');					$pdf->Cell(50,10,''.$rdata[fathers_father_surname],0,1);
	$pdf->Cell(50,10,'Paternal Name :');			$pdf->Cell(50,10,''.$rdata[mothers_father_stateoforigin]);
	$pdf->Cell(50,10,'Paternal Name :');			$pdf->Cell(50,10,''.$rdata[fathers_father_stateoforigin],0,1);
	$pdf->Cell(50,10,'Village/Town :');				$pdf->Cell(50,10,''.$rdata[mothers_father_village]);
	$pdf->Cell(50,10,'Pillage/Town :');				$pdf->Cell(50,10,''.$rdata[fathers_father_village],0,1);
	$pdf->Cell(50,10,'Mlan :');						$pdf->Cell(50,10,''.$rdata[mothers_father_clan]);
	$pdf->Cell(50,10,'Clan :');						$pdf->Cell(50,10,''.$rdata[fathers_father_clan],0,1);
	$pdf->Cell(50,10,'LGA :');						$pdf->Cell(50,10,''.$rdata[mothers_father_lga]);
	$pdf->Cell(50,10,'LGA :');						$pdf->Cell(50,10,''.$rdata[fathers_father_lga],0,1);
		
	$pdf->Ln();
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(100,10,'MOTHER\'S MOTHER DETAILS');	$pdf->Cell(50,10,'FATHER\'S MOTHER DETAILS',0,1);
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(50,10,'First Name :');				$pdf->Cell(50,10,''.$rdata[mothers_mother_firstname]);
	$pdf->Cell(50,10,'First Name :');				$pdf->Cell(50,10,''.$rdata[fathers_mother_firstname],0,1);
	$pdf->Cell(50,10,'Surname :');					$pdf->Cell(50,10,''.$rdata[mothers_mother_surname]);
	$pdf->Cell(50,10,'Surname :');					$pdf->Cell(50,10,''.$rdata[fathers_mother_surname],0,1);
	$pdf->Cell(50,10,'Paternal Name :');			$pdf->Cell(50,10,''.$rdata[mothers_mother_stateoforigin]);
	$pdf->Cell(50,10,'Paternal Name :');			$pdf->Cell(50,10,''.$rdata[fathers_mother_stateoforigin],0,1);
	$pdf->Cell(50,10,'Village/Town :');				$pdf->Cell(50,10,''.$rdata[mothers_mother_village]);
	$pdf->Cell(50,10,'Pillage/Town :');				$pdf->Cell(50,10,''.$rdata[fathers_mother_village],0,1);
	$pdf->Cell(50,10,'Clan :');						$pdf->Cell(50,10,''.$rdata[mothers_mother_clan]);
	$pdf->Cell(50,10,'Clan :');						$pdf->Cell(50,10,''.$rdata[fathers_mother_clan],0,1);
	$pdf->Cell(50,10,'LGA :');						$pdf->Cell(50,10,''.$rdata[mothers_mother_lga]);
	$pdf->Cell(50,10,'LGA :');						$pdf->Cell(50,10,''.$rdata[fathers_mother_lga],0,1);
	
	$pdf->AddPage();
	
	//EDUCATIONAL INFORMATION
	$pdf->SetFont('Arial','B',14);
	$pdf->SetFillColor(200,220,255);
	$pdf->Cell(0,6,"EDUCATIONAL INFORMATION",0,1,'L',true);
	$pdf->Ln();
	$pdf->SetFont('Arial','',12);
	//$pdf->Cell(100,10,'MOTHERS FATHER DETAILS');	$pdf->Cell(50,10,'FATHERS FATHER DETAILS',0,1);
	$pdf->Cell(70,10,'Admission Level :');								$pdf->Cell(50,10,''.alevel($rdata[admission_level]),0,1);
	$pdf->Cell(70,10,'Matric Number :');								$pdf->Cell(50,10,''.$rdata[matric_number],0,1);
	$pdf->Cell(70,10,'Course of Study :');								$pdf->Cell(50,10,''.$rdata[course_of_study],0,1);
	$pdf->Cell(70,10,'Level of Study :');								$pdf->Cell(50,10,''.$rdata[level_of_study],0,1);
	$pdf->Cell(70,10,'Department/Faculty :');							$pdf->Cell(50,10,''.$rdata[department_faculty],0,1);
	$pdf->Cell(70,10,'Course Duration :');								$pdf->Cell(50,10,''.$rdata[course_duration],0,1);
	$pdf->Cell(70,10,'Course Start Date :');							$pdf->Cell(50,10,''.$rdata[course_startdate],0,1);
	$pdf->Cell(70,10,'Expected Graduation Year :');						$pdf->Cell(50,10,''.$rdata[expected_graduation],0,1);
	$pdf->Cell(70,10,'Expected Qualification :');						$pdf->Cell(50,10,''.$rdata[expected_qualification],0,1);
	$pdf->Cell(70,10,'Institution Contact Address :');					$pdf->Cell(50,10,''.$rdata[institution_contact_add],0,1);
	$pdf->Cell(70,10,'Institution Contact Person :');					$pdf->Cell(50,10,''.$rdata[institution_contact_person],0,1);
	$pdf->Cell(70,10,'University Zone :');								$pdf->Cell(50,10,''.$rdata[university_zone],0,1);
	$pdf->Cell(70,10,'University State :');								$pdf->Cell(50,10,''.$rdata[university_state],0,1);
	$pdf->Cell(70,10,'University Name :');								$pdf->Cell(50,10,''.$rdata[university_name],0,1);
	$pdf->Cell(70,10,'Current CGPA :');									$pdf->Cell(50,10,''.$rdata[current_cgpa],0,1);
	$pdf->Cell(70,10,'Other University :');								$pdf->Cell(50,10,''.$rdata[other_university],0,1);
	$pdf->Cell(70,10,'Highest Academic Qualification :');				$pdf->Cell(50,10,''.strtoupper($rdata[highest_academic_qual]),0,1);
	$pdf->Cell(70,10,'Highest Academic Institution :');					$pdf->Cell(50,10,''.$rdata[highest_academic_institution],0,1);
	$pdf->Cell(70,10,'Highest Academic Course :');						$pdf->Cell(50,10,''.$rdata[highest_academic_course],0,1);
	$pdf->Cell(70,10,'Highest Academic Duration :');					$pdf->Cell(50,10,''.$rdata[highest_academic_duration],0,1);
	$pdf->Cell(70,10,'Highest Academic Certificate :');					$pdf->Cell(50,10,''.$rdata[highest_academic_certificatename],0,1);
	$pdf->Cell(70,10,'Grade Level :');									$pdf->Cell(50,10,''.glevel($rdata[grade_level]),0,1);
	
	$pdf->AddPage();
	
	//BANK INFORMATION
	$pdf->SetFont('Arial','B',14);
	$pdf->SetFillColor(200,220,255);
	$pdf->Cell(0,6,"BANK INFORMATION",0,1,'L',true);
	$pdf->Ln();
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(100,10,'PERSONAL BANK DETAILS',0,1);
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(70,10,'BANK NAME :');									$pdf->Cell(50,10,''.$rdata[personal_bank_name],0,1);
	$pdf->Cell(70,10,'ACCOUNT NAME :');									$pdf->Cell(50,10,''.$rdata[personal_account_name],0,1);
	$pdf->Cell(70,10,'BANK ADDRESS :');									$pdf->Cell(50,10,''.$rdata[personal_bank_address],0,1);
	$pdf->Cell(70,10,'ACCOUNT NUMBER :');								$pdf->Cell(50,10,''.$rdata[personal_account_number],0,1);
	$pdf->Cell(70,10,'ACCOUNT TYPE :');									$pdf->Cell(50,10,''.actype($rdata[personal_account_type]),0,1);
	$pdf->Ln();
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(100,10,'NUBS BANK DETAILS',0,1);
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(70,10,'BANK NAME :');									$pdf->Cell(50,10,''.$rdata[nubs_bank_name],0,1);
	$pdf->Cell(70,10,'ACCOUNT NAME :');									$pdf->Cell(50,10,''.$rdata[nubs_account_name],0,1);
	$pdf->Cell(70,10,'BANK ADDRESS :');									$pdf->Cell(50,10,''.$rdata[nubs_bank_address],0,1);
	$pdf->Cell(70,10,'ACCOUNT NUMBER :');								$pdf->Cell(50,10,''.$rdata[nubs_account_number],0,1);
	$pdf->Cell(70,10,'SORT CODE :');									$pdf->Cell(50,10,''.$rdata[nubs_sort_code],0,1);
	$pdf->Cell(70,10,'ACCOUNT TYPE :');									$pdf->Cell(50,10,''.actype($rdata[nubs_account_type]),0,1);
	$pdf->Ln();
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(100,10,'SUG BANK DETAILS',0,1);
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(70,10,'BANK NAME :');									$pdf->Cell(50,10,''.$rdata[sug_bank_name],0,1);
	$pdf->Cell(70,10,'ACCOUNT NAME :');									$pdf->Cell(50,10,''.$rdata[sug_account_name],0,1);
	$pdf->Cell(70,10,'BANK ADDRESS :');									$pdf->Cell(50,10,''.$rdata[sug_bank_address],0,1);
	$pdf->Cell(70,10,'ACCOUNT NUMBER :');								$pdf->Cell(50,10,''.$rdata[sug_account_number],0,1);
	$pdf->Cell(70,10,'SORT CODE :');									$pdf->Cell(50,10,''.$rdata[sug_sort_code],0,1);
	$pdf->Cell(70,10,'ACCOUNT TYPE :');									$pdf->Cell(50,10,''.actype($rdata[sug_account_type]),0,1);

	$pdf->Output();
}	
	
	function actype($at){
		if($at == "01")return "Savings";
		else if($at == "02")return "Current";
		else return "";
	}
		
	function alevel($at){
		if($at == "01")return "Already in School";
		else if($at == "02")return "Fresh Graduate";
		else return "";
	}
		
	function asalute($at){
		if($at == "01")return "Mr";
		else if($at == "02")return "Mrs";
		else if($at == "03")return "Miss";
		else if($at == "04")return "Dr";
		else return "";
	}
	function glevel($at){
		if($at == "01")return "First Class";
		else if($at == "02")return "Second Class Upper";
		else if($at == "03")return "Second Class Lower";
		else if($at == "04")return "Third Class";
		else return "";
	}	
	
?>