$(document).ready(function(){

	$.validator.setDefaults({

        errorClass: 'help-block',

        highlight: function(element) {
            $(element)
                .closest('.form-group')
                .addClass('has-error');
        	},
        unhighlight: function(element) {
            $(element)
                .closest('.form-group')
                .removeClass('has-error')
                .addClass('has-success');
        	},
        errorPlacement: function(error, element) {

            if (element.prop('type') === 'checkbox') {

                error.insertAfter(element.parent());
            }else
                error.insertAfter(element);
        }

    });

	// 	Validating New-member form ..

	$("#newmember").validate({

	    rules: {
		    uname: "required",
		    fname: "required",
		    lname: "required",
		    email: {
			    required: true,
			    email: true
		    },
		    role: "required",
		    password: "required"
	    },

	    messages: {
	        uname: "Please indicate The User Name",
	        fname: "Please indicate First Name",
	        lname: "Please indicate Last Name",
	        email: {
		        required : "Indicate your Email address",
		        email: "Use the correct formart of email address"
	        },
	        role: "You must indicate the role of user",
	        password: "You must enter the user password"
	    }
	});

});