@extends('frontend.index')
@section('content')


<!-------------- Shop by Brands ------------->
<div class="col-sm-12 col-12 pb-5 pt-5" style=" background-color: #fff;">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-9 col-12 text-md-left text-center" >
				<span class="" style="font-family: Calibri; font-size: 30px; color: #000;"> Brands</span>
			</div>
			<div class="col-sm-3 col-12 text-md-right text-center subsearch mt-sm-0 mt-2">

				<form method="get" action="{{url('searchbrand')}}">
					@csrf
					<input type="hidden" name="_token">            
					<div class="input-group" style="width: 280px; margin-left: 47px;">
						<input type="text" class="form-control" id="searchbox" placeholder="Serach Brand" name="searchbrand"  autocomplete="off" required="" style="border-radius: 0px; box-shadow: none;">

						<div class="input-group-append">
							<button class="btn" type="submit" style="border-radius: 0px 5px 5px 0px; background: #333333; color: white; max-width: 10px; box-shadow: none;"><i class="fa fa-search" style="margin-left:-5px;"></i></button>
						</div>

					</div>
				</form>
			</div>
		</div>
	</div>


	<div class="container-fluid">
		<div class="col-sm-12 col-12">

			<div class="row" style="background:#fff; margin-top: 30px;">
				@if(isset($BrandSearch))
				@foreach($BrandSearch as $BrandSearchShow)
				<div class="p-2 col-lg-1 col-md-3 col-sm-4 col-4"
				style="background:#fff; border: 3px #f4f4f4  solid; align:center; ">

				<center style="padding:5px;">
					<a href="{{ url('brandproduct/'.$BrandSearchShow->id) }}">

						@if(isset($BrandSearchShow->image))
						<img src="{{ url($BrandSearchShow->image) }}" class="img-responsive" alt=""
						style="max-height:40px;">
						@endif
					</a>
				</center>
			</div>
			@endforeach
			@endif
		</div>
	</div>
</div>
</div>
</div>

<!----------End Brands --------->



@endsection


