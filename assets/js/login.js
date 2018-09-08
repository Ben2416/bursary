var Login = function () {
    var runLoginButtons = function () {
        $('.forgot').bind('click', function () {
			$('#ctrl').val(1);
            $('.box-login').hide();
            $('.box-forgot').show();
        });
        $('.register').bind('click', function () {
            $('.box-login').hide();
            $('.box-register').show();
        });
        $('.go-back').click(function () {
			$('#ctrl').val(0);
			$('.box-login').show();
            $('.box-forgot').hide();
            $('.box-register').hide();
        });
    };
    var runSetDefaultValidation = function () {
        $.validator.setDefaults({
            errorElement: "span", // contain the error msg in a small tag
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
                $(element).closest('.form-group').removeClass('has-error');
            },
            highlight: function (element) {
                $(element).closest('.help-block').removeClass('valid');
                // display OK icon
                $(element).closest('.form-group').addClass('has-error');
                // add the Bootstrap error class to the control group
            },
            unhighlight: function (element) { // revert the change done by hightlight
                $(element).closest('.form-group').removeClass('has-error');
                // set error class to the control group
            }
        });
    };
    var runLoginValidator = function () {
        var form = $('.form-login');
        var errorHandler = $('.errorHandler', form);
        form.validate({
            rules: {
                username: {
                    minlength: 2,
                    required: true
                },
                password: {
                    minlength: 6,
                    required: true
                }
            },
            submitHandler: function (form) {
			//alert('came here');
                errorHandler.hide();
                //form.submit();
				$('#form-login').unbind();
				$('#form-login').submit(function(e){
					e.preventDefault();
					$.ajax({
						url:'processlogin.php',
						cache:false,
						type:'POST',
						data:$('#form-login').serialize(),
						//dataType:'json',
						success:function(data,status){
						//alert(data);
							var obj = JSON.parse(data);
							//var obj = jQuery.parseJSON(data);
							//alert(obj.status);
							if(obj.status == 1 || obj.status == '1'){
								location.href = 'fingerprint.php';
							}else{alert(obj.message);}
						}
					});
				});
				$('#form-login').submit();
            },
            invalidHandler: function (event, validator) { //display error alert on form submit
                errorHandler.show();
            }
        });
    };
    var runForgotValidator = function () {
        var form2 = $('.form-forgot');
        var errorHandler2 = $('.errorHandler', form2);
        form2.validate({
            rules: {
                email: {
                    required: true,
                }
            },
            submitHandler: function (form) {
                errorHandler2.hide();
				//alert($('#ctrl').val());
				if($('#ctrl').val() != 0){
					form2Submit();//alert('ff');
				}
            },
            invalidHandler: function (event, validator) { //display error alert on form submit
                errorHandler2.show();
            }
        });
    };
	var gotoLogin = function(){
		$('.box-login').show();
		$('.box-forgot').hide();
		$('.box-register').hide();
	}
	var form2Submit = function(){
		
		$('#form-forgot').unbind();
		$('#form-forgot').submit(function(e){
			e.preventDefault();
			//alert($('#ctrl').val());//alert(e.type+" || "+e.target+" || "+e.target.parentNode);
			
				$.ajax({
					url:'processlogin.php',
					cache:false,
					type:'POST',
					data:$('#form-forgot').serialize(),
					success:function(data,status){
						//alert(data);
						var obj = JSON.parse(data);
						//alert(obj.status);
						if(obj.status == 1 || obj.status == '1'){
							//alert(obj.message);
							gotoLogin();
						}else{alert(obj.message);}
					}
				});
			
		});
		$('#form-forgot').submit();
	}
    var runRegisterValidator = function () {
        var form3 = $('.form-register');
        var errorHandler3 = $('.errorHandler', form3);
        form3.validate({
            rules: {
                first_name: {
                    minlength: 2,
                    required: true
                },
                last_name: {
                    minlength: 2,
                    required: true
                },
                phone_number: {
                    minlength: 2,
                    required: true
                },
                /*gender: {
                    required: true
                },*/
                email: {
                    required: true
                },
                /*password: {
                    minlength: 6,
                    required: true
                },
                password_again: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                },*/
                agree: {
                    minlength: 1,
                    required: true
                }
            },
            submitHandler: function (form3) {
                errorHandler3.hide();
				if($('#ctrl').val() != 0){
					form3Submit();
				}
            },
            invalidHandler: function (event, validator) { //display error alert on form submit
                errorHandler3.show();
            }
        });
    };
	var form3Submit = function(){
		$('#form-register').unbind();
		$('#form-register').submit(function(e){
			e.preventDefault();
			$.ajax({
				url:'processlogin.php',
				cache:false,
				type:'POST',
				data:$('#form-register').serialize(),
				success:function(data,status){
					alert(data+status+1);
					var obj = JSON.parse(data);
					//var obj = jQuery.parseJSON(data);
					//alert(obj.status);
					if(obj.status == 1 || obj.status == '1'){
						//alert(obj.message);
						gotoLogin();
					}else{alert(obj.message);}
				}
			});
		});
		$('#form-register').submit();
	}
    return {
        //main function to initiate template pages
        init: function () {
            runLoginButtons();
            runSetDefaultValidation();
            runLoginValidator();
            runForgotValidator();
            runRegisterValidator();
        }
    };
}();