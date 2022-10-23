function abrirModal(id, stock) {
  stock
    ? $("#modal_" + id).modal("show")
    : Swal.fire({
        type: "warning",
        title: "No cuenta con stock suficiente",
        text: "No cuenta con stock suficiente para vender este kit.",
        confirmButtonText: "Aceptar",
        confirmButtonColor: "#2c5099",
      });
}

function agregarItem(id) {
  var agregado = false;
  var nombre = "";
  var precio = 0.0;
  var cantidad = 0;
  var codigoSelect = document.getElementById("articulo_select_" + id).value;
  let cantidadArticulo = parseInt($("#cantidad_" + id).val())
    ? parseInt($("#cantidad_" + id).val())
    : 0;
  kits[id].items.forEach((item) => {
    if (item.codigo == codigoSelect) {
      agregado = true;
    }
  });
  kits[id].items_adicionables.forEach((item) => {
    if (item.codigo == codigoSelect) {
      nombre = item.nombre;
      cantidad = item.stock_cantidad;
      precio = item.precio;
    }
  });
  if (agregado) {
    Swal.fire({
      type: "warning",
      title: "El Articulo que selecciono ya fue agregado",
      text: "Lo sentimos pero el articulo que selecciono ya fue agregado, por favor verifique la información e intentelo nuevamente.",
      confirmButtonText: "Aceptar",
      confirmButtonColor: "#2c5099",
    });
  } else {
    if (cantidadArticulo > 0) {
      if (cantidadArticulo > cantidad) {
        Swal.fire({
          type: "warning",
          title: "La cantidad supera al stock",
          text: "Lo sentimos pero no pudimos agregar su articulo, la cantidad que ingreso supera a la cantidad que saco. Verifique la cantidad e intentelo nuevamente.",
          confirmButtonText: "Aceptar",
          confirmButtonColor: "#2c5099",
        });
      } else {
        kits[id].items.push({
          codigo: codigoSelect,
          cantidad: parseInt($("#cantidad_" + id).val()),
          nombre: nombre,
          precio: precio,
        });
        agregarFila(
          codigoSelect,
          nombre,
          parseInt($("#cantidad_" + id).val()),
          id
        );
        var precio_total = parseFloat(kits[id].precio);
        var precio_subtotal = parseInt($("#cantidad_" + id).val()) * precio;
        precio_total += parseFloat(precio_subtotal);
        kits[id].precio = precio_total;
        document.getElementById("main_precio_kit_" + id).innerHTML =
          precio_total;
        document.getElementById("precio_kit_" + id).innerHTML = precio_total;
        $("#cantidad_" + id).val("");
        $("#agregarArticuloModal" + id).modal("hide");
      }
    } else {
      Swal.fire({
        type: "warning",
        title: "Ingrese una cantidad valida",
        text: "Por favor ingrese una cantidad valida, verifique los datos e intentelo nuevamente.",
        confirmButtonText: "Aceptar",
        confirmButtonColor: "#2c5099",
      });
    }
  }
}

function agregarFila(codigo, nombre, cantidad, id) {
  const codigoFila =
    "<div id='" +
    id +
    codigo +
    "' class='card mt-3 mb-10 text-white'>" +
    "    <div class='card-body row font-weight-bold '>" +
    "        <div class='col-sm'>" +
    "            <p class=' m-0 font-weight-bold text-center'>" +
    codigo +
    "</p>" +
    "        </div>" +
    "        <div class='col-sm'>" +
    "            <p class=' m-0 font-weight-bold text-center'>" +
    nombre +
    "</p>" +
    "        </div>" +
    "        <div class='col-sm'>" +
    "            <p class=' m-0 font-weight-bold text-center'>" +
    cantidad +
    " Unidades</p>" +
    "        </div>" +
    "        <div class='col-sm'>" +
    "            <p class=' m-0 font-weight-bold text-center'>" +
    "                <a id='boton" +
    id +
    codigo +
    "' class='text-danger'" +
    " title='Quitar'>" +
    "<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>" +
    "  <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>" +
    "  <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>" +
    "</svg>" +
    "                </a>" +
    "        </div>" +
    "    </div>" +
    "</div>";

  var div = document.getElementById("items_" + id);
  div.insertAdjacentHTML("beforeend", codigoFila);
  var boton = document.getElementById("boton" + id + codigo);
  boton.setAttribute(
    "href",
    "javascript:quitarFila(" + id + ",'" + codigo + "')"
  );
}

function quitarFila(id, codigo) {
  var index = kits[id].items
    .map(function (e) {
      return e.codigo;
    })
    .indexOf(codigo);
  var precio_total = parseFloat(kits[id].precio);
  var precio_subtotal =
    parseInt(kits[id].items[index].cantidad) * kits[id].items[index].precio;
  precio_total -= parseFloat(precio_subtotal);
  document.getElementById("main_precio_kit_" + id).innerHTML = precio_total;
  document.getElementById("precio_kit_" + id).innerHTML = precio_total;
  kits[id].precio = precio_total;
  kits[id].items.splice(index, 1);

  document.getElementById(id + codigo).remove();
}

function remplazarItem(itemKitId, id, codigoRemplazo, codigoEquipo) {
  var indexEquipo = kits[id].items
    .map(function (e) {
      return e.codigo;
    })
    .indexOf(codigoEquipo);
  var indexRemplazo = kits[id].items[indexEquipo].items
    .map(function (e) {
      return e.codigo;
    })
    .indexOf(codigoRemplazo);
  var objetoEquipo = obtenerEquipoItem(id, indexEquipo);
  console.log(objetoEquipo);
  var objetoEquipoRemplazo = obtenerEquipoItemRemplazo(
    id,
    indexEquipo,
    indexRemplazo
  );
  var cantidad = objetoEquipo.cantidad;
  kits[id].items[indexEquipo].codigo = objetoEquipoRemplazo.codigo;
  kits[id].items[indexEquipo].nombre = objetoEquipoRemplazo.nombre;
  kits[id].items[indexEquipo].precio = objetoEquipoRemplazo.precio;
  kits[id].items[indexEquipo].items[indexRemplazo].codigo = objetoEquipo.codigo;
  kits[id].items[indexEquipo].items[indexRemplazo].nombre = objetoEquipo.nombre;
  kits[id].items[indexEquipo].items[indexRemplazo].precio = objetoEquipo.precio;
  var precio_total = parseFloat(kits[id].precio);
  var precio_subtotal =
    parseInt(objetoEquipo.cantidad) * objetoEquipoRemplazo.precio;
  var precio_subtotal_remplazo =
    parseInt(objetoEquipo.cantidad) * objetoEquipo.precio;
  precio_total += parseFloat(precio_subtotal);
  precio_total -= parseFloat(precio_subtotal_remplazo);
  kits[id].precio = precio_total;
  document.getElementById("main_precio_kit_" + id).innerHTML = precio_total;
  document.getElementById("precio_kit_" + id).innerHTML = precio_total;
  agregarFilaRemplazo(
    itemKitId,
    id,
    objetoEquipoRemplazo.codigo,
    objetoEquipoRemplazo.nombre,
    cantidad
  );
  remplazarFila(
    itemKitId,
    id,
    objetoEquipo.codigo,
    objetoEquipoRemplazo.codigo,
    objetoEquipo.nombre
  );
  document.getElementById("fila" + id + "_" + objetoEquipo.codigo).remove();
}

function obtenerEquipoItem(id, index) {
  return JSON.parse(JSON.stringify(kits[id].items[index]));
}

function obtenerEquipoItemRemplazo(id, index, indexRemplazo) {
  return JSON.parse(JSON.stringify(kits[id].items[index].items[indexRemplazo]));
}

function agregarFilaRemplazo(itemKitId, id, codigo, nombre, cantidad) {
  const codigoFila =
    "<div id='fila" +
    id +
    "_" +
    codigo +
    "' class='card mt-3 mb-10 text-white'>" +
    "<div class='card-body row font-weight-bold '>" +
    "    <div class='col-sm'>" +
    "        <p class=' m-0 font-weight-bold text-center'>" +
    codigo +
    "</p>" +
    "    </div>" +
    "    <div class='col-sm'>" +
    "        <p class=' m-0 font-weight-bold text-center'>" +
    nombre +
    "</p>" +
    "    </div>" +
    "    <div class='col-sm'>" +
    "        <p class=' m-0 font-weight-bold text-center'>" +
    cantidad +
    "" +
    "             Unidades</p>" +
    "    </div>" +
    "    <div class='col-sm'>" +
    "        <p class=' m-0 font-weight-bold text-center'>" +
    "            <a href='#modal_remplazo_" +
    itemKitId +
    "'" +
    "                class='text-info' data-toggle='modal' title='Editar'>" +
    "                <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24'" +
    "                    viewBox='0 0 24 24' fill='none' stroke='currentColor'" +
    "                    stroke-width='2' stroke-linecap='round' stroke-linejoin='round'" +
    "                    class='feather feather-edit-3'>" +
    "                    <path d='M12 20h9'></path>" +
    "                    <path" +
    "                        d='M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z'>" +
    "                    </path>" +
    "                </svg>" +
    "            </a>" +
    "    </div>" +
    "</div>" +
    "</div>";
  var div = document.getElementById("items_" + id);
  div.insertAdjacentHTML("beforeend", codigoFila);
}

function remplazarFila(itemKitId, id, codigoRemplazo, codigo, nombre) {
  document.getElementById("filaRemplazo" + id + "_" + codigo).remove();
  const codigoFila =
    "<div id='filaRemplazo" +
    id +
    "_" +
    codigoRemplazo +
    "'" +
    "class='card mt-3 mb-10 text-white'>" +
    "<div class='card-body row font-weight-bold '>" +
    "    <div class='col-sm'>" +
    "        <p class=' m-0 font-weight-bold text-center'>" +
    codigo +
    "        </p>" +
    "    </div>" +
    "    <div class='col-sm'>" +
    "        <p class=' m-0 font-weight-bold text-center'>" +
    nombre +
    "        </p>" +
    "    </div>" +
    "    <div class='col-sm'>" +
    "        <p class=' m-0 font-weight-bold text-center'>" +
    "            <a id='boton_remplazo" +
    codigoRemplazo +
    "'" +
    "                class='text-info' title='Editar'>" +
    "                <svg xmlns='http://www.w3.org/2000/svg' width='24'" +
    "                    height='24' viewBox='0 0 24 24' fill='none'" +
    "                    stroke='currentColor' stroke-width='2'" +
    "                    stroke-linecap='round' stroke-linejoin='round'" +
    "                    class='feather feather-edit-3'>" +
    "                    <path d='M12 20h9'></path>" +
    "                    <path" +
    "                        d='M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z'>" +
    "                    </path>" +
    "                </svg>" +
    "            </a>" +
    "    </div>" +
    "</div>" +
    "</div>";

  var div = document.getElementById("itemsRemplazo_" + itemKitId);
  div.insertAdjacentHTML("beforeend", codigoFila);

  var boton = document.getElementById("boton_remplazo" + codigoRemplazo);
  boton.setAttribute(
    "href",
    "javascript:remplazarItem(" +
      itemKitId +
      "," +
      id +
      ",'" +
      codigoRemplazo +
      "', '" +
      codigo +
      "')"
  );
}
