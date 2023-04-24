$(function() {

    // validate name input
    $(".r-name [name='name']").on("keyup", function() {
        var input = $(this).val();
        var regex = new RegExp("[0-9*!@#$%^&.,~]");
        if (regex.test(input)) {
            $("[name='name']").css("background-color", "pink");
            $('.name_error').removeClass('d-none')
        } else {

            $('.name_error').addClass('d-none')
            $("[name='name']").css("background-color", "white");
            return false;
        }
    });

    // validate emil input
    $(".r-email [name='email']").on("keyup", function() {
        var input = $(this).val();
        var regex = RegExp(/\S+@\S+\.\S+/);
        if (!regex.test(input)) {
            $(this).css("background-color", "pink");
            $('.email_error').removeClass('d-none')
        } else {
            $('.email_error').addClass('d-none')
            $(this).css("background-color", "white");

            return false;
        }
    });



        // validate emil input
        $(".r-phone [name='phone']").on("keyup", function() {
            var input = $(this).val();
            var regex = new RegExp("[^0-9]");
            if (regex.test(input)) {
                $(this).css("background-color", "pink");
                $('.phone_error').removeClass('d-none')
            } else {
                $('.phone_error').addClass('d-none')
                $(this).css("background-color", "white");
                return false;
            }
        });

        $("[name='type_of_account']").on("click", function() {
            var input = $(this).val();

            if(input == 'doctors') {
                $('#specialization_select').attr('disabled', false);
                $('#specialization').removeClass('d-none');
            }else {
                $('#specialization_select').attr('disabled', true);
                $('#specialization').addClass('d-none');
            }

        });


});



