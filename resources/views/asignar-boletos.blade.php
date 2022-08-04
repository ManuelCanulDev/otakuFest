@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-2">
            <div class="col-md-6">
                <a href="{{ route('verMisOrdenes') }}" class="btn btn-info" role="button">Regresar</a>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Boletos no Asignados') }}</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">NIVEL</th>
                                            <th scope="col">ACCION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orden->tickets()->where([['status', '=', 'A'], ['pagado', '=', true], ['nombres', '=', null], ['apellidos', '=', null], ['fecha_asistencia', '=', null]])->get() as $ticket)
                                            <tr>
                                                <th scope="row">{{ $ticket->typeTicket->nombre_ticket }}</th>
                                                <td> <button type="button" class="btn btn-sm btn-warning"
                                                        data-toggle="modal" data-target="#exampleModal{{ $ticket->id }}">
                                                        Asignar
                                                    </button></td>
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
        <div class="row justify-content-center mt-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Boletos Asignados') }}</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">NIVEL</th>
                                            <th scope="col">NOMBRE(S)</th>
                                            <th scope="col">APELLIDOS</th>
                                            <th scope="col">ACCION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orden->tickets()->where([['status', '=', 'A'], ['pagado', '=', true], ['nombres', '!=', ''], ['apellidos', '!=', '']])->get() as $ticket)
                                            @if ($ticket->type_ticket_id == 1)
                                                <tr>
                                                    <th scope="row">{{ $ticket->typeTicket->nombre_ticket }} @if ($ticket->type_ticket_id == 1)
                                                            ({{ $ticket->fecha_asistencia }})
                                                        @endif
                                                    </th>
                                                    <td>{{ $ticket->nombres }}</td>
                                                    <td>{{ $ticket->apellidos }}</td>
                                                    <td>
                                                        @if ($ticket->fecha_asistencia == null)
                                                            <button type="button" class="btn btn-sm btn-warning"
                                                                data-toggle="modal"
                                                                data-target="#exampleModalQWEQE{{ $ticket->id }}">
                                                                Asignar
                                                            </button>
                                                        @else
                                                            <a href="{{ route('descargarBoletos', ['token' => $ticket->token]) }}"
                                                                class="btn btn-success btn-sm">DESCARGAR BOLETO</a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @else
                                                <tr>
                                                    <th scope="row">{{ $ticket->typeTicket->nombre_ticket }}</th>
                                                    <td>{{ $ticket->nombres }}</td>
                                                    <td>{{ $ticket->apellidos }}</td>
                                                    <td>
                                                        <a href="{{ route('descargarBoletos', ['token' => $ticket->token]) }}"
                                                            class="btn btn-success btn-sm">DESCARGAR BOLETO</a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @foreach ($orden->tickets()->where([['status', '=', 'A'], ['pagado', '=', true], ['nombres', '=', null], ['apellidos', '=', null], ['fecha_asistencia', '=', null]])->get() as $ticket)
            <div class="modal fade" id="exampleModal{{ $ticket->id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel{{ $ticket->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel{{ $ticket->id }}">Has selecccionado el boleto
                                {{ $ticket->typeTicket->nombre_ticket }} </h5>

                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-warning">
                                        Este boleto puede asignarse hasta 2 horas antes del evento.
                                    </div>
                                </div>
                            </div>
                            <form action="{{ route('superAsignarBoletos') }}" method="POST">
                                @method('POST')
                                @csrf
                                <div class="form-group">
                                    <label for="nombres">Nombres <small>(Como aparece en su identificación
                                            oficial).</small></label>
                                    <input required name="nombres" type="text" class="form-control" id="nombres"
                                        placeholder="Luffy">
                                </div>
                                <div class="form-group">
                                    <label for="apellidos">Apellidos <small>(Como aparece en su identificación
                                            oficial).</small></label>
                                    <input required name="apellidos" type="text" class="form-control" id="apellidos"
                                        placeholder="Monkey D.">
                                </div>
                                @if ($ticket->type_ticket_id == 1)
                                    <div class="form-group">
                                        <label for="fecha_asistencia">Fecha de Asistencia</label>
                                        <select required class="form-control" name="fecha_asistencia" id="fecha_asistencia">
                                            <option value="">-- SELCCIONAR UNA OPCIÓN --</option>
                                            <option value="2022-08-06">DIA: 6 DE AGOSTO DEL 2022</option>
                                            <option value="2022-08-07">DIA: 7 DE AGOSTO DEL 202</option>
                                        </select>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="telefono">Telefono<small> (opcional)</small></label>
                                    <input name="telefono" type="phone" class="form-control" id="telefono"
                                        placeholder="0000000000">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Correo<small> (opcional)</small></label>
                                    <input name="email" type="email" class="form-control" id="exampleFormControlInput1"
                                        placeholder="name@example.com">
                                </div>
                                <input type="hidden" name="order_uid" value="{{ $orden->uid }}">
                                <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                                <div class="form-group mt-2">
                                    <button type="submit" class="btn btn-success">Asignar Boleto</button>
                                </div>
                            </form>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <div class="alert alert-danger">
                                        Para reasignar el nombre, tendrá que comunicarse con los administradores.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        @foreach ($orden->tickets()->where([['status', '=', 'A'], ['pagado', '=', true], ['nombres', '!=', ''], ['apellidos', '!=', '']])->get() as $ticket)
            <div class="modal fade" id="exampleModalQWEQE{{ $ticket->id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalQWEQELabel{{ $ticket->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalQWEQELabel{{ $ticket->id }}">Has selecccionado el
                                boleto
                                {{ $ticket->typeTicket->nombre_ticket }} </h5>

                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-warning">
                                        Este boleto puede asignarse hasta 2 horas antes del evento.
                                    </div>
                                </div>
                            </div>
                            <form action="{{ route('superAsignarBoletosOnlyFechaAsistencia') }}" method="POST">
                                @method('POST')
                                @csrf

                                <div class="form-group">
                                    <label for="fecha_asistencia">Fecha de Asistencia</label>
                                    <select required class="form-control" name="fecha_asistencia" id="fecha_asistencia">
                                        <option value="">-- SELCCIONAR UNA OPCIÓN --</option>
                                        <option value="2022-08-06">DIA: 6 DE AGOSTO DEL 2022</option>
                                        <option value="2022-08-07">DIA: 7 DE AGOSTO DEL 202</option>
                                    </select>
                                </div>
                                <input type="hidden" name="order_uid" value="{{ $orden->uid }}">
                                <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                                <div class="form-group mt-2">
                                    <button type="submit" class="btn btn-success">Asignar Boleto</button>
                                </div>
                            </form>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <div class="alert alert-danger">
                                        Para reasignar el nombre, tendrá que comunicarse con los administradores.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
