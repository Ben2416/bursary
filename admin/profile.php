<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>BSSB Admin Area</title>
<link rel="stylesheet" href="css/style.default.css" type="text/css" />
<link rel="stylesheet" href="prettify/prettify.css" type="text/css" />
<script type="text/javascript" src="prettify/prettify.js"></script>
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.9.2.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
</head>

<body>

<div class="mainwrapper">
	
    <!-- START OF LEFT PANEL -->
    <div class="leftpanel">
    	
        <div class="logopanel">
        	<h1><a href="dashboard.php">BSSB <span>Admin Area</span></a></h1>
        </div><!--logopanel-->
        
        <div class="datewidget">Today is Tuesday, Dec 25, 2012 5:30pm</div>
          
        <div class="leftmenu">        
            <ul class="nav nav-tabs nav-stacked">
                <li class="nav-header animate4 fadeInUp">Main Navigation</li>
                <li class="animate5 fadeInUp"><a href="dashboard.php"><span class="icon-align-justify animate0 swing"></span> Dashboard</a></li>
                <li class="animate6 fadeInUp"><a href="users.php"><span class="icon-picture"></span> Registered Users</a></li>
                <li class="animate9 fadeInUp"><a href="application.php"><span class="icon-font"></span> Submitted Application</a></li>
                <li class="animate10 fadeInUp"><a href="report.php"><span class="icon-signal"></span> Generate Report</a></li>
            </ul>
        </div><!--leftmenu-->
        
    </div><!--mainleft-->
    <!-- END OF LEFT PANEL -->
    
    <!-- START OF RIGHT PANEL -->
    <div class="rightpanel">
    	<div class="headerpanel">
            <a href="#" class="showmenu"></a>
            
            <div class="headerright">
                <div class="dropdown notification">
                    
                </div><!--dropdown-->
                
                <div class="dropdown userinfo">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="#">Hi, Admin <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="editprofile.php"><span class="icon-edit"></span> Edit Profile</a></li>
                       <!--  <li><a href="#"><span class="icon-wrench"></span> Account Settings</a></li> -->
                        <li class="divider"></li>
                        <li><a href="#"><span class="icon-off"></span> Sign Out</a></li>
                    </ul>
                </div><!--dropdown-->
            
            </div><!--headerright-->
            
        </div><!--headerpanel-->
        <div class="breadcrumbwidget">
        	<ul class="breadcrumb">
                <li><a href="dashboard.php">Home</a> <span class="divider">/</span></li>
                <li class="active">profile</li>
            </ul>
        </div><!--breadcrumbs-->
        <div class="pagetitle">
        	<h1>Applicant Profile</h1>
        </div><!--pagetitle-->
        
        <div class="maincontent">
        	<div class="contentinner content-editprofile">
            	<h4 class="widgettitle nomargin" id="hd">Profile of Okpongu Ebimobowei</h4>
                <div class="widgetcontent bordered">
                	<div class="row-fluid">
                    	<div class="span3 profile-left">
                        
                        	<h4>Your Profile Photo</h4>
                            
                            <div class="profilethumb">
                                <img src="img/passport.jpg" width="200" height="200" id="passport_image_url" alt="" class="img-polaroid" />
                            </div><!--profilethumb-->
                            
                            
                            <h4>Uploaded Documents</h4>
                            
                            <ul class="">
                                <li><a href="#" id="fingerprint_url" download="">Fingerprint</a></li>
                                <li><a href="#" id="signature_url" download="">Signature</a></li>
                            	<li><a href="#" id="course_registration_url" download="">Course Registration</a></li>
                                <li><a href="#" id="student_id_card_url" download="">Student ID</a></li>
                                <li><a href="#" id="local_govt_id_url" download="">L.G.A Identification</a></li>
                                <li><a href="#" id="int_passport_nationalID_url" download="">Int. Passport or National Id</a></li>
                                <li><a href="#" id="birth_certificate_url" download="">Birth Certificate</a></li>
                                <li><a href="#" id="semester_report_url" download="">Semester Report</a></li>
                            </ul>                            
                        </div><!--span3-->
                        <div class="span9">
                            <form action="#" class="editprofileform" method="post">
                            	<h4>Login Information</h4>
                                <p>
                                	<label>Username:</label>
                                	<input type="text" name="email" id="email" class="input-xlarge" value="ebi.okpongu@gmail.com" />
                                </p>
                                <p>
                                	<label>password:</label>
                                    <input type="text" name="clearpass" id="clearpass" class="input-xlarge" value="YhmThsd5" />
                                </p>
                                <br />
                                
                                <h4>Personal Information</h4>
                                <p>
                                	<label>Firstname:</label>
                                	<input type="text" name="first_name" id="first_name" class="input-xlarge" value="Ebimobowei" />
                                </p>
                                <p>
                                	<label>Lastname:</label>
                                    <input type="text" name="last_name" id="last_name" class="input-xlarge" value="Okpongu" />
                                </p>
                                <p>
                                    <label>Sex:</label>
                                    <input type="text" name="sex" id="sex" class="input-xlarge" value="Male" />
                                </p>
                                <p>
                                	<label>date of Birth:</label>
                                    <input type="text" name="dob" id="dob" class="input-xlarge" value="07/01/1998" />
                                </p>
                                 <p>
                                    <label>Place of Birth:</label>
                                    <input type="text" name="pob" id="place_of_birth" class="input-xlarge" value="Lagos" />
                                </p>  
                                <p>
                                    <label>L.G.A:</label>
                                    <input type="text" name="lga" id="lga_of_origin" class="input-xlarge" value="Ekeremor" />
                                </p>
                                <p>
                                	<label>Phone:</label>
                                    <input type="text" name="phone" id="phone_number" class="input-xlarge" value="07034428600" />
                                </p>                             
                                
                                <h4>Educational Details</h4>
                                 <p>
                                    <label>Admission Level:</label>
                                    <input type="text" name="phone" id="admission_level" class="input-xlarge" value="Already in School" />
                                </p>
                                 <p>
                                    <label>Programme:</label>
                                    <input type="text" name="phone" id="programme_type" class="input-xlarge" value="Bsc" />
                                </p>
                                 <p>
                                    <label>Matric Number:</label>
                                    <input type="text" name="phone" id="matric_number" class="input-xlarge" value="BSSB/09403/389403" />
                                </p>
                                 <p>
                                    <label>University:</label>
                                    <input type="text" name="phone" id="university_name" class="input-xlarge" value="Middlesex University" />
                                </p>
                                 <p>
                                    <label>University Zone:</label>
                                    <input type="text" name="phone" id="university_zone" class="input-xlarge" value="South South" />
                                </p>
                                 <p>
                                    <label>Course of Study:</label>
                                    <input type="text" name="phone" id="course_of_study" class="input-xlarge" value="Information technology" />
                                </p>
                                 <p>
                                    <label>Level of Study:</label>
                                    <input type="text" name="phone" class="input-xlarge" value="300" />
                                </p>
                                 <p>
                                    <label>Department:</label>
                                    <input type="text" name="phone" id="level_of_study" class="input-xlarge" value="Computer Science" />
                                </p>
                                 <p>
                                    <label>Course Duration:</label>
                                    <input type="text" name="phone" id="course_duration" class="input-xlarge" value="3yrs" />
                                </p>
                                 <p>
                                    <label>Start Date:</label>
                                    <input type="text" name="phone" id="course_startdate" class="input-xlarge" value="07-01-2012" />
                                </p>
                                 <p>
                                    <label>End Date:</label>
                                    <input type="text" name="phone" class="input-xlarge" value="07-01-2015" />
                                </p>
                                 <p>
                                    <label>Expected Qualification:</label>
                                    <input type="text" name="phone" id="expected_qualification" class="input-xlarge" value="Bsc. Information Technology" />
                                </p>
                                 
                                
                                <br />
                                <p>
                            
									<div style="width:100px;height:20px;border:solid 1px #999;text-align:center;cursor:pointer;" onclick="location.href='../fpdf17/testpdf.php?id=<?php echo $_GET['uid']; ?>'">Generate PDF</div>
                                </p>
                            </form>
                        </div><!--span9-->
                    </div><!--row-fluid-->
                </div><!--widgetcontent-->
            </div><!--contentinner-->
        </div><!--maincontent-->
        
    </div><!--mainright-->
    <!-- END OF RIGHT PANEL -->
    
    <div class="clearfix"></div>
    
    <div class="footer">
    	<div class="footerleft">Bayelsa State Scholarship Board</div>
    </div><!--footer-->

    
</div><!--mainwrapper-->
<script type="text/javascript">
jQuery(document).ready(function(){

	jQuery('.profilethumb').hover(function(){
		jQuery(this).find('a').fadeIn();
	},function(){
		jQuery(this).find('a').fadeOut();
	});
	
	jQuery('.taglist a').click(function(){
		return false;
	});
	jQuery('.taglist a span').click(function(){
		jQuery(this).parent().remove();
		return false;
	});
	
	jQuery.post(
	"php/fetchprofile.php",
	{uid:<?php echo $_GET['uid']; ?>}
	).done(function(data){
	//alert(data);
		var obj = JSON.parse(data);
		//jQuery('#email').val(obj[0].email);
		jQuery('#hd').html('Profile of '+obj[0].first_name+' '+obj[0].last_name);
		jQuery('#passport_image_url').attr('src','../'+obj[0].passport_image_url);
	//	jQuery('#fingerprint_url').attr('href','php/download.php?file=../../'+obj[0].fingerprint_url);
		jQuery('#fingerprint_url').attr('href','../'+obj[0].fingerprint_url);
			jQuery('#fingerprint_url').attr('download',obj[0].user_id+'_'+obj[0].fingerprint_url);
		jQuery('#signature_url').attr('href','../'+obj[0].signature_url);
			jQuery('#signature_url').attr('download',obj[0].user_id+'_'+obj[0].signature_url);
		jQuery('#admission_letter_url').attr('href','../'+obj[0].admission_letter_url);
			jQuery('#admission_letter_url').attr('download',obj[0].user_id+'_'+obj[0].admission_letter_url);
		jQuery('#course_registration_url').attr('href','../'+obj[0].course_registration_url);
			jQuery('#course_registration_url').attr('download',obj[0].user_id+'_'+obj[0].course_registration_url);
		jQuery('#student_id_card_url').attr('href','../'+obj[0].student_id_card_url);
			jQuery('#student_id_card_url').attr('download',obj[0].user_id+'_'+obj[0].student_id_card_url);
		jQuery('#local_govt_id_url').attr('href','../'+obj[0].local_govt_id_url);
			jQuery('#local_govt_id_url').attr('download',obj[0].user_id+'_'+obj[0].local_govt_id_url);
		jQuery('#int_passport_nationalID_url').attr('href','../'+obj[0].int_passport_nationalID_url);
			jQuery('#int_passport_nationalID_url').attr('download',obj[0].user_id+'_'+obj[0].int_passport_nationalID_url);
		jQuery('#birth_certificate_url').attr('href','../'+obj[0].birth_certificate_url);
			jQuery('#birth_certificate_url').attr('download',obj[0].user_id+'_'+obj[0].birth_certificate_url);
		jQuery('#semester_report_url').attr('href','../'+obj[0].semester_report_url);
			jQuery('#semester_report_url').attr('download',obj[0].user_id+'_'+obj[0].semester_report_url);
		jQuery.each(obj[0], function(item, value){
			jQuery('#'+item).val(value);
		});
		//alert(jQuery('#passport_image_url').attr('src'));
	});
	
	//);
	
});
</script>
</body>
</html>
