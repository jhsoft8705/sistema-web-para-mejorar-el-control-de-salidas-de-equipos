<div class="box box-info padding-1">
    <div class="box-body">


        <div class="form-fluid">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $site->nombre, ['class' => 'form-control'  . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-fluid">
            {{ Form::label('codigo') }}
            {{ Form::text('codigo', $site->codigo, ['class' => 'form-control' . ($errors->has('codigo') ? ' is-invalid' : ''), 'placeholder' => 'Codigo']) }}
            {!! $errors->first('codigo', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-fluid">
            {{ Form::label('direccion') }}
            {{ Form::text('direccion', $site->direccion, ['class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => 'Direccion']) }}
            {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-fluid">
            {{ Form::label('Region') }}
            {{ Form::text('region', $site->region, ['class' => 'form-control' . ($errors->has('region') ? ' is-invalid' : ''), 'placeholder' => 'Region']) }}
            {!! $errors->first('region', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-fluid">
            {{ Form::label('oym') }}
            {{ Form::text('oym', $site->oym, ['class' => 'form-control' . ($errors->has('oym') ? ' is-invalid' : ''), 'placeholder' => 'Oym']) }}
            {!! $errors->first('oym', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-fluid">
            {{ Form::label('estado') }}
            <select name="estado" id="estado" class="form-control" value="{{$site->estado}}" placeholder="seleccionar">
                <option value="0">Seleccionar</option>
                <option value="1">Activo</option>
                <option value="2">Inactivo</option>
            </select>
             {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>


    </div>
</div>





