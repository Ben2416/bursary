<?php
//set query variables
$zone = $_REQUEST['uzone'];
$name = $_REQUEST['uname'];
$other= $_REQUEST['other'];

/*******EDIT LINES 3-8*******/
$DB_Server = "localhost"; //MySQL Server    
$DB_Username = "root";//"bssbgov_bursaryu"; //MySQL Username     
$DB_Password = "";//"rant401mead699#";             //MySQL Password     
$DB_DBName = "bursary";//"bssbgov_bursary";         //MySQL Database Name  
$DB_TBLName = "users"; //MySQL Table Name   
$filename = $zone."_".$name."_excelfile";         //File Name
/*******YOU DO NOT NEED TO EDIT ANYTHING BELOW THIS LINE*******/    

//create MySQL connection   
$sql = "SELECT first_name,surname_name,other_name,sex,lga_of_origin,matric_number,expected_qualification,university_zone,university_name,level_of_study,course_duration,course_startdate,expected_graduation,personal_account_name,personal_bank_name,personal_account_number,personal_account_type FROM biography, educational, bank WHERE biography.user_id=biography.user_id AND biography.user_id=biography.user_id AND biography.user_id=educational.user_id AND biography.user_id=bank.user_id AND educational.university_zone='$zone' AND educational.university_name='$name' AND other_university LIKE '%$other%' ";
$Connect = @mysql_connect($DB_Server, $DB_Username, $DB_Password) or die("Couldn't connect to MySQL:<br>" . mysql_error() . "<br>" . mysql_errno());
//select database   
$Db = @mysql_select_db($DB_DBName, $Connect) or die("Couldn't select database:<br>" . mysql_error(). "<br>" . mysql_errno());   
//execute query 
$result = @mysql_query($sql,$Connect) or die("Couldn't execute query:<br>" . mysql_error(). "<br>" . mysql_errno());    
$file_ending = "xls";
//header info for browser
header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=$filename.xls");  
header("Pragma: no-cache"); 
header("Expires: 0");
/*******Start of Formatting for Excel*******/   
//define separator (defines columns in excel & tabs in word)
$sep = "\t"; //tabbed character
//start of printing column names as names of MySQL fields
for ($i = 0; $i < mysql_num_fields($result); $i++) {
echo mysql_field_name($result,$i) . "\t";
}
print("\n");    
//end of printing column names  
//start while loop to get data
    while($row = mysql_fetch_row($result))
    {
        $schema_insert = "";
        for($j=0; $j<mysql_num_fields($result);$j++)
        {
            if(!isset($row[$j]))
                $schema_insert .= "NULL".$sep;
            elseif ($row[$j] != "")
                $schema_insert .= "$row[$j]".$sep;
            else
                $schema_insert .= "".$sep;
        }
        $schema_insert = str_replace($sep."$", "", $schema_insert);
        $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
        $schema_insert .= "\t";
        print(trim($schema_insert));
        print "\n";
    }   
?>