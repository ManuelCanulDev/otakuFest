@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Panel de Control') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @auth
                            @if (Auth::user()->role == 'A')
                                <div class="row">
                                    <div class="col-md-6">
                                        <a role="button" class="btn btn-info w-100"
                                            href="{{ URL::to('type-tickets') }}">{{ __('Type Tickets') }}</a>
                                    </div>
                                    <div class="col-md-6">
                                        <a role="button" class="btn btn-info w-100"
                                            href="{{ URL::to('tickets') }}">{{ __('Tickets') }}</a>
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
                        <br><br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-warning">SOPORTE SIEMPRE ESTARÁ PENDIENTE DE PROBLEMAS CON LA PLATAFORMA.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
