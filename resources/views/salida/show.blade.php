@extends('index')

@section('template_title')
    {{ $salida->name ?? 'Show Salida' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Salida</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('salidas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Equipo Id:</strong>
                            {{ $salida->equipo_id }}
                        </div>
                        <div class="form-group">
                            <strong>Consignado Id:</strong>
                            {{ $salida->consignado_id }}
                        </div>
                        <div class="form-group">
                            <strong>Alias:</strong>
                            {{ $salida->alias }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $salida->estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
