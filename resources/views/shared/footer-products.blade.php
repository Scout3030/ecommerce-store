@for($j=1; $j < (count($products)/3 + 1); $j++)
  <div class="col-sm-6 col-xl-3 mb-4 mb-xl-0">
    @if(count($products)/($j*3) >= 1)
    <div class="single-search-product-wrapper">
      @for($i = ($j*3) - 3; $i < $j*3; $i++)
      <div class="single-search-product d-flex">
        <a href="{{route('product.show', $products[$i]->slug)}}" target="_BLANK"><img src="{{asset('assets/img/product/product-sm-1.png')}}" alt=""></a>
        <div class="desc">
          <a href="{{route('product.show', $products[$i]->slug)}}" class="title" target="_BLANK">{{$products[$i]->name}}</a>
          <div class="price">S/{{$products[$i]->price}}</div>
        </div>
      </div>
      @endfor
    </div>
    @else
    <div class="single-search-product-wrapper">
      @for($i = ($j*3) - 3; $i < count($products); $i++)
      <div class="single-search-product d-flex">
        <a href="{{route('product.show', $products[$i]->slug)}}" target="_BLANK"><img src="{{asset('assets/img/product/product-sm-1.png')}}" alt=""></a>
        <div class="desc">
          <a href="{{route('product.show', $products[$i]->slug)}}" class="title" target="_BLANK">{{$products[$i]->name}}</a>
          <div class="price">S/{{$products[$i]->price}}</div>
        </div>
      </div>
      @endfor
    </div>
    @endif
  </div>
  @endfor