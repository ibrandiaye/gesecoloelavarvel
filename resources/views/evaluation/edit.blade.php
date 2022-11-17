@extends('layout')
@section('content')
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="#">Table de Bord</a></li>
            <li class="breadcrumb-item active" aria-current="page">Modifier Evaluation</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    <!-- Container -->
    <div class="container">
        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="external-link"></i></span></span>Modifier Evaluation</h4>
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <div class="col-sm">
                        <form class="needs-validation" method="POST" action="{{ URL('evaluation/'.$evaluation->id) }}" novalidate>
                           @method('PUT')
                            {{ csrf_field() }}
                                <div class="form-row">

                                    <div class="col-md-4 mb-10">
                                        <label for="validationCustom01">date</label>
                                        <input type="date" class="form-control" id="validationCustom01" name="date" value="{{ $evaluation->date }}"  required>
                                        <div class="invalid-feedback">
                                            Champ obligatoire
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-10">
                                        <label for="validationCustom01">classe</label>
                                        <select class="form-control select2" name="classe_id" required>
                                            <option value="">Sélectionner</option>
                                            @foreach($classes as $classe)
                                                <option value="{{  $classe->id }}" {{ $classe->id==$evaluation->classe_id ? 'selected' : '' }}> {{  $classe->nom }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-tooltip">Champs obligatoire</div>
                                    </div>
                                    <div class="col-md-4 mb-10">
                                        <label for="validationCustom01">Matière</label>
                                            <select class="form-control select2" name="matiere_id" required>
                                            <option value="">Sélectionner</option>
                                            @foreach($matieres as $matiere)
                                                <option value="{{  $matiere->id }}" {{ $matiere->id==$evaluation->matiere_id ? 'selected' : '' }}>{{  $matiere->nom }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-tooltip"> Champs obligatoire </div>
                                    </div>

                                    <div class="col-md-4 mb-10">
                                        <label for="validationCustom01">Semestre</label>
                                            <select class="form-control select2" name="semestre_id" required>
                                            <option value="">Sélectionner</option>
                                            @foreach($semestres as $semestre)
                                                <option value="{{  $semestre->id }}"  {{ $semestre->id==$evaluation->semestre_id ? 'selected' : '' }}>{{  $semestre->nom }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-tooltip"> Champs obligatoire </div>
                                    </div>
                                    <div class="col-md-4 mb-10">
                                        <label for="validationCustom01">Type Evaluation</label>
                                        <select class="form-control select2" name="type_evaluation_id" required>
                                            <option value="">Sélectionner</option>
                                            @foreach($typeEvaluations as $typeEvaluation)
                                                <option value="{{  $typeEvaluation->id }}"  {{ $typeEvaluation->id==$evaluation->type_evaluation_id ? 'selected' : '' }}> {{  $typeEvaluation->nom }}</option>
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
