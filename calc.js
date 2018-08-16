$(document).ready(function() {
    $("#calc_formid").submit(function() {
        $.ajax({
            type: 'POST',
            url: 'calcajax.php',
            data: $(this).serializeArray(),
            dataType : "json",
            success: function(data) {
                if (data['type'] == 'msg'){
                    $('#calc_result').val(data['message']);
                    $('#calc_error').hide();
                } else {
                    $('#calc_error').html(data['message']);
                    $('#calc_error').show();
                }
            },
            error:  function(){
                alert('Возникла ошибка!');
            }
        });
        return false;
    });
    $.ajax({
        url: 'listajax.php',
        success: function(data) {
            $('#ratesoption').html(data);
        },
        error:  function(){
            alert('Возникла ошибка!');
        }
    })
})