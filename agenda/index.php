<?php
require_once 'src/config.php'; // Cambiado para reflejar la nueva ubicación

// Eliminar contacto si se ha enviado ID
if (isset($_GET['eliminar'])) {
    $id = $_GET['eliminar'];
    $sql = "DELETE FROM contacto WHERE id = $id";
    if ($conexion->query($sql)) {
        $mensaje = "Contacto eliminado con éxito";
    } else {
        $mensaje = "Error al eliminar: " . $conexion->error;
    }
}

// Consultar todos los contactos
$sql = "SELECT * FROM contacto ORDER BY apaterno, amaterno, nombres";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Agenda de Contactos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        .table-responsive {
            overflow-x: auto;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center mb-4">Sistema de Agenda de Contactos</h1>
        
        <?php if (isset($mensaje)): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $mensaje; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        
        <div class="mb-3">
            <a href="public/crear.php" class="btn btn-primary">Agregar Nuevo Contacto</a>
        </div>
        
        <div class="card">
            <div class="card-header bg-dark text-white">
                <h5 class="mb-0">Lista de Contactos</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nombre Completo</th>
                                <th>Género</th>
                                <th>Fecha de Nacimiento</th>
                                <th>Teléfono</th>
                                <th>Email</th>
                                <th>LinkedIn</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($resultado->num_rows > 0): ?>
                                <?php while ($fila = $resultado->fetch_assoc()): ?>
                                    <tr>
                                        <td><?php echo $fila['id']; ?></td>
                                        <td><?php echo $fila['nombres'] . ' ' . $fila['apaterno'] . ' ' . $fila['amaterno']; ?></td>
                                        <td><?php echo $fila['genero']; ?></td>
                                        <td><?php echo $fila['fecha_nacimiento']; ?></td>
                                        <td><?php echo $fila['telefono']; ?></td>
                                        <td><?php echo $fila['email']; ?></td>
                                        <td>
                                            <?php if ($fila['linkedin']): ?>
                                                <a href="<?php echo $fila['linkedin']; ?>" target="_blank">Ver perfil</a>
                                            <?php else: ?>
                                                No disponible
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="public/ver.php?id=<?php echo $fila['id']; ?>" class="btn btn-info btn-sm">Ver</a>
                                            <a href="public/editar.php?id=<?php echo $fila['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                                            <a href="index.php?eliminar=<?php echo $fila['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este contacto?')">Eliminar</a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="8" class="text-center">No hay contactos registrados</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>