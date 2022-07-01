@extends('frontend.index')
@section('content')



<div class="col-sm-12 col-12 pb-5" style="background-color: #fff;">
	<div class="container-fluid" style="padding-top:8px;">

		<div class="col-sm-12 col-12 p-0">
			<div class="row" id="showproduct-130">



				@if(isset($Allproduct))
				@foreach($Allproduct as $Productshow)

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

		@endforeach
		@endif

	</div>
</div>


<div class="row">
	<div class="col-sm-12 col-12 mt-5" >
		<nav>
			<center>
				<ul class="pagination" style="color: black;">
					{{ $Allproduct->links() }}
				</ul>
			</center>
		</nav>
	</div>
</div>

</div>
</div>






@endsection


