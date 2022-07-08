@extends('layouts.app')

@section('template_title')
    Orden De Ticket
@endsection

@section('content')
    <div class="container">
        <div class="row mb-2">
            <div class="col-md-6">
                <a href="{{ route('home') }}" class="btn btn-info" role="button">Regresar</a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Orden De Ticket') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('orden-de-tickets.create') }}"
                                    class="btn btn-primary btn-sm float-right" data-placement="left">
                                    {{ __('Create New') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>User Id</th>
                                        <th>Telefono Orden</th>
                                        <th>Correo Orden</th>
                                        <th>Uid</th>
                                        <th>Fecha Vencimiento Orden</th>
                                        <th>Costo Total Orden</th>
                                        <th>Pagado</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ordenDeTickets as $ordenDeTicket)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $ordenDeTicket->user->name }}</td>
                                            <td>{{ $ordenDeTicket->telefono_orden }}</td>
                                            <td>{{ $ordenDeTicket->correo_orden }}</td>
                                            <td>{{ $ordenDeTicket->uid }}</td>
                                            <td>{{ $ordenDeTicket->fecha_vencimiento_orden }}</td>
                                            <td>{{ $ordenDeTicket->costo_total_orden }}</td>
                                            <td>{{ $ordenDeTicket->pagado }}</td>
                                            <td>
                                                @if ($ordenDeTicket->pagado == 'SI')
                                                <button type="button" class="btn btn-sm btn-danger"
                                                        data-toggle="modal"
                                                        data-target="#exampleModalQWEQWEQWE{{ $ordenDeTicket->id }}">
                                                        Desacreditar
                                                    </button>
                                                @else
                                                    <button type="button" class="btn btn-sm btn-warning"
                                                        data-toggle="modal"
                                                        data-target="#exampleModal{{ $ordenDeTicket->id }}">
                                                        Acreditar
                                                    </button>
                                                @endif
                                            </td>
                                            <td>
                                                <form
                                                    action="{{ route('orden-de-tickets.destroy', $ordenDeTicket->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('orden-de-tickets.show', $ordenDeTicket->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('orden-de-tickets.edit', $ordenDeTicket->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $ordenDeTickets->links() !!}
            </div>
        </div>
    </div>

    @foreach ($ordenDeTickets as $ordenDeTicket)
        <div class="modal fade" id="exampleModal{{ $ordenDeTicket->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel{{ $ordenDeTicket->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel{{ $ordenDeTicket->id }}">¿Realmente desea aprobar
                            todos los tickets de la orden {{ $ordenDeTicket->uid }}?</h5>

                    </div>
                    <div class="modal-body">
                        <ul>
                            @foreach ($ordenDeTicket->tickets()->where('pagado', false)->get()
        as $ticket)
                                <li>{{ $ticket->typeTicket->nombre_ticket }}</li>
                            @endforeach
                        </ul>
                        <div class="row">
                            <form action="{{ route('acreditarBoletosAjax') }}" method="post">
                                <input type="hidden" name="uid" value="{{ $ordenDeTicket->uid }}">
                                @csrf
                                <button type="submit" class="btn btn-warning">Acreditar Todos</button>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @foreach ($ordenDeTickets as $ordenDeTicket)
        <div class="modal fade" id="exampleModalQWEQWEQWE{{ $ordenDeTicket->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabelQWEQWEQWE{{ $ordenDeTicket->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabelQWEQWEQWE{{ $ordenDeTicket->id }}">¿Realmente desea desacreditar
                            todos los tickets de la orden {{ $ordenDeTicket->uid }}?</h5>

                    </div>
                    <div class="modal-body">
                        <ul>
                            @foreach ($ordenDeTicket->tickets()->where('pagado', true)->get()
        as $ticket)
                                <li>{{ $ticket->typeTicket->nombre_ticket }}</li>
                            @endforeach
                        </ul>
                        <div class="row">
                            <form action="{{ route('desAcreditarBoletosAjax') }}" method="post">
                                <input type="hidden" name="uid" value="{{ $ordenDeTicket->uid }}">
                                @csrf
                                <button type="submit" class="btn btn-warning">Desacreditar Todos</button>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
