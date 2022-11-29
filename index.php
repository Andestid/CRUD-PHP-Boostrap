<?php include 'template/header.php' ?>

<?php
  include_once "model/conexion.php";
  $sentencia = $bd -> query("select * from pais");
  $pais = $sentencia->fetchAll(PDO::FETCH_OBJ);
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
        <div class="col-md-7">
            <!-- inicio alerta -->
            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje']=='falta'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Rellena todos los campos
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                }
            ?>

            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje']=='registrado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Registrado!</strong> Se agregaron los datos
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                }
            ?>

            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje']=='error'){
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Operación Fallida
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                }
            ?>

            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje']=='editado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Editado!</strong> Los datos fueron actualizados
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                }
            ?>

            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje']=='eliminado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Eliminado!</strong> Los datos fueron eliminados
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                }
            ?>

            <div class="card">
                <div class="card-header">
                    Lista de pais
                </div>
                <div class="p-4">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Capital</th>
                                <th scope="col">Continente</th>
                                <th scope="col"># Habitantes</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($pais as $dato){
                            ?>
                            <tr>
                                <td scope="row"><?php echo $dato->ID;?></td>
                                <td><?php echo $dato->NOMBRE;?></td>
                                <td><?php echo $dato->CAPITAL;?></td>
                                <td><?php echo $dato->CONTINENTE;?></td>
                                <td><?php echo $dato->NHROHABITANTES;?></td>
                                <td><a class="text-primary" href="editar.php?ID=<?php echo $dato->ID;?>"><i class="bi bi-pencil-square"></i></a></td>
                                <td><a class="text-danger" href="eliminar.php?ID=<?php echo $dato->ID;?>"><i class="bi bi-trash"></i></a></td>
                            </tr>
                           
                            <?php
                            }
                            ?>
                          
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Ingresar Datos:
                </div>
            
            <form class="p-4" method="POST" action="registrar.php">
                <div class="mb-3">
                    <label class="form-label">ID: </label>
                    <input type="number" class="form-control" name="txtID" autofocus required>
                </div>
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
                    <label class="form-label">Numero de habitantes: </label>
                    <input type="number" class="form-control" name="txtHabitante" autofocus required>
                </div>
                <div class="d-grid">
                    <input type="submit" class="btn btn-primary" value="Registrar">
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
    <?php include 'template/footer.php' ?>
                           