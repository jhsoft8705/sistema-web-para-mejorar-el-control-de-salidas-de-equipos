@extends('layouts.app')

@section('template_title')
    {{ $site->name ?? 'Show Site' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Site</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('sites.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $site->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Codigo:</strong>
                            {{ $site->codigo }}
                        </div>
                        <div class="form-group">
                            <strong>Región:</strong>
                            {{ $site->region }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $site->direccion }}
                        </div>
                        <div class="form-group">
                            <strong>Oym:</strong>
                            {{ $site->oym }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $site->estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
