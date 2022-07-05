<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('nombre_ticket') }}
            {{ Form::text('nombre_ticket', $typeTicket->nombre_ticket, ['class' => 'form-control' . ($errors->has('nombre_ticket') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Ticket']) }}
            {!! $errors->first('nombre_ticket', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('costo_ticket') }}
            {{ Form::text('costo_ticket', $typeTicket->costo_ticket, ['class' => 'form-control' . ($errors->has('costo_ticket') ? ' is-invalid' : ''), 'placeholder' => 'Costo Ticket']) }}
            {!! $errors->first('costo_ticket', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cuantos_ticket') }}
            {{ Form::text('cuantos_ticket', $typeTicket->cuantos_ticket, ['class' => 'form-control' . ($errors->has('cuantos_ticket') ? ' is-invalid' : ''), 'placeholder' => 'Cuantos Ticket']) }}
            {!! $errors->first('cuantos_ticket', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_vencimiento_ticket') }}
            {{ Form::date('fecha_vencimiento_ticket', $typeTicket->fecha_vencimiento_ticket, ['class' => 'form-control' . ($errors->has('fecha_vencimiento_ticket') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Vencimiento Ticket']) }}
            {!! $errors->first('fecha_vencimiento_ticket', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Ejecutar</button>
    </div>
</div>
