@extends('layout')
@section('content')
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="#">Table de Bord</a></li>
            <li class="breadcrumb-item active" aria-current="page">Modifier Année Scolaire</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    <!-- Container -->
    <div class="container">
        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="external-link"></i></span></span>Modifier Année Scolaire</h4>
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <div class="col-sm">
                        <form class="needs-validation" method="POST" action="{{ URL('tutteur/'.$tutteur->id) }}" novalidate>
                           @method('PUT')
                            {{ csrf_field() }}
                            <div class="form-row">
                                <div class="col-md-4 mb-10">
                                    <label for="validationCustom01">Nom</label>
                                    <input type="text" value="{{$tutteur->nom}}" class="form-control  @error('nom') is-invalid @enderror" id="validationCustom01" placeholder="Nom" name="nom"  required>
                                    <div class="invalid-feedback">
                                        Champ obligatoire
                                    </div>
                                    @error('nom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-10">
                                    <label for="validationCustom01">Prenom</label>
                                    <input type="text" value="{{$tutteur->prenom}}" class="form-control  @error('prenom') is-invalid @enderror" id="validationCustom01" placeholder="Prenom" name="prenom"  required>
                                    <div class="invalid-feedback">
                                        Champ obligatoire
                                    </div>
                                    @error('prenom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-10">
                                    <label for="validationCustom01">Adresse</label>
                                    <input type="text" value="{{$tutteur->adresse}}" class="form-control  @error('adresse') is-invalid @enderror" id="validationCustom01" placeholder="Adresse" name="adresse"  required>
                                    <div class="invalid-feedback">
                                        Champ obligatoire
                                    </div>
                                    @error('adresse')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-10">
                                    <label for="validationTooltipUsername">Téléphone</label>
                                    <input type="text" class="form-control @error('telephone') is-invalid @enderror" name="telephone" value="{{$tutteur->telephone }}" id="validationTooltipUsername" placeholder="Téléphone" aria-describedby="validationTooltipUsernamePrepend" required>
                                    <div class="invalid-tooltip">
                                        Champ obligatoire
                                    </div>
                                    @error('telephone')
                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-10">
                                    <label for="validationTooltipUsername">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$tutteur->email }}" id="validationTooltipUsername" placeholder="Email" aria-describedby="validationTooltipUsernamePrepend" required>
                                    <div class="invalid-tooltip">
                                        Champ obligatoire ou email invalide
                                    </div>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                    @enderror
                                </div>

                            </div>
                            <input class="btn btn-primary" type="submit" value="Enregistrer">
                        </form>
                    </div>

                </section>
            </div>
        </div>

    </div>
@endsection
@section('script')
    <script src="{{asset('dist/js/validation-data.js')}}"></script>
@endsection