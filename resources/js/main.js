$('[btn-close]').click(function(){
    $(this).parents('.alert').slideUp(250);
});

$('body').delegate('[delete-block]', 'click', function(){
    $(this).parents('[block]').remove();
});