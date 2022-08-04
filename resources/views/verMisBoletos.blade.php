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
                                            <th scope="col">Tipo de Boleto</th>
                                            <th scope="col">Número de Orden</th>
                                            <th scope="col">Nombre Asistente</th>
                                            <th scope="col">Pagado</th>
                                            <th scope="col">Usado</th>
                                            <th scope="col">Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($boletos as $boleto)
                                            <tr>
                                                <th scope="row">{{ $boleto->typeTicket->nombre_ticket }}
                                                    @if ($boleto->type_ticket_id == 1)
                                                    ({{ $boleto->fecha_asistencia }})
                                                    @endif
                                                </th>
                                                <td>{{ $boleto->orden->uid }}</td>
                                                <td>

                                                    @if ($boleto->type_ticket_id == 1)
                                                        @if ($boleto->nombres != '' && $boleto->apellidos != '' && $boleto->fecha_asistencia != '')
                                                            {{ $boleto->nombres }} {{ $boleto->apellidos }}
                                                        @else
                                                            {{ 'NO ASIGNADO' }}
                                                        @endif
                                                    @else
                                                        @if ($boleto->nombres != '' && $boleto->apellidos != '')
                                                            {{ $boleto->nombres }} {{ $boleto->apellidos }}
                                                        @else
                                                            {{ 'NO ASIGNADO' }}
                                                        @endif
                                                    @endif

                                                </td>
                                                <td>
                                                    @if ($boleto->pagado)
                                                        {{ 'PAGADO' }}
                                                    @else
                                                        {{ 'NO PAGADO' }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($boleto->asistio)
                                                        {{ 'SI' }}
                                                    @else
                                                        {{ 'NO' }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($boleto->type_ticket_id == 1)
                                                        @if ($boleto->nombres != '' && $boleto->apellidos != '' && $boleto->fecha_asistencia != '')
                                                            <a role="button" class="btn btn-success"
                                                                href="/descargarBoletos/{{ $boleto->token }}">Descargar
                                                                Boleto</a>
                                                        @else
                                                            <a role="button" class="btn btn-warning"
                                                                href="/asignar-boletos/{{ $boleto->orden->uid }}">Asignar
                                                                Boleto</a>
                                                        @endif
                                                    @else
                                                        @if ($boleto->pagado)
                                                            @if ($boleto->nombres != '' && $boleto->apellidos != '')
                                                                <a role="button" class="btn btn-success"
                                                                    href="/descargarBoletos/{{ $boleto->token }}">Descargar
                                                                    Boleto</a>
                                                            @else
                                                                <a role="button" class="btn btn-warning"
                                                                    href="/asignar-boletos/{{ $boleto->orden->uid }}">Asignar
                                                                    Boleto</a>
                                                            @endif
                                                        @else
                                                            {{ 'SIN PAGO ACREDITADO' }}
                                                        @endif
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
