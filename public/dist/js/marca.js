/*=============================================
ELIMINAR MARCA
=============================================*/
$(document).on("click", ".btnDelMarca", function(){

  var idLinea = $(this).attr("id");
  
  Swal.fire({
<<<<<<< HEAD
    title: '¿Está seguro de eliminar la linea el id ?',
   
=======
    title: '¿Está seguro de eliminar la Marca de producto?',
>>>>>>> a5305b12144a51f1a42eb3b252083a9895a9f042
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

