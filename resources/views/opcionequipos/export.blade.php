{{-- comment <table>
    <thead>
    <tr>
        <th><b>Codigo</b></th>
        <th><b>Modelo</b></th>
        <th><b>Marca</b></th>
        <th><b>Descripción</b></th>
        <th><b>Cantidad</b></th>
        <th><b>Utilidad</b></th>
        <th><b>Fecha de registro</b></th>


    </tr>
    </thead>
    <tbody>
@foreach($bajas as $bajaitem)
        <tr>
            <td>{{$bajaitem->id}}</td>
            <td>{{$bajaitem->modelo}}</td>
            <td>{{$bajaitem->marca}}</td>
            <td>{{$bajaitem->comentario}}</td>
            <td>{{$bajaitem->cantidad}}</td>
            <td>{{$bajaitem->utilidad}}</td>
            <td>{{$bajaitem->created_at}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
