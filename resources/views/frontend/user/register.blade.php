@extends('frontend.index')
@section('content')


<div class="container-fluid" style="background-color: #fafafa;">
	<div class="container pb-5 pt-5" style="background-color: #fafafa;">
		<div class="row justify-content-center">
			<div class="col-md-7 col-lg-5">
				<div class="wrap">
					<div class="login-wrap p-4 p-md-5">
						<div class="d-flex">
							<div class="w-100">
								<h3 class="mb-4 text-center" style="font-family: 'Poppins', sans-serif">Create an Account.</h3>
							</div>
						</div>

						<form method="POST" action="{{url('userregistration')}}" enctype="multipart/form-data" class="signin-form">
							@csrf

							<div class="form-group mt-3">
								<input type="text" class="form-control" name="name" required>
								<label class="form-control-placeholder" for="Name">Name</label>
							</div>
							<div class="form-group mt-3">
								<input type="text" class="form-control" name="email" required>
								<label class="form-control-placeholder" for="E-mail">E-mail</label>
							</div>
							<div class="form-group mt-3">
								<input type="text" class="form-control" name="phone" required>
								<label class="form-control-placeholder" for="Phone">Phone</label>
							</div>

							<div class="form-group">
								<input id="password" type="password" class="form-control" name="password" required>
								<label class="form-control-placeholder" for="password">Password</label>
								<span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
							</div>
							<div class="form-group mt-3">
								<textarea type="text" class="form-control" name="address" required rows="3"></textarea>
								<label class="form-control-placeholder" for="Address">Address</label>
							</div>
							<div class="form-group">
								<button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign Up</button>
							</div>
							<div class="form-group d-md-flex">
								<div class="w-50 text-left">
									<label class="checkbox-wrap checkbox-primary mb-0">Remember Me
										<input type="checkbox" checked>
										<span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="#">Forgot Password</a>
								</div>
							</div>
						</form>
						<p class="text-center">Already have an account? <a style="color: #00c431" href="{{ url('usersignin')}}">Sign In</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



@endsection