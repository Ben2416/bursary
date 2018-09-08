<?php 
session_start();
if(!isset($_SESSION['user_id'])){
	header("Location:login.php");
}
//print_r($GLOBALS);
?>
<html lang="en" class="no-js"><!--<![endif]--><!-- start: HEAD --><head>
		<title>Bayelsa State Scholarship Board - Bursary System</title>
		<!-- start: META -->
		<meta charset="utf-8">
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description">
		<meta content="" name="author">
		<!-- end: META -->
		<!-- start: MAIN CSS -->
		<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/fonts/style.css">
		<!--<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min2.css">-->
		<!--<link rel="stylesheet" href="styles.css">-->
		<link rel="stylesheet" href="assets/css/main.css">
		<link rel="stylesheet" href="assets/css/main-responsive.css">
		<link rel="stylesheet" href="assets/plugins/iCheck/skins/all.css">
		<link rel="stylesheet" href="assets/plugins/perfect-scrollbar/src/perfect-scrollbar.css">
		<link rel="stylesheet" href="assets/css/theme_light.css" id="skin_color">
		<link rel="stylesheet" href="assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.css">
		<script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
		<script src="assets/plugins/bootstrap-daterangepicker/moment.min.js"></script>
		<script src="http://gregpike.net/demos/bootstrap-file-input/bootstrap.file-input.js"></script>
		<script src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
		<script src="jquery-1.8.3.js"></script>
		
		<!--<script src="jquery.min.js"></script>
		<script src="assets/plugins/jQuery-File-Upload/js/vendor/jquery.ui.widget.js"></script>
		<script src="assets/plugins/jQuery-File-Upload/js/jquery.iframe-transport.js"></script>
		<script src="assets/plugins/jQuery-File-Upload/js/jquery.fileupload.js"></script>-->
		
		<!-- Ben file Upload -->
		<script src="fileupload.js"></script>
		
		<!--[if IE 7]>
		<link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome-ie7.min.css">
		<![endif]-->
		<!-- end: MAIN CSS -->
		<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
		<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
		<link rel="shortcut icon" href="favicon.ico">
		<script type='text/javascript'>//<![CDATA[ 
$(window).load(function(){
$(document).ready(function(){
//$.post("returndata.php", {user_id:$('#user_id').val(),fstep:$('#fstep').val()}).done(function(data){alert(data)});	
    $('#marital_status').on('change', function() {
      if ( this.value == 'married')
      {
        $("#spouse").show();
      }
      else
      {
        $("#spouse").hide();
      }

if ( this.value == 'single')
      {
        $("spouse").hide();
      }
      else
      {
       
      }

if ( this.value == '2')
      {
        $("#movie").show();
      }
      else
      {
        $("#movie").hide();
      }

    });
});
});//]]>  

</script>

<script>
function readURL(input) {
if (input.files && input.files[0]) {
var reader = new FileReader();

reader.onload = function (e) {
$('#img_prev')
.attr('src', e.target.result)
.width(200)
.height(200);
};

reader.readAsDataURL(input.files[0]);
}
}
uploadContent(1,$('#signature_url').attr('name'));
</script>


<script type='text/javascript'>//<![CDATA[ 
$(window).load(function(){
$(document).ready(function(){
    $('#highest_academic_qual').on('change', function() {
      if ( this.value == 'bsc' || this.value == 'msc' || this.value == 'doc' || this.value == 'associate')
      {
        $("#study_level").show();
      }
      else
      {
      	$("study").show();
        $("#study_level").hide();
      }

if ( this.value == 'ssce')
      {
        $("study").show();
      }
      else
      {
       $("study").hide();
      }

    });
});
});//]]>  

</script>
	</head>
	<!-- end: HEAD -->
	<!-- start: BODY -->
	<body class="navigation-small layout-boxed bg_style_2">
		<!-- start: HEADER -->
		<div class="navbar navbar-inverse navbar-fixed-top">
			<!-- start: TOP NAVIGATION CONTAINER -->
			<div class="container">
				<div class="navbar-header">
					<!-- start: RESPONSIVE MENU TOGGLER -->
					<button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
						<span class="clip-list-2"></span>
					</button>
					<!-- end: RESPONSIVE MENU TOGGLER -->
					<!-- start: LOGO -->
					<a class="navbar-brand" href="index.html">
						<img src="logo.png">
					</a>
					<!-- end: LOGO -->
				</div>
				<div class="navbar-tools">
					<!-- start: TOP NAVIGATION MENU -->
					<ul class="nav navbar-right">
						
						<!-- start: USER DROPDOWN -->
						<li class="dropdown current-user" style="margin-top: 15px;">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								
								<span class="username"><?php echo $_SESSION['first_name']." ".$_SESSION['last_name'] ?></span>
								<i class="clip-chevron-down"></i>
							</a>
							<ul class="dropdown-menu">
								<li>
									<a href="pages_user_profile.html">
										<i class="clip-user-2"></i>
										&nbsp;My Profile
									</a>
								</li>
								<li>
									<a href="pages_calendar.html">
										<i class="clip-calendar"></i>
										&nbsp;My Calendar
									</a>
								</li><li>
									<a href="pages_messages.html">
										<i class="clip-bubble-4"></i>
										&nbsp;My Messages (3)
									</a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="utility_lock_screen.html"><i class="clip-locked"></i>
										&nbsp;Lock Screen </a>
								</li>
								<li>
									<a href="login_example1.html">
										<i class="clip-exit"></i>
										&nbsp;Log Out
									</a>
								</li>
							</ul>
						</li>
						<!-- end: USER DROPDOWN -->
					</ul>
					<!-- end: TOP NAVIGATION MENU -->
				</div>
			</div>
			<!-- end: TOP NAVIGATION CONTAINER -->
		</div>
		<!-- end: HEADER -->
		<!-- start: MAIN CONTAINER -->
		<div class="main-container" style="
    margin-top: 0px;
">
			
			<!-- start: PAGE -->
			<div class="main-content">
				
				<div class="container" style="min-height: 760px;">
					<!-- start: PAGE HEADER -->
					<div class="row">
						<div class="col-sm-12">
							<!-- start: STYLE SELECTOR BOX -->
							
							<!-- end: STYLE SELECTOR BOX -->
							<!-- start: PAGE TITLE & BREADCRUMB -->
							
							
							<!-- end: PAGE TITLE & BREADCRUMB -->
						</div>
					</div>
					<!-- end: PAGE HEADER -->
					<!-- start: PAGE CONTENT -->
					<div class="row">
						<div class="col-sm-12">
							<!-- start: FORM WIZARD PANEL -->
							<div class="panel panel-default" style="margin-top:15px;">
								<div class="panel-heading">
									<i class="icon-external-link-sign"></i>
									Form Wizard
									
								</div>
								<div class="panel-body">
									<form action="#" role="form" class="smart-wizard form-horizontal" id="form" name="form">
									<input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['user_id']; ?>" />
									<input type="hidden" id="fstep" name="fstep" value=""/>
										<div id="wizard" class="swMain">
											<ul class="anchor">
												<li>
													<a href="#step-1" class="selected" isdone="1" rel="1">
														<div class="stepNumber">
															1
														</div>
														<span class="stepDesc"> Step 1
															<br>
															<small>Biometeric - Data</small> </span>
													</a>
												</li>
												<li>
													<a href="#step-2" class="disabled" isdone="0" rel="2">
														<div class="stepNumber">
															2
														</div>
														<span class="stepDesc"> Step 2
															<br>
															<small>Personal Data</small> </span>
													</a>
												</li>
												<li>
													<a href="#step-3" class="disabled" isdone="0" rel="2">
														<div class="stepNumber">
															3
														</div>
														<span class="stepDesc"> Step 3
															<br>
															<small>Parental Data</small> </span>
													</a>
												</li>
												<li>
													<a href="#step-4" class="disabled" isdone="0" rel="3">
														<div class="stepNumber">
															4
														</div>
														<span class="stepDesc"> Step 4
															<br>
															<small>Educational Data</small> </span>
													</a>
												</li>
												<li>
													<a href="#step-5" class="disabled" isdone="0" rel="3">
														<div class="stepNumber">
															5
														</div>
														<span class="stepDesc"> Step 5
															<br>
															<small>Bank Info</small> </span>
													</a>
												</li>
												<li>
													<a href="#step-6" class="disabled" isdone="0" rel="4">
														<div class="stepNumber">
															6
														</div>
														<span class="stepDesc"> Step 6
															<br>
															<small>Preview Application</small> </span>
													</a>
												</li>
											</ul>
											

 
										<div class="stepContainer" style="height: 366px;"><div class="stepContainer content" style="height: 366px;"><div class="progress progress-striped active progress-sm content">
												<div aria-valuemax="100" aria-valuemin="0" role="progressbar" class="progress-bar progress-bar-success step-bar" style="width: 25%;">
													<span class="sr-only"> 0% Complete (success)</span>
												</div>






											</div><div id="step-1" class="content" style="display: block;">
												<div class="page-header">
								<h1 style="text-align:center; padding-left:15px;">Bio-metric Face Capture</h1>
							</div>
												
									<div class="form-group">
										<label class="col-sm-3 control-label">1</label>
										<div class="col-sm-9" style="margin-left: 140px;">
											<div class="col-sm-6">
												<script type="text/javascript" src="webcam.js"></script>
												<script language="JavaScript">
													document.write( webcam.get_html(240, 240) );
												</script>
												<form>
													<br />
													<br />											

													<input type=button value="Configure settings" onClick="webcam.configure()" class="btn btn-primary">
													&nbsp;&nbsp;
													<input type=button value="Capture" onClick="take_snapshot()" class="btn btn-primary">
												</form>
												<div style="display:none;"><input type="file" id="passport_image_url" id="passport_image_url" ></div>
											</div>
											<div class="col-sm-6">
											<script  type="text/javascript">
													webcam.set_api_url( 'handleimage.php' );
													webcam.set_quality( 100 ); // JPEG quality (1 - 100)
													webcam.set_shutter_sound( true ); // play shutter click sound
													webcam.set_hook( 'onComplete', 'my_completion_handler' );

													function take_snapshot(){
														// take snapshot and upload to server
														document.getElementById('img').innerHTML = '<h1>Uploading in progress...</h1>';
														
														webcam.snap();
													}

													function my_completion_handler(msg) {
														// extract URL out of PHP output
														if (msg.match(/(http\:\/\/\S+)/)) {
															// show JPEG image in page
															
															document.getElementById('img').innerHTML ='<h3>Upload Successfuly done</h3>'+msg;
															document.getElementById('img').innerHTML ="<img src="+msg+" class=\"img\"> ";
															//document.getElementById('img').innerHTML ="";

															
														
															// reset camera for another shot
															webcam.reset();
														}
														else {alert("Error occured we are trying to fix now: " + msg); }
													}
											</script>
												<div id="img" style=" margin-left:40px; border:solid 1px; width:240px; height:240px;"></div><br/>
												<input type="hidden" value="msg">
												<input type="button" value="Image Preview"  class="btn btn-primary" style="margin-left:40px;">
											</div>
											
										</div>
									</div>

									<div class="form-group">
									<div class="page-header">

												<h1 style="text-align:center; padding-left:15px;">Signature</h1>
											</div>
										<label class="col-sm-3 control-label">2</label>
										<div class="col-sm-9">
											<div class="col-sm-6">
												<img src="sign.png" style="margin-left: 20px;border:solid 1px; width:240px; height:240px;" id="img_prev">
												<br/>
												<br/>
												<input type='file' onChange="readURL(this);" class="btn btn-primary" name="signature_url" id="signature_url"/>
												
											</div>
											<div class="col-sm-4" style="margin-top:100px;">
												<button class="btn btn-blue next-step btn-block">
															Click to proceed <i class="icon-circle-arrow-right"></i>
														</button>
											</div>
											
										</div>
									</div>


												


<!-- begininning of start 2 -->




											</div><div id="step-2" class="content" style="display: none;">
											<div class="page-header">
												<h1 style="text-align:center; padding-left:15px;">Biographical Data</h1>
											</div>
												<div class="form-group">
										<label class="col-sm-3 control-label"></label>
										<div class="col-sm-9">
											<div class="col-sm-6">
												<select class="form-control" id="salute" name="salute">
																	<option value="">Salutation</option>
																	<option value="01">Mr</option>
																	<option value="02">Mrs</option>
																	<option value="03">Miss</option>
																	<option value="04">Dr.</option>
																</select>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" placeholder="First Name" name="first_name" id="first_name">
											</div>
											
										</div>
									</div>


									<div class="form-group">
										<label class="col-sm-3 control-label"></label>
										<div class="col-sm-9">
											<div class="col-sm-6">
												<input type="text" class="form-control" placeholder="Surname" name="surname_name" id="surname_name">
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" placeholder="Other Names" name="other_name" id="other_name">
											</div>
										</div>
									</div>
												
									<div class="form-group">
													<label class="col-sm-3 control-label">
													
													</label>
										<div class="col-sm-9">
											<div class="col-sm-6">
												<input type="text" class="form-control" placeholder="Date of Birth (DD/MM/YYYY)" name="dob" id="dob">
											</div>
											<div class="col-sm-6">
												<div>
													<select class="form-control" id="sex" name="sex">
																	<option value="">Sex</option>
																	<option value="M">Male</option>
																	<option value="F">Female</option>
													</select>
												</div>
													<!--<div>
														<label class="radio-inline">
															<input type="radio" class="grey" value="F" name="sex" id="sex">
															Female
														</label>
														<label class="radio-inline">
															<input type="radio" class="grey" value="M" name="sex"  id="sex">
															Male
														</label>
													</div>	-->	
											</div>
										</div>
									</div>

									<div class="form-group">
													<label class="col-sm-3 control-label">
													
													</label>
										<div class="col-sm-9">
											<div class="col-sm-6">
												<input type="text" class="form-control" placeholder="State Of Origin" name="state_of_origin" id="state_of_origin">
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" placeholder="L.G.A of Origin" name="lga_of_origin" id="lga_of_origin">
											</div>
										</div>
									</div>
												
									<div class="form-group">
													<label class="col-sm-3 control-label">
													
													</label>
										<div class="col-sm-9">
											<div class="col-sm-6">
												<input type="text" class="form-control" placeholder="Place Of Birth" name="place_of_birth" id="place_of_birth">
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" placeholder="Electorial Ward" name="electorial_ward" id="electorial_ward">
											</div>
										</div>
									</div>
									


									<div class="form-group">
													<label class="col-sm-3 control-label">
													
													</label>
										<div class="col-sm-9">
											<div class="col-sm-6">
												<input type="text" class="form-control" placeholder="Village / Town" name="village_town" id="village_town">
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" placeholder="Compound" name="compound" id="compound">
											</div>
										</div>
									</div>
									<div class="form-group">
													<label class="col-sm-3 control-label">
													
													</label>
										<div class="col-sm-9">
											<div class="col-sm-6">
												<select class="form-control" id="marital_status" name="marital_status">
																	<option value="" selected>Marital Status</option>
																	<option value="single">Single</option>
																	<option value="married">Married</option>
																	<option value="other">Other</option>
																</select>
											</div>
											<div class="col-sm-6">
												
											</div>
										</div>
									</div>
<div id="spouse" style="display:none;">
									
								<div class="page-header">
												<h1 style="text-align:center; padding-left:15px;">Spouse Details</h1>
											</div>
									<div class="form-group">
													<label class="col-sm-3 control-label">
													
													</label>
										<div class="col-sm-9">
											<div class="col-sm-6">

												<input type="text" class="form-control" placeholder="Name of Spouse" name="spouse_name" id="spouse_name">
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" placeholder="Home Town / Compound / Ward (Spouse)" name="spouse_home_town" id="spouse_home_town">
											</div>
										</div>
									</div>

									<div class="form-group">
													<label class="col-sm-3 control-label">
													
													</label>
										<div class="col-sm-9">
											<div class="col-sm-6">
												<input type="text" class="form-control" placeholder="L.G.A of Origin (Spouse)" name="spouse_lga" id="spouse_lga">
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" placeholder="Maiden Name" name="spouse_maiden" id="spouse_maiden">
											</div>
										</div>
									</div>

									<div class="form-group">
													<label class="col-sm-3 control-label">
													
													</label>
										<div class="col-sm-9">
											<div class="col-sm-6">
											<select class="form-control" id="spouse_military_status" name="spouse_military_status">
																	<option value="" selected>Military / Para-military Status</option>
																	<option value="01">Serving</option>
																	<option value="02">Retired</option>
																	<option value="03">Other</option>
																</select>
												
											</div>
											<div class="col-sm-6">

											<input type="text" class="form-control" placeholder="Rank" name="spouse_rank" id="spouse_rank">

											</div>
										</div>
									</div>





									<div class="form-group">
													<label class="col-sm-3 control-label">
													
													</label>
										<div class="col-sm-9">
											<div class="col-sm-6">
											<select class="form-control" id="spouse_disability" name="spouse_disability" id="spouse_disability">
																	<option value="" selected>Disability Status</option>
																	<option value="01">I am Able</option>
																	<option value="02">I am Disable</option>
																</select>
												
											</div>
											<div class="col-sm-6">

											<textarea class="autosize form-control" id="spouse_current_address" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 69px;" placeholder="Current Address" name="spouse_current_address"></textarea>

											</div>
										</div>
									</div>

									</div>


									<div class="page-header">
												<h1 style="text-align:center; padding-left:15px;">Parental Details</h1>
											</div>
											<div class="form-group">
													<label class="col-sm-3 control-label">
													
													</label>
										<div class="col-sm-9">
											<div class="col-sm-6">

												<div class="page-header">
												<h1 style="text-align:center; padding-left:15px;">Maternal Details</h1>
											</div>
											</div>
											<div class="col-sm-6">
												<div class="page-header">
												<h1 style="text-align:center; padding-left:15px;">Paternal Details</h1>
											</div>
											</div>
										</div>
									</div>
									<div class="form-group">
													<label class="col-sm-3 control-label">
													
													</label>
										<div class="col-sm-9">
											<div class="col-sm-6">

												<input type="text" class="form-control" placeholder="First Name" name="maternal_firstname" id="maternal_firstname">
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" placeholder="First Name" name="paternal_firstname" id="paternal_firstname">
											</div>
										</div>
									</div>
									<div class="form-group">
													<label class="col-sm-3 control-label">
													
													</label>
										<div class="col-sm-9">
											<div class="col-sm-6">

												<input type="text" class="form-control" placeholder="Surname" name="maternal_surname" id="maternal_surname">
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" placeholder="Surname" name="paternal_surname" id="paternal_surname">
											</div>
										</div>
									</div>
									<div class="form-group">
													<label class="col-sm-3 control-label">
													
													</label>
										<div class="col-sm-9">
											<div class="col-sm-6">

												<input type="text" class="form-control" placeholder="Maiden Name" name="maternal_maiden" id="maternal_maiden">
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" placeholder="Paternal Name" name="paternal_paternal_name" id="paternal_paternal_name">
											</div>
										</div>
									</div>
									<div class="form-group">
													<label class="col-sm-3 control-label">
													
													</label>
										<div class="col-sm-9">
											<div class="col-sm-6">

												<input type="text" class="form-control" placeholder="Village / Town" name="maternal_village_town" id="maternal_village_town">
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" placeholder="Village / Town" name="paternal_village_town" id="paternal_village_town">
											</div>
										</div>
									</div>



									<div class="form-group">
													<label class="col-sm-3 control-label">
													
													</label>
										<div class="col-sm-9">
											<div class="col-sm-6">

												<input type="text" class="form-control" placeholder="Clan" name="maternal_clan" id="maternal_clan">
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" placeholder="Clan" name="paternal_clan" id="paternal_clan">
											</div>
										</div>
									</div>

									<div class="form-group">
													<label class="col-sm-3 control-label">
													
													</label>
										<div class="col-sm-9">
											<div class="col-sm-6">

												<input type="text" class="form-control" placeholder="L.G.A" name="maternal_lga" id="maternal_lga">
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" placeholder="L.G.A" name="paternal_lga" id="paternal_lga">
											</div>
										</div>
									</div>



												<div class="form-group">
													<div class="col-sm-2 col-sm-offset-3">
														<button class="btn btn-light-grey back-step btn-block">
															<i class="icon-circle-arrow-left"></i> Back
														</button>
													</div>
													<div class="col-sm-2 col-sm-offset-3">
														<button class="btn btn-blue next-step btn-block">
															Next <i class="icon-circle-arrow-right"></i>
														</button>
													</div>
												</div>
<!-- end of step 2 -->	



<!-- begininning of start 3 -->




											</div>



											<div id="step-3" class="content" style="display: none;">									


									<div class="page-header">
												<h1 style="text-align:center; padding-left:15px;">Parent's Parental Details</h1>
											</div>
											<div class="form-group">
													<label class="col-sm-3 control-label">
													
													</label>
										<div class="col-sm-9">
											<div class="col-sm-6">

												<div class="page-header">
												<h1 style="text-align:center; padding-left:15px;">Mother's Father Details</h1>
											</div>
											</div>
											<div class="col-sm-6">
												<div class="page-header">
												<h1 style="text-align:center; padding-left:15px;">Father's Father Details</h1>
											</div>
											</div>
										</div>
									</div>
									<div class="form-group">
													<label class="col-sm-3 control-label">
													
													</label>
										<div class="col-sm-9">
											<div class="col-sm-6">

												<input type="text" class="form-control" placeholder="First Name" name="mothers_father_firstname" id="mothers_father_firstname">
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" placeholder="First Name" name="fathers_father_firstname" id="fathers_father_firstname">
											</div>
										</div>
									</div>
									<div class="form-group">
													<label class="col-sm-3 control-label">
													
													</label>
										<div class="col-sm-9">
											<div class="col-sm-6">

												<input type="text" class="form-control" placeholder="Surname" name="mothers_father_surname" id="mothers_father_surname">
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" placeholder="Surname" name="fathers_father_surname" id="fathers_father_surname">
											</div>
										</div>
									</div>
									<div class="form-group">
													<label class="col-sm-3 control-label">
													
													</label>
										<div class="col-sm-9">
											<div class="col-sm-6">

												<input type="text" class="form-control" placeholder="State of Origin" name="mothers_father_stateoforigin" id="mothers_father_stateoforigin">
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" placeholder="State of Origin" name="fathers_father_stateoforigin" id="fathers_father_stateoforigin">
											</div>
										</div>
									</div>
									<div class="form-group">
													<label class="col-sm-3 control-label">
													
													</label>
										<div class="col-sm-9">
											<div class="col-sm-6">

												<input type="text" class="form-control" placeholder="Village / Town" name="mothers_father_village" id="mothers_father_village">
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" placeholder="Village / Town" name="fathers_father_village" id="fathers_father_village">
											</div>
										</div>
									</div>



									<div class="form-group">
													<label class="col-sm-3 control-label">
													
													</label>
										<div class="col-sm-9">
											<div class="col-sm-6">

												<input type="text" class="form-control" placeholder="Clan" name="mothers_father_clan" id="mothers_father_clan">
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" placeholder="Clan" name="fathers_father_clan" id="fathers_father_clan">
											</div>
										</div>
									</div>

									<div class="form-group">
													<label class="col-sm-3 control-label">
													
													</label>
										<div class="col-sm-9">
											<div class="col-sm-6">

												<input type="text" class="form-control" placeholder="L.G.A" name="mothers_father_lga" id="mothers_father_lga">
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" placeholder="L.G.A" name="fathers_father_lga" id="fathers_father_lga">
											</div>
										</div>
									</div>



									<div class="form-group">
													<label class="col-sm-3 control-label">
													
													</label>
										<div class="col-sm-9">
											<div class="col-sm-6">

												<div class="page-header">
												<h1 style="text-align:center; padding-left:15px;">Mother's Mother Details</h1>
											</div>
											</div>
											<div class="col-sm-6">
												<div class="page-header">
												<h1 style="text-align:center; padding-left:15px;">Father's Mother Details</h1>
											</div>
											</div>
										</div>
									</div>
									<div class="form-group">
													<label class="col-sm-3 control-label">
													
													</label>
										<div class="col-sm-9">
											<div class="col-sm-6">

												<input type="text" class="form-control" placeholder="First Name" name="mothers_mother_firstname" id="mothers_mother_firstname">
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" placeholder="First Name" name="fathers_mother_firstname" id="fathers_mother_firstname">
											</div>
										</div>
									</div>
									<div class="form-group">
													<label class="col-sm-3 control-label">
													
													</label>
										<div class="col-sm-9">
											<div class="col-sm-6">

												<input type="text" class="form-control" placeholder="Surname" name="mothers_mother_surname" id="mothers_mother_surname">
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" placeholder="Surname" name="fathers_mother_surname" id="fathers_mother_surname">
											</div>
										</div>
									</div>
									<div class="form-group">
													<label class="col-sm-3 control-label">
													
													</label>
										<div class="col-sm-9">
											<div class="col-sm-6">

												<input type="text" class="form-control" placeholder="State of Origin" name="mothers_mother_stateoforigin" id="mothers_mother_stateoforigin">
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" placeholder="State of Origin" name="fathers_mother_stateoforigin" id="fathers_mother_stateoforigin">
											</div>
										</div>
									</div>
									<div class="form-group">
													<label class="col-sm-3 control-label">
													
													</label>
										<div class="col-sm-9">
											<div class="col-sm-6">

												<input type="text" class="form-control" placeholder="Village / Town" name="mothers_mother_village" id="mothers_mother_village">
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" placeholder="Village / Town" name="fathers_mother_village" id="fathers_mother_village">
											</div>
										</div>
									</div>



									<div class="form-group">
													<label class="col-sm-3 control-label">
													
													</label>
										<div class="col-sm-9">
											<div class="col-sm-6">

												<input type="text" class="form-control" placeholder="Clan" name="mothers_mother_clan" id="mothers_mother_clan">
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" placeholder="Clan" name="fathers_mother_clan" id="fathers_mother_clan">
											</div>
										</div>
									</div>

									<div class="form-group">
													<label class="col-sm-3 control-label">
													
													</label>
										<div class="col-sm-9">
											<div class="col-sm-6">

												<input type="text" class="form-control" placeholder="L.G.A" name="mothers_mother_lga" id="mothers_mother_lga">
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" placeholder="L.G.A" name="fathers_mother_lga" id="fathers_mother_lga">
											</div>
										</div>
									</div>


																								







												<div class="form-group">
													<div class="col-sm-2 col-sm-offset-3">
														<button class="btn btn-light-grey back-step btn-block">
															<i class="icon-circle-arrow-left"></i> Back
														</button>
													</div>
													<div class="col-sm-2 col-sm-offset-3">
														<button class="btn btn-blue next-step btn-block">
															Next <i class="icon-circle-arrow-right"></i>
														</button>
													</div>
												</div>
<!-- end of step 3 -->	




<!-- start of step 4 -->											

											</div><div id="step-4" class="content" style="display: none;">
											<div class="page-header">
												<h1 style="text-align:center; padding-left:15px;">Educational Data</h1>
											</div>
												<div class="form-group">
										<label class="col-sm-3 control-label"></label>
										<div class="col-sm-9">
											<div class="col-sm-6">
												<select class="form-control" id="admission_level" name="admission_level">
																	<option value="" selected>Admission Level</option>
																	<option value="01">Already In School</option>
																	<option value="02">Fresh Admission</option>
																	
																</select>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" placeholder="Name of Institution" name="name_of_institution" id="name_of_institution">
											</div>
											
										</div>
									</div>



									<div class="form-group">
										<label class="col-sm-3 control-label"></label>
										<div class="col-sm-9">
											<div class="col-sm-6">
												<input type="text" class="form-control" placeholder="Matric Number" name="matric_number" id="matric_number">
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" placeholder="Course of Study" name="course_of_study" id="course_of_study">
											</div>
										</div>
									</div>
												
									<div class="form-group">
													<label class="col-sm-3 control-label">
													
													</label>
										<div class="col-sm-9">
											<div class="col-sm-6">
												<input type="text" class="form-control" placeholder="Level of study e.g (200 Level)" name="level_of_study" id="level_of_study">
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" placeholder="Department / Faculty" name="department_faculty" id="department_faculty">
											</div>
										</div>
									</div>
												
									
									


									<div class="form-group">
													<label class="col-sm-3 control-label">
													
													</label>
										<div class="col-sm-9">
											<div class="col-sm-6">
												<input type="text" class="form-control" placeholder="Course Duration" name="course_duration" id="course_duration">
											</div>
											<div class="col-sm-6">
											<input type="text" class="form-control" placeholder="Course Start Date" name="course_startdate" id="course_startdate">
												
											</div>
										</div>
									</div>

									<div class="form-group">
													<label class="col-sm-3 control-label">
													
													</label>
										<div class="col-sm-9">
											<div class="col-sm-6">
												<input type="text" class="form-control" placeholder="Expected Year of Graduation" name="expected_graduation" id="expected_graduation">
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" placeholder="Expected Qualification e.g (Bsc. Computer Science)" name="expected_qualification" id="expected_qualification">
											</div>
										</div>
									</div>

									<div class="form-group">
													<label class="col-sm-3 control-label">
													
													</label>
										<div class="col-sm-9">
											<div class="col-sm-6">
												<input type="text" class="form-control" placeholder="Institution Contact Address" name="institution_contact_add" id="institution_contact_add">
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" placeholder="Institution Contact Person" name="institution_contact_person" id="institution_contact_person">
											</div>
										</div>
									</div>

									
									<div class="form-group">
													<label class="col-sm-3 control-label">
													
													</label>
										<div class="col-sm-9">
											<div class="col-sm-6">
											Upload Admission Letter<br/>
												<input type="file"  class="btn btn-blue btn-block" name="admission_letter_url" id="admission_letter_url">
											</div>
											<div class="col-sm-6">
												Course Registration Form<br/>
												<input type="file" class="btn btn-blue btn-block" name="course_registration_url" id="course_registration_url">
											</div>
										</div>
									</div>
									

									<div class="form-group">
													<label class="col-sm-3 control-label">
													
													</label>
										<div class="col-sm-9">
											<div class="col-sm-6">
												Student ID Card<br/>
												<input type="file" class="btn btn-blue btn-block" name="student_id_card_url" id="student_id_card_url">
											</div>
											<div class="col-sm-6">
												Local Government Identification<br/>
												<input type="file" title="Search for a file to add" class="btn btn-blue btn-block" name="local_govt_id_url" id="local_govt_id_url">
											</div>
										</div>
									</div>

									<div class="form-group">
													<label class="col-sm-3 control-label">
													
													</label>
										<div class="col-sm-9">
											<div class="col-sm-6">
												International Passport / National ID<br/>
												<input type="file" class="btn btn-blue btn-block" name="int_passport_nationalID_url" id="int_passport_nationalID_url">
											</div>
											<div class="col-sm-6">
												Birth Certificate<br/>
												<input type="file" title="Search for a file to add" class="btn btn-blue btn-block" name="birth_certificate_url" id="birth_certificate_url">
											</div>
										</div>
									</div>

									<div class="form-group">
													<label class="col-sm-3 control-label">
													
													</label>
										<div class="col-sm-9">
											<div class="col-sm-6">
												Semester Reports<br/>
												<input type="file" class="btn btn-blue btn-block" name="semester_report_url" id="semester_report_url">
											</div>
											<div class="col-sm-6">
											Highest Academic Qualification for this Admission<br/>
												<select class="form-control" id="highest_academic_qual" name="highest_academic_qual">
																	<option value="" selected> Select Qualification</option>
																	<option value="ssce">SSCE</option>
																	<option value="neco">NECO</option>
																	<option value="nabtech">NABTECH</option>
																	<option value="nce">NCE</option>
																	<option value="diploma">DIPLOMA</option>
																	<option value="higher_diploma">HIGHER DIPLOMA</option>
																	<option value="bsc">BACHELORS</option>
																	<option value="msc">MASTERS</option>
																	<option value="doc">DOCTORATE</option>
																	<option value="associate">ASSOCIATE</option>
																</select>
											</div>
										</div>
									</div>
<div id="study_level" style="display:none;">
									
								<div class="page-header">
												<h1 style="text-align:center; padding-left:15px;">Required Details</h1>
											</div>
									<div class="form-group">
													<label class="col-sm-3 control-label">
													
													</label>
										<div class="col-sm-9">
											<div class="col-sm-6">

												<input type="text" class="form-control" placeholder="Name of Institution" name="highest_academic_institution" id="highest_academic_institution">
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" placeholder="Course Of study" name="highest_academic_course" id="highest_academic_course">
											</div>
										</div>
									</div>

									<div class="form-group">
													<label class="col-sm-3 control-label">
													
													</label>
										<div class="col-sm-9">
											<div class="col-sm-6">
												<input type="text" class="form-control" placeholder="Course Duration" name="highest_academic_duration" id="highest_academic_duration">
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" placeholder="Certicate Obtained (e.g Bsc Political Science)" name="highest_academic_certificatename" id="highest_academic_certificatename">
											</div>
										</div>
									</div>

									<div class="form-group">
													<label class="col-sm-3 control-label">
													
													</label>
										<div class="col-sm-9">
											<div class="col-sm-6">
											<select class="form-control" id="grade_level" name="grade_level">
																	<option value="" selected>Grade</option>
																	<option value="01">First Class</option>
																	<option value="02">Second Class Upper</option>
																	<option value="03">Second Class Lower</option>
																	<option value="03">Third Class</option>
																</select>
												
											</div>
											<div class="col-sm-6">

											Certificate Obtained<br/>
												<input type="file" title="Search for a file to add" class="btn btn-blue btn-block" name="highest_academic_certificate_url" id="highest_academic_certificate_url">

											</div>
										</div>
									</div>

									</div>



									<div id="study" style="display:none;">
									
								<div class="page-header">
												<h1 style="text-align:center; padding-left:15px;">Required Details</h1>
											</div>
									<div class="form-group">
													<label class="col-sm-3 control-label">
													
													</label>
										<div class="col-sm-9">
											<div class="col-sm-6">

												<input type="text" class="form-control" placeholder="Name of Institution" name="highest_academic_institution1" id="highest_academic_institution1">
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" placeholder="Course Duration" name="highest_academic_duration1" id="highest_academic_duration1">
											</div>
										</div>
									</div>

									<div class="form-group">
													<label class="col-sm-3 control-label">
													
													</label>
										<div class="col-sm-9">
											<div class="col-sm-6">
												<input type="text" class="form-control" placeholder="Certicate Obtained " name="highest_academic_certificatename1" id="highest_academic_certificatename1">
											</div>
											<div class="col-sm-6">
												Certificate Obtained<br/>
												<input type="file" title="Search for a file to add" class="btn btn-blue btn-block">
											</div>
										</div>
									</div>

									

									</div>


												<div class="form-group">
													<div class="col-sm-2 col-sm-offset-3">*
														<button class="btn btn-light-grey back-step btn-block">
															<i class="icon-circle-arrow-left"></i> Back
														</button>
													</div>
													<div class="col-sm-2 col-sm-offset-3">
														<button class="btn btn-blue next-step btn-block">
															Next <i class="icon-circle-arrow-right"></i>
														</button>
													</div>
												</div>
											</div>




<div id="step-5" class="content" >
											<div class="page-header">
												<h1 style="text-align:center; padding-left:15px;">Personal Bank Details</h1>
											</div>
												
									<div class="form-group">
										<label class="col-sm-3 control-label"></label>
										<div class="col-sm-9">
											<div class="col-sm-6">
												<input type="text" class="form-control" placeholder="Bank Name" name="personal_bank_name" id="personal_bank_name">
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" placeholder="Bank Address" name="personal_bank_address" id="personal_bank_address">
											</div>
										</div>
									</div>
												
									<div class="form-group">
													<label class="col-sm-3 control-label">
													
													</label>
										<div class="col-sm-9">
											<div class="col-sm-6">
												<input type="text" class="form-control" placeholder="Name of Account" name="personal_account_name" id="personal_account_name">
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" placeholder="Account Number" name="personal_account_number" id="personal_account_number">
											</div>
										</div>
									</div>

									<div class="page-header">
												<h1 style="text-align:center; padding-left:15px;">NUBS Bank Data</h1>
											</div>
									<div class="form-group">
										<label class="col-sm-3 control-label"></label>
										<div class="col-sm-9">
											<div class="col-sm-6">
												<input type="text" class="form-control" placeholder="Bank Name" name="nubs_bank_name" id="nubs_bank_name">
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" placeholder="Bank Address" name="nubs_bank_address" id="nubs_bank_address">
											</div>
										</div>
									</div>
												
									<div class="form-group">
													<label class="col-sm-3 control-label">
													
													</label>
										<div class="col-sm-9">
											<div class="col-sm-6">
												<input type="text" class="form-control" placeholder="Name of Account" name="nubs_account_name" id="nubs_account_name">
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" placeholder="Account Number" name="nubs_account_number" id="nubs_account_number">
											</div>
										</div>
									</div>

									<div class="form-group">
													<label class="col-sm-3 control-label">
													
													</label>
										<div class="col-sm-9">
											<div class="col-sm-6">
												<input type="text" class="form-control" placeholder="Sort Code" name="nubs_sort_code" id="nubs_sort_code">
											</div>
											<div class="col-sm-6">
												<select class="form-control" name="nubs_account_type" id="nubs_account_type">
													<option value="" selected>Account Type</option>
													<option value="01">Savings</option>
													<option value="02">Current</option>
																	
												</select>
											</div>
										</div>
									</div>


									<div class="page-header">
												<h1 style="text-align:center; padding-left:15px;">SUG Bank Details</h1>
											</div>
									<div class="form-group">
										<label class="col-sm-3 control-label"></label>
										<div class="col-sm-9">
											<div class="col-sm-6">
												<input type="text" class="form-control" placeholder="Bank Name" name="sug_bank_name" id="sug_bank_name">
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" placeholder="Bank Address" name="sug_bank_address" id="sug_bank_address">
											</div>
										</div>
									</div>
												
									<div class="form-group">
													<label class="col-sm-3 control-label">
													
													</label>
										<div class="col-sm-9">
											<div class="col-sm-6">
												<input type="text" class="form-control" placeholder="Name of Account" name="sug_account_name" id="sug_account_name">
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" placeholder="Account Number" name="sug_account_number" id="sug_account_number">
											</div>
										</div>
									</div>

									<div class="form-group">
													<label class="col-sm-3 control-label">
													
													</label>
										<div class="col-sm-9">
											<div class="col-sm-6">
												<input type="text" class="form-control" placeholder="Sort Code" name="sug_sort_code" id="sug_sort_code">
											</div>
											<div class="col-sm-6">
												<select class="form-control" name="sug_account_type" id="sug_account_type">
													<option value="" selected>Account Type</option>
													<option value="01">Savings</option>
													<option value="02">Current</option>
																	
												</select>
											</div>
										</div>
									</div>



									

												<div class="form-group">
													<div class="col-sm-2 col-sm-offset-3">*
														<button class="btn btn-light-grey back-step btn-block">
															<i class="icon-circle-arrow-left"></i> Back
														</button>
													</div>
													<div class="col-sm-2 col-sm-offset-3">
														<button class="btn btn-blue next-step btn-block">
															Next <i class="icon-circle-arrow-right"></i>
														</button>
													</div>
												</div>
											</div>



											<div id="step-6" class="content" style="display: none;">
												<h2 class="StepTitle">Step 4 Title</h2>
												<h3>Account</h3>
												<div class="form-group">
													<label class="col-sm-3 control-label">
														Username:
													</label>
													<div class="col-sm-7">
														<p class="form-control-static display-value" data-display="username"></p>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-3 control-label">
														Email:
													</label>
													<div class="col-sm-7">
														<p class="form-control-static display-value" data-display="email"></p>
													</div>
												</div>
												<h3>Profile</h3>
												<div class="form-group">
													<label class="col-sm-3 control-label">
														Fullname:
													</label>
													<div class="col-sm-7">
														<p class="form-control-static display-value" data-display="first_name"></p>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-3 control-label">
														Gender:
													</label>
													<div class="col-sm-7">
														<p class="form-control-static display-value" data-display="gender"></p>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-3 control-label">
														Phone:
													</label>
													<div class="col-sm-7">
														<p class="form-control-static display-value" data-display="phone"></p>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-3 control-label">
														Address:
													</label>
													<div class="col-sm-7">
														<p class="form-control-static display-value" data-display="address"></p>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-3 control-label">
														City:
													</label>
													<div class="col-sm-7">
														<p class="form-control-static display-value" data-display="city"></p>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-3 control-label">
														Country:
													</label>
													<div class="col-sm-7">
														<p class="form-control-static display-value" data-display="country"></p>
													</div>
												</div>
												<h3>Billing</h3>
												<div class="form-group">
													<label class="col-sm-3 control-label">
														Card Name:
													</label>
													<div class="col-sm-7">
														<p class="form-control-static display-value" data-display="card_name"></p>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-3 control-label">
														Card Number:
													</label>
													<div class="col-sm-7">
														<p class="form-control-static display-value" data-display="card_number"></p>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-3 control-label">
														CVC:
													</label>
													<div class="col-sm-7">
														<p class="form-control-static display-value" data-display="card_cvc"></p>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-3 control-label">
														Expiration:
													</label>
													<div class="col-sm-7">
														<p class="form-control-static display-value" data-display="card_expiry"></p>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-3 control-label">
														Payment Options:
													</label>
													<div class="col-sm-7">
														<p class="form-control-static display-value" data-display="payment"></p>
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-2 col-sm-offset-8">
														<button class="btn btn-success finish-step btn-block">
															Finish <i class="icon-circle-arrow-right"></i>
														</button>
													</div>
												</div>
											</div></div><div class="actionBar content"><div class="msgBox"><div class="content"></div><a href="#" class="close">X</a></div><div class="loader">Loading</div><a href="#" class="buttonFinish buttonDisabled">Finish</a><a href="#" class="buttonNext">Next</a><a href="#" class="buttonPrevious buttonDisabled">Previous</a></div></div><div class="actionBar"><div class="msgBox"><div class="content"></div><a href="#" class="close">X</a></div><div class="loader">Loading</div><a href="#" class="buttonFinish buttonDisabled">Finish</a><a href="#" class="buttonNext">Next</a><a href="#" class="buttonPrevious buttonDisabled">Previous</a></div></div>
									</form>
								</div>
							</div>
							<!-- end: FORM WIZARD PANEL -->
						</div>
					</div>
					<!-- end: PAGE CONTENT-->
				</div>
			</div>
			<!-- end: PAGE -->
		</div>
		<!-- end: MAIN CONTAINER -->
		<!-- start: FOOTER -->
		<div class="footer clearfix">
			<div class="footer-inner">
				2014 ©
			</div>
			<div class="footer-items">
				<span class="go-top"><i class="clip-chevron-up"></i></span>
			</div>
		</div>
		<!-- end: FOOTER -->
		<!-- start: MAIN JAVASCRIPTS -->+-
		<!--[if lt IE 9]>
		<script src="assets/plugins/respond.min.js"></script>
		<script src="assets/plugins/excanvas.min.js"></script>
		<![endif]-->
		<script src="jquery.min.js"></script>
		<script src="assets/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>
		<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
		<script src="assets/plugins/blockUI/jquery.blockUI.js"></script>
		<script src="assets/plugins/iCheck/jquery.icheck.min.js"></script>
		<script src="assets/plugins/perfect-scrollbar/src/jquery.mousewheel.js"></script>
		<script src="assets/plugins/perfect-scrollbar/src/perfect-scrollbar.js"></script>
		<script src="assets/js/main.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
		<script src="assets/plugins/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
		<script src="assets/js/form-wizard.js"></script>

		<script src="assets/plugins/summernote/build/summernote.min.js"></script>
		<script src="assets/plugins/ckeditor/ckeditor.js"></script>
		<script src="assets/plugins/ckeditor/adapters/jquery.js"></script>
		<script src="assets/js/form-validation.js"></script>

		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormWizard.init();
			});
		</script>
	
	<!-- end: BODY -->
</body></html>