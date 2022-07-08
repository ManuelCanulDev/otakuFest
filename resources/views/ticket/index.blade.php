@extends('layouts.app')

@section('template_title')
    Ticket
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
                                {{ __('Ticket') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('tickets.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

										<th>Type Ticket Id</th>
										<th>User Id</th>
										<th>Nombres</th>
										<th>Apellidos</th>
										<th>Telefono</th>
										<th>Correo</th>
										<th>Asistio</th>
										<th>Pagado</th>
										<th>Status</th>
                                        <th colspan="2">Opciones</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tickets as $ticket)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $ticket->typeTicket->nombre_ticket }}</td>
											<td>{{ $ticket->user->name }}</td>
											<td>{{ $ticket->nombres }}</td>
											<td>{{ $ticket->apellidos }}</td>
											<td>{{ $ticket->telefono }}</td>
											<td>{{ $ticket->correo }}</td>
											<td>{{ $ticket->asistio }}</td>
											<td>{{ $ticket->pagado }}</td>
											<td>{{ $ticket->status }}</td>
                                            <td><button type="submit" class="btn btn-warning btn-sm"><i class="fa fa-fw fa-trash"></i> Acreditar</button></td>
                                            <td>
                                                <form action="{{ route('tickets.destroy',$ticket->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('tickets.show',$ticket->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('tickets.edit',$ticket->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $tickets->links() !!}
            </div>
        </div>
    </div>
@endsection
