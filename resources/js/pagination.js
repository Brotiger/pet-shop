$('body').delegate('.page-item a', 'click',function(){
    $.ajax({
        type: 'GET',
        url: $(this).attr('href'),
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data){
            $('#category').html(data.data.html.category);
            $('#pagination').html(data.data.html.pagination);
        },
    });
    return false;
});