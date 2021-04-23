$(function() {
    $(".config").on('click', function(){
        $(this).next().toggleClass('on_off');
    });
})
