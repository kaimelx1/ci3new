<script type="text/javascript">

    $(function () {

        // Click trigger when enter is pressed
        $('input').keypress(function(e) {
            if (e.keyCode == 13 || e.which == 13) {
                $('.login_btn').trigger('click');
            }
        });

        // Validator settings
        $.validator.setDefaults({
            errorClass: 'text-danger',
            highlight: function (element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function (element) {
                $(element).closest('.form-group').removeClass('has-error');
            }
        });

        // jQuery validation
        $('#login_form').validate({
            submitHandler: function () {
                // If click on login-button
                $('.login_btn').on('click', function () {
                    var options = {
                        // start login_request method
                        url: "/ci3/aleksandr_vashchenko_crud/login_request/",
                        success: function (data) {
                            // put info to the div
                            $('.ajax_message').html(data);
                        }
                    };
                    // ajax
                    $("#login_form").ajaxSubmit(options);

                    // Fade message
                    setTimeout(function () {
                        $('div.echo-message').fadeOut('slow');
                    }, 7000);

                });
            }
        });

    });

</script>