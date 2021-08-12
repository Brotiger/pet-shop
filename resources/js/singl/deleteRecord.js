var delete_url = ''
var delete_record = null;

$('body').delegate('[delete-id]', 'click', function(){
    delete_record = $(this);
    $('#delete-record-id-block').text($(this).attr('delete-id'));
    delete_url = $(this).attr('action');
    $('#modal-warning').modal();
});

$('body').delegate('#btn-delete-record', 'click', function(){
    $('#modal-warning').modal('hide');
    $.ajax({
        type: 'DELETE',
        url: delete_url,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data){
            toastr.success('Запись успещно удалена');
            $('#table-container').html(data);
        },
        error: function(){
            toastr.error('Ошибка, неволидные данные');
        }
    });
});