 {{-- cuerpo o form --}}
 <div class="row">
    <div class="col-md-6">
        <label class="form-control-label" for=" ">Procedencia</label>
        <select type="select" id="sitio_id" name="sitio_id"  class="form-control form-select" value="{{old('sitio_id',$equipo->sitio_id)}}">
            <option value="" disabled>--Seleccionar--</option>
             @foreach ($sites as $site)
            <option    value="{{$site->id}}">{{$site->nombre}}</option>
            {!! $errors->first('sitio_id', '<div class="invalid-feedback">:message</div>') !!}
            @endforeach
         </select>
     </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="alias" class="form-control-label">Denominación</label>
            {{ Form::text('alias', $equipo->alias, ['class' => 'form-control' . ($errors->has('alias') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('alias', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="codigo">Código CEN</label>
            {{ Form::text('codigo', $equipo->codigo, ['class' => 'form-control' . ($errors->has('codigo') ? ' is-invalid' : ''), 'placeholder' => 'Codigo CEN']) }}
            {!! $errors->first('codigo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="ocupacion" class="form-control-label">Serie</label>
            {{ Form::text('serie', $equipo->serie, ['class' => 'form-control' . ($errors->has('serie') ? ' is-invalid' : ''), 'placeholder' => 'Serie']) }}
            {!! $errors->first('serie', '<div class="invalid-feedback">:message</div>') !!}
         </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="descripcion">Detalles</label>
            {{ Form::text('descripcion', $equipo->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>

    <div class="col-md-6">
        <label class="form-control-label" for="condicion">Condición</label>
        <select class="form-control form-select" id="condicion" name="condicion" >
            <option value="0" disabled >seleccionar</option>
            <option value="Operativo">Operativo</option>
            <option value="No operativo">No operativo</option>
        </select>
        {!! $errors->first('condicion', '<div class="invalid-feedback">:message</div>') !!}

    </div>
</div>
<br>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="fecha_ingreso" class="form-control-label">Medición</label>
            {{ Form::text('unidad_medida', $equipo->unidad_medida, ['class' => 'form-control' . ($errors->has('unidad_medida') ? ' is-invalid' : ''), 'placeholder' => 'Medición']) }}
            {!! $errors->first('unidad_medida', '<div class="invalid-feedback">:message</div>') !!}                    </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="fecha_cese" class="form-control-label">Cantidad</label>
            {{ Form::number('cantidad', $equipo->cantidad, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
            {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <label class="form-control-label" for="listAsignacionFamiliar">Estado</label>
        <select name="estado" id="estado" class="form-control form-select" value="{{$equipo->estado}}" placeholder="seleccionar">
            <option value="0" disabled >seleccionar</option>
        <option value="1">En almacen</option>
        <option value="2">Fuera de almacen</option>
        </select>
        {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <br>
</div>
