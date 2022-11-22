@extends('index')

@section('template_title')
    Sites
@endsection
@section('contenedorsiderbar')
<div class="btn-group m-0 " data-toggle="buttons">
   <a href="{{ route('sites.create')}}" class="btn btn-secondary mr-2 "><i class="bi bi-folder-plus"></i> Agregar site</a>
     <a href="{{ route('sites.excel') }}" class="btn btn-warning"><i class="bi bi-file-earmark-spreadsheet"></i> Imprimir PDF</a>

 </div>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('LISTA DE ESTACIONES- SITES ') }}
                            </span>

                             <div class="float-right">
                                <a href="{{route('equipos.index')}}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                               _(Almacen)
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table  id="example"  class="display table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>N°</th>
                                        <th>Site</th>
                                        <th>Código</th>
                                         <th>Región</th>
                                        <th>Oym</th>
                                        <th>Estado</th>

                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sites as $site)
                                        <tr>
                                            <td>{{$site->id}}</td>
                                            <td>{{$site->nombre}}</td>
                                            <td>{{$site->codigo}}</td>
                                             <td>{{$site->region}}</td>
                                            <td>{{$site->oym}}</td>
                                            <td class="text-center">
                                                @if($site->estado==1)
                                                <span class="badge text-bg-primary">Activo</span>
                                                @else
                                                    <div class="badge text-bg-danger">Inactivo</div>

                                                @endif
                                            </td>
                                            <td>
                                                {{-- botones --}}
                                                    {{-- boton editar --}}
                                                     <a href="Update" data-bs-toggle="modal" data-bs-target="#mimodal{{$site->id}}"
                                                        class="text-success" data-bs-toggle="tooltip"
                                                       title="Editar">
                                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                           <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                           <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                         </svg>
                                                    </a>
                                                    <!-- Modal editar -->
                                                    <div class="modal fade "data-bs-backdrop="static" id="mimodal{{$site->id}}" tabindex="-1" role="dialog" aria-labelledby="mimodal" aria-hidden="false">
                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                               <div class="modal-header">
                                                               <h5 class="modal-title lead" id="mimodal"><b>Editar Site N°- {{$site->id}}</b></h5>
                                                               <button type="button" class="btn close border btn-lg btn-outline-danger" data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-bs-hidden="true">&times;</span>
                                                                </button>
                                                               </div>
                                                               <div class="modal-body">
                                                            {{-- cuerpo de modal --}}
                                                          <div _ngcontent-serverapp-c93="" class="card p-sm-2 p-md-8 signup-form">
                                                           <div _ngcontent-serverapp-c93="" class="card-body">
                                                           <p _ngcontent-serverapp-c93="" class="lead">Completar todos los datos requeridos</p>
                                                         <form class="ng-untouched ng-pristine ng-invalid" action="{{route('sites.update',$site->id)}}" method="POST">
                                                       @csrf {{-- token --}}
                                                       @method('PUT')
                                                       {{-- from --}}
                                                        @include('site.form')
                                                       {{-- form --}}

                                                       <div class="btn-group modal-footer">
                                                           <button class="btn btn-primary active" aria-current="page" type="submit"><i class="bi bi-file-earmark-plus-fill"></i>Actualizar Equipo</button>
                                                          <a href="{{route('sites.index')}}" class="btn btn-primary"><i class="bi bi-x-lg"></i>Cancelar</a>
                                                        </div>
                                                       </form>
                                                       </div>
                                                           </div>
                                                       {{-- end cuerpo de modal --}}
                                                       </div>
                                                           </div>
                                                           </div>
                                                   </div>
                                                   {{-- end modal editar --}}
                                                  {{-- end boton editar --}}
                                                     {{-- boton ver mas --}}
                                                     <a href="vermas" data-bs-toggle="modal" data-bs-target="#vermas{{$site->id}}"
                                                        class="text-info" data-bs-toggle="tooltip"
                                                       title="vermas">
                                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-info-square" viewBox="0 0 16 16">
                                                        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                                      </svg>
                                                       </a>
                                                       {{-- modal ver mas --}}
                                                       <div class="modal fade "data-bs-backdrop="static" id="vermas{{$site->id}}" tabindex="-1" role="dialog" aria-labelledby="mimodal" aria-hidden="false">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <div class="float-right">
                                                                 </div>
                                                            <h5 class="modal-title lead" id="mimodal"><b>Detalles del site {{$site->nombre}}-{{$site->codigo}}</b></h5>
                                                            <button type="button" class="btn close border btn-lg btn-outline-danger" data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-bs-hidden="true">&times;</span>
                                                            </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                   {{-- form ver mas --}}
                                                                   <section class="content container-fluid">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="card">
                                                                                <div class="card-header">
                                                                                    <div class="float-left">
                                                                                     </div>

                                                                                </div>

                                                                                <div class="card-body">

                                                                                    <div class="form-group">
                                                                                        <strong>Id Site:</strong>
                                                                                        {{ $site->id }}
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <strong>Nombre:</strong>
                                                                                        {{ $site->nombre }}
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <strong>Codigo:</strong>
                                                                                        {{ $site->codigo }}
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <strong>región:</strong>
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
                                                                                    <div class="form-group">
                                                                                        <strong>Fecha de registro:</strong>
                                                                                        {{ $site->created_at }}
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <strong>Fecha de Actualización:</strong>
                                                                                        {{ $site->updated_at }}
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </section>
                                                                {{-- end form  ver mas --}}
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                     {{-- end modal ver mas--}}
                                                     {{--end  boton ver mas --}}

                                                {{-- boton eliminar --}}
                                                   <a href="Delete" data-bs-toggle="modal" data-bs-target="#modaldelete{{$site->id}}"
                                                       class="text-danger" data-bs-toggle="tooltip"
                                                      title="Eliminar">
                                                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-x-square-fill" viewBox="0 0 16 16">
                                                        <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/>
                                                      </svg>                                                      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                                                   </svg>
                                                   </a>

                                                   {{-- boton eliminar --}}
                                                   <!-- Modal delete -->
                                                   <div class="modal fade "data-bs-backdrop="static" id="modaldelete{{$site->id}}" tabindex="-1" role="dialog" aria-labelledby="modaldelete" aria-hidden="false">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                         <svg  style="color: #DC3545"xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16">
                                                             <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                                                           </svg>
                                                        <h5 class="modal-title lead" style="color: #DC3545" id="modaldelete"><b>Mensaje de alerta <i class="bi bi-exclamation text-danger"></i></b> </h5>
                                                        <button type="button" class="btn close border btn-lg btn-outline-danger" data-bs-dismiss="modal" aria-label="Close">
                                                            <span aria-bs-hidden="true">&times;</span>
                                                        </button>
                                                        </div>
                                                        <div class="modal-body">
                                                        {{-- cuerpo de modal --}}
                                                        <div _ngcontent-serverapp-c93="" class="card p-sm-2 p-md-8 signup-form">
                                                            <div _ngcontent-serverapp-c93="" class="card-body">
                                                                <p _ngcontent-serverapp-c93="" class="lead"  ><b>¿Esta seguro de eliminar el sitio de {{$site->nombre}} ?</b><br>

                                                                </p>
                                                                <form class="ng-untouched ng-pristine ng-invalid" action="{{route('sites.destroy',$site->id)}}" method="POST">
                                                                    @csrf {{-- token --}}
                                                                    @method('DELETE')
                                                                    </span>
                                                                    <div class="btn-group modal-footer">
                                                                        <button class="btn btn-primary active" aria-current="page" type="submit"><i class="bi bi-file-earmark-plus-fill"></i>Eliminar</button>
                                                                    <a href="{{route('sites.index')}}" class="btn btn-primary"><i class="bi bi-x-lg"></i>Cancelar</a>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                         </div>
                                                        {{-- end cuerpo de modal --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                   </div>
                                                {{-- end delete --}}
                                                 {{-- end botones --}}

                                            </td>
                                        </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $sites->links() !!}
            </div>
        </div>
    </div>
@endsection
