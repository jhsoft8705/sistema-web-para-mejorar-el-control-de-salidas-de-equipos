<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@if (trim($__env->yieldContent('template_title'))) @yield('template_title') | @endif {{ config('app.name', 'Laravel') }}</title>

     @yield('css')
    {{-- importamos los assets imagenes locales --}}
     <script src="{{ asset('js/app.js') }}"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" /> {{-- carpeta css de public --}}


    {{-- datatables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
     {{-- end datatables --}}
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

</head>
  <body>

    <div class="container-fluid overflow-hidden">
        <div class="row vh-100 overflow-auto pp">
            <div class="col-sm-12 col-md-12 flex-grow-0 flex-md-grow-0 flex-lg-grow-0 flex-sm-grow-0 col-md-3 col-12   col-sm-3 col-xl-2 px-sm-2 px-0  d-flex sticky-top" style="background: #24385B">
                <div class="d-flex flex-sm-column flex-row flex-grow-1 align-items-center align-items-sm-start px-3 pt-2 text-white">
                    <a href="#" class=" d-flex align-items-center pb-sm-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 ">Gestión<span class="colorlogo  d-none d-sm-inline">Systems</span></span>
                    </a>
                    <ul class="nav nav-pills flex-sm-column flex-row flex-nowrap flex-shrink-1 flex-sm-grow-0 flex-grow-1 mb-sm-auto mb-0 justify-content-center align-items-center align-items-sm-start" id="menu">
                        <li class="nav-item">
                            <a href="#" class="nav-link px-sm-0 px-2">
                                <i class="fs-5 bi-house"></i><span class="ms-1 d-none d-sm-inline">Dashboard</span>
                            </a>
                        </li>
                        <li class="{{setActivo('equipos.index')}}{{setActivo('bajas.index') }}{{setActivo('equipos.create') }}">
                            <a href="{{route('equipos.index')}}" class="nav-link px-sm-0 px-2 " title="Seleccionar equipos">
                                <i class="fs-5 bi-grid"></i><span class="ms-1 d-none d-sm-inline">Equipos</span></a>
                        </li>
                        <li class="{{setActivo('sites.index')}}{{setActivo('sites.create')}}">
                            <a href="{{route('sites.index')}}" class="nav-link px-sm-0 px-2" title="Seleccionar estaciones">
                                <i class="fs-5 bi-link"></i><span class="ms-1 d-none d-sm-inline">Estaciones</span> </a>
                        </li>
                        <li class="{{setActivo('users.index')}} {{setActivo('users.create')}}">
                            <a href="{{route('users.index')}}" class="nav-link px-sm-0 px-2" title="Seleccionar usuarios">
                                <i class="fs-5 bi-people"></i><span class="ms-1 d-none d-sm-inline">Usuarios</span> </a>
                        </li>
                        {{-- comment
                        <div class="col-12 col-lg p-3 border b {{setActivo('equipos.index')}}"><a href="{{route('equipos.index')}}">Equipos</a></div>
 --}}

                    </ul>
                    <div class="dropdown py-sm-4 mt-sm-auto ms-auto ms-sm-0 flex-shrink-1">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{asset('assets/img/perfil.png')}}" alt=" "
                            width="28" height="28" class="rounded-circle">
                            <span class="d-none d-sm-inline mx-1">JH soft</span>
                        </a>


                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                            <li><a class="dropdown-item " href="#">Editar</a></li>
                             <li><a class="dropdown-item" href="#">Perfil</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li> <a  class="dropdown-item"href="#">Cerrar Sesión</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- botones --}}
            @include('sweetalert::alert')
            <div class="col d-flex flex-column h-sm-100 ">
                <main class="row overflow-auto ">
                    <div class="  col pt-4">{{-- list-group-item-success --}}
                        @yield('contenedorsiderbar')
                        <hr />
                        @yield('content')
                      {{--  @include('opcion equipos/index') --}}
                       </div>
                </main>
                <footer class="row bg-light py-4 mt-auto">
                    <div class="col ">©copyright Jh soft-Perú</div>
                </footer>
            </div>
            {{-- end botones --}}
        </div>
    </div>
    {{-- js data tables --}}
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
    $(document).ready(function() {
    $('#example').DataTable( {
        "language": {
            "lengthMenu": "Mostrar " +
            `<select>
             <option value='10'>10</option>
            <option value='25'>25</option>
            <option value='50'>50</option>
            </select>` + "registros por página",
            "zeroRecords": "No hay registros en la  base de datos",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search":"Buscar registros",
            "paginate":{
                "next":"Siguiente",
                "previous":"Anterior"
            }

        }
    } );
} );
    </script>
    {{-- end datatables js --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    {{-- end data tables --}}

   </body>
</html>
