@extends('layout')
@section('content')
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="#">Table de Bord</a></li>
            <li class="breadcrumb-item active" aria-current="page">Modifier paiement</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    <!-- Container -->
    <div class="container">
        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="external-link"></i></span></span>Modifier paiement</h4>
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <div class="col-sm">
                        <form class="needs-validation" method="POST" action="{{ URL('paiement/'.$paiement->id) }}" novalidate>
                           @method('PUT')
                            {{ csrf_field() }}
                                <div class="form-row">
                                    <div class="col-md-4 mb-10">
                                        <label for="validationCustom01">Montant</label>
                                        <input type="number" class="form-control" value="{{ $paiement->montant }}" id="validationCustom01" name="montant"   required>
                                        <div class="invalid-feedback">
                                            Champ obligatoire
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-10">
                                        <label for="validationCustom01">Matière</label>
                                            <select class="form-control select2" name="mois_id" required>
                                            <option value="">Sélectionner</option>
                                            @foreach($mois as $moi)
                                                <option value="{{  $moi->id }}" {{ $moi->id==$paiement->mois_id ? 'selected' : '' }}>{{  $moi->nom }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-tooltip"> Champs obligatoire </div>
                                    </div>
                                    <div class="col-md-4 mb-10">
                                        <label for="validationCustom01">inscription</label>
                                        <select class="form-control select2" name="inscription_id" required>
                                            <option value="">Sélectionner</option>
                                            @foreach($inscriptions as $inscription)
                                                <option value="{{  $inscription->id }}" {{ $inscription->id==$paiement->inscription_id ? 'selected' : '' }}> {{  $inscription->eleve->prenom }}  {{  $inscription->eleve->nom }}</option>
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
