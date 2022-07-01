@extends('frontend.index')
@section('content')



<div class="col-sm-12 col-12 mt-4 pb-5">
	<div class="container border p-3">
		<div>
			<ul class="uk-breadcrumb">
				<li><a href="{{'/shoppingstore'}}">Home</a> &nbsp; / &nbsp; <span>FAQ</span></li>

			</ul>
		</div>

		<span class="detailspage">
			<div id="accordion" style="margin-top: 20px;">


				@if(isset($FAQ))
				@foreach($FAQ as $FAQshow)



				<div class="card p-4">
					<div class="card-header" id="headingOne2">
						<h5 class="mb-0">
							<button class="btn btn-link d-flex align-items-center justify-content-between collapsed" data-toggle="collapse" data-target="#{{ $FAQshow->id }}" aria-expanded="false" aria-controls="{{ $FAQshow->id }}" style="width:100%; text-decoration: none; color: black;">
								{{ $FAQshow->question }}
								<span class="fa-stack fa-sm">
									<i class="fa fa-plus" style="color: #00c431;"></i>
								</span>
							</button>
						</h5>
					</div>

					<div id="{{ $FAQshow->id }}" class="collapse" aria-labelledby="headingOne2" data-parent="#accordion">
						<div class="card-body">
							{!! $FAQshow->details !!}
						</div>
					</div>
				</div>

				@endforeach
				@endif

			</div>
		</span>
		

		
	</div>
</div>






@endsection


