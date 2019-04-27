jQuery(document).ready(function ($) {
    $('#change').click(function () {
        let result,
            input,
            select;
        input = $('.number').val();
        select =$(':selected').val();
        result=input*select;
        $('.result').html(result)
    });
})