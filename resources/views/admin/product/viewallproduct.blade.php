@php
$setting = DB::table('settinginformation')->first();
$contact = DB::table('contactinformation')->first();
@endphp


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>View all product</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<style type="text/css">
		@media print {
			input#btnPrint {
				display: none;
			}
		}
	</style>


</head>
<body>



	<div class="container-fluid">
		<!-- state start-->
		<div class="row">
			<div class=" col-sm-12">
				<div class="card">
					

					<div class="card-body bg-white" style="overflow-x:auto; width: 100%; margin-top: -25px;">

						<table id="bs4-table" class="table table-bordered mt-4" cellspacing="0" style="font-size: 13px;">
							
							<tr>
								<td colspan="12">
									<center>
										<img src="{{url($setting->image)}}" class="img-fluid" style="max-height: 150px; width: 150px;"><br>
										<span>
											House: 535, Road: 8, Mirpur DOHS, Dhaka.<br>
											E-Mail: {{$setting->email}}<br>
											Phone: +880 {{$setting->phone}}<br>
										</span>
									</center>
								</td>
							</tr>
							<tr class="text-center">
								<th colspan="12" class="text-uppercase">All Product Report
								</th>
							</tr>

							<tr>
								<th>Sl.</th>
								<th>Product Code</th>
								<th>Product Name</th>
								<th>Item Name</th>
								<th>Category Name</th>
								<th>Subcategory Name</th>
								<th>Brand Name</th>
								<th>Purchase Price</th>
								<th>Sale Price</th>
								<th>Discount Price</th>
								<th>Stock Status</th>
								<th>Picture</th>
							</tr>

							<tbody>

								@php
								$i=1;
								@endphp

								@if(isset($ProductData))
								@foreach($ProductData as $ProductDataShow)

								<tr>
									<td>{{ $i++ }}</td>
									<td>{{ $ProductDataShow->product_code }}</td>
									<td>{{ $ProductDataShow->product_name }}</td>
									<td>{{ $ProductDataShow->item_name }}</td>
									<td>{{ $ProductDataShow->category_name }}</td>
									<td>{{ $ProductDataShow->subcategory_name }}</td>
									<td>{{ $ProductDataShow->brand_name }}</td>
									<td>{{ $ProductDataShow->purchase_price}}.00</td>
									<td>{{ $ProductDataShow->sale_price }}.00</td>
									<td>
										@if($ProductDataShow->discount_price)
										{{ $ProductDataShow->discount_price }}.00
										@else
										00
										@endif
									</td>
									<td>
										@if($ProductDataShow->stock_status == 1)
										Stock Available
										@else
										Out of Stock
										@endif
									</td>
									<td>
										@if(isset($ProductDataShow->image))
										<img src="{{url($ProductDataShow->image)}}" class="zoom" style="max-height: 40px;">
										@else
										<img src="{{url('public/categoryimage')}}/1.png" class="zoom" style="max-height:40px;">
										@endif
									</td>



									@endforeach
									@endif

								</tbody>
							</table>

							<center>
								<input type="button" id="btnPrint" class="btn btn-primary btn-sm" onclick="window.print();" value="Print">
							</center>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- state end-->

</div>


</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>