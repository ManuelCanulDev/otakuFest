@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Panel de Control') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                </div>
                            </div>
                        @endif

                        @auth
                            @if (Auth::user()->role == 'A')
                                <div class="row">
                                    <div class="col-md-6">
                                        <a role="button" class="btn btn-info w-100"
                                            href="{{ URL::to('type-tickets') }}">{{ __('Tipos de Tickets') }}</a>
                                    </div>
                                    <div class="col-md-6">
                                        <a role="button" class="btn btn-warning w-100"
                                            href="{{ URL::to('tickets') }}">{{ __('Tickets') }}</a>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <a role="button" class="btn btn-success w-100"
                                            href="{{ URL::to('orden-de-tickets') }}">{{ __('Mis Ordenes') }}</a>
                                    </div>
                                    <div class="col-md-6">
                                        <a role="button" class="btn btn-warning w-100"
                                            href="{{ URL::to('mandar-notificacion') }}">{{ __('Mandar Notificacion') }}</a>
                                    </div>
                                </div>
                            @else
                                <div class="row">
                                    <div class="col-md-6">
                                        <a role="button" class="btn btn-info w-100"
                                            href="{{ URL::to('adquirir-boletos') }}">{{ __('ADQUIRIR BOLETOS') }}</a>
                                    </div>
                                    <div class="col-md-6">
                                        <a role="button" class="btn btn-info w-100"
                                            href="{{ URL::to('ver-mis-boletos') }}">{{ __('VER MIS BOLETOS') }}</a>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <a role="button" class="btn btn-danger w-100"
                                            href="{{ URL::to('verMisOrdenes') }}">{{ __('VER MIS ORDENES DE PAGO') }}</a>
                                    </div>
                                </div>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>

        @auth
            @if (Auth::user()->role == 'A')
                <div class="row justify-content-center mt-5">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">{{ __('Boletos Restantes') }}</div>

                            <div class="card-body">
                                <div class="row">
                                    @foreach ($typeTicket as $ticket)
                                    <div class="col-md-3">
                                        <div class="card border-dark mb-3" style="max-width: 18rem;">
                                            <div class="card-header text-center">{{$ticket->nombre_ticket}} </div>
                                            <div class="card-body text-dark text-center">
                                                <h3>Quedan</h3>
                                                <h1 class="card-title"> {{$ticket->cuantos_quedan}} de {{ $ticket->cuantos_ticket }}</h1>

                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-warning">SOPORTE SIEMPRE ESTARÁ PENDIENTE DE PROBLEMAS CON LA
                                            PLATAFORMA.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endauth
    </div>
@endsection
