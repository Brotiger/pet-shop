@extends('layouts.main')
@section('title', 'SamaraComp - ' . $cat->title)
@section('custom_css')
    <link rel="stylesheet" type="text/css" href="/styles/categories.css">
    <link rel="stylesheet" type="text/css" href="/styles/categories_responsive.css">
@endsection
@section('content')
<!-- Home -->

<div class="home">
		<div class="home_container">
			<div class="home_background" style="background-image:url(/images/{{ $cat->img }})"></div>
			<div class="home_content_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="home_content">
								<div class="home_title">{{ $cat->title }}<span>.</span></div>
								<div class="home_text"><p>{{ $cat->description }}</p></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Products -->

	<div class="products">
		<div class="container">
			<div class="row">
				<div class="col">
					
					<!-- Product Sorting -->
					<div class="sorting_bar d-flex flex-md-row flex-column align-items-md-center justify-content-md-start">
						<div class="results">Найдено <span>{{ $cat->products->count() }}</span> позиций</div>
						<div class="sorting_container ml-md-auto">
							<div class="sorting">
								<ul class="item_sorting">
									<li>
										<span class="sorting_text">Сортировка</span>
										<i class="fa fa-chevron-down" aria-hidden="true"></i>
										<ul>
											<li class="product_sorting_btn" data-order="default"><span>По умолчанию</span></li>
											<li class="product_sorting_btn" data-order="price-low-high"><span>Цена: Низкая - Высокая</span></li>
											<li class="product_sorting_btn"  data-order="price-high-low"><span>Цена: Высокая - Низкая</span></li>
											<li class="product_sorting_btn" data-order="name-a-z"><span>Название: А - Я</span></li>
											<li class="product_sorting_btn" data-order="name-z-a"><span>Название: Я - A</span></li>
										</ul>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col" product_container>
					<div class="product_grid">
                        @foreach($products as $product)
							@php
								$image = '';

								if(count($product->images) > 0){
									$image = $product->images[0]['img'];
								}else{
									$image = 'no_image.png';
								}

							@endphp
                        <!-- Product -->
						<div class="product">
							<div class="product_image"><img src="/images/{{ $image }}" alt=""></div>
							<div class="product_extra product_new"><a href="{{ route('showCategory', $product->category->alias) }}">{{ $product->category->title }}</a></div>
							<div class="product_content">
								<div class="product_title"><a href="{{ route('showProduct', [$product->category->title, $product->alias]) }}">{{ $product->title }}</a></div>
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
				</div>
			</div>
		</div>
	</div>
@endsection
@section('custom_js')
    <script>
        $(document).ready(function(){
            $(".sorting_text").text($("[data-order={{ isset($_GET['orderBy'])? $_GET['orderBy'] : 'default' }}]").text());

            $('.product_sorting_btn').click(function(){
                let orderBy = $(this).data('order')
                $('.sorting_text').text($(this).find('span').text());
                
                $.ajax({
                    url: "{{route('showCategory', $cat->alias)}}",
                    type: "GET",
                    data: {
                        orderBy: orderBy,
                        page: {{ isset($_GET['page']) ? $_GET['page'] : 1 }},
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: (data) => {
                        let positionParameters = location.pathname.indexOf('?');
                        let url = location.pathname.substring(positionParameters, location.pathname.length);
                        let newUrl = url + '?';
                        newUrl += 'orderBy=' + orderBy + "&page={{ isset($_GET['page']) ? $_GET['page'] : 1 }}";
                        history.pushState({}, '', newUrl);

                        $('[product_container]').html(data)
                        //$('[product_container]').isotope('destroy')
                        $('[product_container] .product_grid').imagesLoaded( function() {
                            let grid = $('[product_container] .product_grid').isotope({
                                itemSelector: '.product',
                                layoutMode: 'fitRows',
                                fitRows:
                                    {
                                        gutter: 30
                                    }
                            });
                        });
                    }
                });
            });
        });
    </script>
@endsection