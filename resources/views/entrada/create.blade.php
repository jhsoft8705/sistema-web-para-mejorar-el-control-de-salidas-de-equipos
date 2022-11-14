@extends('index')

@section('template_title')
    Create Entrada
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Agregar Entrada de equipos</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('entradas.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('entrada.form')
                            <div class="col-md-6  mb-4">
                                <br>
                                <button id="btnActionForm" type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i> <span id="btnText">Guardar</span></button>
                                <a class="btn btn-danger" href="{{route('entradas.index')}}"><i class="fa fa-times-circle"></i> Cancelar</a>
                             </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
