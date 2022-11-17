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
                        <form class="needs-validation" method="POST" action="{{ URL('cahier-texte/'.$cahierTexte->id) }}" novalidate>
                           @method('PUT')
                            {{ csrf_field() }}
                            <label for="validationCustom01">Contenu</label>
                            <div class="tinymce-wrap">
                                <textarea class="tinymce" name="contenu" required>{{ $cahierTexte->contenu }}</textarea>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4 mb-10">
                                    <label for="validationCustom01">Matière</label>
                                        <select class="form-control select2" name="planning_id" required>
                                        <option value="">Sélectionner</option>
                                        @foreach($plannings as $planning)
                                            <option value="{{  $planning->id }}" {{  $planning->id==$cahierTexte->planning_id ? 'selected' : ''}} >{{  $planning->matiere->nom }} - {{  $planning->jour }}
                                                {{  $planning->heure_debut }} -  {{  $planning->heure_fin }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-tooltip"> Champs obligatoire </div>
                                </div>
                                <div class="col-md-4 mb-10">
                                    <label for="validationCustom01">classe</label>
                                    <select class="form-control select2" name="classe_id" required>
                                        <option value="">Sélectionner</option>
                                        @foreach($classes as $classe)
                                            <option value="{{  $classe->id }}" {{  $classe->id==$cahierTexte->classe_id ? 'selected' : ''}}> {{  $classe->nom }}</option>
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
<!-- Tinymce JavaScript -->
<script src="{{ asset('vendors/tinymce/tinymce.min.js') }}"></script>

<!-- Tinymce Wysuhtml5 Init JavaScript -->
<script src="{{ asset('dist/js/tinymce-data.js') }}"></script>
    <script src="{{asset('dist/js/validation-data.js')}}"></script>
@endsection
