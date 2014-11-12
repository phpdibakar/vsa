var FormWizard = function () {
    var wizardContent = $('#wizard');
    var wizardForm = $('#StarletAdminAddForm, #StarletAdminEditForm');
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
                }
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
    var onShowStep = function (obj, context) {
		
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
            onFinish(obj, context, false);
        });
		 $(".submit-step").unbind("click").click(function (e) {
            e.preventDefault();
            onSubmit(obj, context, true);
        });
    };
    var leaveAStepCallback = function (obj, context) {
		console.log(validateSteps(context.fromStep, context.toStep));
        return validateSteps(context.fromStep, context.toStep);
        // return false to stay on step and true to continue navigation
    };
    var onSubmit = function (obj, context, boolForward) {
        if (validateAllSteps()) {
            //alert('form submit function');
			var starletID = app.AdminStarlets.starletId;
			wizardForm.ajaxSubmit({
				url: app.AdminStarlets.mode == 'add' ? wizardForm.attr('action') + '/' + starletID : wizardForm.attr('action'),
				success: function(responseText, statusText, xhr, $form){
					responseText = JSON.parse(responseText);
					console.log(responseText);
					if(responseText['id'] && !isNaN(responseText['id'])){
						if(boolForward)
							wizardContent.smartWizard("goForward");
						
						//setting submission id only when add mode
						if(app.AdminStarlets.mode == 'add'){
							app.AdminStarlets.starletId = responseText['id'] ? responseText['id']: 0;
						}
						//setting submission id
						app.AdminStarlets.getUploadedImages(app.AdminStarlets.starletId);
					}else{
						var validationErrors = '';
						for(var key in responseText){
							validationErrors += key + ':' + responseText[key] + "<br />";
						}
						//console.log(validationErrors);
						alertify.alert(validationErrors);
					}
				}
			}); 
            $('.anchor').children("li").last().children("a").removeClass('selected').addClass('done');
            //wizardForm.submit();
        }
    };
	
	var onFinish = function (obj, context, boolForward) {
        if (validateAllSteps()) {
            //alert('form submit function');
			var videoForm = $('#StarletVideoAdminAddForm, #StarletVideoAdminEditForm');
			videoForm.ajaxSubmit({
				url: videoForm.attr('action') + '/' + app.AdminStarlets.starletId,
				success: function(responseText, statusText, xhr, $form){
					responseText = JSON.parse(responseText);
					if(responseText['success']){
						if(boolForward)
							wizardContent.smartWizard("goForward");
						window.location.href = app.Config.getScriptBaseUrl() + 'admin/starlets/index';
					}else{
						var validationErrors = '';
						for(var key in responseText){
							validationErrors += responseText[key];
						}
						//console.log(validationErrors);
						alertify.alert(validationErrors);
					}
				}
			}); 
            $('.anchor').children("li").last().children("a").removeClass('selected').addClass('done');
            //wizardForm.submit();
        }
    };
	
    var validateSteps = function (stepnumber, nextstep) {
        var isStepValid = false;
        // cache the form element selector
        if (wizardForm.valid()) { // validate the form
			wizardForm.validate().focusInvalid();
			//focus the invalid fields
			animateBar(nextstep);
			isStepValid = true;
			return true;
        }
		/* else {
           //displayConfirm();
            animateBar(nextstep);
            return true;
        }; */
    };
    var validateAllSteps = function () {
        var isStepValid = true;
        // all step validation logic
        return isStepValid;
    };
    return {
        init: function () {
            initWizard();
        }
    };
}();