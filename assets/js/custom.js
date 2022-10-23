(function ($) {
  "use strict";

  //tooltip
  $('[data-toggle="tooltip"]').tooltip();

  //datatable detault
  $("#datatable").DataTable({
    oLanguage: {
      oPaginate: { sPrevious: "Anterior", sNext: "Siguiente" },
      sInfo: "Mostrando página _PAGE_ de _PAGES_",
      sSearch: "",
      sSearchPlaceholder: "Buscar",
      sLengthMenu: "Mostrar _MENU_ resultados",
    },
    stripeClasses: [],
    lengthMenu: [10, 25, 50, 100],
    pageLength: 10,
  });

  //datatable custom
  $(".datatable_custom").DataTable({
    oLanguage: {
      oPaginate: { sPrevious: "Anterior", sNext: "Siguiente" },
      sInfo: "Mostrando página _PAGE_ de _PAGES_",
      sSearch: "",
      sSearchPlaceholder: "Buscar",
      sLengthMenu: "Mostrar _MENU_ resultados",
    },
    stripeClasses: [],
    lengthMenu: [10, 25, 50, 100],
    pageLength: 10,
  });

  //datatable custom
  $(".datatable_videos").DataTable({
    oLanguage: {
      oPaginate: { sPrevious: "Anterior", sNext: "Siguiente" },
      sInfo: "Mostrando página _PAGE_ de _PAGES_",
      sSearch: "",
      sSearchPlaceholder: "Buscar",
      sLengthMenu: "Mostrar _MENU_ resultados",
    },
    stripeClasses: [],
    lengthMenu: [2, 4, 10],
    pageLength: 2,
  });

  //datatable detault
  $("#datatableExportar").DataTable({
    oLanguage: {
      oPaginate: { sPrevious: "Anterior", sNext: "Siguiente" },
      sInfo: "Mostrando página _PAGE_ de _PAGES_",
      sSearch: "",
      sSearchPlaceholder: "Buscar",
      sLengthMenu: "Mostrar _MENU_ resultados",
    },
    stripeClasses: [],
    lengthMenu: [10, 25, 50, 100],
    pageLength: 10,

    buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdfHtml5"],
  });
  //datatable orden
  $(".datatable_ordenes").DataTable({
    oLanguage: {
      oPaginate: { sPrevious: "Anterior", sNext: "Siguiente" },
      sInfo: "Mostrando página _PAGE_ de _PAGES_",
      sSearch: "",
      sSearchPlaceholder: "Buscar",
      sLengthMenu: "Mostrar _MENU_ resultados",
    },
    stripeClasses: [],
    order: [[2, "asc"]],
    lengthMenu: [10, 25, 50, 100],
    pageLength: 10,
  });

  //datatable orden
  $(".datatable_ordenes_estado").DataTable({
    oLanguage: {
      oPaginate: { sPrevious: "Anterior", sNext: "Siguiente" },
      sInfo: "Mostrando página _PAGE_ de _PAGES_",
      sSearch: "",
      sSearchPlaceholder: "Buscar",
      sLengthMenu: "Mostrar _MENU_ resultados",
    },
    stripeClasses: [],
    order: [
      [4, "asc"],
      [2, "asc"],
    ],
    lengthMenu: [10, 25, 50, 100],
    pageLength: 10,
  });
  // generate sale
  $("#generate_sale").on("click", function (e) {
    e.preventDefault();
    var order_id = $(this).attr("data-order");
    Swal.fire({
      title: `¿Estás seguro de generar una venta?`,
      text: `Se generará una venta para el pedido número ${order_id}`,
      type: "info",
      showCancelButton: true,
      cancelButtonText: "Cancelar",
      confirmButtonText: "Generar",
      confirmButtonColor: "#000000",
    }).then(function (result) {
      if (result.value) {
        $.ajax({
          type: "POST",
          url: `${APP_URL}/orders/generate/sale`,
          cache: false,
          headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
          },
          data: { order_id: order_id },
          beforeSend: function () {
            //loading
          },
          success: function (response) {
            Swal.fire("¡Generado!", response.message, "success").then(function (
              result
            ) {
              if (result.value) {
                location.reload();
              }
            });
          },
          error: function (request, status, error) {
            console.log(request.responseJSON.message);
            Swal.fire("¡Espera!", request.responseJSON.message, "error");
          },
        });
      }
    });
  });

  // generate commands
  $("#generate_commands").on("click", function (e) {
    e.preventDefault();
    var order_id = $(this).attr("data-order");
    Swal.fire({
      title: `¿Estás seguro de generar las comandas?`,
      text: `Se generará comandas para el pedido número ${order_id}`,
      type: "info",
      showCancelButton: true,
      cancelButtonText: "Cancelar",
      confirmButtonText: "Generar",
      confirmButtonColor: "#000000",
    }).then(function (result) {
      if (result.value) {
        $.ajax({
          type: "POST",
          url: `${APP_URL}/orders/generate/commands`,
          cache: false,
          headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
          },
          data: { order_id: order_id },
          beforeSend: function () {
            //loading
          },
          success: function (response) {
            Swal.fire("¡Generado!", response.message, "success").then(function (
              result
            ) {
              if (result.value) {
                location.reload();
              }
            });
          },
          error: function (request, status, error) {
            console.log(request.responseJSON.message);
            Swal.fire("¡Espera!", request.responseJSON.message, "error");
          },
        });
      }
    });
  });

  // get command details
  $(".get_command_details").on("click", function (e) {
    e.preventDefault();
    var command_id = $(this).attr("data-id");
    $.ajax({
      type: "GET",
      url: `${APP_URL}/orders/command/${command_id}/details`,
      cache: false,
      headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") },
      beforeSend: function () {
        $("#modal_command_details").html(
          '<div class="py-5 px-3 text-center">Cargando...</div>'
        );
      },
      success: function (response) {
        $("#modal_command_details").html(response);
      },
    });
  });

  // to accept order
  $(".to_accept_order").on("click", function (e) {
    e.preventDefault();
    var order_id = $(this).attr("data-order-id");
    Swal.fire({
      title: `¿Estás seguro de aceptar el pedido?`,
      text: `Se aceptará el pedido número ${order_id}`,
      type: "info",
      showCancelButton: true,
      cancelButtonText: "Cancelar",
      confirmButtonText: "Aceptar",
      confirmButtonColor: "#000000",
    }).then(function (result) {
      if (result.value) {
        $.ajax({
          type: "POST",
          url: `${APP_URL}/orders/status/to-accept`,
          cache: false,
          headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
          },
          data: { order_id: order_id },
          beforeSend: function () {
            //loading
          },
          success: function (response) {
            Swal.fire("¡Aceptado!", response.message, "success").then(function (
              result
            ) {
              if (result.value) {
                location.reload();
              }
            });
          },
          error: function (request, status, error) {
            console.log(request.responseJSON.message);
            Swal.fire("¡Espera!", request.responseJSON.message, "error");
          },
        });
      }
    });
  });

  //deliver order
  $("#deliver_order").on("click", function (e) {
    e.preventDefault();
    var order_id = $(this).attr("data-order-id");
    Swal.fire({
      title: `¿Estás seguro de entregar el pedido?`,
      text: `Se entregará el pedido número ${order_id}`,
      type: "info",
      showCancelButton: true,
      cancelButtonText: "Cancelar",
      confirmButtonText: "Entregar",
      confirmButtonColor: "#000000",
    }).then(function (result) {
      if (result.value) {
        $.ajax({
          type: "POST",
          url: `${APP_URL}/orders/status/deliver`,
          cache: false,
          headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
          },
          data: { order_id: order_id },
          beforeSend: function () {
            //loading
          },
          success: function (response) {
            Swal.fire("¡Entregado!", response.message, "success").then(
              function (result) {
                if (result.value) {
                  location.reload();
                }
              }
            );
          },
          error: function (request, status, error) {
            console.log(request.responseJSON.message);
            Swal.fire("¡Espera!", request.responseJSON.message, "error");
          },
        });
      }
    });
  });

  //complete order
  $("#complete_order").on("click", function (e) {
    e.preventDefault();
    var order_id = $(this).attr("data-order-id");
    Swal.fire({
      title: `¿Estás seguro de completar el pedido?`,
      text: `Se completará el pedido número ${order_id}`,
      type: "info",
      showCancelButton: true,
      cancelButtonText: "Cancelar",
      confirmButtonText: "Completar",
      confirmButtonColor: "#000000",
    }).then(function (result) {
      if (result.value) {
        $.ajax({
          type: "POST",
          url: `${APP_URL}/orders/status/complete`,
          cache: false,
          headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
          },
          data: { order_id: order_id },
          beforeSend: function () {
            //loading
          },
          success: function (response) {
            Swal.fire("¡Completado!", response.message, "success").then(
              function (result) {
                if (result.value) {
                  location.reload();
                }
              }
            );
          },
          error: function (request, status, error) {
            console.log(request.responseJSON.message);
            Swal.fire("¡Espera!", request.responseJSON.message, "error");
          },
        });
      }
    });
  });

  //change payment status
  $(".ok_payment_status").on("click", function (e) {
    e.preventDefault();
    var order_id = $(this).attr("data-order-id");
    var payment_status = 1;
    Swal.fire({
      title: `¿Estás seguro de aceptar el pago?`,
      text: `Se aceptará el pago para el pedido número ${order_id}`,
      type: "info",
      showCancelButton: true,
      cancelButtonText: "Cancelar",
      confirmButtonText: "Aceptar",
      confirmButtonColor: "#000000",
    }).then(function (result) {
      if (result.value) {
        $.ajax({
          type: "POST",
          url: `${APP_URL}/orders/update/payment-status`,
          cache: false,
          headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
          },
          data: { order_id: order_id, payment_status: payment_status },
          beforeSend: function () {
            //loading
          },
          success: function (response) {
            Swal.fire("¡Aceptado!", response.message, "success").then(function (
              result
            ) {
              if (result.value) {
                location.reload();
              }
            });
          },
          error: function (request, status, error) {
            console.log(request.responseJSON.message);
            Swal.fire("¡Espera!", request.responseJSON.message, "error");
          },
        });
      }
    });
  });

  //change payment status
  $(".send_invoice_sunat").on("click", function (e) {
    e.preventDefault();
    var sale_id = $(this).attr("data-sale-id");
    Swal.fire({
      title: `¿Estás seguro de enviar a SUNAT?`,
      text: `Se enviará el comprobante ${sale_id} a SUNAT`,
      type: "info",
      showCancelButton: true,
      cancelButtonText: "Cancelar",
      confirmButtonText: "Enviar a Sunat",
      confirmButtonColor: "#000000",
    }).then(function (result) {
      if (result.value) {
        $.ajax({
          type: "POST",
          url: `${APP_URL}/sales/invoice/send`,
          cache: false,
          headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
          },
          data: { sale_id: sale_id },
          beforeSend: function () {
            //loading
          },
          success: function (response) {
            Swal.fire("¡Enviado!", response.message, "success").then(function (
              result
            ) {
              if (result.value) {
                location.reload();
              }
            });
          },
          error: function (request, status, error) {
            console.log(request.responseJSON.message);
            Swal.fire("¡Espera!", request.responseJSON.message, "error");
          },
        });
      }
    });
  });
})(jQuery);
