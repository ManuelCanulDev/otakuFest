@extends('layouts.app')

@section('template_title')
    {{ $typeTicket->name ?? 'Show Type Ticket' }}
@endsection

@section('content')
    <section class="content container">
        <div class="row mb-2">
            <div class="col-md-6">
                <a href="{{ route('type-tickets.index') }}" class="btn btn-info" role="button">Regresar</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Type Ticket</span>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Nombre Ticket:</strong>
                            {{ $typeTicket->nombre_ticket }}
                        </div>
                        <div class="form-group">
                            <strong>Costo Ticket:</strong>
                            {{ $typeTicket->costo_ticket }}
                        </div>
                        <div class="form-group">
                            <strong>Cuantos Ticket:</strong>
                            {{ $typeTicket->cuantos_ticket }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Vencimiento Ticket:</strong>
                            {{ $typeTicket->fecha_vencimiento_ticket }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
