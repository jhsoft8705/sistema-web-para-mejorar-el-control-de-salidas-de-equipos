<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('equipo_id') }}
            {{ Form::text('equipo_id', $salida->equipo_id, ['class' => 'form-control' . ($errors->has('equipo_id') ? ' is-invalid' : ''), 'placeholder' => 'Equipo Id']) }}
            {!! $errors->first('equipo_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('consignado_id') }}
            {{ Form::text('consignado_id', $salida->consignado_id, ['class' => 'form-control' . ($errors->has('consignado_id') ? ' is-invalid' : ''), 'placeholder' => 'Consignado Id']) }}
            {!! $errors->first('consignado_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('alias') }}
            {{ Form::text('alias', $salida->alias, ['class' => 'form-control' . ($errors->has('alias') ? ' is-invalid' : ''), 'placeholder' => 'Alias']) }}
            {!! $errors->first('alias', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $salida->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>