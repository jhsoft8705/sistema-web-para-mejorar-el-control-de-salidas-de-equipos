<div class="card-body">

    <div class="form-group">
        <strong>Sitio de procedencia:</strong>
        {{  $equipo->site->nombre  }}
    </div>
    <div class="form-group">
        <strong>Nombre:</strong>
        {{ $equipo->alias }}
    </div>
    <div class="form-group">
        <strong>Codigo:</strong>
        {{ $equipo->codigo }}
    </div>
    <div class="form-group">
        <strong>Descripcion:</strong>
        {{ $equipo->descripcion }}
    </div>
    <div class="form-group">
        <strong>Serie:</strong>
        {{ $equipo->serie }}
    </div>
    <div class="form-group">
        <strong>Condicion:</strong>
        {{ $equipo->condicion }}
    </div>
    <div class="form-group">
        <strong>Unidad Medida:</strong>
        {{ $equipo->unidad_medida }}
    </div>
    <div class="form-group">
        <strong>Cantidad:</strong>
        {{ $equipo->cantidad }}
    </div>
    <div class="form-group">
        <strong>Estado:</strong>
        @if($equipo->estado==1)
        <span class="badge text-bg-primary">En almacen</span>
        @else <span class="badge text-bg-danger">Fuera de almacen</span>
        @endif

    </div>
    <div class="form-group">
        <strong>Fecha de registro:</strong>
        {{ $equipo->created_at }}
    </div>
    <div class="form-group">
        <strong>Fecha de Actualización:</strong>
        {{ $equipo->updated_at }}
    </div>
</div>
