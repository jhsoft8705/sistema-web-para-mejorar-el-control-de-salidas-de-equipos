<?php

function setActivo($ruta){
    return request()->routeIs($ruta)?'activo':'';//lo puse
}
?>
