$('body').delegate('#btn-modal-search', 'click', function(){
    $('#modal-search').modal();
});

$('body').delegate('#btn-clear-search', 'click', function(){
    $('#searchForm')[0].reset();
})

$('#searchForm').submit(function(){
    $('#modal-search').modal('hide');
    $.ajax({
        type: $(this).attr('method'),
        url: $(this).attr('action'),
        data: $(this).serialize(),
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data){
            $("[error-message]").hide();
            $('#category').html(data.data.html.category);
        },
        error: function(data){
            if(data.responseJSON.message){
                toastr.error(data.responseJSON.message);
            }
        }
    });

    return false;
});

$('body').delegate('#btn-modal-reset', 'click', function(){
    $.ajax({
        type: $(this).attr('method'),
        url: $(this).attr('action'),
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data){
            $("[error-message]").hide();
            $('#category').html(data.data.html.category);
        },
        error: function(data){
            if(data.responseJSON.message){
                toastr.error(data.responseJSON.message);
            }
        }
    });
});