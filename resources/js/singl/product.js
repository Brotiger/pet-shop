$("#addPhoto").on("click", function(){
    $("#photoList").append(
        `<div class="form-group" block imgBlock>`
            + `<div class="input-group">`
                + `<div class="input-group-prepend">`
                        + `<button type="button" class="btn btn-danger" delete-block>`
                                + `<i class="fas fa-trash"></i>`
                        + `</button>`
                + `</div>`
                + `<div class="custom-file">`
                        + `<input type="file" name="img[]" class="custom-file-input" required>`
                        + `<label class="custom-file-label">Выбирете файл</label>`
                + `</div>`
            + `</div>`
            + `<span class="text-danger" error-message style="display: none" img-error></span>`
        + `</div>`);
        bsCustomFileInput.init();
    });

$("#addChar").on("click", function(){
    $("#charList").append(
        `<div class="form-group" block charBlock>`
            + `<div class="input-group">`
                + `<div class="input-group-prepend">`
                    + `<button type="button" class="btn btn-danger" delete-block>`
                        + `<i class="fas fa-trash"></i>`
                    + `</button>`
                + `</div>`
                + `<input type="text" name="charName[]" class="form-control" placeholder="Название" required>`
                + `<input type="text" name="charValue[]" class="form-control" placeholder="Значение" required>`
            + `</div>`
            + `<div class="text-danger" error-message style="display: none" char-name-error></div>`
            + `<div class="text-danger" error-message style="display: none" char-value-error></div>`
        + `</div>`);
        bsCustomFileInput.init();
    });

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
                resetForm();
            }
            if(data.data.message){
                toastr.success(data.data.message);
            }
        },
        error: function(data){
            $('[error-message]').attr('error-message', 'false');
            let response = data.responseJSON;
            for(key in response.errors){
                let charValue = key.match(/charValue\.([0-9]+)/);
                let charName = key.match(/charName\.([0-9]+)/);
                let img = key.match(/img\.([0-9]+)/);
                if(charValue){
                    $(`[char-value-error]`).eq([charValue[1]]).show().text(response.errors[key]).attr('error-message', 'true');
                }if(charName){
                    $(`[char-name-error]`).eq([charName[1]]).show().text(response.errors[key]).attr('error-message', 'true');
                }if(img){
                    $(`[img-error]`).eq([img[1]]).show().text(response.errors[key]).attr('error-message', 'true');
                }else{
                    $(`#error-${key}`).show().text(response.errors[key]).attr('error-message', 'true');
                }
            };

            $("[error-message=false]").hide();
            if(data.responseJSON.message){
                toastr.error(data.responseJSON.message);
            }
        }
    });

    return false;
});

function resetForm(){
    $("[form-field]").each(function(){
        $(this).removeClass("errorField");
        $(this).val("");
    });
    $("[imgBlock]").remove();
    $("[charBlock]").remove();
}

$('body').delegate('#btn-modal-search', 'click', function(){
    console.log('asd');
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