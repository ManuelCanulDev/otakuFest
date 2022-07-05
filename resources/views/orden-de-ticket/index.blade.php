@extends('layouts.app')

@section('template_title')
    Orden De Ticket
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Orden De Ticket') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('orden-de-tickets.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Token</th>
										<th>Uid</th>
										<th>Fecha Vencimiento Orden</th>
										<th>Costo Total Orden</th>
										<th>Pagado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ordenDeTickets as $ordenDeTicket)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $ordenDeTicket->user_id }}</td>
											<td>{{ $ordenDeTicket->telefono_orden }}</td>
											<td>{{ $ordenDeTicket->correo_orden }}</td>
											<td>{{ $ordenDeTicket->token }}</td>
											<td>{{ $ordenDeTicket->uid }}</td>
											<td>{{ $ordenDeTicket->fecha_vencimiento_orden }}</td>
											<td>{{ $ordenDeTicket->costo_total_orden }}</td>
											<td>{{ $ordenDeTicket->pagado }}</td>

                                            <td>
                                                <form action="{{ route('orden-de-tickets.destroy',$ordenDeTicket->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('orden-de-tickets.show',$ordenDeTicket->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('orden-de-tickets.edit',$ordenDeTicket->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
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
@endsection
