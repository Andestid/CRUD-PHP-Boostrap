<?php
print_r($_POST);
if (empty($_POST["txtID"])
 || empty($_POST["txtNombre"]) || empty($_POST["txtCapital"])
 || empty($_POST["txtContinente"]) || empty($_POST["txtHabitante"])){
    header('Location: index.php?mensaje=falta');
    exit();
}

include_once "model/conexion.php";
$ID= $_POST["txtID"];
$nombre= $_POST["txtNombre"];
$capital= $_POST["txtCapital"];
$continente= $_POST["txtContinente"];
$habitantes= $_POST["txtHabitante"];

$sentencia = $bd->prepare("insert into pais(ID,NOMBRE,CAPITAL,CONTINENTE,NHROHABITANTES) values (?,?,?,?,?);");
$resultado = $sentencia->execute([$ID,$nombre,$capital,$continente,$habitantes]);

if ($resultado === TRUE){
    //echo "OK";
    header ('Location: index.php?mensaje=registrado');
}
else{
    //echo "NOO"; 
    header ('Location: index.php?mensaje=error');
    exit();
}

?>