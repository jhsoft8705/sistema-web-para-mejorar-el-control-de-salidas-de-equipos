$("#doc_type").on("change", function () {
  $("#nro_documento").val("");
  if (this.value == 1) {
    $("#nro_documento").attr("maxlength", "11");
    $("#nro_documento").attr("minlength", "11");
  } else {
    $("#nro_documento").attr("maxlength", "8");
    $("#nro_documento").attr("minlength", "8");
  }
});
