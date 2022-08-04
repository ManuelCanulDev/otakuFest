@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-2">
            <div class="col-md-6">
                <a href="{{ route('home') }}" class="btn btn-info" role="button">Regresar</a>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Mandar Notificación') }}</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                @if ($errors->any())
                                    <h4>{{ $errors->first() }}</h4>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ url('enviarNotificaciones') }}" method="POST">
                                    @method('POST')
                                    @csrf
                                    <div class="form-group">
                                        <label for="mensaje">Escribe lo que quieres anunciar</label>
                                        <textarea name="mensaje" class="form-control" id="mensaje" rows="3"></textarea>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="url">URL de botón</label>
                                        <input name="url" type="email" class="form-control" id="url"
                                            placeholder="https:://example.com">
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="grupo">Que grupo de usuarios</label>
                                        <select name="grupo" class="form-control" id="grupo">
                                            <option value="">-- SELECCIONA UNA OPCIÓN --</option>
                                            <option value="T">TODOS</option>
                                            @foreach ($tipos as $tipo)
                                                <option value="{{ $tipo->id }}">{{ $tipo->nombre_ticket }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button role="button" class="btn btn-warning w-100"
                                                type="submit">{{ __('ENVIAR') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
