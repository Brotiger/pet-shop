$('body').delegate('#btn-modal-settings', 'click', function(){
    $('#modal-table-settings').modal();
});

$('#settingsForm').submit(function(){
    $('#modal-table-settings').modal('hide');
    $.ajax({
        type: $(this).attr('method'),
        url: $(this).attr('action'),
        data: $(this).serialize(),
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data){
            $('#table').html(data.data.html.table);
        },
        error: function(data){
            if(data.responseJSON.message){
                toastr.error(data.responseJSON.message);
            }
        }
    });

    return false;
});