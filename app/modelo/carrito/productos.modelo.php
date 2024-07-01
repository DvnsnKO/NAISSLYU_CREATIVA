<?php
/*Muestra los productos desde la base de datos al admin se hace con el fin
 de separar los datos de los productos que pueden ver los clientes y los permisos del admin
//  */
// require_once "./conexion.php";

// class ProductoModel
// {

//   public static function index()
//   {try 
//     {
//       /** Realizar la consulta a la base de datos */
//       $datos = Conexion::connect()->prepare("SELECT * FROM productos"); 

//       /**Ejecutar la consulta */
//       $datos->execute();

//       /** Devuelve los datos consultados */
//       return $datos->fetchAll();

//       /**Cerrar conexion a la bd */
    

//     } catch (Exception $e) {
//       echo $e->getMessage();
//       die();
//     }
//   }
//   //Método para guardar registro en la tabla de la base de datos
//   public static function create($data)
//   {

//     //-- Validar que no exista un registro con el mismo codifo

//     $exist = Conexion::connect()->prepare("SELECT Cant_disp, Precio_uni, Descripcion, Codigo_producto, Nombre,  Lineas_idLineas, Imagen FROM productos where Codigo_producto = :code");

//     // 2- Asignar parametros
//     $exist->bindParam(":code", $data["Codigo_producto"], PDO::PARAM_STR);

//     //3 ejecutar la consulta
//     //$exist->execute()->fetchAll();

//     /**Ejecutar la consulta */
//     if ($exist->execute()) {
//       $exist->fetchAll();

//       if ($exist->rowCount() > 0) {
//         // hay registros ya existe
//         /** Enviar mensaje de creación correcta */
//         echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
//         echo '<script>
                   
//             Swal.fire({
//               icon: "error",
//               title: "El producto ya existe.",
          
//               showConfirmButton: true,
//               confirmButtonText: "Aceptar"
//               }).then(function(result){
//                           if (result.value) {
//                               /**Redireccionar a la página principal de productos */
//                               window.location.href = "indexadmin.php?rutaadmin=crear_productos";
//                           }
//                       });
//           </script>';
//       } else {
//         // 1 - Crear la consulta para inserción en la tabla
//         $create = Conexion::connect()->prepare("INSERT INTO productos (Cant_disp, Precio_uni, Descripcion, Codigo_producto, Nombre,  Lineas_idLineas, Imagen)
//                 VALUES( :Cant_disp, :Precio_uni, :Descripcion, :Codigo_producto, :Nombre,  :Lineas_idLineas, :Imagen)");


//         /**Asignar parametros*/
//         $create->bindParam(":Codigo_producto", $data["Codigo_producto"], PDO::PARAM_STR);
//         $create->bindParam(":Nombre", $data["Nombre"], PDO::PARAM_STR);      
//         $create->bindParam(":Lineas_idLineas", $data["Lineas_idLineas"], PDO::PARAM_INT);
//         $create->bindParam(":Cant_disp", $data["Cant_disp"], PDO::PARAM_INT);
//         $create->bindParam(":Descripcion", $data["Descripcion"], PDO::PARAM_STR);
//         $create->bindParam(":Precio_uni", $data["Precio_uni"], PDO::PARAM_INT);
//         $create->bindParam(":Imagen", $data["Imagen"], PDO::PARAM_STR);

//         /**Ejecutar la consulta */
//         if ($create->execute()) {
//           return "Ok";
//         } else {
//           return "Error Modelo";
//         }

//         /**Cerrar conexion a la bd */
        
//       }
//     }
//   }
//   static public function show($id)
//   {
//     /** Realizar la consulta a la base de datos */
//     $data = Conexion::connect()->prepare("SELECT p.*, l.Nombre_linea AS Nombre_linea
// FROM productos p
// INNER JOIN lineas l ON p.Lineas_idLineas = l.idLineas 
// WHERE p.Codigo_producto = :id");

//     /** Inicializar los parametros de la consulta */
//     $data->bindParam(":id", $id, PDO::PARAM_INT);

//     /**Ejecutar la consulta */
//     $data->execute();

//     /** Devuelve el registro consultado */
//     return $data->fetch();

//     /**Cerrar conexion a la bd */

//   }
//   static public function update($data)
//   {

//     $update = Conexion::Connect()->prepare("UPDATE productos SET  Nombre = :Nombre, Estado = :Estado, 
//     Lineas_idLineas = :Lineas_idLineas, Cant_disp = :Cant_disp, Descripcion = :Descripcion,  Precio_uni = :Precio_uni
//     WHERE Codigo_producto = :id ");


// /**Asignar parametros*/
// $update->bindParam(":id", $data["Codigo_producto"], PDO::PARAM_STR);
// $update->bindParam(":Nombre", $data["Nombre"], PDO::PARAM_STR);    
// $update->bindParam(":Estado", $data["Estado"], PDO::PARAM_STR);
// $update->bindParam(":Lineas_idLineas", $data["Lineas_idLineas"], PDO::PARAM_INT);
// $update->bindParam(":Cant_disp", $data["Cant_disp"], PDO::PARAM_INT);
// $update->bindParam(":Descripcion", $data["Descripcion"], PDO::PARAM_STR);
// $update->bindParam(":Precio_uni", $data["Precio_uni"], PDO::PARAM_INT);



//     /** Ejecutar la consulta y retornar el resultado al controlador */
//     if ($update->execute()) {
//       return "Ok";
//     } else {

    
//       echo '<script>
                           
//                     Swal.fire({
//                       icon: "error",
//                       title: "error al actualizar.",
                  
//                       showConfirmButton: true,
//                       confirmButtonText: "Aceptar"
//                       }).then(function(result){
//                                   if (result.value) {
//                                       /**Redireccionar a la página principal de CRM */
//                                       window.location.href = "indexadmin.php?rutaadmin=actualizar_productos";
//                                   }
//                               });
//                   </script>';
//     }
//     ;


//     /** Cerrar conexion a la bd */


//   }
//   static public function delete($id)
//   {
//     try {

     

//       /** Armar la consulta a la base de datos para inactivar y no eliminar */
//       $update = Conexion::Connect()->prepare("UPDATE productos SET Estado = 0
//         WHERE  	Codigo_producto = :id");

//       /**Asignar parametros*/
//       $update->bindParam(":id", $id, PDO::PARAM_INT);

   

//       /**Ejecutar la consulta */
//       if ($update->execute()) {

//         return "Ok";
//       } else {
//         return "Error";
//       }
//       /**Cerrar conexion a la bd */
     
//     } catch (Exception $e) {
//       echo $e->getMessage();
//       die();
//     }
//   }
// }



?>