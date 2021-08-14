@extends('layouts.main')
@section('title', 'корзина')
@section('custom_css')
    <link rel="stylesheet" type="text/css" href="styles/cart.css">
    <link rel="stylesheet" type="text/css" href="styles/cart_responsive.css">
@endsection
@section('content')
    <!-- Home -->

	<div class="home">
		<div class="home_container">
			<div class="home_background" style="background-image:url(images/cart.jpg)"></div>
			<div class="home_content_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="home_content">
								<div class="breadcrumbs">
									<ul>
										<li><a href="{{ route('home') }}">Главная</a></li>
										<li>Корзина</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Cart Info -->

	<div class="cart_info">
		<div class="container">
			<div class="row">
				<div class="col">
					<!-- Column Titles -->
					<div class="cart_info_columns clearfix">
						<div class="cart_info_col cart_info_col_product">Товар</div>
						<div class="cart_info_col cart_info_col_price">Цена</div>
						<div class="cart_info_col cart_info_col_quantity">Количество</div>
						<div class="cart_info_col cart_info_col_total">Итого</div>
					</div>
				</div>
			</div>
			<div class="row cart_items_row">
				<div class="col" id="goodsTotal">
					
					@foreach($products as $product)
					<!-- Cart Item -->
					<div class="cart_item d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start" cart_item>
						<!-- Name -->
						<div class="cart_item_product d-flex flex-row align-items-center justify-content-start">
							<div class="cart_item_image">
								<div><img src="images/{{ $product->attributes->img }}" alt="{{ $product->title }}"></div>
							</div>
							<div class="cart_item_name_container">
								<div class="cart_item_name"><a href="{{ route('showProduct', [$product->attributes->category, $product->attributes->alias]) }}">{{ $product->name }}</a></div>
								<div class="cart_item_edit"><button deleteFromCart="{{ $product->id }}">Убрать из корзины</button></div>
							</div>
						</div>
						<!-- Price -->
						<div class="cart_item_price">{{ $product->price }} р.</div>
						<!-- Quantity -->
						<div class="cart_item_quantity">
							<div class="product_quantity_container">
								<div class="product_quantity clearfix">
									<span>шт</span>
									<input quantity_input type="number" pattern="[0-9]*" value="{{ $product->quantity }}" qty-id="{{ $product->id }}">
									<div class="quantity_buttons">
										<div quantity_inc_button class="quantity_inc quantity_control"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
										<div quantity_dec_button class="quantity_dec quantity_control"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
									</div>
								</div>
							</div>
						</div>
						<!-- Total -->
						<div class="cart_item_total"><span item_total_id='{{ $product->id }}'>{{ $product->price *  $product->quantity }}</span> <span>р.</span></div>
					</div>
					@endforeach
				</div>
			</div>
			<div class="row row_cart_buttons">
				<div class="col">
					<div class="cart_buttons d-flex flex-lg-row flex-column align-items-start justify-content-start">
						<div class="button continue_shopping_button"><button id="clearCart">Очистить корзину</button></div>
					</div>
				</div>
			</div>
			<div class="row row_extra">
				<div class="col-lg-4">
					
					<!-- Delivery -->
					<div class="delivery">
						<div class="section_title">Тип получения</div>
						<div class="section_subtitle">Выбирите один </div>
						<div class="delivery_options" id="delivery_block">
							<label class="delivery_option clearfix">Доставка
								<input type="radio" name="radio" value="1500" id="delivery" {{ isset($_SESSION['delivery'])? 'checked' : '' }}>
								<span class="checkmark"></span>
								<span class="delivery_price">1500 р.</span>
							</label>
							<label class="delivery_option clearfix">Самовывоз
								<input type="radio" name="radio" value="0" id="no_delivery" {{ isset($_SESSION['delivery'])? '' : 'checked' }}>
								<span class="checkmark"></span>
								<span class="delivery_price">0 р.</span>
							</label>
						</div>
					</div>

					<!-- Coupon Code -->
					<div class="coupon">
						<div class="section_title">Купон на скидку</div>
						<div class="section_subtitle">Введите ваш купон на скидку</div>
						<div class="coupon_form_container">
							<form action="#" id="coupon_form" class="coupon_form">
								<input type="text" class="coupon_input" required="required">
								<button class="button coupon_button"><span>Применить</span></button>
							</form>
						</div>
					</div>
				</div>

				<div class="col-lg-6 offset-lg-2">
					<div class="cart_total">
						<div class="section_title">Итого к оплате</div>
						<div class="section_subtitle">Окончательная инфломация о заказе</div>
						<div class="cart_total_container">
							<ul>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="cart_total_title">Стоимость</div>
									<div class="cart_total_value ml-auto"><span id="sub_total">{{ isset($_SESSION['cart_id'])? \Cart::session($_SESSION['cart_id'])->getSubTotal() : 0 }}</span> р.</div>
								</li>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="cart_total_title">Доставка</div>
									<div class="cart_total_value ml-auto"><span id="delivery_total">{{ isset($_SESSION['delivery'])? '1500' : '0' }}</span> р.</div>
								</li>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="cart_total_title">Всего</div>
									<div class="cart_total_value ml-auto"><span id="cart_total">{{ $total }}</span> р.</div>
								</li>
							</ul>
						</div>
						<div class="button checkout_button"><button>Перейти к оформлению заказа</button></div>
					</div>
				</div>
			</div>
		</div>		
	</div>
@endsection
@section('custom_js')
	<script src="/js/cart.js"></script>
	<script>
		$(document).ready(function(){
			var clear = clearCart();

			$('#clearCart').click(()=>{
				clear();
			});

			var checkDelivery = @php echo isset($_SESSION['delivery'])? 0 : 1 @endphp;
			var checkNoDelivery = @php echo isset($_SESSION['delivery'])? 1 : 0 @endphp;;
			$('#delivery_block input[name="radio"]').click(() => {
				$('#delivery_total').text($('#delivery_block input[name="radio"]:checked').val());
				if($("#delivery").prop("checked")){
					if(checkDelivery){
						addDelivery();
						checkNoDelivery = true;
						checkDelivery = false;
					}
				}else if($("#no_delivery").prop("checked")){
					if(checkNoDelivery){
						deleteDelivery();
						checkNoDelivery = false;
						checkDelivery = true;
					}
				}
			});

			$('[deleteFromCart]').click(function(){
				$(this).parents('[cart_item]').remove();
				deleteItemId = $(this).attr('deleteFromCart');

				$.ajax({
					url: "{{ route('cart.deleteItem') }}",
					type: "PATCH",
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					data: {
						id: deleteItemId
					},
					success: (data) => {
						$("#cart_total").text(data.total);
						$("#sub_total").text(data.subTotal);
						$('#cart-qty').text(data.cartQty);
					}
				});
			});

			if($('.product_quantity').length)
			{
				var incButton = $('[quantity_inc_button]');
				var decButton = $('[quantity_dec_button]');

				incButton.on('click', function()
				{
					let valueBtn = $(this).parents('.quantity_buttons').prev('[quantity_input]');
					valueBtn.val(parseInt(valueBtn.val()) + 1);
					incQty(valueBtn.attr('qty-id'));
				});

				decButton.on('click', function()
				{
					let valueBtn = $(this).parents('.quantity_buttons').prev('[quantity_input]');
					if(valueBtn.val() > 1){
						valueBtn.val(parseInt(valueBtn.val()) - 1);
						decQty(valueBtn.attr('qty-id'));
					}
				});
			}

			function clearCart(){
				@php
					if(\Cart::session($_SESSION['cart_id'])->getTotalQuantity()){
						$clearCart = 1;
					}else{
						$clearCart = 0;
					}
				@endphp
				var clearCart = {{ $clearCart }};

				return function(){
					if(clearCart){
						$('#cart-qty').text(0);
						$.ajax({
							url: "{{ route('cart.clear') }}",
							type: "DELETE",
							headers: {
								'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							},
							success: (data) => {
								$("#sub_total").text(data.subTotal);
								$("#cart_total").text(data.total);
								$('#goodsTotal').html('');
							}
						});

						clearCart = false;
					}
					return clearCart;
				}
			}

			function addDelivery(){
				$.ajax({
					url: "{{ route('delivery.add') }}",
					type: "POST",
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					success: (data) =>{
						$("#cart_total").text(data.total);
					}
				});
			}

			function deleteDelivery(){
				$.ajax({
					url: "{{ route('delivery.delete') }}",
					type: "DELETE",
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					success: (data) =>{
						$("#cart_total").text(data.total);
					}
				});
			}

			function incQty(id, quantity){
				$.ajax({
					url: "{{ route('qty.inc') }}",
					type: "PATCH",
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					data: {
						id: id,
						quantity: quantity
					},
					success: (data) =>{
						$(`[item_total_id=${id}]`).text(data.itemTotal);
						$("#sub_total").text(data.subTotal);
						$("#cart_total").text(data.total);
						$('#cart-qty').text(data.cartQty);
					}
				});
			}

			function decQty(id, quantity){
				$.ajax({
					url: "{{ route('qty.dec') }}",
					type: "PATCH",
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					data: {
						id: id,
					},
					success: (data) =>{
						$(`[item_total_id=${id}]`).text(data.itemTotal);
						$("#sub_total").text(data.subTotal);
						$("#cart_total").text(data.total);
						$('#cart-qty').text(data.cartQty);
					}
				});
			}
		});
	</script>
@endsection