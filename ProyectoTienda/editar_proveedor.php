<?php
include_once "encabezado.php";
include_once "navbar.php";
session_start();

if(empty($_SESSION['usuario'])) header("location: login.php");

$id = $_GET['id'];
if (!$id) {
    echo 'No se ha seleccionado el proveedor';
    exit;
}
include_once "funciones.php";
$proveedor = obtenerProveedorPorId($id);
?>
<div class="container">
    <h3>Editar proveedor</h3>
    <form method="post">
        <div class="mb-3">
            <label for="marca" class="form-label">Marca</label>
            <input type="text" name="marca" class="form-control" value="<?php echo $usuario->usuario;?>" id="usuario" placeholder="Escribe el nombre de la marca">
        </div>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre Del Proveedor</label>
            <input type="text" name="nombre" class="form-control" value="<?php echo $usuario->nombre;?>" id="nombre" placeholder="Escribe el nombre del proveedor">
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" name="telefono" class="form-control" value="<?php echo $usuario->telefono;?>" id="telefono" placeholder="Ej. 9516901760">
        </div>
        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" name="direccion" class="form-control" value="<?php echo $usuario->direccion;?>" id="direccion" placeholder="Ej. Av Collar 1005 Col Las Cruces">
        </div>

        <div class="text-center mt-3">
            <input type="submit" name="registrar" value="Registrar" class="btn btn-primary btn-lg">
            
            </input>
            <a href="usuarios.php" class="btn btn-danger btn-lg">
                <i class="fa fa-times"></i> 
                Cancelar
            </a>
        </div>
    </form>
</div>
<?php
if(isset($_POST['registrar'])){
    $marca = $_POST['marca'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    if(empty($marca)
    ||empty($nombre) 
    || empty($telefono) 
    || empty($direccion)){
        echo'
        <div class="alert alert-danger mt-3" role="alert">
            Debes completar todos los datos.
        </div>';
        return;
    } 
    
    include_once "funciones.php";
    $resultado = editarUsuario($usuario, $nombre, $telefono, $direccion, $id);
    if($resultado){
        echo'
        <div class="alert alert-success mt-3" role="alert">
            Información de proveedor actualizada con éxito.
        </div>';
    }
    
}
?>