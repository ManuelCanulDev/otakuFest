@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-2">
            <div class="col-md-6">
                <a href="{{ route('home') }}" class="btn btn-info" role="button">Regresar</a>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Ver Mis Ordenes') }}</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Fecha de Vencimiento</th>
                                            <th scope="col">Costo Total</th>
                                            <th scope="col">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ordenes as $orden)
                                            <tr>
                                                <th scope="row">{{$orden->uid}}</th>
                                                <td>{{$orden->fecha_vencimiento_orden}}</td>
                                                <td>{{$orden->costo_total_orden}}</td>
                                                <td>
                                                    @if ($orden->pagado == "SI")
                                                    <a class="btn btn-info btn-sm" href="/asignar-boletos/{{ $orden->uid }}">Asignar Boletos</a>
                                                    @else
                                                    PAGO NO ACREDITADO
                                                    @endif

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
