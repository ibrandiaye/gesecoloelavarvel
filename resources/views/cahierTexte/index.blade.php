@extends('layout')
@section('content')
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="#">Table de bord</a></li>
            <li class="breadcrumb-item active" aria-current="page">Liste des Cahiers de Texte</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    <!-- Container -->
    <div class="container">

        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="database"></i></span></span>Liste des Cahiers de Texte</h4>
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <h5 class="hk-sec-title">Liste des Cahiers de Texte</h5>
                    <div class="row">
                        <div class="col-sm">
                            <div class="table-wrap">
                                <table id="datable_1" class="table table-hover w-100 display pb-30">
                                    <thead>
                                    <tr>
                                        <th>Contenu</th>
                                        <th>Cours</th>
                                        <th>Jour</th>
                                        <th>Date</th>
                                        <th>action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cahierTextes as $cahierTexte)
                                        <tr>
                                            <td>{{ $cahierTexte->contenu }}</td>
                                            <td>{{  $cahierTexte->planning->matiere->nom }}  </td>
                                            <td>{{$cahierTexte->planning->jour}}</td>
                                            <td>{{$cahierTexte->created_at}}</td>
                                            <td>  <a href="{{ URL::to('cahierTexte/'.$cahierTexte->id.'/edit') }}" class="btn btn-icon btn-icon-circle btn-secondary btn-icon-style-2"><span class="btn-icon-wrap"><i class="fa fa-pencil"></i></span></a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>nom</th>
                                        <th>Année Scolaire</th>
                                        <th>Niveau</th>
                                        <th>Serie</th>
                                        <th>action</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{asset('vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{asset('vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{asset('vendors/datatables.net-dt/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{asset('vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{asset('vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{asset('vendors/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{asset('vendors/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{asset('vendors/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{asset('vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{asset('vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{asset('vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{asset('dist/js/dataTables-data.js') }}"></script>
@endsection
