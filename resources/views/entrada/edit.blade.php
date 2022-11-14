@extends('index')

@section('template_title')
    Update Entrada
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Entrada</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('entradas.update', $entrada->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('entrada.form')


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
