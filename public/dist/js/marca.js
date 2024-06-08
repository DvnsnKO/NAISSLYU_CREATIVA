/*=============================================
ELIMINAR MARCA
=============================================*/
$(document).on("click", ".btnDelMarca", function(){

  var idLinea = $(this).attr("id");
  
  Swal.fire({
    title: '¿Está seguro de eliminar la Marca de producto?',
    icon: "question",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si'
  }).then(function(result){

    if(result.value){

      window.location = "indexadmin.php?rutaadmin=lineas&id="+idLinea;

    }

  })

})