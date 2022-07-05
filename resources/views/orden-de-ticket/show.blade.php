@extends('layouts.app')

@section('template_title')
    {{ $ordenDeTicket->name ?? 'Show Orden De Ticket' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Orden De Ticket</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('orden-de-tickets.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $ordenDeTicket->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono Orden:</strong>
                            {{ $ordenDeTicket->telefono_orden }}
                        </div>
                        <div class="form-group">
                            <strong>Correo Orden:</strong>
                            {{ $ordenDeTicket->correo_orden }}
                        </div>
                        <div class="form-group">
                            <strong>Token:</strong>
                            {{ $ordenDeTicket->token }}
                        </div>
                        <div class="form-group">
                            <strong>Uid:</strong>
                            {{ $ordenDeTicket->uid }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Vencimiento Orden:</strong>
                            {{ $ordenDeTicket->fecha_vencimiento_orden }}
                        </div>
                        <div class="form-group">
                            <strong>Costo Total Orden:</strong>
                            {{ $ordenDeTicket->costo_total_orden }}
                        </div>
                        <div class="form-group">
                            <strong>Pagado:</strong>
                            {{ $ordenDeTicket->pagado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
