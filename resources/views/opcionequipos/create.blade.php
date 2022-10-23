@extends('index')
@section('contenedorsiderbar')
         <h1  class="lead mb-4" style="font-size: 25px" ><b>Registrar entrada de equipos</b></h1>
@endsection
@section('content')
{{-- card register--}}
<div class="card">
    <div class="card-header m-0">
        <p _ngcontent-serverapp-c93="" class="lead">Completar todos los datos requeridos</p>

    </div>
    <div class="card-body me-lg-auto">
      <blockquote class="blockquote mb-0">
          {{-- formuario --}}
          <div class="container my-0 " id="advanced-search-form">
            <form  action="{{route('rutaequipos.store')}}" method="POST">
                @csrf {{-- token --}}
                <div class="form-group ng-untouched ng-pristine ng-invalid">
                     <label for="last-name">Código</label>
                     <input type="text" class="form-control" placeholder="Ingrese código" name="codigo"id="codigo">
                     @error('codigo')
                    <label  class="form-control alert alert-danger my" for="error">{{$message}}</label>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="last-name">Descripción</label>
                     <textarea class="form-control" name="descripcion" id="descripcion" cols="126" rows="1" placeholder="Ingrese descripción"></textarea>
                    {{-- errores --}}
                    @error('descripcion')
                     <label  class="form-control alert alert-danger my" for="error">{{$message}}</label>
                     @enderror
                </div>
                <div class="form-group">
                    <label for="serie">Serie</label>
                     <input type="text" class="form-control" name="serie" id="serie"  placeholder="Ingrese Serie">
                    @error('serie')
                    <label  class="form-control alert alert-danger my" for="error">{{$message}}</label>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="marca">Marca</label>
                    <input type="text" class="form-control" name="marca"id="marca"  placeholder="Ingrese marca">
                     @error('marca')
                    <label  class="form-control alert alert-danger my" for="error">{{$message}}</label>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="condicion">Condición</label>
                    <input type="text" class="form-control" name="condicion"  id="condicion" placeholder="Ingrese codición">
                     @error('condicion')
                   <label  class="form-control alert alert-danger my" for="error">{{$message}}</label>
                  @enderror
                </div>
                <!---{{-- tabla site --}}
                <div class="form-group">
                    <label for="condicion">site_id</label>
                    <select name="site_id" id=" ">site</select>
                     <input type="text"> hol</input>
                    <input type="text" class="form-control" name="condicion"  id="condicion" placeholder="Ingrese codición">
                     @error('condicion')
                   <label  class="form-control alert alert-danger my" for="error">{{$message}}</label>
                  @enderror
                </div>
                {{-- end tabla site --}}----->
                <div class="form-group">
                    <label for="unidad">Unidad de medida</label>
                    <input type="text" class="form-control" name="unidad"id="unidad"  placeholder="Ingrese unidad de medida">
                     @error('unidad')
                      <label  class="form-control alert alert-danger my" for="error">{{$message}}</label>
                      @enderror
                </div>
                <div class="form-group">
                    <label for="cantidad">Cantidad</label>
                    <input type="number" class="form-control"name="cantidad"  id="cantidad" placeholder="Ingrese cantidad">
                     @error('cantidad')
                    <label  class="form-control alert alert-danger my" for="error">{{$message}}</label>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="Estado">Estado</label>
                    <input type="text" class="form-control" name="estado"  id="estado" placeholder="Estado">
                     @error('estado')
                      <label  class="form-control alert alert-danger my" for="error">{{$message}}</label>
                      @enderror
                </div>
                {{-- botones --}}
                <div class="clearfix">
                <div class="form-group">
                     <button class=" califa form-control" aria-current="page" id="advanced-search-form" type="submit"><i class="bi bi-file-earmark-plus-fill"></i>Registrar Equipo</button>
                     <a href="{{route('rutaequipos.index')}}"id="advanced-search-form" class="califa form-control "><i class="bi bi-x-lg"></i>Cancelar</a>
                </div>
                {{-- botones --}}
            </div>
             </form>
          </div>
        {{-- end form --}}
       </blockquote>
    </div>
  </div>
</div>
{{-- end card register --}}


@endsection
