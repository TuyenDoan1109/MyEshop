<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>User Login</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<section class="vh-100" style="background-color: #508bfc; padding-bottom: 300px">
		<div class="container py-5 h-100">
		  	<div class="row d-flex justify-content-center align-items-center h-100">
				<div class="col-12 col-md-8 col-lg-6 col-xl-5">
					<div class="card shadow-2-strong" style="border-radius: 1rem;">
						<div class="card-body p-5 text-center">
		
							<h3 class="mb-5">User Login</h3>
							<form action="{{ route('login') }}" method="post">
								@csrf
								<input placeholder="Enter Your Email..." id="email" type="text" 
								class="form-control mb-4 @error('email') is-invalid @enderror" name="email" 
								value="{{ old('email') }}"  autocomplete="email" autofocus>
								@error('email')
									<span class="invalid-feedback mb-4" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror

								<input placeholder="Enter Your Password..." id="password" type="password" 
								class="form-control mb-4 @error('password') is-invalid @enderror" name="password" 
								 autocomplete="password">
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










