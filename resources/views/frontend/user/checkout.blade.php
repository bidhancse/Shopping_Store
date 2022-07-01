@extends('frontend.index')
@section('content')


<style type="text/css">

	.bag{
		border:none;
		border-radius:0px;
	}

	.maincard{
		background-color:#00c431;
		text-transform:uppercase;
	}

	#Quantity{
		width: 60px;
		border: none;
		border: 1px solid #DEE2E6;
		padding: 7px;
	}

	.mform label{
		color: #414141;
		font-weight: normal;
		font-size: 15px;
	}

	.textfill{
		height: 50px;
		background-color: #fff;
		color: #414141;
		border-radius: 0px;
		transition: 0.9s;
		border:2px solid #f1f1f1;
		font-size: 15px;
		font-weight: normal;
	}

	.textfill:focus{
		box-shadow: none;
		border:2px solid #00c431;
	}

	.textfill2{
		background-color: #fff;
		border-radius: 0px;
		border:2px solid #f1f1f1;
		font-size: 15px;
		color: #414141;
		transition: 0.9s;
	}

	.textfill2:focus{
		box-shadow: none;
		border:2px solid #585858;
	}

	.list-group .headlist{
		background: #585858;
		color: #fff;
		font-size: 22px;
		border-radius: 0px;
		border:none;
		line-height: 35px;
		text-transform: uppercase;
	}


</style>

<div class="col-sm-12 col-12" style="margin-top: 50px; background-color: #fff;">
	<div class="container-fluid">

		<div class="row" style="color: #585858;">
			<div class="col-lg-4 col-md-12 col-sm-12 col-12">
				<div>
					<ul class="list-group">
						<li class="list-group-item adhead  text-light maincard" style="border-radius: 0px; border: none;">
							<span style="">01.</span>&nbsp;&nbsp;&nbsp;&nbsp;Shipping Address
						</li>
					</ul>
					<li class="list-group-item border-top-1" style="border-top: 1px solid #f90;">
						<form method="post" action="{{ url('shippingdetails/'.Auth()->user()->id) }}" enctype="multipart/form-data">
							@csrf
							<div class="row">

								<div class="form-group col-sm-12">
									<label><b>Name</b> <span class="text-danger">*</span></label>
									<input type="text" class="form-control textfill" name="name" placeholder="First Name" required="" value="{{ Auth()->user()->name }}">
								</div>
								<div class="form-group col-12">
									<label><b>Mobile</b> <span class="text-danger">*</span></label>
									<input type="text" class="form-control textfill" name="phone" placeholder="Mobile" required="" value="{{ Auth()->user()->phone }}">
								</div>
								<div class="form-group col-12">
									<label><b>Email</b> <span class="text-danger">*</span></label>
									<input type="email" class="form-control textfill" name="email" placeholder="Email" required="" value="{{ Auth()->user()->email }}">
								</div>
								<div class="form-group col-12">
									<label><b>Country</b> <span class="text-danger">*</span></label>
									<select name="country" id="billing_country_id" class="form-control textfill" title="Country"  required="" style="height: 52px">
										<option value="">--Please Select Country--</option>
										<option value="BD" selected="selected">Bangladesh</option>
									</select>
								</div>

								<div class="form-group col-12">
									<label><b>Address</b> <span class="text-danger">*</span></label>
									<input type="text" class="form-control textfill" name="address" placeholder="Address" required="" value="{{ Auth()->user()->address }}">
								</div>

								<div class="form-group col-12">
									<label><b>District</b> <span class="text-danger">*</span></label>
									<select class="form-control textfill"  name="district" style="height: 52px">
										<option value="">--Please Select District--</option>
										<option value="Dhaka" selected="selected">Dhaka</option>
										<option value="Chittagong">Chittagong</option>
										<option value="Feni">Feni</option>
										<option value="Cumilla">Cumilla</option>
										<option value="Rajsahi">Rajsahi</option>
									</select>
								</div>

								<div class="form-group col-12">
									<label><b>Payment Method</b> <span class="text-danger">*</span></label>
									<select class="form-control textfill"  name="payment_method" style="height: 52px">
										<option value="">--Please Select Payment Method--</option>
										<option value="Bkash" selected="selected">Bkash</option>
										<option value="Nagad">Nagad</option>
										<option value="Rocket">Rocket</option>
										<option value="Cash on Delivery">Cash on Delivery</option>
									</select>
								</div>

							</div>
							<div class="">
								<input type="checkbox" name="terms" id="terms" onchange="activateButton(this)">
								I've read and accept the
								<a href="" target="_blank" style="color:red;text-decoration:none">
									terms and conditions</a>
									<br><br>
								<button type="submit" name="submit" class="btn btn-dark btn-sm" style="border-radius:0px; padding: 5px 10px 5px 10px;">Submit</button>
							</div>
						</form>
					</li>
				</div><br>
			</div>


			<div class="col-lg-8 col-md-12 col-sm-12 col-12">
				<div class="col-lg-12 col-md-12 col-sm-12 col-12  p-0">
					<div>
						<ul class="list-group">
							<li class="list-group-item adhead text-light maincard" style="border-radius: 0px;">
								<span>02.</span>&nbsp;&nbsp;&nbsp;&nbsp;Order Preview
							</li>
						</ul>

						<li class="list-group-item border-top-1">
							<div class="table-responsive">
								<table class="table" style="font-size: 13px;">
									<thead>
										<tr class="text-center">
											<th>Product</th>
											<th>Product Name</th>
											<th>Quantity</th>
											<th>Present Price</th>
											<th>Subtotal</th>
											<th>Remove</th>
										</tr>
									</thead>
									<tbody id="placeordershow">

										@php
										$Cart=Cart::content();
										@endphp

										@if(isset($Cart))
										@foreach($Cart as $CartDataShow)

										<tr class="text-center">
											<td>
												<a href="">
													<img src="{{ url($CartDataShow->options->image) }}" style="height:50px; width:50px;">
												</a>
											</td>

											<td>
												{{$CartDataShow->name}}&nbsp;&nbsp;<input type="checkbox" name="shipping_id[]" id="shipping_id"  checked="" disabled="">
											</td>

											<td>
												<form method="POST" action="{{ url('qty_update/'.$CartDataShow->rowId) }}">
													@csrf
													<span>
														<input type="number" value="{{$CartDataShow->qty}}" min="" name="qty" id="Quantity"  style="height: 35px; outline: 0px">

													<button type="submit" class="btn btn-dark btn-sm" style="border-radius:0px; padding: 5px 10px 5px 10px;"><i class="fa fa-edit"></i></button>
													</span>
													
												</form>
											</td>


											<td>
												{{$CartDataShow->price}}.00
											</td>

											@php
											$Price       	 =   $CartDataShow->price;
											$Qty             =   $CartDataShow->qty;
											$Total    		 =   $Price * $Qty;
											@endphp

											<td>{{$Total}}</td>

											<td>
												<a href="{{ url('productremove/'.$CartDataShow->rowId) }}">
													<span uk-icon="icon: trash; ratio: 0.8" class="text-danger uk-icon" onclick="delete_product('10331')">
														<svg width="16" height="16" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="trash">
															<polyline fill="none" stroke="#000" points="6.5 3 6.5 1.5 13.5 1.5 13.5 3"></polyline>
															<polyline fill="none" stroke="#000" points="4.5 4 4.5 18.5 15.5 18.5 15.5 4"></polyline>
															<rect x="8" y="7" width="1" height="9"></rect>
															<rect x="11" y="7" width="1" height="9"></rect>
															<rect x="2" y="3" width="16" height="1"></rect>
														</svg>
													</span>
												</a>
											</td>
										</tr>

										@endforeach
										@endif

										<tr class="text-right">
											<td colspan="5">SubTotal</td>
											
											<td >
												<span id="gtotal">{{Cart::subtotal()}} TK.</span>
											</td>
											
											
										</tr>

										<tr class="text-right">

											<td colspan="5">Delivery Charge</td>
											
											<td>
												<input type="hidden" name="deliverycharge" id="deliverycharge" value="0">
												Tk.<span id="ddcharge">0</span>.00 TK.
											</td>
											
										</tr>

										<tr class="text-right">
											<td colspan="5">Discount</td>
											
											<td>
												<input type="hidden" name="discount" id="discount" value="0">
												<input type="hidden" name="super_code" id="super_code">
												Tk.<span id="promo_price">0.00 TK.</span>
											</td>
											
										</tr>

										<tr class="text-right">
											<td colspan="5">Grand Total</td>
											
											<td>
												<input type="hidden" name="totalamount" id="totalamount"  required="">
												<span id="gtotal">{{Cart::subtotal()}} TK.</span>
											</td>
											
										</tr>

									</tbody>
								</table>
							</div>
						</li>
					</div><br>
				</div>
			</div>
		</div>
	</div>
</div>



@endsection


