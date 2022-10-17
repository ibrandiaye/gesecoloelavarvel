@extends('layout')
@section('content')
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="#">Table de Bord</a></li>
            <li class="breadcrumb-item active" aria-current="page">Modifier Tarif</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    <!-- Container -->
    <div class="container">
        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="external-link"></i></span></span>Modifier Tarif</h4>
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <div class="col-sm">
                        <form class="needs-validation" method="POST" action="{{ URL('tarif/'.$tarif->id) }}" novalidate>
                           @method('PUT')
                            {{ csrf_field() }}
                            <div class="form-row">
                                <div class="col-md-4 mb-10">
                                    <label for="validationCustom01">Montant Inscription</label>
                                    <input type="number" class="form-control" id="validationCustom01" value="{{$tarif->inscription}}" name="inscription"   required>
                                    <div class="invalid-feedback">
                                        Champ obligatoire
                                    </div>
                                </div>
                                <div class="col-md-4 mb-10">
                                    <label for="validationCustom01">Montant Mensualité</label>
                                    <input type="number" class="form-control" id="validationCustom01" value="{{$tarif->mensualite}}" name="mensualite"   required>
                                    <div class="invalid-feedback">
                                        Champ obligatoire
                                    </div>
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