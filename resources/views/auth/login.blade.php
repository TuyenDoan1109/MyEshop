<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<section class="vh-100" style="background-color: #508bfc; padding-bottom: 300px">
		<div class="container py-5 h-100">
		  	<div class="row d-flex justify-content-center align-items-center h-100">
				<div class="col-12 col-md-8 col-lg-6 col-xl-5">
					<div class="card shadow-2-strong" style="border-radius: 1rem;">
						<div class="card-body p-5 text-center">
		
							<h3 class="mb-5">Sign in</h3>
							<form action="{{ route('login') }}" method="post">
								@csrf
								<input placeholder="Enter Your Email..." id="email" type="email" 
								class="form-control mb-4 @error('email') is-invalid @enderror" name="email" 
								value="{{ old('email') }}" required autocomplete="email" autofocus>
								@error('email')
									<span class="invalid-feedback mb-4" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror

								<input placeholder="Enter Your Password..." id="password" type="password" 
								class="form-control mb-4 @error('password') is-invalid @enderror" name="password" 
								required autocomplete="password">
								@error('password')
									<span class="invalid-feedback mb-4" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
								<div class="form-check d-flex justify-content-start mb-4">
									<input class="form-check-input" type="checkbox" value="" id="form1Example3" />
									<label class="form-check-label" for="form1Example3"> Remember me</label>
								</div>
								<button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
							</form>

							<hr class="my-4">
				
							<button class="btn btn-lg btn-block btn-primary" style="background-color: #dd4b39;"
								type="submit"><i class="fab fa-google me-2"></i> Sign in with google</button>
							<button class="btn btn-lg btn-block btn-primary mb-2" style="background-color: #3b5998;"
								type="submit"><i class="fab fa-facebook-f me-2"></i>Sign in with facebook</button>
	  
						</div>
			  		</div>
				</div>
		  	</div>
		</div>
	</section>
</body>
</html>


















{{-- @extends('layouts.app')

@section('content')
	<!--form-->
	<section id="form">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-sm-offset-1">
					<!--login form-->
					<div class="login-form">
						<h2>Login to your account</h2>
						<form method="POST" action="{{ route('login') }}">
                            @csrf
							<input placeholder="Enter Your Email..." id="email" type="email" 
							class="form-control @error('email') is-invalid @enderror" name="email" 
							value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

							<input placeholder="Enter Your Password..." id="password" type="password" 
							class="form-control @error('password') is-invalid @enderror" name="password" 
							required autocomplete="password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>

							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div>
					<!--/login form-->
				</div> --}}

				{{-- <div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>

				<div class="col-sm-4">
					<!--sign up form-->
					<div class="signup-form">
						<h2>New User Signup!</h2>
						<form method="POST" action="{{ route('register') }}">
							@csrf
							<input placeholder="Your name..." id="register_name" type="text" 
							class="form-control @error('register_name') is-invalid @enderror" 
							name="register_name" value="{{ old('register_name') }}" 
							required autocomplete="name" autofocus>
							@error('register_name')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror

							<input placeholder="Your email..." id="register_email" type="email" 
							class="form-control @error('register_email') is-invalid @enderror" 
							name="register_email" value="{{ old('register_email') }}" 
							required autocomplete="email">
							@error('register_email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror

							<input placeholder="Your password..." id="register_password" type="password" 
							class="form-control @error('register_password') is-invalid @enderror" 
							name="register_password" required autocomplete="new-password">
							@error('register_password')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror

                            <input placeholder="Confirm password..." id="register_password-confirm" 
							type="password" class="form-control" name="register_password_confirmation" 
							required autocomplete="new-password">

							<button type="submit" class="btn btn-default">Register</button>
						</form>
					</div>
					<!--/sign up form-->
				</div> --}}
			{{-- </div>
		</div>
	</section>
	<!--/form-->
@endsection --}}









