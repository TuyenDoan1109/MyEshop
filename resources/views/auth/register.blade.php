<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>MyEshop | Register</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<style>
		.gradient-custom-3 {
		/* fallback for old browsers */
		background: #84fab0;

		/* Chrome 10-25, Safari 5.1-6 */
		background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5));

		/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
		background: linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5))
		}
		.gradient-custom-4 {
		/* fallback for old browsers */
		background: #84fab0;

		/* Chrome 10-25, Safari 5.1-6 */
		background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1));

		/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
		background: linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1))
		}
	</style>
</head>
<body>
	<section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
		<div class="mask d-flex align-items-center h-100 gradient-custom-3">
			<div class="container h-100">
			<div class="row d-flex justify-content-center align-items-center h-100">
				<div class="col-12 col-md-9 col-lg-7 col-xl-6">
					<div class="card" style="border-radius: 15px;">
						<div class="card-body p-5">
							<h2 class="text-uppercase text-center mb-5">Create an account</h2>
							<form method="POST" action="{{ route('register') }}">
								@csrf
								<input placeholder="Your name..." id="name" type="text" 
								class="form-control mb-3 @error('name') is-invalid @enderror" 
								name="name" value="{{ old('name') }}" 
								required autocomplete="name" autofocus>
								@error('name')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror

								<input placeholder="Your email..." id="email" type="email" 
								class="form-control mb-3 @error('email') is-invalid @enderror" 
								name="email" value="{{ old('email') }}" 
								required autocomplete="email">
								@error('email')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror

								<input placeholder="Your password..." id="password" type="password" 
								class="form-control mb-3 @error('password') is-invalid @enderror" 
								name="password" required autocomplete="new-password">
								@error('password')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror

								<input placeholder="Confirm password..." id="password-confirm" 
								type="password" class="form-control mb-5" name="password_confirmation" 
								required autocomplete="new-password">

								<div class="form-check d-flex mb-3">
									<input class="form-check-input mr-3" type="checkbox" value="" id="form2Example3cg" />
									<label class="form-check-label" for="form2Example3g">
										I agree all statements in <a href="#" class="text-body"><u>Terms of service</u></a>
									</label>
								</div>

								<div class="d-flex justify-content-center">
									<button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
								</div>

								<p class="text-center text-muted mt-5 mb-0">Have already an account? 
									<a href="{{route('login')}}" class="fw-bold text-body"><u>Login here</u></a>
								</p>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
</html>








