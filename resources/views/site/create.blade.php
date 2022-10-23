@extends('index')

@section('template_title')
       Create Site
@endsection
@section('contenedorsiderbar')
    <h1 class="lead" style="font-size: 24px" ><b>
        Registrar estaciones - sites</b></h1>

@endsection
@section('content')
           {{-- card register--}}
    <div class="card  mb-4">
        <div class="card-header m-0">
        <p _ngcontent-serverapp-c93="" class="lead">Completar todos los datos requeridos</p>
            </div>
            <div class="card-body me-lg-auto container-sm">
             <blockquote class="blockquote mb-0">
              {{-- formuario --}}
             <div class="container  " id="advanced-search-form">
             <form  action="{{route('sites.store')}}" method="POST">
                @csrf {{-- token --}}
                @include('site.form')

                {{-- botones --}}
                <div class="row">
                    <div class="col">
                        <div class="form-fluid">
                            {{ Form::label(' ') }}
                            <button class=" califa form-control" aria-current="page" id="advanced-search-form" type="submit"><i class="bi bi-file-earmark-plus-fill"></i>Registrar</button>
                         </div>

                    </div>
                    <div class="col">
                        <div class="form-fluid">
                            {{ Form::label(' ') }}
                             <a href="{{route('sites.index')}}" class=" califa form-control" aria-current="page" id="advanced-search-form"><i class="bi bi-x-lg"></i>Cancelar </a>
                        </div>
                    </div>
                </div>
            {{-- botones --}}
             </form>
          </div>
        {{-- end form --}}
         </blockquote>
        </div>
    </div>
     {{-- end card register --}}




@endsection
