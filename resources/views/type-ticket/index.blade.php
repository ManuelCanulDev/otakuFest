@extends('layouts.app')

@section('template_title')
    Type Ticket
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Tipo de Ticket') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('type-tickets.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Nuevo') }}
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

										<th>Nombre Ticket</th>
										<th>Costo Ticket</th>
										<th>Cuantos Ticket</th>
										<th>Fecha Vencimiento Ticket</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($typeTickets as $typeTicket)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $typeTicket->nombre_ticket }}</td>
											<td>{{ $typeTicket->costo_ticket }}</td>
											<td>{{ $typeTicket->cuantos_ticket }}</td>
											<td>{{ $typeTicket->fecha_vencimiento_ticket }}</td>

                                            <td>
                                                <form action="{{ route('type-tickets.destroy',$typeTicket->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('type-tickets.show',$typeTicket->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('type-tickets.edit',$typeTicket->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $typeTickets->links() !!}
            </div>
        </div>
    </div>
@endsection
