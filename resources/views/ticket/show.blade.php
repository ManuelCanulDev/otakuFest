@extends('layouts.app')

@section('template_title')
    {{ $ticket->name ?? 'Show Ticket' }}
@endsection

@section('content')
    <section class="content container">
        <div class="row mb-2">
            <div class="col-md-6">
                <a href="{{ route('tickets.index') }}" class="btn btn-info" role="button">Regresar</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Ticket</span>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Type Ticket Id:</strong>
                            {{ $ticket->type_ticket_id }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $ticket->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Nombres:</strong>
                            {{ $ticket->nombres }}
                        </div>
                        <div class="form-group">
                            <strong>Apellidos:</strong>
                            {{ $ticket->apellidos }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $ticket->telefono }}
                        </div>
                        <div class="form-group">
                            <strong>Correo:</strong>
                            {{ $ticket->correo }}
                        </div>
                        <div class="form-group">
                            <strong>Asistio:</strong>
                            {{ $ticket->asistio }}
                        </div>
                        <div class="form-group">
                            <strong>Pagado:</strong>
                            {{ $ticket->pagado }}
                        </div>
                        <div class="form-group">
                            <strong>Token:</strong>
                            {{ $ticket->token }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $ticket->status }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
