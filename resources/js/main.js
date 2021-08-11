$('[btn-close]').click(function(){
    $(this).parents('.alert').slideUp(300);
});

$('[btn-delete-img]').click(function(){
    $(this).parent().hide();
});