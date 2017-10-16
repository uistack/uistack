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

    $("#frm_comment").validate({
        rules:{
            name:{
                required: true
            },
            email:{
                required: true,
                email:true
            },
            comment:{
                required: true
            }
        },
        messages:{
            name:{
                required: "Please enter your name."
            },
            email:{
                required: "Please enter your email.",
                email: "Please enter a valid email."
            },
            comment:{
                required: "Please enter comment here."
            }
        },
        // in the "action" attribute of the form when valid
        submitHandler: function(form) {
            form.submit();
        }
    });
});