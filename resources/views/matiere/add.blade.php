@extends('layout')
@section('content')
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="#">Table de Bord</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ajouter matiere</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    <!-- Container -->
    <div class="container">
        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="external-link"></i></span></span>Ajouter matiere</h4>
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                        <div class="col-sm">
                            <form class="needs-validation" method="POST" action="{{ url('matiere') }}" novalidate>
                                {{ csrf_field() }}
                                <div class="form-row">
                                    <div class="col-md-4 mb-10">
                                        <label for="validationCustom01">Nom Matière</label>
                                        <input type="text" class="form-control" id="validationCustom01" name="nom" placeholder="Saisir le nom de la matiere"  required>
                                        <div class="invalid-feedback">
                                            Champ obligatoire
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-10">
                                        <label for="validationCustom01"> Programme</label>
                                            <select class="form-control select2" name="programme_id" required>
                                            <option value="">Sélectionner</option>
                                            @foreach($programmes as $programme)
                                                <option value="{{  $programme->id }}">{{  $programme->nom }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-tooltip"> Champs obligatoire </div>
                                    </div>
                                    <div class="col-md-4 mb-10">
                                        <label for="validationCustom01">Coefficient</label>
                                        <select class="form-control select2" name="coefficient_id" required>
                                            <option value="">Sélectionner</option>
                                            @foreach($coefficients as $coefficient)
                                                <option value="{{  $coefficient->id }}"> {{  $coefficient->coef }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-tooltip">Champs obligatoire</div>
                                    </div>
                                    <div class="col-md-4 mb-10">
                                        <label >Professeur</label>
                                        <select class="form-control select2" name="professeur_id" >
                                            <option value="">Sélectionner</option>
                                            @foreach($professeurs as $professeur)
                                                <option value="{{  $professeur->id }}">{{  $professeur->prenom }} {{  $professeur->nom }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-tooltip">Champs obligatoire</div>
                                    </div>
                                  {{--  <div class="col-md-4 mb-10">
                                        <label >Tarif</label>
                                        <select class="form-control custom-select" name="tarif_id" >
                                            <option value="">Sélectionner</option>
                                            @foreach($tarifs as $tarif)
                                                <option value="{{  $tarif->id }}"> Inscription :{{  $tarif->inscription }}, Mensuel: {{ $tarif->mensualite }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-tooltip">Champs obligatoire</div>
                                    </div>--}}
                                    {{--  <div class="col-md-4 mb-10">
                                        <label >Tarif</label>
                                        <select class="form-control select2" name="tarif_id">
                                            <option>Selectionner</option>
                                            @foreach($tarifs as $tarif)
                                                <option value="{{  $tarif->id }}" >Inscription :{{  $tarif->inscription }}, Mensuel: {{ $tarif->mensualite }}</option>
                                            @endforeach

                                        </select>
                                    </div><br>
                                    <div class="col-md-12 mb-12">
                                        <div class="row">
                                        @foreach($programmes as $programme)
                                            <div class="col-md-3 mb-8">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="programme_id[]" class="custom-control-input" value="{{ $programme->id }}" id="customCheck{{$programme->id}}">
                                            <label class="custom-control-label" for="customCheck{{$programme->id}}">{{ $programme->nom }}</label>
                                        </div>
                                                </div>
                                        @endforeach
                                        </div>
                                    </div>
  --}}
                                </div>
                                <br>
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
