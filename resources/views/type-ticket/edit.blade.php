@extends('layouts.app')

@section('template_title')
    Update Type Ticket
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

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Tipo de Ticket</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('type-tickets.update', $typeTicket->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('type-ticket.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
