@extends('layouts.web-master')
@section('web-content')
<section id="custom-product" class="custom-product">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-12">
                <h2 class="custom-product-title text-uppercase">Featured Menu</h2>
            </div>
        </div>
        <div class="row">
            @foreach($category as $item)
            <div class="col-md-3 col-sm-6 col-12 padding-bottom-24">
                <div class="custom-img">
                    <a class="img-anchor" href="{{ route('submenu', $item->id) }}">
                        <img src="{{ asset($item->image) }}" alt="{{ $item->name }}">
                        <div class="img-button">
                        </div>
                    </a>
                    <div class="category-title">{{ $item->name }}</div>
                    <a href="{{ route('submenu', $item->id) }}" class="button-1-a">
                        <button class="button-1 ubtn">
                            <span class="ubtn-hover"></span>
                            <span class="ubtn-data ubtn-text">See More</span>
                        </button>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- <section id="product-filter" class="product-filter bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="button-group filter-button-group button-mod-group">
                    <button data-filter="*">Show all</button>
                    <button data-filter=".mug">Mug</button>
                    <button data-filter=".key-chain">Key Ring</button>
                    <button data-filter=".phone-case">Phone Case</button>
                    <button data-filter=".phone">Phone</button>
                    <button data-filter=".wallet">Wallet</button>
                </div>
            </div>
        </div>
        <div class="row grid">
            <div class="col-md-3 element-item m-mod-b ">
                <div class="img-box">
                    <a class="img-link" href="{{ asset('website/image/Product Filter/147655826_699793890703464_7899776114437445081_n-1.webp') }}"></a>
                    <img src="{{ asset('website/image/Product Filter/147655826_699793890703464_7899776114437445081_n-1.webp') }}" alt="">
                </div>
            </div>
            <div class="col-md-3 element-item m-mod-b phone-case">
                <div class="img-box">
                    <a class="img-link" href="{{ asset('website/image/Product Filter/34-2.webp') }}"></a>
                    <img src="{{ asset('website/image/Product Filter/Phone_Case_4-2.webp') }}" alt="">
                </div>
            </div>
            <div class="col-md-3 element-item m-mod-b phone-case">
                <div class="img-box">
                    <a class="img-link" href="{{ asset('website/image/Product Filter/PhoneCase10-1.webp') }}"></a>
                    <img src="{{ asset('website/image/Product Filter/PhoneCase10-1.webp') }}" alt="">
                </div>
            </div>
            <div class="col-md-3 element-item m-mod-b phone-case">
                <div class="img-box">
                    <a class="img-link" href="{{ asset('website/image/Product Filter/PhoneCase9-2.webp') }}"></a>
                    <img src="{{ asset('website/image/Product Filter/PhoneCase9-2.webp') }}" alt="">
                </div>
            </div>
            <div class="col-md-3 element-item m-mod-b key-chain">
                <div class="img-box">
                    <a class="img-link" href="{{ asset('website/image/Product Filter/Heart-Shape-Front.webp') }}"></a>
                    <img src="{{ asset('website/image/Product Filter/Heart-Shape-Front.webp') }}" alt="">
                </div>
            </div>
            <div class="col-md-3 element-item m-mod-b mug">
                <div class="img-box">
                    <a class="img-link" href="{{ asset('website/image/Product Filter/Mug-11.webp') }}"></a>
                    <img src="{{ asset('website/image/Product Filter/Mug-11.webp') }}" alt="">
                </div>
            </div>
            <div class="col-md-3 element-item m-mod-b phone">
                <div class="img-box">
                    <a class="img-link" href="{{ asset('website/image/Product Filter/s5.webp') }}"></a>
                    <img src="{{ asset('website/image/Product Filter/s5.webp') }}" alt="">
                </div>
            </div>
            <div class="col-md-3 element-item m-mod-b wallet">
                <div class="img-box">
                    <a class="img-link" href="{{ asset('website/image/Product Filter/Customized-Wallet-Green.webp') }}"></a>
                    <img src="{{ asset('website/image/Product Filter/Customized-Wallet-Green.webp') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</section> --}}
{{-- @php
    dd($category);
@endphp --}}

{{-- <section id="product-filter" class="product-filter bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav>
                    <div class="nav nav-tabs wow slideInLeft" id="nav-tab" role="tablist" data-wow-duration="1s">
                      <button class="nav-link active" id="nav-all-tab" data-bs-toggle="tab" data-bs-target="#nav-all" type="button" role="tab" aria-controls="nav-all" aria-selected="true">Show All</button>
                      @foreach($category as $item)
                        @if(count($item->product)>0)
                         <button class="nav-link" id="nav-{{ $item->id }}-tab" data-bs-toggle="tab" data-bs-target="#nav-{{ $item->id }}" type="button" role="tab" aria-controls="nav-{{ $item->id }}" aria-selected="false">{{ $item->name }}</button>
                        @endif
                      @endforeach
                      {{-- <button class="nav-link" id="nav-ring-tab" data-bs-toggle="tab" data-bs-target="#nav-ring" type="button" role="tab" aria-controls="nav-ring" aria-selected="false">Key Ring</button>
                      <button class="nav-link" id="nav-wallet-tab" data-bs-toggle="tab" data-bs-target="#nav-wallet" type="button" role="tab" aria-controls="nav-wallet" aria-selected="false">Wallet</button>
                      <button class="nav-link" id="nav-case-tab" data-bs-toggle="tab" data-bs-target="#nav-case" type="button" role="tab" aria-controls="nav-case" aria-selected="false">Phone Case</button> 
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                        <div class="row">
                            @foreach($product->take(12) as $item)
                            <div class="col-md-3 col-sm-6 element-item m-mod-b">
                                <div class="img-box">
                                    <a class="img-link" href="{{ asset( $item->image ) }}" title="{{ $item->name }}"></a>
                                    <img src="{{ asset( $item->image ) }}" alt="{{ $item->name }}">
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @foreach($category as $item)   
                    <div class="tab-pane fade" id="nav-{{ $item->id }}" role="tabpanel" aria-labelledby="nav-{{$item->id}}-tab" tabindex="0">
                        <div class="row">
                            @if(count($item->product)>0)
                                @foreach($item->product as $item2)
                                <div class="col-md-3 col-sm-6 element-item m-mod-b wallet">
                                    <div class="img-box">
                                        <a class="img-link" href="{{ asset( $item2->image ) }}" title="{{ $item2->name }}"></a>
                                        <img src="{{ asset( $item2->image ) }}" alt="{{ $item2->name }}">
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section> --}}

<section id="best-choice" class="custom-product">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-12">
                <h2 class="custom-product-title text-uppercase">New Product</h2>
            </div>
        </div>
        <div class="row">
            @foreach($product->take(4) as $item)
            <div class="col-md-3 col-sm-6 col-12 padding-bottom-24">
                <div class="custom-img">
                    <a class="img-anchor" href="{{ route('productDetail', $item->id) }}">
                        <img src="{{ asset($item->image) }}" alt="{{ $item->name }}">
                    </a>
                </div>
            </div>
            @endforeach
            {{-- <div class="col-md-3 col-12 padding-bottom-24">
                <div class="custom-img">
                    <a class="img-anchor" href="{{ route('productDetail') }}">
                        <img src="{{ asset('website/image/category/category-2.webp') }}" alt=""  style="height: 316px">
                    </a>
                </div>
            </div> --}}
            {{-- <div class="col-md-3 col-12 padding-bottom-24">
                <div class="custom-img">
                    <a class="img-anchor" href="{{ route('productDetail') }}">
                        <img src="{{ asset('website/image/category/category-3.webp') }}" alt=""  style="height: 316px">
                    </a>
                </div>
            </div> --}}
            {{-- <div class="col-md-3 col-12 padding-bottom-24">
                <div class="custom-img">
                    <a class="img-anchor" href="{{ route('productDetail') }}">
                        <img src="{{ asset('website/image/category/category-4.webp') }}" alt="" style="height: 316px">
                    </a>
                </div>
            </div> --}}
        </div>
    </div>
</section>

<section id="top-seller" class="custom-product bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-12">
                <h2 class="custom-product-title text-uppercase wow slideInLeft" data-wow-duration="1s">Top Seller</h2>
            </div>
        </div>
        <div class="row">
            @foreach($product->take(4) as $item)
            <div class="col-md-3 col-sm-6 col-12 padding-bottom-24">
                <div class="custom-img">
                    <a class="img-anchor" href="{{ route('productDetail', $item->id) }}">
                        <img src="{{ asset($item->image) }}" alt="{{ $item->name }}">
                    </a>
                </div>
            </div>
            @endforeach
            {{-- <div class="col-md-3 col-12 padding-bottom-24">
                <div class="custom-img">
                    <a class="img-anchor" href="{{ route('productDetail') }}">
                        <img src="{{ asset('website/image/category/category-2.webp') }}" alt=""  style="height: 316px">
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-12 padding-bottom-24">
                <div class="custom-img">
                    <a class="img-anchor" href="{{ route('productDetail') }}">
                        <img src="{{ asset('website/image/category/category-3.webp') }}" alt=""  style="height: 316px">
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-12 padding-bottom-24">
                <div class="custom-img">
                    <a class="img-anchor" href="{{ route('productDetail') }}">
                        <img src="{{ asset('website/image/category/category-4.webp') }}" alt="" style="height: 316px">
                    </a>
                </div>
            </div> --}}
        </div>
    </div>
</section>

@endsection