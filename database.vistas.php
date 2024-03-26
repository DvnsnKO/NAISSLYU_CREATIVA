<?php
$puerto="3307";
$servidor="localhost:$puerto";
$BaseDatos= "ejemplo";
$Usuario="root";
$Contrasenia="";

try {
    $conexion= new PDO("mysql:host=$servidor, bdname=$BaseDatos",$Usuario, $Contrasenia);
}catch(PDOException $ex) {
    echo $ex->getMessage();
}
?>