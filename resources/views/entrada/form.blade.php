<div class="box box-info padding-1">
    <div class="box-body">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="Nombre">Nombre</label>
                    {{ Form::text('Nombre', $entrada->cantidad, ['class' => 'form-control' . ($errors->has('Nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre de entrada']) }}
                    {!! $errors->first('Nombre', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <label class="form-control-label" for=" ">Procedencia</label>
                <select type="select" id="equipo_id" name="equipo_id" class="form-control form-select"
                    value="{{ old('equipo_id',$entrada->equipo_id) }}">
                    <option value="" disabled>--Seleccionar--</option>
                    @foreach($sites as $site)
                        <option value="{{ $site->id }}">{{ $site->nombre }}</option>
                        {!! $errors->first('equipo_id', '<div class="invalid-feedback">:message</div>') !!}
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-control-label" for="listAsignacionFamiliar">Estado</label>
                <select name="estado" id="estado" class="form-control form-select" value="{{ $entrada->estado }}"
                    placeholder="seleccionar">
                    <option value="0" disabled>seleccionar</option>
                    <option value="1">Activo</option>
                    <option value="2">Inactivo</option>
                </select>
                {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-6">
                <label class="form-control-label" for=" ">Equipo</label>
                <select type="select" id="equipo_id" name="equipo_id" class="form-control form-select"
                    value="{{ old('equipo_id',$entrada->equipo_id) }}">
                    <option value="" disabled>--Seleccionar--</option>
                    @foreach($equipos as $equipo)
                        <option value="{{ $equipo->id }}">{{ $equipo->alias }}</option>
                        {!! $errors->first('equipo_id', '<div class="invalid-feedback">:message</div>') !!}
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="cantidad">Cantidad</label>
                    <input type="number" name="cantidad" class="form-control form" id="cantidad" placeholder="Cantidad">
                    {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

        </div>
        <br>
        <div class="box-footer mt20">
            <a class="btn btn-info float-sm-end" id="agregar" href="#agregar"><i class="fa fa-times-circle"></i> Agregar equipo</a>
        </div>
    </div>

     {{-- detalle de entrada --}}
 <div class="form-group">
    <h4 class="card-title">Detalles de Entrada</h4>
    <div class="table-responsive col-md-12">
        <table id="detalles" class="table table-striped">
            <thead>
                <tr>
                    <th>Eliminar</th>
                    <th>Nombre</th>
                    <th>Procedencia</th>
                    <th>Cantidad</th>
                    <th>Estado</th>
                    <th align="center">SubTotal</th>

                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th colspan="5">
                        <p align="right">TOTAL:</p>
                    </th>
                    <th colspan="1">
                        <p align="center"><span align="right" id="total_productos_html">PEN 0.00</span> <input type="hidden"
                                name="totalordenes" id="totalprocutos"></p>
                    </th>
                </tr>
            </tfoot>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
{{-- emd detalle entrada --}}

