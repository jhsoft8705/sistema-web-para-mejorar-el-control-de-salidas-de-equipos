var c = 0;
var articulos = [];
var tarjetaCodigo = "";
var tarjetaNombre = "";
var tarjetaTipo = "";
var tarjetaCantidad = "";
var tarjetaUnidades = "";
var tarjetaPrecio = "";
var nombreCliente = "";
var tecnicoAsignado = "";
var fecha = "";
var hora = "";
var idOrden = 0;
var cantidadArticuloSelect = 0;
var ordenValidada = false;
var total = 0;

function quitarArticuloTarjeta(id) {
  var idNumber = parseInt(id);
  total -=
    parseFloat(articulos[idNumber - 1].precio).toFixed(2) *
    parseInt(articulos[idNumber - 1].cantidad);
  var subtotalLabel = document.getElementById("subtotal");
  subtotalLabel.innerHTML = parseFloat(total).toFixed(2);
  var igvLabel = document.getElementById("igv");
  igvLabel.innerHTML = parseFloat(total * 0.18).toFixed(2);
  var totalLabel = document.getElementById("total");
  totalLabel.innerHTML = parseFloat(total + total * 0.18).toFixed(2);
  articulos.splice(id - 1, 1);
  for (var i = idNumber + 1; i <= c; i++) {
    var articulo = document.getElementById("contenedor" + i);
    articulo.setAttribute("id", "contenedor" + (i - 1));

    var articulolink = document.getElementById(i);
    articulolink.setAttribute("id", i - 1);
  }
  c--;
  document.getElementById("contenedor" + id).remove();
}

function agregarArticuloTarjetaEntrada() {
  var optionValue1 = document.getElementById("articulo_select").value;
  var agregado = false;
  let cantidadArticulo = parseInt($("#cantidad").val())
    ? parseInt($("#cantidad").val())
    : 0;
  articulos.forEach((item, index) => {
    if (item.codigo == optionValue1) {
      agregado = true;
    }
  });

  if (agregado) {
    agregado = false;
    Swal.fire({
      type: "warning",
      title: "El Articulo que selecciono ya fue agregado",
      text: "Lo sentimos pero el articulo que selecciono ya fue agregado, por favor verifique la información e intentelo nuevamente.",
      confirmButtonText: "Aceptar",
      confirmButtonColor: "#2c5099",
    });
  } else {
    if (cantidadArticulo > 0) {
      if (cantidadArticulo > cantidadArticuloSelect) {
        Swal.fire({
          type: "warning",
          title: "La cantidad supera al stock",
          text: "Lo sentimos pero no pudimos agregar su articulo, la cantidad que ingreso supera a la cantidad que saco. Verifique la cantidad e intentelo nuevamente.",
          confirmButtonText: "Aceptar",
          confirmButtonColor: "#2c5099",
        });
      } else {
        c++;

        articulos.push({
          codigo: tarjetaCodigo,
          cantidad: $("#cantidad").val(),
          tipo: tarjetaTipo,
        });

        tarjetaCantidad = $("#cantidad").val() + " " + tarjetaUnidades;

        var contenedor = document.createElement("div");
        contenedor.setAttribute("id", "contenedor" + c);
        contenedor.setAttribute("class", "card w-100 mb-10");

        var fila = document.createElement("div");
        fila.setAttribute("class", "row card-body");
        fila.setAttribute("style", "align-items: center;");
        contenedor.appendChild(fila);

        var codigoCol = document.createElement("div");
        codigoCol.setAttribute("class", "col-sm");
        fila.appendChild(codigoCol);

        var codigoInfo = document.createElement("p");
        codigoInfo.setAttribute(
          "class",
          "m-0 font-weight-bold text-center dark-color"
        );
        codigoInfo.innerHTML = tarjetaCodigo;
        codigoCol.appendChild(codigoInfo);

        var tipoCol = document.createElement("div");
        tipoCol.setAttribute("class", "col-sm");
        fila.appendChild(tipoCol);

        var tipoInfo = document.createElement("p");
        tipoInfo.setAttribute(
          "class",
          "m-0 font-weight-bold text-center dark-color"
        );
        tipoInfo.innerHTML = tarjetaTipo;
        tipoCol.appendChild(tipoInfo);

        var nombreCol = document.createElement("div");
        nombreCol.setAttribute("class", "col-sm");
        fila.appendChild(nombreCol);

        var nombreInfo = document.createElement("p");
        nombreInfo.setAttribute(
          "class",
          "m-0 font-weight-bold text-center dark-color"
        );
        nombreInfo.innerHTML = tarjetaNombre;
        nombreCol.appendChild(nombreInfo);

        var cantidadCol = document.createElement("div");
        cantidadCol.setAttribute("class", "col-sm d-flex pr-0");
        fila.appendChild(cantidadCol);

        var cantidadInfo = document.createElement("p");
        cantidadInfo.setAttribute(
          "class",
          "m-0 font-weight-bold text-center dark-color"
        );
        cantidadInfo.innerHTML = tarjetaCantidad;
        cantidadCol.appendChild(cantidadInfo);

        var quitarbtn = document.createElement("button");
        quitarbtn.setAttribute("id", c);
        quitarbtn.setAttribute("onClick", "quitarArticuloTarjeta(this.id)");
        quitarbtn.setAttribute("class", "btn-quitar ml-2");
        cantidadCol.appendChild(quitarbtn);

        var borrar = document.createElement("i");
        borrar.setAttribute("class", "material-icons");
        borrar.setAttribute("style", "font-weight: 900; color: #FC3C3C;");
        borrar.innerHTML = "remove_circle";
        quitarbtn.appendChild(borrar);

        var divPrincipal = document.getElementById("cuerpoPagina");
        divPrincipal.appendChild(contenedor);
        $("#cantidad").val("");
        $("#agregarArticuloModal .close").click();
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

function agregarArticuloTarjeta() {
  if ($("#cantidad").val() == "" || $("#precio").val() == "") {
    Swal.fire({
      type: "warning",
      title: "Por favor complete los campos",
      text: "Por favor complete los campos de cantidad y precio.",
      confirmButtonText: "Aceptar",
      confirmButtonColor: "#2c5099",
    });
  } else {
    c++;

    articulos.push({
      codigo: tarjetaCodigo,
      cantidad: $("#cantidad").val(),
      precio: parseFloat($("#precio").val()).toFixed(2),
      tipo: tarjetaTipo,
    });
    total +=
      parseFloat($("#precio").val()).toFixed(2) *
      parseInt($("#cantidad").val());

    tarjetaCantidad = $("#cantidad").val() + " " + tarjetaUnidades;
    tarjetaPrecio = "S/." + parseFloat($("#precio").val()).toFixed(2);

    var fila = document.createElement("tr");
    fila.setAttribute("id", "contenedor" + c);

    var codigoCol = document.createElement("td");
    fila.appendChild(codigoCol);

    var quitarBtn = document.createElement("button");
    quitarBtn.setAttribute("id", c);
    quitarBtn.setAttribute("class", "cut border-0");
    quitarBtn.setAttribute("onClick", "quitarArticuloTarjeta(this.id)");
    quitarBtn.innerHTML = "-";
    codigoCol.appendChild(quitarBtn);

    var codigoInfo = document.createElement("span");
    codigoInfo.innerHTML = tarjetaCodigo;
    codigoCol.appendChild(codigoInfo);

    var nombreCol = document.createElement("td");
    fila.appendChild(nombreCol);

    var nombreInfo = document.createElement("span");
    nombreInfo.innerHTML = tarjetaNombre;
    nombreCol.appendChild(nombreInfo);

    var cantidadCol = document.createElement("td");
    fila.appendChild(cantidadCol);

    var cantidadInfo = document.createElement("span");
    cantidadInfo.innerHTML = tarjetaCantidad;
    cantidadCol.appendChild(cantidadInfo);

    var precioCol = document.createElement("td");
    fila.appendChild(precioCol);

    var precioInfo = document.createElement("span");
    precioInfo.innerHTML = tarjetaPrecio;
    precioCol.appendChild(precioInfo);

    var tipoCol = document.createElement("td");
    fila.appendChild(tipoCol);

    var tipoInfo = document.createElement("span");
    tipoInfo.innerHTML = tarjetaTipo;
    tipoCol.appendChild(tipoInfo);

    var subtotalCol = document.createElement("td");
    fila.appendChild(subtotalCol);

    var subtotalInfo = document.createElement("span");
    subtotalInfo.innerHTML =
      "S/." +
      parseFloat(
        parseFloat($("#precio").val()).toFixed(2) *
          parseInt($("#cantidad").val())
      ).toFixed(2);
    subtotalCol.appendChild(subtotalInfo);

    var divPrincipal = document.getElementById("cuerpoPagina");
    divPrincipal.appendChild(fila);

    var subtotalLabel = document.getElementById("subtotal");
    subtotalLabel.innerHTML = parseFloat(total).toFixed(2);
    var igvLabel = document.getElementById("igv");
    igvLabel.innerHTML = parseFloat(total * 0.18).toFixed(2);
    var totalLabel = document.getElementById("total");
    totalLabel.innerHTML = parseFloat(total + total * 0.18).toFixed(2);

    $("#cantidad").val("");
    $("#precio").val("");
    $("#agregarArticuloModal .close").click();
  }
}

function agregarTarjetasArticulos() {
  materialesJs.forEach((item, index) => {
    tarjetaAgregar(
      item.codigo,
      "Material",
      item.nombre,
      item.cantidad,
      1,
      "materialCantidad" + item.material_id
    );
  });
  equiposJs.forEach((item, index) => {
    tarjetaAgregar(
      item.codigo,
      "Equipo",
      item.nombre,
      item.cantidad,
      1,
      "equipoCantidad" + item.equipo_id
    );
  });
  herramientasJs.forEach((item, index) => {
    tarjetaAgregar(
      item.codigo,
      "Herramienta",
      item.nombre,
      item.cantidad,
      3,
      "herramientaCantidad" + item.herramienta_id
    );
  });
}

function agregarArticuloEntrada(codigo, tipo) {
  //1: MATERIALES, 2: EQUIPOS, 3: HERRAMIENTAS
  switch (tipo) {
    case 1:
      materialesJs.forEach((item, index) => {
        if (item.codigo == codigo) {
          //Indicador para saber si el articulo ya esta registrado
          const indicador = articulos.some(
            (articulo) => articulo.codigo === codigo
          );
          let cantidadArticulo = 0;
          if (indicador) {
            objIndex = articulos.findIndex((obj) => obj.codigo == codigo);
            if (!(item.cantidad == articulos[objIndex].cantidad)) {
              articulos[objIndex].cantidad++;
              cantidadArticulo = articulos[objIndex].cantidad;
              document.getElementById(
                "materialCantidad" + item.material_id
              ).innerHTML = cantidadArticulo;
            }
          } else {
            cantidadArticulo = 1;
            articulos.push({
              codigo: item.codigo,
              cantidad: 1,
              tipo: "Material",
            });
            document.getElementById(
              "materialCantidad" + item.material_id
            ).innerHTML = cantidadArticulo;
          }
        }
      });
      break;
    case 2:
      equiposJs.forEach((item, index) => {
        if (item.codigo == codigo) {
          //Indicador para saber si el articulo ya esta registrado
          const indicador = articulos.some(
            (articulo) => articulo.codigo === codigo
          );
          let cantidadArticulo = 0;
          if (indicador) {
            objIndex = articulos.findIndex((obj) => obj.codigo == codigo);
            if (!(item.cantidad == articulos[objIndex].cantidad)) {
              articulos[objIndex].cantidad++;
              cantidadArticulo = articulos[objIndex].cantidad;
              document.getElementById(
                "equipoCantidad" + item.equipo_id
              ).innerHTML = cantidadArticulo;
            }
          } else {
            cantidadArticulo = 1;
            articulos.push({
              codigo: item.codigo,
              cantidad: 1,
              tipo: "Equipo",
            });
            document.getElementById(
              "equipoCantidad" + item.equipo_id
            ).innerHTML = cantidadArticulo;
          }
        }
      });
      break;
    case 3:
      herramientasJs.forEach((item, index) => {
        if (item.codigo == codigo) {
          //Indicador para saber si el articulo ya esta registrado
          const indicador = articulos.some(
            (articulo) => articulo.codigo === codigo
          );
          let cantidadArticulo = 0;
          if (indicador) {
            objIndex = articulos.findIndex((obj) => obj.codigo == codigo);
            if (!(item.cantidad == articulos[objIndex].cantidad)) {
              articulos[objIndex].cantidad++;
              cantidadArticulo = articulos[objIndex].cantidad;
              document.getElementById(
                "herramientaCantidad" + item.herramienta_id
              ).innerHTML = cantidadArticulo;
            }
          } else {
            cantidadArticulo = 1;
            articulos.push({
              codigo: item.codigo,
              cantidad: 1,
              tipo: "Herramienta",
            });
            document.getElementById(
              "herramientaCantidad" + item.herramienta_id
            ).innerHTML = cantidadArticulo;
          }
        }
      });
      break;
  }
}

function quitarArticuloEntrada(codigo, tipo) {
  //1: MATERIALES, 2: EQUIPOS, 3: HERRAMIENTAS
  switch (tipo) {
    case 1:
      materialesJs.forEach((item, index) => {
        if (item.codigo == codigo) {
          //Indicador para saber si el articulo ya esta registrado
          const indicador = articulos.some(
            (articulo) => articulo.codigo === codigo
          );
          let cantidadArticulo = 0;
          if (indicador) {
            objIndex = articulos.findIndex((obj) => obj.codigo == codigo);
            if (!(articulos[objIndex].cantidad == 0)) {
              articulos[objIndex].cantidad--;
              cantidadArticulo = articulos[objIndex].cantidad;
              document.getElementById(
                "materialCantidad" + item.material_id
              ).innerHTML = cantidadArticulo;
              if (articulos[objIndex].cantidad == 0) {
                articulos.splice(objIndex - 1, 1);
              }
            }
          }
        }
      });
      break;
    case 2:
      equiposJs.forEach((item, index) => {
        if (item.codigo == codigo) {
          //Indicador para saber si el articulo ya esta registrado
          const indicador = articulos.some(
            (articulo) => articulo.codigo === codigo
          );
          let cantidadArticulo = 0;
          if (indicador) {
            objIndex = articulos.findIndex((obj) => obj.codigo == codigo);
            if (!(articulos[objIndex].cantidad == 0)) {
              articulos[objIndex].cantidad--;
              cantidadArticulo = articulos[objIndex].cantidad;
              document.getElementById(
                "equipoCantidad" + item.equipo_id
              ).innerHTML = cantidadArticulo;
              if (articulos[objIndex].cantidad == 0) {
                articulos.splice(objIndex - 1, 1);
              }
            }
          }
        }
      });
      break;
    case 3:
      herramientasJs.forEach((item, index) => {
        if (item.codigo == codigo) {
          //Indicador para saber si el articulo ya esta registrado
          const indicador = articulos.some(
            (articulo) => articulo.codigo === codigo
          );
          let cantidadArticulo = 0;
          if (indicador) {
            objIndex = articulos.findIndex((obj) => obj.codigo == codigo);
            if (!(articulos[objIndex].cantidad == 0)) {
              articulos[objIndex].cantidad--;
              cantidadArticulo = articulos[objIndex].cantidad;
              document.getElementById(
                "herramientaCantidad" + item.herramienta_id
              ).innerHTML = cantidadArticulo;
              if (articulos[objIndex].cantidad == 0) {
                articulos.splice(objIndex - 1, 1);
              }
            }
          }
        }
      });
      break;
  }
}

function tarjetaAgregar(
  codigo,
  tipo,
  nombre,
  cantidad,
  tiponro,
  cantidadLabel
) {
  var contenedor = document.createElement("div");
  contenedor.setAttribute("class", "card w-100 mb-10");

  var fila = document.createElement("div");
  fila.setAttribute("class", "row card-body");
  fila.setAttribute("style", "align-items: center;");
  contenedor.appendChild(fila);

  var codigoCol = document.createElement("div");
  codigoCol.setAttribute("class", "col-sm");
  fila.appendChild(codigoCol);

  var codigoInfo = document.createElement("p");
  codigoInfo.setAttribute(
    "class",
    "m-0 font-weight-bold text-center dark-color"
  );
  codigoInfo.innerHTML = codigo;
  codigoCol.appendChild(codigoInfo);

  var tipoCol = document.createElement("div");
  tipoCol.setAttribute("class", "col-sm");
  fila.appendChild(tipoCol);

  var tipoInfo = document.createElement("p");
  tipoInfo.setAttribute("class", "m-0 font-weight-bold text-center dark-color");
  tipoInfo.innerHTML = tipo;
  tipoCol.appendChild(tipoInfo);

  var nombreCol = document.createElement("div");
  nombreCol.setAttribute("class", "col-sm");
  fila.appendChild(nombreCol);

  var nombreInfo = document.createElement("p");
  nombreInfo.setAttribute(
    "class",
    "m-0 font-weight-bold text-center dark-color"
  );
  nombreInfo.innerHTML = nombre;
  nombreCol.appendChild(nombreInfo);

  var cantidadCol = document.createElement("div");
  cantidadCol.setAttribute(
    "class",
    "col-sm d-flex pr-0 justify-content-center"
  );
  fila.appendChild(cantidadCol);

  var cantidadInfo = document.createElement("p");
  cantidadInfo.setAttribute(
    "class",
    "m-0 font-weight-bold text-center dark-color"
  );

  var cantidadAumentar = document.createElement("span");
  cantidadAumentar.setAttribute("id", cantidadLabel);
  cantidadAumentar.innerHTML = "0";
  cantidadInfo.appendChild(cantidadAumentar);

  cantidadInfo.innerHTML += " de " + cantidad + " Unidades";
  cantidadCol.appendChild(cantidadInfo);

  var quitarbtn = document.createElement("button");
  quitarbtn.setAttribute(
    "onClick",
    "quitarArticuloEntrada('" + codigo + "'," + tiponro + ")"
  );
  quitarbtn.setAttribute("class", "btn-quitar ml-1");
  cantidadCol.appendChild(quitarbtn);

  var agregarbtn = document.createElement("button");
  agregarbtn.setAttribute(
    "onClick",
    "agregarArticuloEntrada('" + codigo + "'," + tiponro + ")"
  );
  agregarbtn.setAttribute("class", "btn-quitar m-0 p-0");
  cantidadCol.appendChild(agregarbtn);

  var agregar = document.createElement("i");
  agregar.setAttribute("class", "material-icons");
  agregar.setAttribute("style", "font-weight: 900; color: #42DC3C;");
  agregar.innerHTML = "add_circle";
  agregarbtn.appendChild(agregar);

  var borrar = document.createElement("i");
  borrar.setAttribute("class", "material-icons");
  borrar.setAttribute("style", "font-weight: 900; color: #FC3C3C;");
  borrar.innerHTML = "remove_circle";
  quitarbtn.appendChild(borrar);

  var divPrincipal = document.getElementById("cuerpoPagina");
  divPrincipal.appendChild(contenedor);
}

/* Guia Opcional*/
