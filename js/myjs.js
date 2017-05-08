
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

    $.validator.addMethod("integer2", function(value, element) {

		return this.optional(element) || /^[0-9]+$/i.test(value);

	}, "A positive non-decimal number please");

	//  Search validating form...

    $("#indexsearch").validate({

        rules: {
            search: "required"
        },

        messages: {
            search: "Indicate Your Company Name You Want to Search"
        }
    });

    //  Reserve name validating form...

    $("#reserve").validate({

        rules: {
            cname: "required",
            fname: {
            	required: true,
            	nowhitespace: true,
                lettersonly: true
            },
            lname: {
            	required: true,
            	nowhitespace: true,
                lettersonly: true
            },
            id: {
            	required: true,
            	nowhitespace: true,
                integer2: true
            },
            phone: {
            	required: true,
            	nowhitespace: true,
                phoneNL: true
            },
            email: {
            	required: true,
            	nowhitespace: true,
                email: true
            }
        },

        messages: {
            cname: "Indicate Your Company Name You Want to Reserve",
            fname: {
            	required : "Indicate your First Name Please",
                nowhitespace: "Only one Name is required DONT use spacing",
                lettersonly: "No numbers/symbols to be used in names, Letters only"
            },
            lname: {
            	required : "Indicate your Last Name Please",
                nowhitespace: "Only one Name is required DONT use spacing",
                lettersonly: "No numbers/symbols to be used in names, Letters only"
            },
            id: {
            	required: "You Have to Provide Your National ID Please",
            	nowhitespace: "A National ID CANT Contain spacing",
                numbersonly: "ONLY USE INTERGERS IN YOUR NATIONAL ID"
            },
            phone: {
            	required: "Please Provide Us With Your Phone Number",
            	nowhitespace: "DONT use spacing in the Phone Number",
                phoneNL: "Please Use a Valid Phone Number"
            },
            email: {
            	required: "Please Provide Us With Your Email Address",
            	nowhitespace: "DONT use spacing in Your Email",
                email: "Use The Correct Format of Email Address"
            }
        }
    });


    // Payment page javascript

     $('#airtel').css('display','none');
    $('#equitel').css('display','none');

    $('#showmpesa').click(function(){

        if($(this.checked)){

            $('#equitel').css('display','none');
            $('#airtel').css('display','none');
            $('#mpesa').css('display','block');
        }

    });
    $('#showairtel').click(function(){

        if($(this.checked)){

            $('#equitel').css('display','none');
            $('#mpesa').css('display','none');
            $('#airtel').css('display','block');
        }

    });

    $('#showequitel').click(function(){

        if($(this.checked)){

            $('#mpesa').css('display','none');
            $('#airtel').css('display','none');
            $('#equitel').css('display','block');
        }

    });

//    Electronic payment...

    $('#paypal').css('display','none');
    $('#master').css('display','none');

    $('#showvisa').click(function(){

        if($(this.checked)){

            $('#master').css('display','none');
            $('#paypal').css('display','none');
            $('#visa').css('display','block');
        }

    });
    $('#showmaster').click(function(){

        if($(this.checked)){

            $('#visa').css('display','none');
            $('#paypal').css('display','none');
            $('#master').css('display','block');
        }

    });

    $('#showpaypal').click(function(){

        if($(this.checked)){

            $('#visa').css('display','none');
            $('#master').css('display','none');
            $('#paypal').css('display','block');
        }

    });


});





// function Validate() {
// 	if( document.Searchform.search.value == "" )
//     	{
// 	        alert( "Please provide Company Name you want to search!" );
// 	        document.Searchform.search.focus();
// 	        return false;
//         }
//     return (true);
// }

function Validate_reserv() {

	if (document.ReservForm.uname.value == "") {

		document.getElementById('error').innerHTML = "Please provide your Official Name!";
		document.ReservForm.uname.focus();
	    return false;
	}
	if (document.ReservForm.phone.value == "") {

		document.getElementById('error').innerHTML = "Please provide Phone Number!";
		document.ReservForm.phone.focus();
	    return false;
	}
	if (document.ReservForm.email.value == "") {

		document.getElementById('error').innerHTML = "Please provide Your Email Address!";
		document.ReservForm.email.focus();
	    return false;
	}

	return (true);
}