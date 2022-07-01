@extends('frontend.index')
@section('content')


<style>
	.nav .nav-link{
		font-size: 14px;
		color: #414141;
		transition: 0.4s;
		padding: 15px 30px;
		background: #fff;
		border: 1px solid #f1f1f1;
		border-radius: 0px;
		text-transform: uppercase;
	}


	.nav .nav-link.active {
		color: #fff;
		background: black;
	</style>


	<div class="container-fluid">
		<div class="single_product" style=" background-color: #fff;">
			<div class="container" style="margin-top: -50px">
				<div class="row">
					<!-- Images -->


					<!-- Selected Image -->
					<div class="col-lg-6 order-lg-2 order-1">
						<div class="image_selected">
							<a href="">

								<a href="{{ url($singleproduct->image) }}">
									<img src="{{ url($singleproduct->image) }}" alt="{{ url($singleproduct->image) }}" class="img-fluid" style="max-height: 525px;">
								</a>

							</a>
						</div>
					</div>

					<div class="col-lg-1 col-12 order-3">
					</div>

					<!-- Description -->
					<div class="col-lg-5 col-12 order-3">
						<div class="product_description">
							<div class="product_category mt-3">{{ $ProductItemName->category_name }} / {{ $ProductItemName->subcategory_name }}</div>
							<div class="product_name" style="font-size: 20px;">{{ $singleproduct->product_name }}</div>
							<div class="product_text">
								<p>
									{!! $singleproduct->short_details !!}
								</p>
							</div>
							<div class="order_info d-flex flex-row" style="margin-top: -0px;">

								<form method="post" action="{{ url('addtocart/'.$singleproduct->id)}}">
									@csrf
									
									<div class="form-group ">
										<label ><strong>Quantity :</strong></label>
										<input type="number" class="form-control w-100"
										name="quentity" style="border-radius: 0px; box-shadow: none; height: 38px;  margin-top: -8px; color: gray;" required>
									</div>

									
									<div class="form-group ">
										@if(isset($ProductSize))
										<label><strong>Select Size :</strong></label>
										<select class="form-control textfill w-100" style="border-radius: 0px; box-shadow: none; margin-left: -1px;  margin-top: -8px; color: gray; " name="product_size">
											
											@if(isset($ProductSize))
											@foreach($ProductSize as $ProductSizeShow)
											<option value="{{ $ProductSizeShow }}">{{ $ProductSizeShow }}</option>
											@endforeach
											@endif

										</select>
										@else
										@endif
									</div>
									
									<div class="form-group ">
										<label><strong>Select color :</strong></label>
										<select class="form-control textfill w-100" style="border-radius: 0px; box-shadow: none; margin-left: -1px;  margin-top: -8px; color: black; color: gray;" name="product_color">
											@if(isset($ProductColor))
											@foreach($ProductColor as $ProductColorShow)
											<option value="{{ $ProductColorShow }}">{{ $ProductColorShow }}</option>
											@endforeach
											@endif

										</select>
									</div>

									<div class="mt-3">
										<span style="font-size: 16px; color: green; font-family: 'Poppins', sans-serif"><span style="color: black;">Availability :</span> In Stock</span>
									</div><br>

									@php
									$sale_price = $singleproduct->sale_price;
									$dis_price = $singleproduct->discount_price;
									$present_price = $sale_price-$dis_price;
									@endphp

									<div>
										@if(isset($dis_price))
										<del style="font-size: 20px; color: red;">BDT : {{$singleproduct->sale_price}}.00</del> &nbsp;&nbsp;
										@endif
									</div>
									<div class="product_price mt-1" style=" color: #000 !important; padding-top: -10px;">BDT : {{$present_price}}.00</div>
									<div class="button_container" style="margin-top: 20px">

										<button type="submit"class="btn" style="background-color: black; color: white; box-shadow: none; border-radius: 0px;">Add to Cart</button>


										<a href="#" class="btn" style="background-color: #00c431; color: white; box-shadow: none; border-radius: 0px;">Buy Now</a>
									</div>

									<div class="mt-3">
										<span style="font-size: 12px; color: gray;">Share With :</span><br>
										<button class="sharer btn btn-sm btnshare" data-sharer="facebook" data-url="" style="background-color: #3b5998; color: white; border-radius: 20px; font-size: 10px; box-shadow: none;"><i class="fa fa-facebook-f"></i>&nbsp; Facebook </button>

										<button class="sharer btn btn-sm btnshare" data-sharer="twitter" data-url="https://www.facebook.com/Bidhan716/" style="background-color: #1da1f2; color: white; border-radius: 20px; font-size: 10px; box-shadow: none;"><i class="fa fa-twitter"></i>&nbsp; Twitter </button>

										<button class="sharer btn btn-sm btnshare" data-sharer="Whatsapp" data-url="https://www.facebook.com/Bidhan716/" style="background-color: #4dc247; color: white; border-radius: 20px; font-size: 10px; box-shadow: none;"><i class="fa fa-whatsapp"></i>&nbsp; Whatsapp </button>


										<button class="btn btn-sm btnshare" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: #4dc247; color: white; border-radius: 20px; font-size: 10px; box-shadow: none;">
											<i class="fa fa-plus"></i> &nbsp; More</button>
											<div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="background-color: white; width: 20px; font-size: 12px; color: black; border-radius: 0px; box-shadow: none; margin-top: 10px; margin-left: 5px;">
												<a class="dropdown-item" data-sharer="Linkedin" data-url="https://www.facebook.com/Bidhan716/"><i style="background-color: #00468c; padding: 3px; color: white;" class="fa fa-linkedin"></i>&nbsp; Linkedin</a>
												<a class="dropdown-item" data-sharer="viber" data-url="https://www.facebook.com/Bidhan716/"><i style="background-color: #794f99; padding: 3px; color: white;" class="fab fa-viber"></i>&nbsp; Viber</a>
												<a class="dropdown-item" data-sharer="Telegram" data-url="https://www.facebook.com/Bidhan716/"><i style="background-color: #269ed2; padding: 3px; color: white;" class="fa fa-telegram"></i>&nbsp; Telegram</a>
											</div>

										</div>
									</div>
								</div>
							</form>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>




	<div class="col-sm-12 col-12 " style="margin-top: -60px; background-color: #fff;">

		<div class="container">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="home-tab" data-toggle="tab" href="#Description" role="tab"
					aria-controls="home" aria-selected="true">Description</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="profile-tab" data-toggle="tab" href="#Condition" role="tab"
					aria-controls="profile" aria-selected="false">Condition</a>
				</li>
			</ul>

			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active mt-3" id="Description" role="tabpanel" aria-labelledby="home-tab">

					<p>
						{!! $singleproduct->full_details !!}
					</p>

				</div>
				<div class="tab-pane fade mt-3" id="Condition" role="tabpanel" aria-labelledby="profile-tab">
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!----------End Tabs----------->







<div class="col-sm-12 col-12 pb-5" style="background-color: #fff;">
	<div class="container-fluid" style="padding-top:8px;">
		<span class="text-uppercase" style="color: #000; ">Related Products</span>
		<hr>
		<div class="col-sm-12 col-12">
			<div class="row">
				@if(isset($ReletedProduct))
				@foreach($ReletedProduct as $ReletedProductview)

				<div class="col-lg-2 col-md-3 col-sm-6 col-6 mt-4">
					<div class="homeproducts border">

						@php
						$dis_percentig = $ReletedProductview->discount_price / $ReletedProductview->sale_price*100;
						@endphp

						@if(isset($ReletedProductview->discount_price))
						<span class="mark" style="margin-left: 0px; padding: 3px 10px 3px 10px; background-color: #00c431; color: #fff;">{{ceil($dis_percentig)}} % OFF</span>
						@else
						<span class="mark1" style="margin-left: -18px;"></span>
						@endif
						
						<center>
							<a href="{{url('product/'.$ReletedProductview->id)}}">
								<img src="{{ url($ReletedProductview->image) }}" class="img-fluid"></a>
							</center>
							<div>
								<center>
									<a
									href="{{url('product/'.$ReletedProductview->id)}}">
									@php
									$content = substr($ReletedProductview->product_name,0,20);
									$sale_price = $ReletedProductview->sale_price;
									$dis_price = $ReletedProductview->discount_price;
									$present_price = $sale_price-$dis_price;
									@endphp
									{!! $content !!}<br>
								</a>
								<span style="font-size: 15px;">
									@if(isset($dis_price))
									<del>{{$ReletedProductview->sale_price}}</del> &nbsp;&nbsp;
									@endif

									Tk {{$present_price}}.00
								</span>
							</center>
						</div>
					</div>
				</div>
				@endforeach
				@endif
			</div>

		</div>
		<div class="row">
			<div class="col-sm-12 col-12 mt-5" style="margin-left: -16px;">
				<nav>
					<ul class="pagination"style="color: black;">
						{{ $ReletedProduct->links() }}
					</ul>
				</nav>
			</div>
		</div>
	</div>

</div>



@endsection


