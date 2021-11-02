<script>
    jQuery(document).ready(function () {

        $("<?= $validator['selector']; ?>").each(function () {
            $(this).validate({
                errorElement: 'div',
                errorClass: 'invalid-feedback',

                errorPlacement: function (error, element) {
                    error.insertAfter(element);
                },
                highlight: function (element) {
                    $(element).removeClass('is-valid').addClass('is-invalid'); // add the Bootstrap error class to the control group
                },

                <?php if (isset($validator['ignore']) && is_string($validator['ignore'])): ?>

                ignore: "<?= $validator['ignore']; ?>",
                <?php endif; ?>


                unhighlight: function (element) {
                    $(element).removeClass('is-invalid').addClass('is-valid');
                },

                success: function (element) {
                    $(element).removeClass('is-invalid').addClass('is-valid'); // remove the Boostrap error class from the control group
                },

                focusInvalid: true,
                <?php if (Config::get('jsvalidation.focus_on_error')): ?>
                invalidHandler: function (form, validator) {

                    if (!validator.numberOfInvalids())
                        return;

                    $('html, body').animate({
                        scrollTop: $(validator.errorList[0].element).offset().top
                    }, <?= Config::get('jsvalidation.duration_animate') ?>);

                },
                <?php endif; ?>

                rules: <?= json_encode($validator['rules']); ?>,
                submitHandler: function(form) {
                    var formname = $(form).attr('name');
                    console.log(formname);
                    var enableAjaxSubmit = $(form).attr('enableAjaxSubmit');
                    var submitButtonName = $(`#${formname}-submit`).html();
                    if(enableAjaxSubmit === '1'){
                        var ajaxSubmitOptions = {
                            // type: $(form).attr('method'),
                            // url: $(form).attr('action'),
                            beforeSend : function(response) {
                                    $(`#${formname}-submit`).attr("disabled", true);
                                    $(`#${formname}-submit`).html('<i class="fa-solid fa-spinner fa-spin-pulse"></i> Loading...');
                                } ,
                            success : function(response) {
                                    $('#formerror').html(response.message);
                                    if(response.status == 0) {
                                        if($('#formerror').length > 0){
                                            $('#formerror').addClass('alert alert-danger p-1');
                                        }
                                    }else{
                                        if($('#formerror').length > 0){
                                            if($('#formerror').hasClass('alert-danger')){
                                                $('#formerror').removeClass('alert alert-danger p-1');
                                            }
                                            $('#formerror').addClass('alert alert-success p-1');
                                            location.reload(response.url);
                                        }
                                    }
                                } ,
                            complete: function(response){
                                    $(`#${formname}-submit`).attr("disabled", false);
                                    $(`#${formname}-submit`).html(submitButtonName);
                                },
                            error:function(response){
                                    console.log('error');
                                }
                        };
                        $(form).ajaxSubmit(ajaxSubmitOptions);
                        return false;
                    }else{
                        return true;
                    }
                }
            });
        });
    });
</script>
