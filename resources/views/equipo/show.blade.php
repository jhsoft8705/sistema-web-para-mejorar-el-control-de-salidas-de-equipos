@extends('index')

@section('template_title')
    {{ $equipo->name ?? 'Show Equipo' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Equipo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('equipos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Sitio Id:</strong>
                            {{ $equipo->sitio_id }}
                        </div>
                        <div class="form-group">
                            <strong>Codigo:</strong>
                            {{ $equipo->codigo }}
                        </div>
                        <div class="form-group">
                            <strong>Alias:</strong>
                            {{ $equipo->alias }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $equipo->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Serie:</strong>
                            {{ $equipo->serie }}
                        </div>
                        <div class="form-group">
                            <strong>Condicion:</strong>
                            {{ $equipo->condicion }}
                        </div>
                        <div class="form-group">
                            <strong>Unidad Medida:</strong>
                            {{ $equipo->unidad_medida }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $equipo->cantidad }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $equipo->estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
