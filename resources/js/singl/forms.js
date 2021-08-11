$('#form').submit(function(){
    var formData = new FormData($('#form')[0]);

    $.ajax({
        type: $(this).attr('method'),
        url: $(this).attr('action'),
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data){
            if(data.action == 'reset'){
                $("#form")[0].reset();
            }

            $("#alert-success span[data-text]").text(data.data.message);
            $("#alert-success").slideDown(300);
        }
    });
    return false;
});