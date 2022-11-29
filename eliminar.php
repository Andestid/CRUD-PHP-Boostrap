<?php
print_r($_POST);
if(!isset($_GET['ID'])){
    header('Location: index.php?mensaje=error');
    exit();
}

include 'model/conexion.php';
$ID=$_GET['ID'];

$sentencia = $bd->prepare("DELETE FROM pais where ID=?;");
$resultado = $sentencia->execute([$ID]);

if($resultado == TRUE){
    header('Location: index.php?mensaje=eliminado');
    }
    else{
        header('Location: index.php?mensaje=error');
        exit();
    }
?>