@foreach($product->images as $image)
    <div class="form-group">
        <div class="input-group">
            <img src="{{ '/storage/' . $image->img }}" class="productImg">
        </div>
        <input type="hidden" name='deleteImg[{{ $image->id }}]' value="false" deleteImg>
        <button type="button" class="btn btn-danger mt-2" btn-delete-img><i class="fas fa-trash"></i></button>
    </div>
@endforeach