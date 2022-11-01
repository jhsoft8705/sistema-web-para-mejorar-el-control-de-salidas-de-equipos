@extends('index')

@section('template_title')
    Create Equipo
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Equipo</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('equipos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('equipo.form')
                            <div class="col-md-6">
                                <br>
                                <button id="btnActionForm" type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i> <span id="btnText">Guardar</span></button>
                                <a class="btn btn-danger" href="{{route('equipos.index')}}"><i class="fa fa-times-circle"></i> Cancelar</a>
                             </div>
                            {{-- comment
                            <div class="modal-footer">
                                <button  type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i> <span id="btnText">Guardar</span></button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cancelar</button>
                            </div>--}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

