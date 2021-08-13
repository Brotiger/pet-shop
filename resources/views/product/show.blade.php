@extends('layouts.main')
@section('title', $item->title)
@section('custom_css')
    <link rel="stylesheet" type="text/css" href="/styles/product.css">
    <link rel="stylesheet" type="text/css" href="/styles/product_responsive.css">
@endsection
@section('content')
<div class="home">
		<div class="home_container">
			@php
				if(!empty($item->category)){
					$imgUrl = $item->category->img != null ? '/storage/' . $item->category->img : '/images/categories.jpg';
				}else{
					$imgUrl = '/images/categories.jpg';
				}
			@endphp
			<div class="home_background" style="background-image:url({{ $imgUrl }})"></div>
			<div class="home_content_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="home_content">
								<div class="home_title">{{ $item->category->title ?? 'Разное' }}<span>.</span></div>
								<div class="home_text"><p>{{ $item->category->description ?? 'В данном разделе представленны товары без категории' }}</p></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <!-- Product Details -->

    <div class="product_details">
		<div class="container">
			<div class="row details_row">

				<!-- Product Image -->
				<div class="col-lg-6">
					<div class="details_image">
                        @php
                            $image = '';

                            if(count($item->images) > 0){
                                $image = '/storage/' . $item->images[0]['img'];
                            }else{
                                $image = '/images/no_image.png';
                            }

						@endphp
						<div class="details_image_large"><img src="{{ $image }}" alt="{{ $item->title }}">
							@if(!empty($item->category))
								<div class="product_extra product_new"><a href="{{ route('showCategory', $item->category->alias) }}">{{ $item->category->title }}</a></div>
							@endif
						</div>
						<div class="details_image_thumbnails d-flex flex-row align-items-start justify-content-between">
                            @if($image != 'no_image.png')
                                @foreach($item->images as $img)
                                    @if($loop->first)
                                        <div class="details_image_thumbnail active" data-image="{{ '/storage/' . $img['img'] }}"><img src="{{ '/storage/' . $img['img'] }}" alt="{{ $item->title }}"></div>
                                    @else
                                        <div class="details_image_thumbnail" data-image="{{ '/storage/' .$img['img'] }}"><img src="{{ '/storage/' . $img['img'] }}" alt="{{ $item->title }}"></div>
                                    @endif
                                @endforeach
                            @endif
						</div>
					</div>
				</div>

				<!-- Product Content -->
				<div class="col-lg-6">
					<div class="details_content">
                        <div class="details_name" id="details_name" data-id="{{ $item->id }}">{{ $item->title }}</div>
                        @if($item->new_price != null)
						    <div class="details_discount">{{ $item->price }} р.</div>
                            <div class="details_price">{{ $item->new_price }} р.</div>
                        @else
                            <div class="details_price">{{ $item->price }} р.</div>
                        @endif
						<!-- In Stock -->
						<div class="in_stock_container">
                            <div class="availability">Наличие:</div>
                            @if($item->is_stoke)
                                <span>Есть на складе</span>
                            @else
                                <span style="color: #cc0000">Под заказ</span>
                            @endif
						</div>
						@if($item->characteristics)
						<div class="details_text">
							<label>Характеристики</label>
							<ul>
								@foreach($item->characteristics as $characteristic)
									<li class="d-flex justify-content-between"><label>{{ $characteristic->name }}:</label> <span>{{ $characteristic->value }}</sapn></li>
								@endforeach
							</ul>
						</div>
						@endif

						<!-- Product Quantity -->
						<div class="product_quantity_container">
							<div class="product_quantity clearfix">
								<span>Шт</span>
								<input id="quantity_input" type="number" pattern="[0-9]*" value="1">
								<div class="quantity_buttons">
									<div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
									<div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
								</div>
							</div>
							<div class="button cart_button" addToCart><button>В корзину</button></div>
						</div>

						<!-- Share -->
						<div class="details_share">
							<span>Поделиться:</span>
							<ul>
								<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="row description_row">
				<div class="col">
					<div class="description_title_container">
						<div class="description_title">Описание</div>
						<div class="reviews_title"><a href="#">Отзывы <span>(1)</span></a></div>
					</div>
					<div class="description_text">
						<p>{{ $item->description }}</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Products -->

	<div class="products">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="products_title">Аналогичные продукты</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					
					<div class="product_grid">

						@foreach($analogs as $product)
							@php
								$image = '';

								if(count($product->images) > 0){
									$image = $product->images[0]['img'];
								}else{
									$image = '/images/no_image.png';
								}

							@endphp
                        <!-- Product -->
						<div class="product">
							<div class="product_image"><img src="{{ $image }}" alt=""></div>
							@if(!empty($product->category))
								<div class="product_extra product_new"><a href="{{ route('showCategory', $product->category->alias) }}">{{ $product->category->title }}</a></div>
							@endif
							<div class="product_content">
								<div class="product_title"><a href="{{ route('showProduct', [$item->category->alias ?? 'different', $product->alias]) }}">{{ $product->title }}</a></div>
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
				</div>
			</div>
		</div>
	</div>
@endsection
@section('custom_js')
	<script src="/js/product.js"></script>
	<script>
		$(document).ready(function(){
			$('[addToCart]').click((event)=>{
				addToCart();
				event.preventDefault();
			});
		});

		function addToCart(){
			let id = $('#details_name').data('id');
			let qty = parseInt($('#quantity_input').val());

			$.ajax({
                url: "{{route('cart.addItem')}}",
                type: "POST",
                data: {
					id: id,
                    qty: qty
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				success: () => {
					let total_qty = parseInt($('#cart-qty').text());
					total_qty += qty;
					$('#cart-qty').text(total_qty);
				}
			});

			$('#quantity_input').val(1);
		}
	</script>
@endsection