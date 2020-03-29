@foreach ($products->chunk(3) as $chunk)
  <div class="col-sm-6 col-xl-3 mb-4 mb-xl-0">
    <div class="single-search-product-wrapper">
      @foreach ($chunk as $product)
      <div class="single-search-product d-flex">
        <a href="{{route('product.show', $product->slug)}}" target="_BLANK"><img src="{{$product->pathAttachment()}}" alt=""></a>
        <div class="desc">
          <a href="{{route('product.show', $product->slug)}}" class="title" target="_BLANK">{{$product->name}}</a>
          <div class="price">S/{{$product->price}}</div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
@endforeach
