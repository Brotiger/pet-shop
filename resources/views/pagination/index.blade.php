@if ($paginator->hasPages())
<div class="product_pagination">
	<ul>
        @foreach($elements as $element)
            @if(is_string($element))
                <li class="disabled">{{ $element }}</li>
            @elseif(is_array($element))
                @foreach($element as $page => $url)
                    @if($page == $paginator->currentPage())
                        <li class="active">{{ str_pad($page, 2, "0", STR_PAD_LEFT) }}.</li>
                    @else
                        <li><a href="{{ $url }}">{{ str_pad($page, 2, "0", STR_PAD_LEFT) }}.</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach
	</ul>
</div>
@endif