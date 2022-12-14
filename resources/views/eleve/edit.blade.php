@extends('layout')
@section('content')
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="#">Table de Bord</a></li>
            <li class="breadcrumb-item active" aria-current="page">Modifier Eleve</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    <!-- Container -->
    <div class="container">
        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="external-link"></i></span></span>Modifier Eleve</h4>
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <div class="col-sm">
                        <form class="needs-validation" method="POST" action="{{ URL('eleve/'.$eleve->id) }}" enctype="multipart/form-data" novalidate>
                           @method('PUT')
                            {{ csrf_field() }}
                            <div class="form-row">
                                <div class="col-md-4 mb-10">
                                    <label for="validationCustom01">Nom</label>
                                    <input type="text" value="{{ $eleve->nom }}" class="form-control  @error('nom') is-invalid @enderror" id="validationCustom01" placeholder="Nom" name="nom"  required>
                                    <div class="invalid-tooltip">
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
                                    <input type="text" value="{{ $eleve->prenom }}" class="form-control  @error('prenom') is-invalid @enderror" id="validationCustom01" placeholder="Prenom" name="prenom"  required>
                                    <div class="invalid-tooltip">
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
                                    <input type="text" value="{{ $eleve->adresse }}" class="form-control  @error('adresse') is-invalid @enderror" id="validationCustom01" placeholder="Adresse" name="adresse"  required>
                                    <div class="invalid-tooltip">
                                        Champ obligatoire
                                    </div>
                                    @error('adresse')
                                    <span class="invalid-tooltip" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-10">
                                    <label for="validationCustom01">T??l??phone</label>
                                    <input type="text" class="form-control @error('telephone') is-invalid @enderror" name="telephone" value="{{ $eleve->telephone }}" id="validationCustom01" placeholder="T??l??phone" aria-describedby="validationTooltipUsernamePrepend" >
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
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $eleve->email }}" id="validationTooltipUsername" placeholder="Email" aria-describedby="validationTooltipUsernamePrepend" required>
                                    <div class="invalid-tooltip">
                                        Champ obligatoire ou email invalide
                                    </div>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-10">
                                    <label for="validationCustom01">Lieu de Naissance</label>
                                    <input type="text" class="form-control @error('lieu_naiss') is-invalid @enderror" name="lieu_naiss" value="{{ $eleve->lieu_naiss }}" id="validationCustom01" placeholder="Lieu de Naissance" aria-describedby="validationTooltipUsernamePrepend" required>
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
                                    <label for="validationTooltipDate">Date de Naissance</label>
                                    <input class="form-control @error('date_naiss') is-invalid @enderror" type="date" name="date_naiss" value="{{$eleve->date_naiss}}" />
                                    <div class="invalid-tooltip">
                                        Champ obligatoire
                                    </div>
                                    @error('date_naiss')
                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-10">
                                    <label>CNI</label>
                                    <input type="number" class="form-control @error('cni') is-invalid @enderror" name="cni" value="{{ $eleve->cni }}"  placeholder="Email" >
                                </div>
                                <div class="col-md-4 mb-10">
                                    <label for="validationCustom01">Tutteur</label>
                                    <select class="form-control custom-select" name="tutteur_id" required>
                                        <option value="">S??lectionner</option>
                                        @foreach($tutteurs as $tutteur)
                                            <option value="{{  $tutteur->id }}" {{($eleve->tutteur_id == $tutteur->id) ? 'Selected' : ''}}>{{  $tutteur->prenom }} {{  $tutteur->nom }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-tooltip">Champs obligatoire</div>
                                </div>
                                <div class="col-md-4 mb-10">
                                    <label>Image</label>
                                    <input class="form-control"  type="file" name="img" accept="image/*"/>

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