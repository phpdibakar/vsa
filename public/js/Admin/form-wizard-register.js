var FormWizard = function () {
    var wizardContent = $('#wizard');
    var wizardForm = $('#user-register-form');
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
                fname: {
                    required: true
                },
				lname: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
				email_confirmation: {
                    required: true,
                    email: true,
					equalTo: '#email'
                },
               password: {
                    minlength: 6,
					maxlength: 14,
                    required: true
                },
                password_again: {
                    required: true,
                    minlength: 6,
					maxlength: 14,
                    equalTo: "#password"
                },
				dob: {
					required: true,
					date: true
				},
                gender_id: {
                    required: true
                },
                "profile[address]" : {
                    minlength: 6,
					required: true
                },
				"profile[country_id]" : {
					required: true
                },
				"profile[state_id]" : {
					required: true
                },
                "profile[city]": {
                    required: true
                },
                "profile[zip]": {
                    required: true
                },
				"profile[emergency_contact_name]": {
                    required: true
                },
				"profile[emergency_phone_number]": {
                    required: true
                },
				"profile[emergency_relation_id]": {
                    required: true
                },
				"profile[occupation]": {
                    required: true
                },
				"profile[role_id]": {
                    required: true
                },
				tnc: {
                    required: true
                },
            },
            messages: {
                
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
		//console.log(validateSteps(context.fromStep, context.toStep));
        return validateSteps(context.fromStep, context.toStep);
        // return false to stay on step and true to continue navigation
    };
    var onSubmit = function (obj, context, boolForward) {
        if (validateAllSteps()) {
            //wizardForm.submit();
        }
    };
	
	var onFinish = function (obj, context, boolForward) {
		if (wizardForm.valid()) {
            wizardForm.submit();
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