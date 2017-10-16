// Wait for the DOM to be ready
$(function() {
    $.validator.setDefaults({
        debug: true,
        errorElement: "div",
        errorClass: "text-danger",
        highlight: function (element) {
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
        },
        unhighlight: function (element) {
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        },
        errorPlacement: function (error, element) {
            if (element.parent('.input-group').length || element.prop('type') === 'checkbox' || element.prop('type') === 'radio') {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }
    });

    $("#contact_form").validate({
        rules:{
            section:{
                required: true
            },
            store_name:{
                required: true
            },
            store_url:{
                required: true,
                url:true
            },
            other_info:{
                required: true
            },
            // contact_phone:{
            //     required: true,
            //     digits: true
            // },
            contact_phone:{
                required: true,
                intlTelNumber:true
            },
            contact_subject:{
                required: true
            },
            contact_email:{
                required: true,
                email:true
            },
            contact_message:{
                required: true
            }
        },
        messages:{
            section:{
                required: $("#section_req_validation_msg").val()
            },
            store_name:{
                required: $("#store_name_req_validation_msg").val()
            },
            store_url:{
                required: $("#instagram_link_req_validation_msg").val(),
                url: $("#instagram_link_valid_validation_msg").val()
            },
            other_info:{
                required: $("#type_of_request_detail_req_validation_msg").val()
            },
            contact_phone:{
                required: $("#contact_phone_req_validation_msg").val(),
                intlTelNumber: $("#contact_phone_valid_validation_msg").val()
            },
            contact_subject:{
                required: "Please enter subject."
            },
            contact_email:{
                required: $("#contact_email_req_validation_msg").val(),
                email: $("#contact_email_valid_validation_msg").val()
            },
            contact_message:{
                required: $("#contact_message_req_validation_msg").val()
            }
        },
        // in the "action" attribute of the form when valid
        submitHandler: function(form) {
            form.submit();
        }
    });
    // create a custom phone number rule called 'intlTelNumber'
    jQuery.validator.addMethod("intlTelNumber", function(value, element) {
        return this.optional(element) || $(element).intlTelInput("isValidNumber");
    }, "Please enter a valid International Phone Number");
});