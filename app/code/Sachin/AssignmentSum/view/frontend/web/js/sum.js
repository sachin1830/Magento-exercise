define(['jquery'], function ($) {

    $('#submit').click(function () {
        var sum = parseInt($('#first').val()) + parseInt($('#second').val());
        $('#result').val(sum);
    });

});
