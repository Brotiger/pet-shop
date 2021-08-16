<option value=''>Нету</option>
@php
    $selected = null;
@endphp
@if($product && $product->category)
    @php
        $selected = $product->category->id;
    @endphp
    <option value='{{ $product->category->id }}' selected>{{ $product->category->title }}</option>
@endif
@foreach($categories as $category)
    @if($selected != $category->id)
        <option value="{{ $category->id }}">{{ $category->title }}</option>
    @endif
@endforeach