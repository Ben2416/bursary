<?php 
session_start(); 
if(!isset($_SESSION['user_id'])){
	header("Location:login.php");
}
//print_r($GLOBALS);
?>
<!DOCTYPE html>
<!-- Template Name: Clip-One - Responsive Admin Template build with Twitter Bootstrap 3 Version: 1.0 Author: ClipTheme -->
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
	<!--<![endif]-->
	<!-- start: HEAD -->
	<head>
		<title>Fingerprint</title>
		<!-- start: META -->
		<meta charset="utf-8" />
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<!-- end: META -->
		<!-- start: MAIN CSS -->
		<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/fonts/style.css">
		<link rel="stylesheet" href="assets/css/main.css">
		<link rel="stylesheet" href="assets/css/main-responsive.css">
		<link rel="stylesheet" href="assets/plugins/iCheck/skins/all.css">
		<link rel="stylesheet" href="assets/plugins/perfect-scrollbar/src/perfect-scrollbar.css">
		<link rel="stylesheet" href="assets/css/theme_light.css" id="skin_color">

		<link rel="stylesheet" href="assets/plugins/select2/select2.css">
		<link rel="stylesheet" href="assets/plugins/datepicker/css/datepicker.css">
		<link rel="stylesheet" href="assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
		<link rel="stylesheet" href="assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css">
		<link rel="stylesheet" href="assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css">
		<link rel="stylesheet" href="assets/plugins/jQuery-Tags-Input/jquery.tagsinput.css">
		<link rel="stylesheet" href="assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.css">
		<!--[if IE 7]>
		<link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome-ie7.min.css">
		<![endif]-->
		<!-- end: MAIN CSS -->
		<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
		<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
		<script src="jquery-1.8.3.js"></script>
		<script src="fileupload.js"></script>
		<script type='text/javascript'>//<![CDATA[ 
		$(window).load(function(){
			$(document).ready(function(){
				var checkUpload = function(uid,tbl){
					$('input[type="file"]').each(function() {
						var vr = $(this).attr('name');
						$.post(
						"fileupload.php", 
						{user_id:uid,t_col:vr,t_nm:tbl}
						).done(function(data){
						//alert(data+vr);
							var obj = JSON.parse(data);
							if(obj.status == '1'){
								$('#div_'+vr).show();
								$('#img_'+vr).attr('src','check.png');
								$('#span_'+vr).html(obj.message);
								$('#ck_'+vr).val(obj.status);
							}else if(obj.status == '0'){
								$('#div_'+vr).show();
								$('#img_'+vr).attr('src','close.png');
								$('#span_'+vr).html(obj.message);
								$('#ck_'+vr).val(obj.status);
							}
						});	
					});
				}
				checkUpload('<?php echo $_SESSION['user_id'] ?>','biometric');
			});
		});//]]>  
		</script>
		<style>
		#disablingDiv
		{
			display: none; 
			z-index:1001;
			position: absolute; 
			top: 0%; 
			left: 0%; 
			width: 100%; 
			height: 100%;
			background-color: white; 
			opacity:.75; 
			filter: alpha(opacity=75); 
			border:solid 5px #000;
		}
		</style>
	</head>
	<!-- end: HEAD -->
	<!-- start: BODY -->
	<body class="login example2">
	<div id="disablingDiv"><img style="position:absolute;display:inline-block;top:0;bottom:0;left:0;right:0;margin:auto;cursor:pointer;" src="725.gif" ></div>
		<div style="width: 630px;margin: auto;">
			<div class="logo">	</div>
			<!-- start: LOGIN BOX -->
			<div class="box-login">
				<h3 style="text-align: center;">BIOMETRIC FINGERPRINT FORM</h3>
				<p><strong>Instruction</strong>  Please download the above Biometric Fingerprint Form and provide the required fingerprint blocks before proceeding with the Online Registration.</p>
				<div class="center-block" style="width:600px;">
				<button type="submit" class="btn btn-bricky pull-left">
								Download Biometric Fingerprint Form 
				</button>
				</div>
				
<br/>
				<br/>
				<img src="fingerprint.png">
				<br/>
				<br/>
				
				<div>
					<form id="form" name="form" action="#"  class="smart-wizard form-horizontal" enctype="multipart/form-data">
					<input type="hidden" name="val_fingerprint_url" id="val_fingerprint_url" value="0">
					<div class="errorHandler alert alert-danger no-display">
						<i class="icon-remove-sign"></i> You have some form errors. Please check below.
					</div>
					<fieldset>
					<!--<div class="col-sm-9">-->
						<div class="col-sm-6">
							<input type="file"  class="btn btn-blue btn-block" id="fingerprint_url" name="fingerprint_url">
							<div id="div_fingerprint_url" style="display:block;">
								<img id="img_fingerprint_url" src="assets/images/loading.gif">
								<span id="span_fingerprint_url"></span>
								<input type="hidden" id="ck_fingerprint_url" value="">
							</div>
						</div>
						<div class="col-sm-6">
							<button class="btn btn-blue btn-block" style="width: 120px;float: right;" onclick="if($('#ck_fingerprint_url').val()=='1'){location.href='steps.php'}">
										Next <i class="icon-circle-arrow-right"></i>
							</button>
						</div>
					<!--</div>-->
					</fieldset>
					</form>
				</div>
				
				<!--
				<div class="form-group">
											<div class="col-sm-6">
												<div class="fileupload fileupload-new" data-provides="fileupload">
													<div class="input-group">
														<div class="form-control uneditable-input">
															<i class="icon-file fileupload-exists"></i>
															<span class="fileupload-preview"></span>
														</div>
														<div class="input-group-btn">
															<div class="btn btn-light-grey btn-file">
																<span class="fileupload-new"><i class="icon-folder-open-alt"></i> Upload Completed Form</span>
																<span class="fileupload-exists"><i class="icon-folder-open-alt"></i> Change</span>
																<input type="file" class="file-input" id="fingerprint_url" name="fingerprint_url">
															</div>
															<a href="#" class="btn btn-light-grey fileupload-exists" data-dismiss="fileupload">
																<i class="icon-remove"></i> Remove
															</a>
														</div>
													</div>
												</div>
											</div>
											<div class="col-sm-6">
												<button class="btn btn-blue next-step btn-block" style="width: 120px;float: right;">
															Next <i class="icon-circle-arrow-right"></i>
												</button>
											</div>
										</div>-->
			</div>
			<!-- end: LOGIN BOX -->
			
			
			<!-- start: COPYRIGHT -->
			<div class="copyright">
				2014 &copy; o3interactive.
			</div>
			<!-- end: COPYRIGHT -->
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
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
		<script src="fingerprint.js"></script>




		<script src="assets/plugins/jquery-inputlimiter/jquery.inputlimiter.1.3.1.min.js"></script>
		<script src="assets/plugins/autosize/jquery.autosize.min.js"></script>
		<script src="assets/plugins/select2/select2.min.js"></script>
		<script src="assets/plugins/jquery.maskedinput/src/jquery.maskedinput.js"></script>
		<script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
		<script src="assets/plugins/bootstrap-daterangepicker/moment.min.js"></script>
		<script src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
		<script src="assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
		<script src="assets/plugins/bootstrap-colorpicker/js/commits.js"></script>
		<script src="assets/plugins/jQuery-Tags-Input/jquery.tagsinput.js"></script>
		<script src="assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>


		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script>
			jQuery(document).ready(function() {
				Main.init();
				Fingerprint.init();
			});
		</script>
	</body>
	<!-- end: BODY -->
</html>