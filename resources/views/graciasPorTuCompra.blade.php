@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-12">
                <h2>GRACIAS POR TU COMPRA | <b>ORDEN: {{$ordenTicket[0]->uid}}</b></h2>
                <img class="logo-panel animated-gif" src="{{ '/images/fiesta.gif' }}" alt="Logo">
            </div>
        </div>
        <br>
        <div class="row text-center">
            <div class="col-md-12">
                <div class="jumbotron">
                    <h1>Los boletos ya son casi tuyos</h1>
                    <p class="lead">Te hemos enviado un correo a la dirección: <b>{{$ordenTicket[0]->correo_orden}}</b>, con los pasos a seguir para que tus boletos se liberén y sean validos, ahi se encontrarán los medios de pago y demás información.</p>
                    <p ><h3 style="color: red;"><b>REVISA EL BUZON DE SPAM SI NO TE APARECEN EN TU BANDEJA PRINCIPAL</b></h3></p>
                    <p>¿No te llego? Reenvia <a href="{{ route('reenviarCorreoOrden',['uid' => $ordenTicket[0]->uid]) }}">Aquí</a></p>
                    <p><a class="btn btn-lg btn-success" href="{{ route('home') }}" role="button">¡Entendido!</a></p>
                  </div>
            </div>
        </div>
    </div>
@endsection
