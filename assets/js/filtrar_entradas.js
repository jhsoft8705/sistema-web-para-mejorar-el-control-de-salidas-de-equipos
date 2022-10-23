var datosTabla = [];
let cantidad_entradas = 0;
var total_subtotal = 0;
var total_igv = 0;
var total_suma = 0;
var proyeccion_total_subtotal = 0.0;
var proyeccion_total_igv = 0.0;
var proyeccion_total = 0.0;
var igv_pagar = 0.0;
$(document).on("input", "#total_proyeccion", function () {
  if (this.value == "") {
    $("#igv_proyeccion").empty().append("0.00");
    $("#subtotal_proyeccion").empty().append("0.00");
    $("#igv_pagar_proyeccion").empty().append("0.00");
    proyeccion_total_subtotal = 0.0;
    proyeccion_total_igv = 0.0;
    proyeccion_total = 0.0;
    igv_pagar = 0.0;
  } else {
    proyeccion_total = parseFloat(this.value).toFixed(2);
    $("#igv_proyeccion")
      .empty()
      .append(parseFloat((this.value/1.18) * 0.18).toFixed(2));
    proyeccion_total_igv = parseFloat((this.value/1.18) * 0.18).toFixed(2);

    $("#subtotal_proyeccion")
      .empty()
      .append(
        parseFloat(this.value/1.18).toFixed(2)
      );
    var proyeccion_igv = parseFloat(proyeccion_total_igv - total_igv);
    proyeccion_total_subtotal =    parseFloat(this.value/1.18).toFixed(2);

    $("#igv_pagar_proyeccion")
      .empty()
      .append(parseFloat(proyeccion_igv).toFixed(2));

    igv_pagar = parseFloat(proyeccion_igv).toFixed(2);
  }
});

function verificarDatos(type) {
  if (cantidad_entradas == 0) {
    Swal.fire(
      "No hay entradas registradas",
      "Aún no tienes ninguna entrada registrada, por favor registra una entrada para poder mostrarte tus datos.",
      "warning"
    );
  } else {
    if (type) {
      if ($("#fecha_inicio").val() && $("#fecha_fin").val()) {
        datosTabla = entradasJs.slice(0);
        entradasJs.forEach(function (entrada) {
          var fechadesde = $("#fecha_inicio").val(); //'2021-10-06'
          var fechaVenta = entrada.fecha; //"2021/10/06"
          var fechahasta = $("#fecha_fin").val(); //'2021-10-06'

          var desde1 = fechadesde.split("-");
          var fechaEntrada1 = fechaVenta.split("/");
          var hasta1 = fechahasta.split("-");

          var desde = new Date(desde1[0], parseInt(desde1[1]) - 1, desde1[2]);
          var fechaEntrada = new Date(
            fechaEntrada1[0],
            parseInt(fechaEntrada1[1]) - 1,
            fechaEntrada1[2]
          );
          var hasta = new Date(hasta1[0], parseInt(hasta1[1]) - 1, hasta1[2]);

          if (
            !(
              fechaEntrada.getTime() <= hasta.getTime() &&
              fechaEntrada.getTime() >= desde.getTime()
            )
          ) {
            let index = datosTabla
              .map((item) => item.entrada_almacen_id)
              .indexOf(entrada.entrada_almacen_id);
            if (index > -1) {
              datosTabla.splice(index, 1);
            }
          }
        });
        updateTabla(false);
      } else {
        Swal.fire(
          "Complete los campos por favor",
          "Por favor selecciona una fecha de inicio y fin para poder mostrar los datos.",
          "warning"
        );
      }
    } else {
      datosTabla = entradasJs;
      updateTabla(false);
    }
  }
}

function updateTabla(inicio) {
  if (!inicio) {
    Swal.fire({ title: "Cargando Tabla", allowOutsideClick: false });
    Swal.showLoading();
  }

  var tablaEntradas = document.getElementById("datatable_entradas");
  if (tablaEntradas) {
    tablaEntradas.remove();
  }
  var divPrincipal = document.getElementById("div_entradas");
  var tabla = document.createElement("table");
  tabla.setAttribute("id", "datatable_entradas");
  tabla.setAttribute("class", "table table-striped datatable_custom");
  var thead = document.createElement("thead");
  tabla.appendChild(thead);
  var columna0 = document.createElement("th");
  columna0.innerHTML = "Proveedor";
  thead.appendChild(columna0);
  var columna1 = document.createElement("th");
  columna1.innerHTML = "Fecha";
  thead.appendChild(columna1);
  var columna2 = document.createElement("th");
  columna2.innerHTML = "Hora";
  thead.appendChild(columna2);
  var columna3 = document.createElement("th");
  columna3.innerHTML = "Nro. Factura";
  thead.appendChild(columna3);
  var columna4 = document.createElement("th");
  columna4.innerHTML = "Nro. Guia";
  thead.appendChild(columna4);
  var columna5 = document.createElement("th");
  columna5.innerHTML = "Tipo";
  thead.appendChild(columna5);
  var columna6 = document.createElement("th");
  columna6.innerHTML = "SubTotal";
  thead.appendChild(columna6);
  var columna7 = document.createElement("th");
  columna7.innerHTML = "IGV";
  thead.appendChild(columna7);
  var columna8 = document.createElement("th");
  columna8.innerHTML = "Total";
  thead.appendChild(columna8);
  var columna9 = document.createElement("th");
  columna9.innerHTML = "Acciones";
  thead.appendChild(columna9);
  var tbody = document.createElement("tbody");
  tabla.appendChild(tbody);
  total_subtotal = 0;
  total_igv = 0;
  total_suma = 0;
  datosTabla.forEach(function (entrada) {
    total_subtotal += parseFloat(entrada.subtotal_monto);
    total_igv += parseFloat(entrada.igv);
    total_suma += parseFloat(entrada.total_monto);
    var tr = document.createElement("tr");
    tbody.appendChild(tr);
    var datos1 = document.createElement("td");
    datos1.innerHTML = entrada.nombre_proveedor;
    tr.appendChild(datos1);

    var datos2 = document.createElement("td");
    datos2.innerHTML = entrada.fecha;
    tr.appendChild(datos2);

    var datos3 = document.createElement("td");
    datos3.innerHTML = entrada.hora;
    tr.appendChild(datos3);

    var datosfactura = document.createElement("td");
    datosfactura.innerHTML = entrada.nro_factura;
    tr.appendChild(datosfactura);

    var datos4 = document.createElement("td");
    datos4.innerHTML = entrada.nro_guia ? entrada.nro_guia : "Sin Datos";
    tr.appendChild(datos4);

    var datos5 = document.createElement("td");
    datos5.innerHTML = entrada.tipo_nombre;
    tr.appendChild(datos5);

    var datos6 = document.createElement("td");
    datos6.innerHTML = "S/." + entrada.subtotal_monto;
    tr.appendChild(datos6);

    var datos7 = document.createElement("td");
    datos7.innerHTML = "S/." + entrada.igv;
    tr.appendChild(datos7);

    var datos8 = document.createElement("td");
    datos8.innerHTML = "S/." + entrada.total_monto;
    tr.appendChild(datos8);

    //AQUI VAN LAS ACCCIONES
    var datos9 = document.createElement("td");
    datos9.setAttribute("class", "text-center");
    var modalName = "#modal" + entrada.entrada_almacen_id;

    var facturaButton = "";
    if (entrada.factura_url) {
      facturaButton =
        "<a href='" +
        entrada.factura_url +
        "' data-toggle='tooltip' target='_blank' class='text-danger' title='Ver Factura'> <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-file-earmark-pdf-fill' viewBox='0 0 16 16'><path d='M5.523 12.424c.14-.082.293-.162.459-.238a7.878 7.878 0 0 1-.45.606c-.28.337-.498.516-.635.572a.266.266 0 0 1-.035.012.282.282 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548zm2.455-1.647c-.119.025-.237.05-.356.078a21.148 21.148 0 0 0 .5-1.05 12.045 12.045 0 0 0 .51.858c-.217.032-.436.07-.654.114zm2.525.939a3.881 3.881 0 0 1-.435-.41c.228.005.434.022.612.054.317.057.466.147.518.209a.095.095 0 0 1 .026.064.436.436 0 0 1-.06.2.307.307 0 0 1-.094.124.107.107 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256zM8.278 6.97c-.04.244-.108.524-.2.829a4.86 4.86 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.517.517 0 0 1 .145-.04c.013.03.028.092.032.198.005.122-.007.277-.038.465z'/><path fill-rule='evenodd' d='M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.651 11.651 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.856.856 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.844.844 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.76 5.76 0 0 0-1.335-.05 10.954 10.954 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.238 1.238 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a19.697 19.697 0 0 1-1.062 2.227 7.662 7.662 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103z'/></svg></a>";
    } else {
      facturaButton =
        "<a data-toggle='tooltip' target='_blank' class='text-secondary' title='Ver Factura'> <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-file-earmark-pdf-fill' viewBox='0 0 16 16'><path d='M5.523 12.424c.14-.082.293-.162.459-.238a7.878 7.878 0 0 1-.45.606c-.28.337-.498.516-.635.572a.266.266 0 0 1-.035.012.282.282 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548zm2.455-1.647c-.119.025-.237.05-.356.078a21.148 21.148 0 0 0 .5-1.05 12.045 12.045 0 0 0 .51.858c-.217.032-.436.07-.654.114zm2.525.939a3.881 3.881 0 0 1-.435-.41c.228.005.434.022.612.054.317.057.466.147.518.209a.095.095 0 0 1 .026.064.436.436 0 0 1-.06.2.307.307 0 0 1-.094.124.107.107 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256zM8.278 6.97c-.04.244-.108.524-.2.829a4.86 4.86 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.517.517 0 0 1 .145-.04c.013.03.028.092.032.198.005.122-.007.277-.038.465z'/><path fill-rule='evenodd' d='M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.651 11.651 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.856.856 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.844.844 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.76 5.76 0 0 0-1.335-.05 10.954 10.954 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.238 1.238 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a19.697 19.697 0 0 1-1.062 2.227 7.662 7.662 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103z'/></svg></a>";
    }

    var guiaButton = "";
    if (entrada.guia_url) {
      guiaButton =
        "<a href='" +
        entrada.guia_url +
        "' data-toggle='tooltip' target='_blank' class='text-danger' title='Ver Guia'> <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-file-earmark-pdf-fill' viewBox='0 0 16 16'><path d='M5.523 12.424c.14-.082.293-.162.459-.238a7.878 7.878 0 0 1-.45.606c-.28.337-.498.516-.635.572a.266.266 0 0 1-.035.012.282.282 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548zm2.455-1.647c-.119.025-.237.05-.356.078a21.148 21.148 0 0 0 .5-1.05 12.045 12.045 0 0 0 .51.858c-.217.032-.436.07-.654.114zm2.525.939a3.881 3.881 0 0 1-.435-.41c.228.005.434.022.612.054.317.057.466.147.518.209a.095.095 0 0 1 .026.064.436.436 0 0 1-.06.2.307.307 0 0 1-.094.124.107.107 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256zM8.278 6.97c-.04.244-.108.524-.2.829a4.86 4.86 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.517.517 0 0 1 .145-.04c.013.03.028.092.032.198.005.122-.007.277-.038.465z'/><path fill-rule='evenodd' d='M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.651 11.651 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.856.856 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.844.844 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.76 5.76 0 0 0-1.335-.05 10.954 10.954 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.238 1.238 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a19.697 19.697 0 0 1-1.062 2.227 7.662 7.662 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103z'/></svg></a>";
    } else {
      guiaButton =
        "<a data-toggle='tooltip' target='_blank' class='text-secondary' title='Ver Guia'> <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-file-earmark-pdf-fill' viewBox='0 0 16 16'><path d='M5.523 12.424c.14-.082.293-.162.459-.238a7.878 7.878 0 0 1-.45.606c-.28.337-.498.516-.635.572a.266.266 0 0 1-.035.012.282.282 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548zm2.455-1.647c-.119.025-.237.05-.356.078a21.148 21.148 0 0 0 .5-1.05 12.045 12.045 0 0 0 .51.858c-.217.032-.436.07-.654.114zm2.525.939a3.881 3.881 0 0 1-.435-.41c.228.005.434.022.612.054.317.057.466.147.518.209a.095.095 0 0 1 .026.064.436.436 0 0 1-.06.2.307.307 0 0 1-.094.124.107.107 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256zM8.278 6.97c-.04.244-.108.524-.2.829a4.86 4.86 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.517.517 0 0 1 .145-.04c.013.03.028.092.032.198.005.122-.007.277-.038.465z'/><path fill-rule='evenodd' d='M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.651 11.651 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.856.856 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.844.844 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.76 5.76 0 0 0-1.335-.05 10.954 10.954 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.238 1.238 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a19.697 19.697 0 0 1-1.062 2.227 7.662 7.662 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103z'/></svg></a>";
    }

    datos9.innerHTML =
      "<a href='" +
      modalName +
      "' data-target='" +
      modalName +
      "' data-toggle='modal' class='text-info' title='Ver Detalles'><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-eye' viewBox='0 0 16 16'><path d='M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z'/><path d='M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z'/></svg></a>" +
      facturaButton +
      guiaButton;
    tr.appendChild(datos9);
  });

  var label_subtotal = document.getElementById("sub_total");
  label_subtotal.innerHTML = parseFloat(total_subtotal).toFixed(2);
  var label_igv = document.getElementById("igv");
  label_igv.innerHTML = parseFloat(total_igv).toFixed(2);
  var label_total = document.getElementById("total");
  label_total.innerHTML = parseFloat(total_suma).toFixed(2);

  divPrincipal.appendChild(tabla);
  if (!inicio) {
    swal.close();
  }
}
