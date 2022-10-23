var c = 0;
var cr = 0;
var ca = 0;
var articulos = [];
var articulosAdicionables = [];
var itemTarjetaCodigo = "";
var itemTarjetaNombre = "";
var itemTarjetaTipo = "";
var adicionableTarjetaCodigo = "";
var adicionableTarjetaNombre = "";
var adicionableTarjetaTipo = "";
var tarjetaCodigo = "";
var tarjetaNombre = "";
var tarjetaTipo = "";
var tarjetaCantidad = "";
var tarjetaUnidades = "";
var tarjetaPrecio = "";
var tarjetaPrecio = 0.00;
var cantidadArticuloSelect = 0;
var itemCantidadArticuloSelect = 0;
var adicionableCantidadArticuloSelect = 0;
var total = 0;
var subtotal=0.00;
function quitarArticuloTarjeta(id) {
  var idNumber = parseInt(id);
    subtotal -= (parseFloat(articulos[idNumber - 1].precio) *   parseFloat((articulos[idNumber - 1].cantidad)));
    document.getElementById("subtotal").innerHTML = 'S/.' + subtotal;

  articulos.splice(id - 1, 1);
  for (var i = idNumber + 1; i <= c; i++) {
    var articulo = document.getElementById("contenedor" + i);
    articulo.setAttribute("id", "contenedor" + (i - 1));

    var articulolink = document.getElementById(i);
    articulolink.setAttribute("id", i - 1);
    
    var modal = document.getElementById("item"+(i-1));
    modal.setAttribute("id", "item" + (i - 2));
    var editarbtn = document.getElementById("editar"+i);
    editarbtn.setAttribute("id", "editar"+(i-1));
    editarbtn.setAttribute('data-target', "#item" + (i - 2));

    var agregarbtn = document.getElementById("btnAgregarItem"+(i-1));
    agregarbtn.setAttribute("id", "btnAgregarItem"+(i-2));
  }
  c--;
  document.getElementById("item" + (id-1)).remove();
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
        var arr=tarjetaCodigo.split("-");
        switch(arr[0]){
          case "MA":
          materialesJs.forEach((item) => {
              if (tarjetaCodigo == item.codigo) {
                  tarjetaPrecio = item.precio;
              }
          });
          break;
          case "EQ":
          equiposJs.forEach((item) => {
              if (tarjetaCodigo == item.codigo) {
                tarjetaPrecio = item.precio;
              }
          });
          break;
          default:
          console.log('error prefijo' );
      }
      
      articulos.push({
        codigo: tarjetaCodigo,
        cantidad: $("#cantidad").val(),
        tipo: tarjetaTipo,
        precio: tarjetaPrecio,
        itemsRemplazo: []
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

        var precioCol = document.createElement("div");
        precioCol.setAttribute("class", "col-sm");
        fila.appendChild(precioCol);

        var precioInfo = document.createElement("p");
        precioInfo.setAttribute(
          "class",
          "m-0 font-weight-bold text-center dark-color"
        );
        precioInfo.innerHTML = 'S/. '+tarjetaPrecio;
        precioCol.appendChild(precioInfo);

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

        var editarbtn = document.createElement("button");
        editarbtn.setAttribute("id", "editar"+c);
        editarbtn.setAttribute("class", "btn-quitar ml-2");
        editarbtn.setAttribute('data-toggle', 'modal');
        editarbtn.setAttribute('data-target', '#item'+(articulos.length - 1));
        cantidadCol.appendChild(editarbtn);

        var editar = document.createElement("i");
        editar.setAttribute("class", "material-icons");
        editar.setAttribute("style", "font-weight: 900;");
        editar.innerHTML = "edit";
        editarbtn.appendChild(editar);

        var quitarbtn = document.createElement("button");
        quitarbtn.setAttribute("id", c);
        quitarbtn.setAttribute("onClick", "quitarArticuloTarjeta(this.id)");
        quitarbtn.setAttribute("class", "btn-quitar ml-2");
        cantidadCol.appendChild(quitarbtn);

        var borrar = document.createElement("i");
        borrar.setAttribute("class", "material-icons text-danger");
        borrar.setAttribute("style", "font-weight: 900;");
        borrar.innerHTML = "remove_circle";
        quitarbtn.appendChild(borrar);

        var divPrincipal = document.getElementById("cuerpoPagina");
        divPrincipal.appendChild(contenedor);
        subtotal += (tarjetaPrecio * parseFloat($("#cantidad").val()));
        document.getElementById("subtotal").innerHTML = 'S/.' + subtotal;
        $("#cantidad").val("");
        $("#agregarItemModal .close").click();
        agregarModalItem((articulos.length - 1), tarjetaNombre);
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


function agregarModalItem(id, name){
  var materialesOpciones, equiposOpciones = '';
  materialesJs.forEach((item) => {
    materialesOpciones += "<option value='"+item.codigo+"'>"+item.codigo+" | "+item.nombre+" | Tipo: Material | Cantidad: "+item.cantidad+" "+item.unidad_de_medida+" | Marca: "+item.marcaNombre+"</option>";
  });
  equiposJs.forEach((item) => {
    equiposOpciones += "<option value='"+item.codigo+"'>"+item.codigo+" | "+item.nombre+" | Tipo: Equipos | Cantidad: "+item.cantidad+" Unidades | Marca: "+item.marcaNombre+"</option>";
  });
  const codigoModal = "<div class='modal fade' id='item"+id+"' tabindex='-1' role='dialog' aria-hidden='true'>"
  + "<div class='modal-dialog modal-lg modal-dialog-centered' role='document'>"
  + "<div class='modal-content'>"
  + "    <div class='modal-header'>"
  + "<h3 class='modal-title d-flex align-items-center'><i class='material-icons mr-2' style='font-size: 30px;'>add_circle</i>Items de Remplazo "+name+"</h3>"
  + "    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>"
  + "        <span aria-hidden='true'>&times;</span>"
  + "    </button>"
  + "    </div>"
  + "    <div class='modal-body row mx-1'>"
  + "<div class='col text-right mb-4'>"
  + "  <a href='#itemAgregar"+id+"' data-toggle='modal' data-target='#itemAgregar"+id+"' class='w-100 button-icon-s principal'><span class='material-icons'>"
  + "      add_circle_outline"
  + "      </span>Agregar</a>     "
  + "</div>"
  + "<div class='table-responsive'>"
  + "    <table class='table table-striped datatable_custom'>"
  + "        <thead>"
  + "            <tr>"
  + "                <th>Tipo</th>"
  + "                <th>Nombre</th>"
  + "                <th class='text-center'>Acciones</th>"
  + "            </tr>"
  + "        </thead>"
  + "        <tbody id='tablebody"+id+"'>"
  + "        </tbody>"
  + "    </table>"
  + "</div>"
  + "</div>"
  + "</div>"
  + "</div>"
  + "</div>"
//MODAL PARA AGREGAR ITEMS REMPLAZABLES
  +"<div class='modal fade' id='itemAgregar"+id+"' tabindex='-1' role='dialog' aria-hidden='true'>"
  +"  <div class='modal-dialog modal-lg modal-dialog-centered' role='document'>"
  +"  <div class='modal-content'>"
  +"      <div class='modal-header'>"
  +"      <h3 class='modal-title d-flex align-items-center'><i class='material-icons mr-2' style='font-size: 30px;'>add_circle</i>Agregar un nuevo articulo Remplazable a "+name+"</h3>"
  +"      <button type='button' class='close' data-dismiss='modal' aria-label='Close'>"
  +"          <span aria-hidden='true'>&times;</span>"
  +"      </button>"
  +"      </div>"
  +"      <div class='modal-body'>"
  +"          <div class='row  my-4'>"
  +"              <div class='col-sm form-group'>"
  +"                       <h4 class='font-weight-bold'>Articulo (Material o Herramienta):</h4>"
  +"                       <select name='articulo_select_"+id+"' id='articulo_select_"+id+"' class='form-control' style='width: 100% !important' required>"
  + equiposOpciones + materialesOpciones
  +"                      </select>"
  +"              </div>"
  +"      </div>"
  +"         <div class='row'>"
  +"             <div class='col-sm'>"
  +"              <a href='#' data-dismiss='modal' class='py-2 btn btn-primary text-uppercase rounded w-100 btn-ventas'> "
  +"                  <i class='material-icons' style='font-weight: 900; font-size: xx-large;'>close</i>CANCELAR</a>"
  +"             </div>"
  +"             <div class='col-sm'>"
  +"              <a id='btnAgregarItem"+id+"' href='javascript:agregarItemRemplazo("+id+")' class='py-2 btn btn-primary text-uppercase rounded w-100 btn-ventas'> <i class='material-icons' style='font-weight: 900; font-size: xx-large;'>done</i>CONFIRMAR</a>"
  +"             </div>"
  +"         </div>"
  +"      </div>"
  +"  </div>"
  +"  </div>"
  +"</div>";
  var divApp = document.getElementById("main-content");
  divApp.insertAdjacentHTML( 'beforeend', codigoModal );
  $("#articulo_select_"+id).select2();
  if(equiposJs.length > 0){
      itemTarjetaNombre = equiposJs[0].nombre;
      itemTarjetaTipo = "Equipo";
      itemTarjetaCodigo = equiposJs[0].codigo;
      itemCantidadArticuloSelect = equiposJs[0].cantidad
  }else{
    if(materialesJs.length > 0){
        itemTarjetaNombre = materialesJs[0].nombre;
        itemTarjetaTipo = "Material";
        itemTarjetaCodigo = materialesJs[0].codigo;
        itemCantidadArticuloSelect = materialesJs[0].cantidad
    }
  }
  $('#articulo_select_'+id).on('select2:select', function (e) {
    var arr=e.params.data.id.split("-");
    switch(arr[0]){
        case "MA":
        materialesJs.forEach((item, index) => {
            if (item.codigo == e.params.data.id) {
                itemTarjetaNombre = item.nombre;
                itemTarjetaTipo = "Material";
                itemTarjetaCodigo = item.codigo;
                itemCantidadArticuloSelect = item.cantidad
            }
        });
        break;
        case "EQ":
        equiposJs.forEach((item, index) => {
            if (item.codigo == e.params.data.id) {
                itemTarjetaNombre = item.nombre;
                itemTarjetaTipo = "Equipo";
                itemTarjetaCodigo = item.codigo;
                itemCantidadArticuloSelect = item.cantidad
            }
        });
        break;
        default:
        console.log('error prefijo' );
    }
  });
}

function agregarItemRemplazo(id){
  var optionValue1 = document.getElementById("articulo_select_"+id).value;
  var agregado = false;
  articulos[id].itemsRemplazo.forEach((item, index) => {
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
      if (0 == itemCantidadArticuloSelect) {
        Swal.fire({
          type: "warning",
          title: "No cuentas con stock para este articulo",
          text: "Lo sentimos pero no pudimos agregar su articulo, no cuenta con stock suficiente.",
          confirmButtonText: "Aceptar",
          confirmButtonColor: "#2c5099",
        });
      } else {
        cr++; 
        
        articulos[id].itemsRemplazo.push({
          codigo: itemTarjetaCodigo,
          tipo: itemTarjetaTipo,
        });

      const codigoFila = "<tr id='fila"+articulos[id].codigo+"-"+itemTarjetaCodigo+"'>"
      + "                <td>"+itemTarjetaTipo+"</td>"
      + "                <td>"+itemTarjetaNombre+"</td>"
      + "                <td class='text-center'>"
      + "                    <a id='btnEliminar"+articulos[id].codigo+"-"+itemTarjetaCodigo+"' class='text-danger' data-toggle='tooltip' title='Eliminar'><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>  <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>  <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/></svg></a>"
      + "                </td>"
      + "            </tr>";
      

      var divApp = document.getElementById("tablebody"+id);
      divApp.insertAdjacentHTML( 'beforeend', codigoFila );
      var btnEliminar = document.getElementById("btnEliminar"+articulos[id].codigo+"-"+itemTarjetaCodigo);
      btnEliminar.setAttribute('href', "javascript:eliminarItemRemplazo('"+articulos[id].codigo+"','"+itemTarjetaCodigo+"')");
        $("#itemAgregar"+id+" .close").click();
      }

  }
}


function eliminarItemRemplazo(codigoArticulo,codigo) {
  var index = articulos.map(function(e) { return e.codigo; }).indexOf(codigoArticulo);
  var indexRemplazo = articulos[index].itemsRemplazo.map(function(e) { return e.codigo; }).indexOf(codigo);

  articulos[index].itemsRemplazo.splice(indexRemplazo, 1);
  cr--;
  document.getElementById("fila" + codigoArticulo +"-"+ codigo).remove();
}

function agregarItemAdicionable() {
  var optionValue1 = document.getElementById("articulo_select_adicionable").value;
  var agregado = false;
  articulosAdicionables.forEach((item) => {
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
      if (0 == adicionableCantidadArticuloSelect) {
        Swal.fire({
          type: "warning",
          title: "No cuentas con stock para este articulo",
          text: "Lo sentimos pero no pudimos agregar su articulo, no cuenta con stock suficiente.",
          confirmButtonText: "Aceptar",
          confirmButtonColor: "#2c5099",
        });
      } else {
        ca++; 
        articulosAdicionables.push({
          codigo: adicionableTarjetaCodigo,
          tipo: adicionableTarjetaTipo,
        });

      const codigoFila = "<tr id='filaAdicionable"+adicionableTarjetaCodigo+"'>"
      + "                <td>"+adicionableTarjetaTipo+"</td>"
      + "                <td>"+adicionableTarjetaNombre+"</td>"
      + "                <td class='text-center'>"
      + "                    <a id='btnEliminarAdicionable"+adicionableTarjetaCodigo+"' class='text-danger' data-toggle='tooltip' title='Eliminar'><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>  <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>  <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/></svg></a>"
      + "                </td>"
      + "            </tr>";
      

      var divApp = document.getElementById("tablebodyAdicionable");
      divApp.insertAdjacentHTML( 'beforeend', codigoFila );
      var btnEliminar = document.getElementById("btnEliminarAdicionable"+adicionableTarjetaCodigo);
      btnEliminar.setAttribute('href', "javascript:eliminarItemAdicionable('"+adicionableTarjetaCodigo+"')");
        $("#agregarItemsAdicionables").click();
      }

  }
}

function eliminarItemAdicionable(codigo) {
  var index = articulosAdicionables.map(function(e) { return e.codigo; }).indexOf(codigo);
  articulosAdicionables.splice(index, 1);
  cr--;
  console.log("filaAdicionable" + codigo);
  document.getElementById("filaAdicionable" + codigo).remove();
}


