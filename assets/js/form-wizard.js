var FormWizard = function () {
    var wizardContent = $('#wizard');
    var wizardForm = $('#form');
    var initWizard = function () {
        // function to initiate Wizard Form
        wizardContent.smartWizard({
            selected: 0,
            keyNavigation: false,
            onLeaveStep: leaveAStepCallback,
            onShowStep: onShowStep,
        });
        var numberOfSteps = 0;
        animateBar();
        initValidator();
    };
    var animateBar = function (val) { 
        if ((typeof val == 'undefined') || val == "") {	
            val = 1;
        };
        numberOfSteps = $('.swMain > ul > li').length;
        var valueNow = Math.floor(100 / numberOfSteps * val);
        $('.step-bar').css('width', valueNow + '%');
    };
    var initValidator = function () {
        $.validator.addMethod("cardExpiry", function () {
            //if all values are selected
            if ($("#card_expiry_mm").val() != "" && $("#card_expiry_yyyy").val() != "") {
                return true;
            } else {
                return false;
            }
        }, 'Please select a month and year');
		$.validator.addMethod("dateFormat",
			function(value, element){
				//return value.match(/^dd?-dd?-dd$/);
				return value.match(/^(\d{1,2})(\/)(\d{1,2})(\/)(\d{4})$/);
			},
			'Please enter a date in the format dd/mm/yyyy.');
		$.validator.addMethod("checkFileInput",
			function(value, element){
				var el = element.name;
				var ele = $('#img_'+el);
				if(ele.attr('src') == 'check.png')
					return true;
				else 
					return false;
			}, 'Please upload a valid file.'
		);
        $.validator.setDefaults({
            errorElement: "span", // contain the error msg in a span tag
            errorClass: 'help-block',
            errorPlacement: function (error, element) { // render error placement for each input type
                if (element.attr("type") == "radio" || element.attr("type") == "checkbox") { // for chosen elements, need to insert the error after the chosen container
                    error.insertAfter($(element).closest('.form-group').children('div').children().last());
                } else if (element.attr("name") == "card_expiry_mm" || element.attr("name") == "card_expiry_yyyy") {
                    error.appendTo($(element).closest('.form-group').children('div'));
                } else {
                    error.insertAfter(element);
                    // for other inputs, just perform default behavior
                }
            },
            ignore: ':hidden',
            rules: {
				passport_image_url:{
					checkFileInput:true
				},
				signature_url:{
					checkFileInput:true
				},
				admission_letter_url:{
					checkFileInput:true
				},
				course_registration_url:{
					checkFileInput:true
				},
				student_id_card_url:{
					checkFileInput:true
				},
				local_govt_id_url:{
					checkFileInput:true
				},
				int_passport_nationalID_url:{
					checkFileInput:true
				},
				birth_certificate_url:{
					checkFileInput:true
				},
				semester_report_url:{
					checkFileInput:true
				},
				highest_academic_certificate_url:{
					checkFileInput:true
				},
				
                username: {
                    minlength: 2,
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                password: {
                    minlength: 6,
                    required: true
                },
                password_again: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                },
                full_name: {
                    required: true,
                    minlength: 2,
                },
                phone: {
                    required: true
                },
                gender: {
                    required: true
                },
                address: {
                    required: true
                },
                city: {
                    required: true
                },
                country: {
                    required: true
                },
                card_name: {
                    required: true
                },
                card_number: {
                    minlength: 16,
                    maxlength: 16,
                    required: true
                },
                card_cvc: {
                    digits: true,
                    required: true,
                    minlength: 3,
                    maxlength: 4
                },
                card_expiry_yyyy: "cardExpiry",
                payment: {
                    required: true,
                    minlength: 1
                },
				first_name:{
					required:true,
					minlength:2,
				},
				surname_name:{
					required:true,
					minlength:2,
				},
				dob:{
					dateFormat:true,
				},
				sex:{
					required:true,
					minlength:1,
				},
				state_of_origin:{
					required:true,
					minlength:2,
				},
				lga_of_origin:{
					required:true,
					minlength:2,
				},
				place_of_birth:{
					required:true,
					minlength:2,
				},
				electorial_ward:{
					required:true,
					minlength:2,
				},
				village_town:{
					required:true,
					minlength:2,
				},
				disability_status:{
					required:true,
				},
				desc_disability:{
					required:true,
				},
				marital_status:{
					required:true,
				},
				
				//spouse details
				spouse_name:{
					required:function(element){
						return $('#marital_status').val() == 'married';
					},
					minlength:2,
				},
				spouse_home_town:{
					required:function(element){
						return $('#marital_status').val() == 'married';
					},
					minlength:2,
				},
				spouse_lga:{
					required:function(element){
						return $('#marital_status').val() == 'married';
					},
					minlength:2,
				},
				spouse_maiden:{
					required:function(element){
						return $('#marital_status').val() == 'married';
					},
					minlength:2,
				},
				
				//maternal and paternal details
				maternal_firstname:{
					required:true,
					minlength:2,
				},
				paternal_firstname:{
					required:true,
					minlength:2,
				},
				maternal_surname:{
					required:true,
					minlength:2,
				},
				paternal_surname:{
					required:true,
					minlength:2,
				},
				maternal_maiden:{
					required:true,
					minlength:2,
				},
				paternal_paternal_name:{
					required:true,
					minlength:2,
				},
				maternal_village_town:{
					required:true,
					minlength:2,
				},
				paternal_village_town:{
					required:true,
					minlength:2,
				},
				maternal_clan:{
					required:true,
					minlength:2,
				},
				paternal_clan:{
					required:true,
					minlength:2,
				},
				maternal_lga:{
					required:true,
					minlength:2,
				},
				paternal_lga:{
					required:true,
					minlength:2,
				},
				
				//PARENTS PARENTAL DETAILS
				//Parent's paternal Details
				mothers_father_firstname:{
					required:true,
					minlength:2,
				},
				fathers_father_firstname:{
					required:true,
					minlength:2,
				},
				mothers_father_surname:{
					required:true,
					minlength:2,
				},
				fathers_father_surname:{
					required:true,
					minlength:2,
				},
				mothers_father_stateoforigin:{
					required:true,
					minlength:2,
				},
				fathers_father_stateoforigin:{
					required:true,
					minlength:2,
				},
				mothers_father_village:{
					required:true,
					minlength:2,
				},
				fathers_father_village:{
					required:true,
					minlength:2,
				},
				mothers_father_clan:{
					required:true,
					minlength:2,
				},
				fathers_father_clan:{
					required:true,
					minlength:2,
				},
				mothers_father_lga:{
					required:true,
					minlength:2,
				},
				fathers_father_lga:{
					required:true,
					minlength:2,
				},
				//Parent's Maternal Details
				mothers_mother_firstname:{
					required:true,
					minlength:2,
				},
				fathers_mother_firstname:{
					required:true,
					minlength:2,
				},
				mothers_mother_surname:{
					required:true,
					minlength:2,
				},
				fathers_mother_surname:{
					required:true,
					minlength:2,
				},
				mothers_mother_stateoforigin:{
					required:true,
					minlength:2,
				},
				fathers_mother_stateoforigin:{
					required:true,
					minlength:2,
				},
				mothers_mother_village:{
					required:true,
					minlength:2,
				},
				fathers_mother_village:{
					required:true,
					minlength:2,
				},
				mothers_mother_clan:{
					required:true,
					minlength:2,
				},
				fathers_mother_clan:{
					required:true,
					minlength:2,
				},
				mothers_mother_lga:{
					required:true,
					minlength:2,
				},
				fathers_mother_lga:{
					required:true,
					minlength:2,
				},
				
				//Educational Data
				admission_level:{
					required:true,
				},
				institution:{
					required:true,
					minlength:2,
				},
				matric_number:{
					required:true,
					minlength:2,
				},
				course_of_study:{
					required:true,
					minlength:2,
				},
				level_of_study:{
					required:true,
					minlength:2,
				},
				department_faculty:{
					required:true,
					minlength:2,
				},
				course_duration:{
					required:true,
				},
				course_start_date:{
					dateFormat:true,
				},
				expected_graduation:{
					required:true,
				},
				expected_qualification:{
					required:true,
					minlength:2,
				},
				institution_contact_add:{
					required:true,
					minlength:2,
				},
				institution_contact_person:{
					required:true,
					minlength:2,
				},
				university_zone:{
					required:true,
				},
				university_state:{
					required:true,
				},
				university_name:{
					required:true,
				},
				current_cgpa:{
					required:true,
					minlength:2,
				},
				highest_academic_qual:{
					required:true,
				},
				highest_academic_institution:{
					required:true,
					minlength:2,
				},
				highest_academic_course:{
					required:true,
					minlength:2,
				},
				highest_academic_duration:{
					required:true,
					minlength:2,
				},
				highest_academic_certificatename:{
					required:true,
					minlength:2,
				},
				grade_level:{
					required:true,
				},
				
				//Bank Details
				personal_bank_name:{
					required:true,
					minlength:2,
				},
				personal_bank_address:{
					required:true,
					minlength:2,
				},
				personal_accoutn_name:{
					required:true,
					minlength:2,
				},
				personal_account_number:{
					required:true,
					minlength:10,
					maxlength:10,
					digits:true,
				},
				personal_account_type:{
					required:true,
				},
				
				//nubs bank
				nubs_bank_name:{
					required:true,
					minlength:2,
				},
				nubs_bank_address:{
					required:true,
					minlength:2,
				},
				nubs_name_of_account:{
					required:true,
					minlength:2,
				},
				nubs_account_number:{
					required:true,
					minlength:2,
					digits:true,
				},
				nubs_sort_code:{
					required:true,
					minlength:2,
					digits:true,
				},
				nubs_account_type:{
					required:true,
				},
				
				//sug bank
				sug_bank_name:{
					required:true,
					minlength:2,
				},
				sug_bank_address:{
					required:true,
					minlength:2,
				},
				sug_name_of_account:{
					required:true,
					minlength:2,
				},
				sug_account_number:{
					required:true,
					minlength:2,
					digits:true,
				},
				sug_sort_code:{
					required:true,
					minlength:2,
					digits:true,
				},
				sug_account_type:{
					required:true,
				},
            },
            messages: {
                firstname: "Please specify your first name"
            },
            highlight: function (element) {
                $(element).closest('.help-block').removeClass('valid');
                // display OK icon
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');
                // add the Bootstrap error class to the control group
            },
            unhighlight: function (element) { // revert the change done by hightlight
                $(element).closest('.form-group').removeClass('has-error');
                // set error class to the control group
            },
            success: function (label, element) {
                label.addClass('help-block valid');
                // mark the current input as valid and display OK icon
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
            }
        });
    };
    var displayConfirm = function () {
        $('.display-value', form).each(function () {
            var input = $('[name="' + $(this).attr("data-display") + '"]', form);
            if (input.attr("type") == "text" || input.attr("type") == "email" || input.is("textarea")) {
                $(this).html(input.val());
            } else if (input.is("select")) {
                $(this).html(input.find('option:selected').text());
            } else if (input.is(":radio") || input.is(":checkbox")) {
                $(this).html(input.filter(":checked").parent('label').text());
            } else if ($(this).attr("data-display") == 'card_expiry') {
                $(this).html($('[name="card_expiry_mm"]', form).val() + '/' + $('[name="card_expiry_yyyy"]', form).val());
            }
        });
    };
    var onShowStep = function (obj, context) {
		populateForm(context.toStep);
        $(".next-step").unbind("click").click(function (e) {
            e.preventDefault();
            wizardContent.smartWizard("goForward");
        });
        $(".back-step").unbind("click").click(function (e) {
            e.preventDefault();
            wizardContent.smartWizard("goBackward");
        });
        $(".finish-step").unbind("click").click(function (e) {
            e.preventDefault();
            onFinish(obj, context);
        });
    };
    var leaveAStepCallback = function (obj, context) {
		var vld = validateSteps(context.fromStep, context.toStep);
		if(vld){wizardSubmit(context.fromStep); return true;}else{ return false;}
        return vld;
        // return false to stay on step and true to continue navigation
    };
    var onFinish = function (obj, context) {
        if (validateAllSteps()) {
            //alert('form submit function');
            $('.anchor').children("li").last().children("a").removeClass('selected').addClass('done');
			wizardSubmit();
        }
    };
	var wizardSubmit = function(stepnumber){
		$('#fstep').val(stepnumber);
		wizardForm.unbind();
		wizardForm.submit(function(e){
			e.preventDefault();
			//alert(e.type);
			$.ajax({
				url:'formdata.php',
				cache:false,
				type:'POST',
				data:wizardForm.serialize(),
				success:function(data, status){
					alert("status :"+status+"\n"+data);
					/*$('#idiv').html(data);*/
				}
			});
			/*e.unbind();*/
			//return false;
		});
        wizardForm.submit();
	}
    var validateSteps = function (stepnumber, nextstep) {
	//alert('number of steps: '+numberOfSteps+' current step: '+stepnumber+' nextstep: '+nextstep);
        var isStepValid = false;
        if (numberOfSteps !== nextstep) {
		//if (numberOfSteps !== stepnumber) {
            // cache the form element selector
            if (wizardForm.valid()) { // validate the form
                wizardForm.validate().focusInvalid();
                //focus the invalid fields
                animateBar(nextstep);
                isStepValid = true;
                return true;
            };
        } else {
			//alert('without');
            displayConfirm();
            animateBar(nextstep);
            return true;
        };
    };
    var validateAllSteps = function () {
        var isStepValid = true;
        // all step validation logic
        return isStepValid;
    };
	var populateForm = function(sn){
		$.post("returndata.php", {fstep:sn,user_id:$('#user_id').val()})
		.done(function(data){
			var obj = jQuery.parseJSON(data);
			obj = obj[0];
			$.each(obj, function(key,val){
				checkElementType(key,val);
			});
		});
		//return false;	
	};
	var checkElementType = function(eK,eV){
		
		var eType = $('#'+eK).prop('type');//alert(eK+" == "+eType);
		
		/*var eType;
		try{
			eType = $('#'+eK).prop('type');
			if(eType==undefined){
				throw "undf";
			}
		}catch(e){
			alert(eK+" undefined1");
			try{
				eType = $('#'+eK).attr('type');
				if(eType==undefined){
					throw "undf2";
				}
			}catch(b){
					alert(eK+" undefined2");
			}
		}*/
		
		if(eType == "file"){
			if(eK == 'passport_image_url'){
				document.getElementById('img').innerHTML ="<img src="+eV+" class=\"img\"> ";
			}else if(eK == 'signature_url'){
				$('#img_prev').attr('src',eV);
			}
		}else if(eType == "hidden"){
			//do nothing yet
		}else if(eType == "text"){
			$('#'+eK).val(eV);
		}else if(eType == "select-one"){
			$('#'+eK).val(eV);$('#'+eK).change();
		}else if(eType == "radio"){
			$('#'+eK).val(eV);
		}else if(eType == "textarea"){
			$('#'+eK).val(eV);
		}
	}
    return {
        init: function () {
            initWizard();
        }
    };
}();