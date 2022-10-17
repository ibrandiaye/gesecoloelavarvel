@extends('layout')
@section('content')
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="#">Table de Bord</a></li>
            <li class="breadcrumb-item active" aria-current="page">Modifier Planning</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    <!-- Container -->
    <div class="container">
        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="external-link"></i></span></span>Modifier Planning</h4>
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <div class="col-sm">
                        <form class="needs-validation" method="POST" action="{{ URL('planning/'.$planning->id) }}" novalidate>
                           @method('PUT')
                            {{ csrf_field() }}
                                <div class="form-row">
                                    <div class="col-md-4 mb-10">
                                        <label for="validationCustom01">Jour</label>
                                            <select class="form-control select2" name="jour" required>
                                            <option value="Lundi" {{ $planning->jour=='Lundi' ? 'selected' : '' }}>Lundi</option>
                                            <option value="Mardi" {{ $planning->jour=='Mardi' ? 'selected' : '' }}>Mardi</option>
                                            <option value="Mercredi" {{ $planning->jour=='Mercredi' ? 'selected' : '' }}>Mercredi</option>
                                            <option value="Jeudi" {{ $planning->jour=='Jeudi' ? 'selected' : '' }}>Mercredi</option>
                                            <option value="Vendredi" {{ $planning->jour=='Vendredi' ? 'selected' : '' }}>Vendredi</option>
                                            <option value="Samedi" {{ $planning->jour=='Samedi' ? 'selected' : '' }}>Samedi</option>
                                        </select>
                                        <div class="invalid-tooltip"> Champs obligatoire </div>
                                    </div>
                                    <div class="col-md-4 mb-10">
                                        <label for="validationCustom01">Heure Début</label>
                                        <input type="time" class="form-control" id="validationCustom01" value="{{ $planning->heure_debut }}" name="heure_debut"   required>
                                        <div class="invalid-feedback">
                                            Champ obligatoire
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-10">
                                        <label for="validationCustom01">Heure Fin</label>
                                        <input type="time" class="form-control" id="validationCustom01" value="{{ $planning->heure_fin }}" name="heure_fin"   required>
                                        <div class="invalid-feedback">
                                            Champ obligatoire
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-10">
                                        <label for="validationCustom01">Année Scolaire</label>
                                            <select class="form-control select2" name="matiere_id" required>
                                            <option value="">Sélectionner</option>
                                            @foreach($matieres as $matiere)
                                                <option value="{{  $matiere->id }}" {{ $matiere->id==$planning->matiere_id ? 'selected' : '' }} >{{  $matiere->nom }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-tooltip"> Champs obligatoire </div>
                                    </div>
                                    <div class="col-md-4 mb-10">
                                        <label for="validationCustom01">classe</label>
                                        <select class="form-control select2" name="classe_id" required>
                                            <option value="">Sélectionner</option>
                                            @foreach($classes as $classe)
                                                <option value="{{  $classe->id }}"  {{ $classe->id==$planning->classe_id ? 'selected' : '' }}> {{  $classe->nom }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-tooltip">Champs obligatoire</div>
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
