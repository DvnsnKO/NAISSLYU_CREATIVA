
/*=============================================
ELIMINAR MARCA
=============================================*/
$(document).on("click", ".btnDelMarca", function () {
  var idLinea = $(this).attr("id");

  Swal.fire({
    title: '¿Desea eliminar la linea?',
    icon: "question",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'Si'
  }).then(function (result) {
    if (result.value) {
      window.location = "indexadmin.php?rutaadmin=lineas&id=" + idLinea;
    }
  });
});

/*=============================================
ELIMINAR PERSONA
=============================================*/
$(document).on("click", ".btnDelpersona", function () {
  var idPersona = $(this).attr("id");

  Swal.fire({
    title: '¿Desea eliminar el usuario?',
    icon: "question",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'Si'
  }).then(function (result) {
    if (result.value) {
      window.location = "indexadmin.php?rutaadmin=usuarios&id=" + idPersona;
    }
  });
});

/*=============================================
ELIMINAR PRODUCTO
=============================================*/
$(document).on("click", ".btnDelProducto", function () {
  var Idproducto = $(this).attr("id");

  Swal.fire({
    title: '¿Desea eliminar el producto?',
    icon: "question",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'Si'
  }).then(function (result) {
    if (result.value) {
      window.location = "indexadmin.php?rutaadmin=activos&id=" + Idproducto;
    }
  });
});
