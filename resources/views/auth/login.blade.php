<!DOCTYPE html>

<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>Marvin I Login</title>
		<meta name="description" content="A responsive bootstrap 4 admin dashboard template by hencework" />

		<!-- Favicon -->
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="icon" href="favicon.ico" type="image/x-icon">

		<!-- Toggles CSS -->
		<link href="{{ asset('vendors/jquery-toggles/css/toggles.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ asset('vendors/jquery-toggles/css/themes/toggles-light.css') }}" rel="stylesheet" type="text/css">

		<!-- Custom CSS -->
		<link href="{{ asset('dist/css/style.css') }}" rel="stylesheet" type="text/css">
	</head>
	<body>


		<!-- HK Wrapper -->
		<div class="hk-wrapper">

			<!-- Main Content -->
			<div class="hk-pg-wrapper hk-auth-wrapper">
				<header class="d-flex justify-content-end align-items-center">
					<div class="btn-group btn-group-sm">
						<a href="#" class="btn btn-outline-secondary">Help</a>
						<a href="#" class="btn btn-outline-secondary">About Us</a>
					</div>
				</header>
				<div class="container-fluid">
					<div class="row">
						<div class="col-xl-12 pa-0">
							<div class="auth-form-wrap pt-xl-0 pt-70">
								<div class="auth-form w-xl-30 w-lg-55 w-sm-75 w-100">
									<a class="auth-brand text-center d-block mb-20" href="#">
										Marvin
									</a>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
										<h1 class="display-4 text-center mb-10">Welcome Back :)</h1>
										<p class="text-center mb-30">Sign in to your account and enjoy unlimited perks.</p>
										<div class="form-group">
											<input class="form-control @error('email') is-invalid @enderror" placeholder="Email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
										</div>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
										<div class="form-group">
											<div class="input-group">
												<input class="form-control  @error('password') is-invalid @enderror" placeholder="Mot de passe" type="password" name="password" required autocomplete="current-password">
												<div class="input-group-append">
													<span class="input-group-text"><span class="feather-icon"><i data-feather="eye-off"></i></span></span>
												</div>
											</div>
										</div>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div class="form-group">
											<div class="input-group">
                                        <select class="form-control" name="anneeScolaire_id" required>
                                            @foreach($anneeScolaires as $anneeScolaire)
                                                <option value="{{  $anneeScolaire->id }}" {{ old('annee_scolaire_id') == $anneeScolaire->id ? 'Selected' : ''}}>{{  $anneeScolaire->annee }}</option>
                                            @endforeach
                                        </select>

                                        <div class="invalid-tooltip"> Champs obligatoire </div>
                                            </div>
                                    </div>
										{{--  <div class="custom-control custom-checkbox mb-25">
											<input class="custom-control-input" id="same-address" type="checkbox" checked>
											<label class="custom-control-label font-14" for="same-address">Keep me logged in</label>
										</div>  --}}
										<button class="btn btn-primary btn-block" type="submit">Se Connecter</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Main Content -->

		</div>
		<!-- /HK Wrapper -->

		<!-- JavaScript -->

		<!-- jQuery -->
		<script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="{{ asset('vendors/popper.js/dist/umd/popper.min.js') }}vendors/popper.js/dist/umd/popper.min.js"></script>
		<script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>

		<!-- Slimscroll JavaScript -->
		<script src="{{ asset('dist/js/jquery.slimscroll.js') }}"></script>

		<!-- Fancy Dropdown JS -->
		<script src="{{ asset('dist/js/dropdown-bootstrap-extended.js') }}"></script>

		<!-- FeatherIcons JavaScript -->
		<script src="{{ asset('dist/js/feather.min.js') }}"></script>

		<!-- Init JavaScript -->
		<script src="dist/js/init.js"></script>
	</body>
</html>
