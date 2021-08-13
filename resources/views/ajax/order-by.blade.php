<div class="product_grid">
    @foreach($products as $product)
		@php
			$image = '';

			if(count($product->images) > 0){
				$image = '/storage/'.$product->images[0]['img'];
			}else{
				$image = '/images/no_image.png';
			}

		@endphp
        <!-- Product -->
	    <div class="product">
			<div class="product_image"><img src="{{ $image }}" alt=""></div>
			@if(!empty($cat))
				<div class="product_extra product_new"><a href="{{ route('showCategory', $product->category->alias) }}">{{ $product->category->title }}</a></div>
			@endif
			<div class="product_content">
				<div class="product_title"><a href="{{ route('showProduct', [$product->category->title ?? 'different', $product->alias]) }}">{{ $product->title }}</a></div>
				@if($product->new_price != null)
					<div style="text-decoration: line-through;">{{ $product->price }} р.</div>
					<div class="product_price">{{ $product->new_price }} р.</div>
				@else
					<div class="product_price">{{ $product->price }} р.</div>
				@endif
			</div>
        </div>
    @endforeach
</div>
{{ $products->appends(request()->query())->links('pagination.index') }}