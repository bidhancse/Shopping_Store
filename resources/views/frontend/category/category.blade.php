@extends('frontend.index')
@section('content')


<div class="col-sm-12 col-12 mt-4 mb-4" style="background-color: #fff;">
	<div class="container-fluid">
		<div class="row">

			<div class="col-lg-2 col-md-12 col-sm-12 col-12 d-none d-sm-block p-0">

				<a href="#" class="list-group-item active text-uppercase" style="border: none; border-radius: 0px; background: black;">
					Sub Category
				</a>

				<ul class="list-group">
					@if(isset($SubCategoryName))
					@foreach($SubCategoryName as $SubCategoryNameshow)
					<li class="list-group-item" style=" border-radius: 0px;">
						<a href="{{url('subcategory/'.$SubCategoryNameshow->id)}}" style="text-decoration:none; color: black;">{{$SubCategoryNameshow->subcategory_name}}</a>
					</li>
					@endforeach
					@endif
				</ul>
			</div>


			<input type="hidden" name="item_id"  id="item_id" value="57">
			<div class="col-lg-10 col-md-12 col-sm-12 col-12">

				<div>
					{{-- <img src="{{asset('public/frontend')}}/images/new_5.jpg" class="img-fluid"><br> --}}

					<ul class="uk-breadcrumb" style="margin-top: -7px;">
						<li style="color: #666;">
							<a href="{{'/eshop'}}" style="color: #666;" class="text-uppercase">Home</a>
							<span class="text-uppercase"> &nbsp;&nbsp; / &nbsp;&nbsp; {{$CategoryName->item_name}}</span>
							<span class="text-uppercase"> &nbsp;&nbsp; / &nbsp;&nbsp; {{$CategoryName->category_name}}</span>
						</li>
					</ul>

				</div>

				<div class="col-sm-12 col-12 p-0" style="margin-top: 4px;">
					<div class="row" id="showproduct-130">

						@if(isset($CategoryProduct))
						@foreach($CategoryProduct as $CategoryProductshow)

						<div class="col-lg-3 cl-md-4 col-sm-6 col-6 mt-4" >
							<div class="homeproducts border">
								
								@php
								$dis_percentig = $CategoryProductshow->discount_price / $CategoryProductshow->sale_price*100;
								@endphp

								@if(isset($CategoryProductshow->discount_price))
								<span class="mark" style="margin-left: 0px; padding: 3px 10px 3px 10px; background-color: #00c431; color: #fff;">{{ceil($dis_percentig)}} % OFF</span>
								@else
								<span class="mark1" style="margin-left: -18px;"></span>
								@endif
								
								<center>
									<a href="{{url('product/'.$CategoryProductshow->id)}}"><img src="{{ url($CategoryProductshow->image) }}" class="img-fluid" style="z-index:1; "></a>
								</center>
								<div>
									<a href=""><center>
										@php
										$content = substr($CategoryProductshow->product_name,0,20);
										$sale_price = $CategoryProductshow->sale_price;
										$dis_price = $CategoryProductshow->discount_price;
										$present_price = $sale_price-$dis_price;
										@endphp

										{!! $content !!}<br>

										<span style="font-size: 15px;">
											@if(isset($dis_price))
											<del>{{$CategoryProductshow->sale_price}}</del> &nbsp;&nbsp;
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
							<ul class="pagination"style="color: black;">
								{{ $CategoryProduct->links() }}
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>



@endsection


