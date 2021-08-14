var delete_url = ''
var delete_record = null;

$('body').delegate('[delete-id]', 'click', function(){
    delete_record = $(this);
    $('#delete-record-id-block').text($(this).attr('delete-id'));
    delete_url = $(this).attr('action');
    $('#modal-warning').modal();
});

$('#deleteForm').submit(function(){
    $('#modal-warning').modal('hide');
    $.ajax({
        type: 'DELETE',
        url: delete_url,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data){
            if(data.data.message){
                toastr.success(data.data.message);
            }
            delete_record.parents('tr').remove();
        },
        error: function(){
            if(data.responseJSON.message){
                toastr.error(data.responseJSON.message);
            }
        }
    });
    
    return false;
});