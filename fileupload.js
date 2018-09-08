$(document).ready(function(){
		$("#signature_url").change(function(){
			uploadContent(1,$('#signature_url').attr('name'));
		});
		$("#admission_letter_url").change(function(){
			uploadContent(2,$('#admission_letter_url').attr('name'));
		});
		$("#course_registration_url").change(function(){
			uploadContent(3,$('#course_registration_url').attr('name'));
		});
		$("#student_id_card_url").change(function(){
			uploadContent(4,$('#student_id_card_url').attr('name'));
		});
		$("#local_govt_id_url").change(function(){
			uploadContent(5,$('#local_govt_id_url').attr('name'));
		});
		$("#int_passport_nationalID_url").change(function(){
			uploadContent(6,$('#int_passport_nationalID_url').attr('name'));
		});
		$("#birth_certificate_url").change(function(){
			uploadContent(7,$('#birth_certificate_url').attr('name'));
		});
		$("#semester_report_url").change(function(){
			uploadContent(8,$('#semester_report_url').attr('name'));
		});
		$("#highest_academic_certificate_url").change(function(){
			uploadContent(9,$('#highest_academic_certificate_url').attr('name'));
		});
		$("#fingerprint_url").change(function(){
			uploadContent(10,$('#fingerprint_url').attr('name'));
		});
		var uploadContent = function(fe,atName){
		//alert(fe+" "+atName);
		//$('#disablingDiv').show();
		$('#div_'+atName).show();$('#img_'+atName).attr('src','assets/images/loading.gif');$('#span_'+atName).html('Uploading...');
			var fd = new FormData(document.getElementById("form"));
			$.ajax({
				url:"fileupload.php?fe="+fe+"&atname="+atName,
				type:"POST",
				data: fd,
				enctype:'multipart/form-data',
				processData:false,
				contentType:false,
				success:function(result){//$("#div1").html(result);}
				$('#disablingDiv').hide();
					//alert(result);
					var obj = JSON.parse(result);
					//alert("status : "+obj.status+" "+atName+" "+typeof(obj.status));
					//$("#content").html(result);
					switch(obj.status){
						case '1':{$('#val_'+atName).val(obj.status);$('#img_'+atName).attr('src','check.png');$('#span_'+atName).html(obj.message);/*alert("Output: "+obj.message);*/break;}
						case '0':{$('#val_'+atName).val(obj.status);$('#img_'+atName).attr('src','close.png');$('#span_'+atName).html(obj.message);/*alert("Output: "+obj.message);*/break;}
						case '-1':{$('#val_'+atName).val(obj.status);$('#img_'+atName).attr('src','close.png');$('#span_'+atName).html(obj.message);/*alert("Output: "+obj.message);*/break;}
						default:{$('#val_'+atName).value(0);alert("Output: Please upload completed Fingerprint form");}
					}
				}
			});
			return false;
		}
	});