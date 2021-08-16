$("#addPhoto").on("click", function(){
    $("#imgList").prepend(
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
            + `<p class="text-danger error-message" error-message style="display: none" img-error></p>`
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
            + `<p class="text-danger error-message" error-message style="display: none" char-name-error></p>`
            + `<p class="text-danger error-message" error-message style="display: none" char-value-error></p>`
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
            if(data.data.html){
                if(data.data.html.imgBlock){
                    $("[imgBlock]").remove();
                    $('#imgBlock').html(data.data.html.imgBlock);
                }
                if(data.data.html.charBlock){
                    $('#charList').html(data.data.html.charBlock);
                }
            }
        },
        error: function(data){
            $('[error-message]').attr('error-message', 'false');
            let response = data.responseJSON;
            for(key in response.errors){
                let charValue = key.match(/charValue\.([0-9]+)/);
                let editCharValue = key.match(/editCharValue\.([0-9]+)/);
                let charName = key.match(/charName\.([0-9]+)/);
                let editCharName = key.match(/editCharName\.([0-9]+)/);
                let img = key.match(/img\.([0-9]+)/);
                if(charValue){
                    $(`[char-value-error]`)
                    .eq([charValue[1]])
                    .show()
                    .text(response.errors[key].join(', '))
                    .attr('error-message', 'true');

                }if(editCharValue){
                    $(`[name='editCharValue[${editCharValue[1]}]']`)
                    .parent()
                    .parent()
                    .find('[edit-char-value-error]')
                    .show()
                    .text(response.errors[key].join(', '))
                    .attr('error-message', 'true');

                }if(editCharName){
                    $(`[name='editCharName[${editCharName[1]}]']`)
                    .parent()
                    .parent()
                    .find('[edit-char-name-error]')
                    .show()
                    .text(response.errors[key].join(', '))
                    .attr('error-message', 'true');

                }if(charName){
                    $(`[char-name-error]`)
                    .eq([charName[1]])
                    .show()
                    .text(response.errors[key].join(', '))
                    .attr('error-message', 'true');

                }if(img){
                    $(`[img-error]`)
                    .eq([img[1]])
                    .show()
                    .text(response.errors[key].join(', '))
                    .attr('error-message', 'true');

                }else{
                    $(`#error-${key}`)
                    .show()
                    .text(response.errors[key].join(', '))
                    .attr('error-message', 'true');
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
    var product_id = $(this).attr('product_id');
    $.ajax({
        type: $(this).attr('method'),
        url: $(this).attr('action'),
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            product_id: product_id
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

$('body').delegate('[btn-delete-img]', 'click', function(){
    $(this).parent().hide();

    var attr = $(this).attr('server-delete');

    if(typeof attr !== typeof undefined){
        $(this).prev("[deleteImg]").val('true');
    }
});

$('body').delegate('[delete-block-id]', 'click', function(){
    $(this).parents('[block]').hide().find('[type="text"]').remove();

    $(this).prev("[deleteChar]").val('true');
});