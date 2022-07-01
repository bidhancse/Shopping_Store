@extends('frontend.index')
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>

    .card {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0, 0, 0, 0.1);
        border-radius: 0.10rem
    }

    .card-header:first-child {
        border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
    }

    .card-header {
        padding: 0.75rem 1.25rem;
        margin-bottom: 0;
        background-color: #fff;
        border-bottom: 1px solid rgba(0, 0, 0, 0.1)
    }

    .track {
        position: relative;
        background-color: #ddd;
        height: 7px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        margin-bottom: 70px;
        margin-top: 50px
    }

    .track .step {
        -webkit-box-flex: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
        width: 25%;
        margin-top: -18px;
        text-align: center;
        position: relative
    }

    .track .step.active:before {
        background: #00c431
    }

    .track .step::before {
        height: 7px;
        position: absolute;
        content: "";
        width: 100%;
        left: 0;
        top: 18px
    }

    .track .step.active .faicon {
        background: #00c431;
        color: #000;
    }

    .track .faicon {
        display: inline-block;
        width: 40px;
        height: 40px;
        line-height: 40px;
        position: relative;
        border-radius: 100%;
        background: #ddd
    }

    .track .step.active .text {
        font-weight: 400;
        color: #000
    }

    .track .text {
        display: block;
        margin-top: 7px
    }

    .itemside {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        width: 100%
    }

    .itemside .aside {
        position: relative;
        -ms-flex-negative: 0;
        flex-shrink: 0
    }

    .img-sm {
        width: 80px;
        height: 80px;
        padding: 7px
    }

    ul.row,
    ul.row-sm {
        list-style: none;
        padding: 0
    }

    .itemside .info {
        padding-left: 15px;
        padding-right: 7px
    }

    .itemside .title {
        display: block;
        margin-bottom: 5px;
        color: #212529
    }

    p {
        margin-top: 0;
        margin-bottom: 1rem
    }

    .btn-warning {
        color: #ffffff;
        background-color: #ee5435;
        border-color: #ee5435;
        border-radius: 1px
    }

    .btn-warning:hover {
        color: #ffffff;
        background-color: #ff2b00;
        border-color: #ff2b00;
        border-radius: 1px
    }
</style>

<div class="container" style="margin-top: 50px; margin-bottom: 50px; background-color: white;">
    <article class="card">
        <header class="card-header"> My Orders / Tracking </header>
        <div class="card-body">
            <h6>INVOICE ID#: OD00{{$Order->id}}</h6>
            <article class="card">
                <div class="card-body row">
                    <div class="col"> <strong>Estimated Delivery time:</strong> <br>29 nov 2019 </div>
                    <div class="col"> <strong>Shipping BY:</strong> <br> BLUEDART, | <i class="fa fa-phone"></i> +1598675986 </div>
                    <div class="col"> <strong>Status:</strong> <br>
                     @if($Order->status==0)
                     <p>Order Panding</p>
                     @elseif($Order->status==1)
                     <p>Order Processing</p>
                     @elseif($Order->status==2)
                     <p>Order Shipping</p>
                     @elseif($Order->status==3)
                     <p>Order Completd</p>
                     @endif
                 </div>
                 <div class="col"> <strong>Tracking #:</strong> <br> BD045903594059 </div>
             </div>
         </article>
         <div class="track">
            @if($Order->status==0)
            @include('frontend.user.ordertrack.pending')

            @elseif($Order->status==1)
            @include('frontend.user.ordertrack.processing')

            @elseif($Order->status==2)
            @include('frontend.user.ordertrack.shipped')

            @elseif($Order->status==3)
            @include('frontend.user.ordertrack.completd')

            @endif
        </div>
        <hr>
        <ul class="row">
            @php
            $total=0;
            @endphp

            @if(isset($OrderData))
            @foreach($OrderData as $OrderDataShow)
            @php
            $total += $OrderDataShow->total_price;
            @endphp

            <li class="col-md-4">
                <figure class="itemside mb-3">
                    <div class="aside"><img src="{{url($OrderDataShow->image)}}" class="img-sm border"></div>
                    <figcaption class="info align-self-center">
                        <p class="title">{{ $OrderDataShow->product_name }}</p> <span class="text-muted">{{ $OrderDataShow->total_price }}.00 TK </span>
                    </figcaption>
                </figure>
            </li>
            @endforeach
            @endif
        </ul>

         <h5>Total Amount : {{  $total }}.00 Tk</h5>
         
        <hr> 
        <a href="{{url('allorder')}}" class="btn" style="background-color: #000; color: #fff; border-radius: 0px;"> Back to orders</a>

    </div>
</article>
</div>
@endsection


