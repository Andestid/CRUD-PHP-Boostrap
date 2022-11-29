<?php
print_r($_POST);
if(!isset($_POST['ID'])){
    header('Location: index.php?mensaje=error');
    exit();
}

include 'model/conexion.php';
$ID=$_POST['ID'];
$nombre=$_POST['txtNombre'];
$capital=$_POST['txtCapital'];
$continente=$_POST['txtContinente'];
$habitante=$_POST['txtHabitante'];

$sentencia = $bd->prepare("UPDATE pais set NOMBRE=?, CAPITAL=?, CONTINENTE=?,NHROHABITANTES=? where ID=?;");
$resultado = $sentencia->execute([$nombre,$capital,$continente,$habitante,$ID]);

if($resultado == TRUE){
    header('Location: index.php?mensaje=editado');
    }
    else{
        header('Location: index.php?mensaje=error');
        exit();
    }
?>