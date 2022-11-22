@extends('index')

@section('template_title')
    Equipos
@endsection
@section('contenedorsiderbar')
    <div class="btn-group m-0 " data-toggle="buttons">
        {{--         <a href="#" class="btn btn-warning"><i class="bi bi-file-earmark-spreadsheet"></i> Imprimir reportes</a>
 --}}
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
                                {{ __('SALIDA DE EQUIPOS - FUERA DE ALMACEN') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('equipos.index') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Entrada de equipos') }}
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
                            <table id="example" class="example display table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>Pertenencia</th>
                                        <th>Nombre</th>
                                        <th>Codigo</th>
                                        <th>Serie</th>
                                        <th>Condición</th>
                                        <th>Medición</th>
                                        <th>Cantidad</th>
                                        <th>Estado</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($equipos as $equipo)
                                        @if ($equipo->estado == 2)
                                            <tr>
                                                <td>Site-{{ $equipo->site->nombre }}</td>
                                                <td>{{ $equipo->alias }}</td>
                                                <td>{{ $equipo->codigo }}</td>
                                                <td>{{ $equipo->serie }}</td>
                                                <td>
                                                    @if ($equipo->condicion == 'Operativo')
                                                        <span class="badge text-bg-success">Operativo</span>
                                                    @else
                                                        <span class="badge text-bg-danger">No operativo</span>
                                                    @endif
                                                </td>
                                                <td>{{ $equipo->unidad_medida }}</td>
                                                <td>{{ $equipo->cantidad }}</td>
                                                <td>
                                                    @if ($equipo->estado == 1)
                                                        <span class="badge text-bg-primary">En almacen</span>
                                                    @else
                                                        <span class="badge text-bg-danger">Fuera de almacen</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{-- modals y botones --}}
                                                    {{-- boton editar --}}
                                                    <a href="Update" data-bs-toggle="modal"
                                                        data-bs-target="#modal_update{{ $equipo->id }}"
                                                        class="text-success" data-bs-toggle="tooltip" title="Editar">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" fill="currentColor" class="bi bi-pencil-square"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                            <path fill-rule="evenodd"
                                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                        </svg>
                                                    </a>
                                                    {{-- end boton editar --}}
                                                    <!-- Modal editar -->
                                                    <div class="modal fade" data-bs-backdrop="static"
                                                        id="modal_update{{ $equipo->id }}" tabindex="-1" role="dialog"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header headerRegister">
                                                                    <h5 class="modal-title"
                                                                        id="modal_update{{ $equipo->id }}">Actualizar
                                                                        entrada de {{ $equipo->alias }}</h5>
                                                                    <button type="button" class="bi-unlock btn-close-white"
                                                                        data-bs-dismiss="modal" aria-label="Close">
                                                                        <span aria-bs-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form class="ng-untouched ng-pristine ng-invalid"
                                                                        action="{{ route('equipos.update', $equipo->id) }}"
                                                                        method="POST">
                                                                        @csrf {{-- token --}}
                                                                        @method('PATCH')
                                                                        {{-- from --}}
                                                                        @include('equipo.form')
                                                                        {{-- form --}}
                                                                        <div class="modal-footer">
                                                                            <button id="btnActionForm" type="submit"
                                                                                class="btn btn-primary"><i
                                                                                    class="fa fa-check-circle"></i> <span
                                                                                    id="btnText">Actualizar</span></button>
                                                                            <a class="btn btn-danger"
                                                                                href="{{ route('equipos.index') }}"><i
                                                                                    class="fa fa-times-circle"></i>
                                                                                Cancelar</a>
                                                                        </div>
                                                                    </form>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- end modal editar --}}
                                                    {{-- boton ver mas --}}
                                                    <a href="vermas" data-bs-toggle="modal"
                                                        data-bs-target="#modal_show{{ $equipo->id }}"
                                                        class="text-success" data-bs-toggle="tooltip" title="vermas">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" fill="currentColor" class="bi bi-info-square"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                                            <path
                                                                d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                                        </svg>
                                                    </a>
                                                    {{-- end boton ver mas --}}

                                                    {{-- modal ver mas --}}
                                                    <div class="modal fade" data-bs-backdrop="static"
                                                        id="modal_show{{ $equipo->id }}" tabindex="-1" role="dialog"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header headerRegister">
                                                                    <h5 class="modal-title"
                                                                        id="modal_show{{ $equipo->id }}">Detalles de
                                                                        entrada de {{ $equipo->alias }}</h5>
                                                                    <button type="button"
                                                                        class="bi-unlock btn-close-white"
                                                                        data-bs-dismiss="modal" aria-label="Close">
                                                                        <span aria-bs-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    {{-- show --}}
                                                                    @include('equipo.show')
                                                                    {{-- end show --}}
                                                                    {{-- form --}}
                                                                    <div class="modal-footer">
                                                                        <a class="btn btn-danger"
                                                                            href="{{ route('equipos.index') }}"><i
                                                                                class="fa fa-times-circle"></i>
                                                                            Cancelar</a>

                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- end modal ver mas --}}

                                                    {{-- boton eliminar --}}
                                                    <a href="Delete" data-bs-toggle="modal"
                                                        data-bs-target="#modaldelete{{ $equipo->id }}"
                                                        class="text-danger" data-bs-toggle="tooltip" title="Eliminar">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" fill="currentColor"
                                                            class="bi bi-x-square-fill" viewBox="0 0 16 16">
                                                            <path
                                                                d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z" />
                                                        </svg>
                                                    </a>
                                                    {{-- boton eliminar --}}
                                                    <!-- Modal delete -->
                                                    <div class="modal fade "data-bs-backdrop="static"
                                                        id="modaldelete{{ $equipo->id }}" tabindex="-1"
                                                        role="dialog" aria-labelledby="modaldelete" aria-hidden="false">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <svg style="color: #DC3545"xmlns="http://www.w3.org/2000/svg"
                                                                        width="35" height="35" fill="currentColor"
                                                                        class="bi bi-exclamation-circle-fill"
                                                                        viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                                                    </svg>
                                                                    <h5 class="modal-title lead" style="color: #DC3545"
                                                                        id="modaldelete"><b>Mensaje de alerta <i
                                                                                class="bi bi-exclamation text-danger"></i></b>
                                                                    </h5>
                                                                    <button type="button"
                                                                        class="btn close border btn-lg btn-outline-danger"
                                                                        data-bs-dismiss="modal" aria-label="Close">
                                                                        <span aria-bs-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    {{-- cuerpo de modal --}}
                                                                    <div _ngcontent-serverapp-c93=""
                                                                        class="card p-sm-2 p-md-8 signup-form">
                                                                        <div _ngcontent-serverapp-c93=""
                                                                            class="card-body">
                                                                            <p _ngcontent-serverapp-c93="" class="lead">
                                                                                <b>¿Esta seguro de eliminar este equipo ->
                                                                                    {{ $equipo->alias }} ?</b><br>

                                                                            </p>
                                                                            <form
                                                                                class="ng-untouched ng-pristine ng-invalid"
                                                                                action="{{ route('equipos.destroy', $equipo->id) }}"
                                                                                method="POST">
                                                                                @csrf {{-- token --}}
                                                                                @method('DELETE')
                                                                                </span>
                                                                                <div class="btn-group modal-footer">
                                                                                    <button class="btn btn-primary active"
                                                                                        aria-current="page"
                                                                                        type="submit"><i
                                                                                            class="bi bi-file-earmark-plus-fill"></i>Eliminar</button>
                                                                                    <a href="{{ route('equipos.index') }}"
                                                                                        class="btn btn-primary"><i
                                                                                            class="bi bi-x-lg"></i>Cancelar</a>
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

                                                    {{-- end modals y botones --}}
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- comment       {!! $equipos->links() !!}  --}}
            </div>
        </div>
    </div>
@endsection
