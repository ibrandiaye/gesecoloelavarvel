@extends('layout')
@section('content')
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="#">Table de Bord</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ajouter Classe</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    <!-- Container -->
    <div class="container">
        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="external-link"></i></span></span>Ajouter Classe</h4>
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                        <div class="col-sm">
                            <form class="needs-validation" method="POST" action="{{ url('classe') }}" novalidate>
                                {{ csrf_field() }}
                                <div class="form-row">
                                    <div class="col-md-4 mb-10">
                                    <label for="validationCustom01">Nom Classe</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="nom" value="{{ old('nom ')}}" placeholder="Saisir le nom de la classe"  required>
                                    <div class="invalid-feedback">
                                        Champ obligatoire
                                    </div>
                                </div>
                                <div class="col-md-4 mb-10">
                                    <label for="validationCustom01">Année Scolaire</label>
                                    <select class="form-control select2" name="tutteur_id" required>
                                        <option value="">Sélectionner</option>
                                        @foreach($anneeScolaires as $anneeScolaire)
                                            <option value="{{  $anneeScolaire->id }}" {{ old('annee_scolaire_id') == $anneeScolaire->id ? 'Selected' : ''}}>{{  $anneeScolaire->annee }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-tooltip"> Champs obligatoire </div>
                                </div>
                                <div class="col-md-4 mb-10">
                                    <label for="validationCustom01">Niveau</label>
                                    <select class="form-control select2" name="niveau_id" required>
                                        <option value="">Sélectionner</option>
                                        @foreach($niveaus as $niveau)
                                            <option value="{{  $niveau->id }}" {{( old('niveau_id') == $niveau->id) ? 'Selected' : ''}}> {{  $niveau->nom }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-tooltip">Champs obligatoire</div>
                                </div>
                                <div class="col-md-4 mb-10">
                                    <label for="validationCustom01">Serie</label>
                                    <select class="form-control select2" name="serie_id" required>
                                        <option value="">Sélectionner</option>
                                        @foreach($series as $serie)
                                            <option value="{{  $serie->id }}" {{( old('serie_id') == $serie->id) ? 'Selected' : ''}}>{{  $serie->nom }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-tooltip">Champs obligatoire</div>
                                </div>
                                <div class="col-md-4 mb-10">
                                    <label for="validationCustom01">Tarif</label>
                                    <select class="form-control select2" name="tarif_id" required>
                                        <option value="">Sélectionner</option>
                                        @foreach($tarifs as $tarif)
                                            <option value="{{  $tarif->id }}" {{(old('tarif_id') == $tarif->id) ? 'Selected' : ''}}>Inscription :{{  $tarif->inscription }}, Mensuel: {{ $tarif->mensualite }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-tooltip">Champs obligatoire</div>
                                </div>

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
