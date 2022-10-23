 @extends('index')
 @section('contenedorsiderbar')
 <div class="btn-group m-0 " data-toggle="buttons">
    <a href="{{ route('rutaequipos.create')}}" class="btn btn-secondary mr-2 "><i class="bi bi-folder-plus"></i> Agregar Equipos</a>
    <a href="#" class="btn btn-warning"><i class=" bi bi-file-earmark-spreadsheet"></i>Sites</a>
    <a href="#" class="btn btn-warning"><i class="bi bi-file-earmark-spreadsheet"></i>Salidas</a>
    <a href="#" class="btn btn-secondary"><i class="bi bi-file-earmark-spreadsheet"></i> Imprimir reportes</a>

  </div>
 @endsection

@section('content')
<!--bootones--->
<div class="topnav mb-3">
    @if(Session::has('mensaje'))
<div class="alert alert-info my-5">
    {{Session::get('mensaje')}}
 @endif
</div>
<!--end botones --->
{{-- seccion listar --}}
    <div class="section-body mt-3  ">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row no-gutters align-items-center w-100">
                            <div class="col-sm-6">
                                <h4>Lista de entrada de equipos </h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body input-container">
                       {{-- tabla de data tables --}}
                       <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                                <td>2011-04-25</td>
                                <td>$320,800</td>
                            </tr>
                            <tr>
                                <td>Garrett Winters</td>
                                <td>Accountant</td>
                                <td>Tokyo</td>
                                <td>63</td>
                                <td>2011-07-25</td>
                                <td>$170,750</td>
                            </tr>
                            <tr>
                                <td>Ashton Cox</td>
                                <td>Junior Technical Author</td>
                                <td>San Francisco</td>
                                <td>66</td>
                                <td>2009-01-12</td>
                                <td>$86,000</td>
                            </tr> 
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                            </tr>
                        </tfoot>
                    </table>
                       {{-- end datatables --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
{{-- end section listar --}}



@endsection

