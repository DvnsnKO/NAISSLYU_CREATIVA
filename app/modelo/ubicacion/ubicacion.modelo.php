<?php
require_once "./conexion.php";

class ubicacionModel
{

    public static function indexdep()
    {
        try {
            /** Realizar la consulta a la base de datos */
            $datos = Conexion::connect()->prepare("SELECT * FROM departamentos");

            /**Ejecutar la consulta */
            $datos->execute();

            /** Devuelve los datos consultados */
            return $datos->fetchAll();

            /**Cerrar conexion a la bd */


        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
    }
    
    public static function indexmun($dept_id)
    {
        try {
            /** Realizar la consulta a la base de datos */
            $conexion = Conexion::connect();
            $datos = $conexion->prepare("SELECT * FROM municipios WHERE dept_id = :dept_id");

            /** Vincular el parámetro */
            $datos->bindParam(':dept_id', $dept_id, PDO::PARAM_INT);

            /** Ejecutar la consulta */
            $datos->execute();

            /** Devuelve los datos consultados */
            $resultados = $datos->fetchAll();

            /** Cerrar la conexión a la base de datos */
            $conexion = null;

            return $resultados;

        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
    }
}

?>