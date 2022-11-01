<div class="row">

     <div class="col-md-6">
        <div class="form-group">
            <label for="codigo">Nombre</label>
            {{ Form::text('nombre', $site->nombre, ['class' => 'form-control'  . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="codigo">Código</label>
            {{ Form::text('codigo', $site->codigo, ['class' => 'form-control' . ($errors->has('codigo') ? ' is-invalid' : ''), 'placeholder' => 'Codigo']) }}
            {!! $errors->first('codigo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="codigo">Dirección</label>
            {{ Form::text('direccion', $site->direccion, ['class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => 'Direccion']) }}
            {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="codigo">Región</label>
            {{ Form::text('region', $site->region, ['class' => 'form-control' . ($errors->has('region') ? ' is-invalid' : ''), 'placeholder' => 'Region']) }}
            {!! $errors->first('region', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="codigo">Oym</label>
            {{ Form::text('oym', $site->oym, ['class' => 'form-control' . ($errors->has('oym') ? ' is-invalid' : ''), 'placeholder' => 'Oym']) }}
            {!! $errors->first('oym', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <label class="form-control-label" for="estado">Estado</label>
        <select class="form-control form-select" id="estado" name="estado" >
            <option value="0">Seleccionar</option>
            <option value="1">Activo</option>
            <option value="2">Inactivo</option>
        </select>
        {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}

    </div>
</div>
 {{-- end --}}
