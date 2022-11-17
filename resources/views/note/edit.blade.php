@extends('layout')
@section('content')
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="#">Table de Bord</a></li>
            <li class="breadcrumb-item active" aria-current="page">Modifier Note</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    <!-- Container -->
    <div class="container">
        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="external-link"></i></span></span>Modifier Note</h4>
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <div class="col-sm">
                        <form class="needs-validation" method="POST" action="{{ URL('note/'.$note->id) }}" novalidate>
                           @method('PUT')
                            {{ csrf_field() }}
                            <div class="form-row">
                                <div class="col-md-4 mb-10">
                                    <label for="validationCustom01">Note</label>
                                    <input type="number" step="0.01" class="form-control" id="validationCustom01" value="{{ $note->note }}" name="note" placeholder="Saisirla note"  required>
                                    <div class="invalid-feedback">
                                        Champ obligatoire
                                    </div>
                                </div>
                                <div class="col-md-4 mb-10">
                                    <label for="validationCustom01"> Evaluation</label>
                                        <select class="form-control select2" name="evaluation_id" required>
                                        <option value="">Sélectionner</option>
                                        @foreach($evaluations as $evaluation)
                                            <option value="{{  $evaluation->id }}" {{ $evaluation->id==$note->evaluation_id ? 'selected' : '' }}>{{  $evaluation->matiere->nom }} {{  $evaluation->date }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-tooltip"> Champs obligatoire </div>
                                </div>
                                <div class="col-md-4 mb-10">
                                    <label for="validationCustom01">Eleve</label>
                                    <select class="form-control select2" name="eleve_id" required>
                                        <option value="">Sélectionner</option>
                                        @foreach($eleves as $eleve)
                                            <option value="{{  $eleve->id }}" {{ $eleve->id==$note->eleve_id ? 'selected' : '' }}>{{  $eleve->prenom }} {{  $eleve->nom }}</option>
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
