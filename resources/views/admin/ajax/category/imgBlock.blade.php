@if($category->img)
    <div class="form-group">
        <div class="input-group">
            <img src="{{ '/storage/' . $category->img }}" class="categoryImg">
        </div>
        <input type="hidden" name='deleteImg' value="false">
        <button type="button" class="btn btn-danger mt-2" btn-delete-img><i class="fas fa-trash"></i></button>
    </div>
@endif