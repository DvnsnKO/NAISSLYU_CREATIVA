/*=============================================
ELIMINAR persona
=============================================*/
$(document).on("click", ".btnDelpersona", function(){

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
    }).then(function(result){
  
      if(result.value){
  
        window.location = "indexadmin.php?rutaadmin=usuarios&id="+idPersona;
  
      }
  
    })
  
  })