var imgCount = 0;
var charCount = 0;

$("#addPhoto").on("click", function(){
    $("#photoList").append(
        `<div class="form-group" block imgBlock id="imgBlock-${imgCount}">`
            + `<div class="input-group">`
                + `<div class="input-group-prepend">`
                        + `<button type="button" class="btn btn-danger" delete-block>`
                                + `<i class="fas fa-trash"></i>`
                        + `</button>`
                + `</div>`
                + `<div class="custom-file">`
                        + `<input type="file" name="img-${imgCount}" class="custom-file-input" id="inputFile-${imgCount}">`
                        + `<label class="custom-file-label" for="inputFile-${imgCount}">Выбирете файл</label>`
                + `</div>`
            + `</div>`
            + `<span class="text-danger" error-message id="error-img-${imgCount}" style="display: none"></span>`
        + `</div>`);
        imgCount++;
        bsCustomFileInput.init();
    });

$("#addChar").on("click", function(){
    $("#charList").append(
        `<div class="form-group" block charBlock id="charBlock-${charCount}">`
            + `<div class="input-group">`
                + `<div class="input-group-prepend">`
                    + `<button type="button" class="btn btn-danger" delete-block>`
                        + `<i class="fas fa-trash"></i>`
                    + `</button>`
                + `</div>`
                + `<input type="text" name="char-key-${charCount}" class="form-control" placeholder="Название" key>`
                + `<input type="text" name="char-value-${charCount}" class="form-control" placeholder="Значение" val>`
            + `</div>`
            + `<span class="text-danger" error-message id="error-char-${charCount}" style="display: none"></span>`
        + `</div>`);
        charCount++;
        bsCustomFileInput.init();
    });

$('#addForm, #editForm').submit(function(){
    var form = $(this);
    let formData = new FormData();

    var img = [];
    var char = [];

    //Начадл добавления данных о фото
    $("[imgBlock]").each(function(i, ell){
        img.push({
            "id": ell.id.replace("imgBlock-", "")
        });
        formData.append("img-" + ell.id.replace("imgBlock-", ""), $(this).find("[type='file']")[0].files[0]);
    });
    formData.append("imgs", JSON.stringify(img));

    //Начадл добавления данных о характеристиках
    $("[charBlock]").each(function(i, ell){
        char.push({
            "name": $(this).find("[key]").val(),
            "value": $(this).find("[val]").val(),
            "id": ell.id.replace("charBlock-", "")
        });
    });
    formData.append("chars", JSON.stringify(char));

    $('[data-field]').each(function(i, ell){
        formData.append(ell.name, $(this).val());
    });
    
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

function resetForm(){
    $("[form-field]").each(function(){
        $(this).removeClass("errorField");
        $(this).val("");
    });
    $("[imgBlock]").remove();
    $("[charBlock]").remove();

    imgCount = 0;
    charCount = 0;
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