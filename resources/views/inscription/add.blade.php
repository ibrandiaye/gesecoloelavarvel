@extends('layout')
@section('content')
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="#">Table de Bord</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ajouter Inscription</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    <!-- Container -->
    <div class="container">
        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="external-link"></i></span></span>Ajouter Inscription</h4>
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                        <div class="col-sm">
                            <form class="needs-validation" method="POST" action="{{ url('inscription') }}" novalidate>
                                {{ csrf_field() }}
                                <div class="form-row">
                                    <div class="col-md-4 mb-10">
                                        <label for="validationCustom01">Montant reçu</label>
                                        <input type="number" class="form-control" id="validationCustom01" name="montant" placeholder="Saisir le montant reçu"  required>
                                        <div class="invalid-feedback">
                                            Champ obligatoire
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-10">
                                        <label for="validationCustom01">Classe</label>
                                            <select class="form-control select2 classe" name="classe_id" required>
                                            <option value="">Sélectionner</option>
                                            @foreach($classes as $classe)
                                                <option value="{{  $classe->id }}">{{ $classe->nom }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-tooltip"> Champs obligatoire </div>
                                    </div>
                                    <div class="col-md-4 mb-10" id="bodyData">
                                        {{--<div class="custom-control custom-radio mb-10">
                                            <input id="credit" name="paymentMethod" class="custom-control-input" checked="" type="radio">
                                            <label class="custom-control-label" for="credit">Credit card</label>
                                        </div>
                                        <div class="custom-control custom-radio mb-10">
                                            <input id="debit" name="paymentMethod" class="custom-control-input" type="radio">
                                            <label class="custom-control-label" for="debit">Debit card</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input id="paypal" name="paymentMethod" class="custom-control-input" type="radio">
                                            <label class="custom-control-label" for="paypal">PayPal</label>
                                        </div>--}}
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

    <script>
        $(".classe").change(function () {
            /* $( ".commune option:selected" ).each(function() {
             str +=
             });*/
            // var str = document.getElementById('commune').value;
            //alert("Handler for .change() called." + str);
            var selectedClasse = $(this).children("option:selected").val();
            // alert("You have selected the country - " + selectedCountry);
            var bodyData = "";
            $.ajax({
                type:'GET',
                url:'/get/asc/commune/'+selectedCommune,
                data:'_token = <?php echo csrf_token() ?>',
                success:function(data) {
                    console.log(data);
                    //var bodyData = " <option value=''>Sélectionner</option>";
                    $.each(data,function(index,row){
                        bodyData +=" <div class='custom-control custom-radio mb-10'>"+
                        "<input id='credit' name='programme_id' value="+row.id+" class='custom-control-input'  type='radio' required>"+
                        "<label class='custom-control-label' for='credit'>"+row.nom+"</label>"+
                        "</div>" ;
                    });
                    $("#bodyData").html(bodyData);
                }
            });

        });

    </script>
@endsection