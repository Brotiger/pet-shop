$('[btn-close]').click(function(){
    $(this).parents('.alert').slideUp(250);
});

$('[btn-delete-img]').click(function(){
    $(this).parent().hide();
});