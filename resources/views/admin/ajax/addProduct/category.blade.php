<option value=''>Нету</option>
@foreach($categories as $category)
    <option value="{{ $category->id }}">{{ $category->title }}</option>
@endforeach