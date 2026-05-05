/**
*
* -----------------------------------------------------------------------------
*
* Template : Braintech - IT Solutions and Technology Startup HTML Template
* Author : rs-theme
* Author URI : http://www.rstheme.com/
*
* -----------------------------------------------------------------------------
*
**/

(function($) {
    'use strict';
    // Get the form.
    var form = $('#careers-form');

    // Get the messages div.
    var formMessages = $('#careers-form-messages');

    // Set up an event listener for the contact form.
    $(form).submit(function(e) {
        // Stop the browser from submitting the form.
        e.preventDefault();

        // Serialize the form data.
        var formData = new FormData(this);

        var filter = /^(?:(?:\+|0{0,2})91(\s*|[\-])?|[0]?)?([6789]\d{2}([ -]?)\d{3}([ -]?)\d{4})$/;
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if(!$("#email").val()){
                submitErrorMSG("Please Enter your email");
            }
            else if($("#email").val() && !IsEmail($("#email").val())){
                submitErrorMSG("Please Enter a valid email");
            }
            else if(!$("#phone").val()){
                submitErrorMSG("Please Enter the Phone number");
            }
            else if(!$("#phone").val().match(filter)){
                submitErrorMSG("Please enter a valid phone number");
            }
            else if(!$("#phone").val().match(filter)){
                submitErrorMSG("Please enter a valid phone number");
            }
        else{
            // Submit the form using AJAX.
            $.ajax({
                type: 'POST',
                url: $(form).attr('action'),
                data: formData,
                dataType: 'json',
                contentType: false,
                cache: false,
                processData:false,
            })
            .done(function(response) {
                // Make sure that the formMessages div has the 'success' class.
                $(formMessages).removeClass('error');
                $(formMessages).addClass('success');

                // Set the message text.
                $(formMessages).text(response);

                // Clear the form.
                $('#name, #email, #phone, #subject, #file, #message').val('');
            })
            .fail(function(data) {
                if(data.status ==200){
                    $(formMessages).removeClass('error');
                $(formMessages).addClass('success');

                // Set the message text.
                $(formMessages).text(data.responseText);

                // Clear the form.
                $('#name, #email, #phone, #subject, #file, #message').val('');
                }else{
                // Make sure that the formMessages div has the 'error' class.
                $(formMessages).removeClass('success');
                $(formMessages).addClass('error');
        
                // Set the message text.
                if (data.responseText !== '') {
                    submitErrorMSG(data.responseText);
                } else {
                    $(formMessages).text('Oops! An error occured and your message could not be sent.');
                }
                }
            });
        }
    });

    function submitErrorMSG(msg){
        var formMessages = $('#careers-form-messages');
        $(formMessages).removeClass('success');
        $(formMessages).addClass('error');

        $(formMessages).text(msg);
    }

    function IsEmail(email) {
        var regex =
/^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!regex.test(email)) {
            return false;
        }
        else {
            return true;
        }
    }

})(jQuery);