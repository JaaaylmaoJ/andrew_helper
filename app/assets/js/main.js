let filesExt    = ['xlsx'];
let errors      = [];

$( document ).ready(function() {

    /*Избавление от ошибок---------------------------*/
    //$('#validate_error').hide();
    $('input[name="xlsx"]').change(function (){
        $('#validate_error').hide();
        errors = [];
    });

    /*Валидация формы--------------------------------*/
    $('.file-form').on('submit', function (e){
        e.preventDefault();

        validateForm(e.target);

        if(errors.length !== 0) {
            $('#validate_error').show();
        } else {

            e.target.submit();
        }
    });
});

/**
 * Валидация файла в инпуте
 *
 * @param form
 */
function validateForm(form) {
    var parts = $(form).find('input[name="xlsx"]').val().split('.');
    if(filesExt.join().search(parts[parts.length - 1]) != -1){

    } else {
        errors.push('А с какой стати этот файл');
    }
}