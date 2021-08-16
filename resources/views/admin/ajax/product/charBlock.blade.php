@foreach($product->characteristics as $char)
    <div class="form-group" block charBlock>
        <div class="input-group">
            <div class="input-group-prepend">
                <input type="hidden" name='deleteChar[{{ $char->id }}]' value="false" deleteChar>
                <button type="button" class="btn btn-danger" delete-block-id="{{ $char->id }}">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
            <input type="text" name="editCharName[{{ $char->id }}]" class="form-control" placeholder="Название" value="{{ $char->name }}" required>
            <input type="text" name="editCharValue[{{ $char->id }}]" class="form-control" placeholder="Значение" value="{{ $char->value }}" required>
        </div>
        <div class="text-danger" error-message style="display: none" edit-char-name-error></div>
        <div class="text-danger" error-message style="display: none" edit-char-value-error></div>
    </div>
@endforeach