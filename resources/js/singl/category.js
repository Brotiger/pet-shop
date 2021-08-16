const { each } = require("jquery");

$('#addForm, #editForm').submit(function(){
    var form = $(this);
    var formData = new FormData(form[0]);

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
            $("[error-message]").hide();
            if(data.action == 'reset'){
                form[0].reset();
            }
            if(data.data.message){
                toastr.success(data.data.message);
            }
            if(data.data.html.imgBlock){
                $('[type="file"]').val('').next('label').html('Выбирете файл');
                $('#imgBlock').html(data.data.html.imgBlock);
            }
        },
        error: function(data){
            $('[error-message]').attr('error-message', 'false');
            let response = data.responseJSON;
            for(key in response.errors){
                $(`#error-${key}`).show().text(response.errors[key]);
                $(`#error-${key}`).attr('error-message', 'true');
            };

            $("[error-message=false]").hide();
            if(data.responseJSON.message){
                toastr.error(data.responseJSON.message);
            }
        }
    });

    return false;
});

$('body').delegate('[btn-delete-img]', 'click', function(){
    $(this).parent().hide();
    $(this).prev("[name='deleteImg']").val('true');
});