@extends('layouts.app')

@section('template_title')
    Create Ticket
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

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Ticket</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tickets.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('ticket.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
