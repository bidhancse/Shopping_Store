@extends('frontend.index')
@section('content')


<style>
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
</style>

<!-- Start Contact -->
<section id="contact-us" class="contact-us section">
	<div class="container">
		<div class="contact-head">
			<div class="row">
				<div class="col-lg-8 col-12">
					<div class="form-main">
						<div class="title">
							<h4>Get in touch</h4>
							<h3>Write us a message</h3>
						</div>
						<form class="form" method="post" action="{{'messagesend'}}">
							@csrf
							<div class="row">
								<div class="col-lg-6 col-12">
									<div class="form-group">
										<label>Your Name<span>*</span></label>
										<input name="name" type="text" class="form-control textfill" required placeholder="Your Name">
									</div>
								</div>
								<div class="col-lg-6 col-12">
									<div class="form-group">
										<label>Your Subjects<span>*</span></label>
										<input name="subject" type="text" class="form-control textfill" required placeholder="Your Subjects">
									</div>
								</div>
								<div class="col-lg-6 col-12">
									<div class="form-group">
										<label>Your Email<span>*</span></label>
										<input name="email" type="email" class="form-control textfill" required placeholder="Your Email">
									</div>	
								</div>
								<div class="col-lg-6 col-12">
									<div class="form-group">
										<label>Your Phone<span>*</span></label>
										<input name="phone" type="text" class="form-control textfill" required placeholder="Your Phone">
									</div>	
								</div>
								<div class="col-12">
									<div class="form-group message">
										<label>Your Message<span>*</span></label>
										<textarea name="message" class="form-control textfill" required placeholder="Your Message"></textarea>
									</div>
								</div>
								<div class="col-12">
									<div class="form-group button">
										<button type="submit" class="uk-button uk-button-secondary " style="background-color: #00c431; color: #fff; ">Send Message</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>

				<div class="col-lg-4 col-12">
					<div class="single-head">

						<div class="single-info">
							<i class="fa fa-phone"></i>
							<h4 class="title">Call us Now:</h4>
							<ul>
								<li>+880 {{$ContactInfo->phone}}</li>
							</ul>
						</div>
						<div class="single-info">
							<i class="fa fa-envelope-open"></i>
							<h4 class="title">Email:</h4>
							<ul>
								<li><a href="{{$ContactInfo->email}}" style="text-decoration: none; color: black;">{{$ContactInfo->email}}</a></li>
							</ul>
						</div>
						<div class="single-info">
							<i class="fa fa-location-arrow"></i>
							<h4 class="title">Our Address:</h4>
							<ul>
								<li>AVENEU-5, ROAD-5, HOUSE-353,

								MIRPUR DOHS, DHAKA.</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--/ End Contact -->


@endsection


