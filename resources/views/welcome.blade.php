@extends('layout')

@section('content')
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="#">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Table de Bord</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    <!-- Container -->
    <div class="container">
        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="external-link"></i></span></span>Table de Bord</h4>
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <div class="hk-row">
                    @foreach ($classes as $classe)


                                    <div class="col-sm-3">
										<div class="card card-sm">
											<div class="card-body">
		 										<div class="d-flex justify-content-between mb-5">
													<div>
														<span class="d-block font-15 text-dark font-weight-500">{{ $classe->niveau->nom }}</span>
													</div>
													<div>
														<span class="badge badge-primary  badge-sm">+10%</span>
													</div>
												</div>
												<div>
													<a href="{{ route('classe.show', ['classe'=>$classe->id]) }}"><span class="d-block display-5 text-dark mb-5">{{ $classe->nom }}</span></a>
													<small class="d-block">172,458 Target Users</small>
												</div>
											</div>
										</div>
									</div>
                                    @endforeach
									{{--  <div class="col-sm-4">
										<div class="card card-sm">
											<div class="card-body">
												<div class="d-flex justify-content-between mb-5">
													<div>
														<span class="d-block font-15 text-dark font-weight-500">Users</span>
													</div>
													<div>
														<span class="badge badge-danger   badge-sm">+10%</span>
													</div>
												</div>
												<div>
													<span class="d-block display-5 text-dark mb-5">68M</span>
													<small class="d-block">90M Targeted</small>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="card card-sm">
											<div class="card-body">
												<div class="d-flex justify-content-between mb-5">
													<div>
														<span class="d-block font-15 text-dark font-weight-500">Tickets</span>
													</div>
													<div>
														<span class="badge badge-primary  badge-sm">-1.5%</span>
													</div>
												</div>
												<div>
													<span class="d-block display-5 text-dark mb-5">73</span>
													<small class="d-block">100 Regular</small>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="card card-sm">
											<div class="card-body">
												<div class="d-flex justify-content-between mb-5">
													<div>
														<span class="d-block font-15 text-dark font-weight-500">Earnings</span>
													</div>
													<div>
														<span class="badge badge-warning  badge-sm">+60%</span>
													</div>
												</div>
												<div>
													<span class="d-block display-5 text-dark mb-5">$89M</span>
													<small class="d-block">$100M Targeted</small>
												</div>
											</div>
										</div>
									</div>  --}}
            </div>
            </div>
        </div>

    </div>
@endsection

{{--
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>
--}}
