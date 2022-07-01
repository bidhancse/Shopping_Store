@extends('frontend.index')
@section('content')


<!--/ Start Slider Area -->
<div>
    <!--Carousel Wrapper-->
    <div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel" style="padding:0px; margin:0px;">
        <!--Indicators-->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-2" data-slide-to="0" class="active" ></li>

            @if(isset($slidermore))
            @for($i=1; $i<=count($slidermore); $i++)

            <li data-target="#carousel-example-2" data-slide-to="{{ $i }}"></li>

            @endfor
            @endif
            
        </ol>

        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <div class="view">
                    <img class="d-block w-100" src="{{url($slideractive->image)}}"
                    alt="First slide">
                    <div class="mask rgba-black-light"></div>
                </div>
                <div class="carousel-caption">
                    {{-- <h3 class="h3-responsive">Light mask</h3>
                    <p>First text</p> --}}
                </div>
            </div>

            @if(isset($slidermore))
            @foreach($slidermore as $sliderview)

            <div class="carousel-item">
                <div class="view">
                    <img class="d-block w-100"  src="{{url($sliderview->image)}}"
                    alt="Second slide">
                    <div class="mask rgba-black-strong"></div>
                </div>
                <div class="carousel-caption">
                {{--  <h3 class="h3-responsive">Strong mask</h3>
                <p>Secondary text</p> --}}
            </div>
        </div>

        @endforeach
        @endif

    </div>
</div>
</div>
<!--/ End Slider Area -->


<!--/ Start Categories Area -->

<div class="col-md-12 pt-5" style="background-color: #fff;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2><span  style="font-size: 23px;">Shop By Categories </span><br>
                        <span style="font-size: 14px; color: gray; font-family: Calibri; margin-top: -5px;">Get Your Product from Category</span>
                    </h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-sm-12 col-12 pb-5" style="background-color: #fff;">
    <div class="container-fluid" style="padding-top:8px;">
        <div class="col-sm-12 col-12 p-0">
            <div class="row" id="showproduct-130">

                @if(isset($item))
                @foreach($item as $itemshow)
                @php 
                $ProductCount = DB::table('productinformation')->where('item_id',$itemshow->id)->get();
                @endphp

                <div class="p-2 col-lg-2 col-md-3 col-sm-4 col-6" >
                    <div class="homeproducts">
                        <center>
                            <a href="{{ url('item/'.$itemshow->id) }}">

                                @if(isset($itemshow->image))
                                <img src="{{ url($itemshow->image) }}"
                                class="img-fluid" style="z-index:1; max-height: 120px;">
                                @endif

                            </a>
                        </center>

                        <div class="text-center">
                            <a href="{{ url('item/'.$itemshow->id) }}">
                                {{ $itemshow->item_name }}<br>
                                {{ count($ProductCount) }} Product's
                            </a>
                        </div>
                    </div>
                </div>

                @endforeach
                @endif

            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
<!--/ End Categories Area -->


<!--/ Start Product Area -->

@if(isset($category))
@foreach( $category as $categoryshow)

@php
$products = DB::table('productinformation')->where('category_id',$categoryshow->id)->first();
@endphp

@if($products)

<div class="col-md-12 pt-5" style="background-color: #f2fff5;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12" style="margin-top: -35px;">
                <div class="section-title">
                    <h2>{{ $categoryshow->category_name}}</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-sm-12 col-12 pb-5" style="background-color: #f2fff5;">
    <div class="container-fluid" style="margin-top: -27px;">
        <div class="col-sm-12 col-12 p-0">
            <div class="row" id="showproduct-130">

                @php
                $product = DB::table('productinformation')->where('category_id',$categoryshow->id)->inRandomOrder()->limit(6)->get();
                @endphp

                @if(isset($product))
                @foreach($product as $Productshow)
                @if($categoryshow->id == $Productshow->category_id)

                <div class="col-lg-2 cl-md-4 col-sm-6 col-6 mt-4" >
                    <div class="homeproducts">

                        @php
                        $dis_percentig = $Productshow->discount_price / $Productshow->sale_price*100;
                        @endphp

                        @if(isset($Productshow->discount_price))
                        <span class="mark" style="margin-left: 0px; padding: 3px 10px 3px 10px; background-color: #00c431; color: #fff;">{{ceil($dis_percentig)}} % OFF</span>
                        @else
                        <span class="mark1" style="margin-left: -18px;"></span>
                        @endif
                        <center>
                            <a
                            href="{{ url('product/'.$Productshow->id) }}">

                            @if(isset($Productshow->image))
                            <img src="{{ url($Productshow->image) }}"
                            class="img-fluid" style="z-index:1;">
                            @endif

                        </a>
                    </center>

                    <div class="text-center">
                        <a
                        href="{{ url('product/'.$Productshow->id) }}">
                        @php
                        $content = substr($Productshow->product_name,0,20);
                        $sale_price = $Productshow->sale_price;
                        $dis_price = $Productshow->discount_price;
                        $present_price = $sale_price-$dis_price;
                        @endphp

                        {!! $content !!}<br>

                        <span style="font-size: 15px;">
                            @if(isset($dis_price))
                            <del>{{$Productshow->sale_price}}</del> &nbsp;&nbsp;
                            @endif

                            Tk {{$present_price}}.00
                        </span>
                    </a>
                </div>
            </div>
        </div>

        @endif
        @endforeach
        @endif

    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

@else
@endif

@endforeach
@endif

<!-- End Product Area  -->

{{-- <!-- Start Small Banner  -->
<section class="small-banner section">
    <div class="container-fluid">
        <div class="row">
            <!-- Single Banner  -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="single-banner">
                    <img src="https://via.placeholder.com/600x370" alt="#">
                    <div class="content">
                        <p>Man's Collectons</p>
                        <h3>Summer travel <br> collection</h3>
                        <a href="#">Discover Now</a>
                    </div>
                </div>
            </div>
            <!-- /End Single Banner  -->
            <!-- Single Banner  -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="single-banner">
                    <img src="https://via.placeholder.com/600x370" alt="#">
                    <div class="content">
                        <p>Bag Collectons</p>
                        <h3>Awesome Bag <br> 2020</h3>
                        <a href="#">Shop Now</a>
                    </div>
                </div>
            </div>
            <!-- /End Single Banner  -->
            <!-- Single Banner  -->
            <div class="col-lg-4 col-12">
                <div class="single-banner tab-height">
                    <img src="https://via.placeholder.com/600x370" alt="#">
                    <div class="content">
                        <p>Flash Sale</p>
                        <h3>Mid Season <br> Up to <span>40%</span> Off</h3>
                        <a href="#">Discover Now</a>
                    </div>
                </div>
            </div>
            <!-- /End Single Banner  -->
        </div>
    </div>
</section>
<!-- End Small Banner --> --}}



<!-- Start Shop Services Area -->
<section class="shop-services section home">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-rocket"></i>
                    <h4>Free Shipping</h4>
                    <p>Orders over 2000 Tk</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-reload"></i>
                    <h4>Free Return</h4>
                    <p>Within 30 days returns</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-lock"></i>
                    <h4>Sucure Payment</h4>
                    <p>100% secure payment</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-tag"></i>
                    <h4>Best price</h4>
                    <p>Guaranteed price</p>
                </div>
                <!-- End Single Service -->
            </div>
        </div>
    </div>
</section>
<!-- End Shop Services Area -->



@endsection



