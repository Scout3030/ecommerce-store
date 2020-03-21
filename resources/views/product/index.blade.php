@extends('layouts.app')

@section('content')

@include('shared.breadcrumb', ['title' => 'Tienda'])


<!-- ================ category section start ================= -->
<section class="section-margin--small mb-5">
<div class="container">
  <div class="row">
    <div class="col-xl-3 col-lg-4 col-md-5">
      <categories-filter></categories-filter>
      <colors-filter></colors-filter>
    </div>
    <div class="col-xl-9 col-lg-8 col-md-7">
      <!-- Start Filter Bar -->
      <searcher-component></searcher-component>
      <!-- End Filter Bar -->
      <!-- Start Best Seller -->
      <section class="lattest-product-area pb-40 category-list">

        <filter-component></filter-component>

      </section>
      <!-- End Best Seller -->
    </div>
  </div>
</div>
</section>
<!-- ================ category section end ================= -->

<!-- ================ top product area start ================= -->
<section class="related-product-area">
	<div class="container">
		<div class="section-intro pb-60px">
    <p>Productos más populares</p>
    <h2>Productos <span class="section-intro__style"> Top</span></h2>
  </div>
		<div class="row mt-30">

      @include('shared.footer-products', $products = $topProducts)

    </div>
	</div>
</section>
<!-- ================ top product area end ================= -->

<!-- ================ Subscribe section start ================= -->
@include('shared.newsletter')
<!-- ================ Subscribe section end ================= -->

@endsection

@push('scripts')
<script src="{{asset('assets/vendors/nouislider/nouislider.min.js')}}"></script>
@endpush