$('[btn-close]').click(function(){
    $(this).parents('.alert').slideUp(250);
});

$('body').delegate('[delete-block]', 'click', function(){
    $(this).parents('[block]').remove();
});

function firstToUpperCase(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}