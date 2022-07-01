@extends('frontend.index')
@section('content')


<div class="col-sm-12 col-12 mt-4" style="margin-bottom: 40px;">
	<div class="container border p-3">

		<div>
			<ul class="uk-breadcrumb">
				<li><a href="{{'/shoppingstore'}}">Home</a> &nbsp; / &nbsp; <span>Terms & Conditions</span></li>

			</ul>
		</div>

		<span class="detailspage">
			<p style="text-align: center; line-height: 1.2; margin-top: 30px;">
				<span style="font-size: 16px; font-family: &quot;Times New Roman&quot;;">
					<font color="#414141" face="Times New Roman, serif">
						<u><b> Terms & Conditions</b></u></font>
					</span>
				</p>

				@if(isset($TermCondition))

				<p style="text-align: justify-all; line-height: 1.2;">
					{!! $TermCondition->details !!}
				</p>

				@endif
			</span>
		</div>
	</div>


	@endsection


