<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('user_id') }}
            {{ Form::text('user_id', $ordenDeTicket->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'User Id']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('telefono_orden') }}
            {{ Form::text('telefono_orden', $ordenDeTicket->telefono_orden, ['class' => 'form-control' . ($errors->has('telefono_orden') ? ' is-invalid' : ''), 'placeholder' => 'Telefono Orden']) }}
            {!! $errors->first('telefono_orden', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('correo_orden') }}
            {{ Form::text('correo_orden', $ordenDeTicket->correo_orden, ['class' => 'form-control' . ($errors->has('correo_orden') ? ' is-invalid' : ''), 'placeholder' => 'Correo Orden']) }}
            {!! $errors->first('correo_orden', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('token') }}
            {{ Form::text('token', $ordenDeTicket->token, ['class' => 'form-control' . ($errors->has('token') ? ' is-invalid' : ''), 'placeholder' => 'Token']) }}
            {!! $errors->first('token', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('uid') }}
            {{ Form::text('uid', $ordenDeTicket->uid, ['class' => 'form-control' . ($errors->has('uid') ? ' is-invalid' : ''), 'placeholder' => 'Uid']) }}
            {!! $errors->first('uid', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_vencimiento_orden') }}
            {{ Form::text('fecha_vencimiento_orden', $ordenDeTicket->fecha_vencimiento_orden, ['class' => 'form-control' . ($errors->has('fecha_vencimiento_orden') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Vencimiento Orden']) }}
            {!! $errors->first('fecha_vencimiento_orden', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('costo_total_orden') }}
            {{ Form::text('costo_total_orden', $ordenDeTicket->costo_total_orden, ['class' => 'form-control' . ($errors->has('costo_total_orden') ? ' is-invalid' : ''), 'placeholder' => 'Costo Total Orden']) }}
            {!! $errors->first('costo_total_orden', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('pagado') }}
            {{ Form::text('pagado', $ordenDeTicket->pagado, ['class' => 'form-control' . ($errors->has('pagado') ? ' is-invalid' : ''), 'placeholder' => 'Pagado']) }}
            {!! $errors->first('pagado', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>