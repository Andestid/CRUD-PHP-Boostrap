<?php include 'template/header.php' ?>
<?php include 'template/footer.php' ?>

<?php

if(!isset($_GET['ID'])){
    header ('Location: index.php?mensaje=error');
    exit();
}
include_once 'model/conexion.php';
$ID =  $_GET['ID'];
$sentencia = $bd->prepare("select * from pais where ID=?;");
$sentencia->execute([$ID]);
$pais = $sentencia->fetch(PDO::FETCH_OBJ);
?>
<style>
    body{
  margin: 0;   
}
form{
  margin-bottom: 3rem;
  
}
    </style>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
        <div class="card">
                <div class="card-header">
                    Editar Datos:
                </div>
            
            <form class="p-4" method="POST" action="editarProceso.php">
                <div class="mb-3">
                    <label class="form-label">Nombre: </label>
                    <input type="text" class="form-control" name="txtNombre" autofocus required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Capital: </label>
                    <input type="text" class="form-control" name="txtCapital" autofocus required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Continente: </label>
                    <input type="text" class="form-control" name="txtContinente" autofocus required>
                </div>
                <div class="mb-3">
                    <label class="form-label"># habitantes: </label>
                    <input type="text" class="form-control" name="txtHabitante" autofocus required>
                </div>
                <div class="d-grid">
                    <input type="hidden" name="ID" value="<?php echo $pais->ID;?>">
                    <input type="submit" class="btn btn-primary" value="Editar">
                </div>
            </form>
        </div>
        </div>
    </div>
</div>