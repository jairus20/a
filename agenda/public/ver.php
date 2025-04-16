<?php
require_once '../src/config.php';

// Verificar si se proporcionó un ID
if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$id = $_GET['id'];

// Obtener los datos del contacto
$sql = "SELECT * FROM contacto WHERE id=$id";
$resultado = $conexion->query($sql);

if ($resultado->num_rows === 0) {
    header('Location: index.php');
    exit;
}

$contacto = $resultado->fetch_assoc();

// Calcular la edad
$fecha_nacimiento = new DateTime($contacto['fecha_nacimiento']);
$hoy = new DateTime();
$edad = $hoy->diff($fecha_nacimiento)->y;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Contacto</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center mb-4">Detalles del Contacto</h1>
        
        <div class="card">
            <div class="card-header bg-info text-white">
                <h3><?php echo $contacto['nombres'] . ' ' . $contacto['apaterno'] . ' ' . $contacto['amaterno']; ?></h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>ID:</strong> <?php echo $contacto['id']; ?></p>
                        <p><strong>Nombres:</strong> <?php echo $contacto['nombres']; ?></p>
                        <p><strong>Apellido Paterno:</strong> <?php echo $contacto['apaterno']; ?></p>
                        <p><strong>Apellido Materno:</strong> <?php echo $contacto['amaterno']; ?></p>
                        <p><strong>Género:</strong> <?php echo $contacto['genero']; ?></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Fecha de Nacimiento:</strong> <?php echo $contacto['fecha_nacimiento']; ?></p>
                        <p><strong>Edad:</strong> <?php echo $edad; ?> años</p>
                        <p><strong>Teléfono:</strong> <?php echo $contacto['telefono']; ?></p>
                        <p><strong>Email:</strong> <?php echo $contacto['email']; ?></p>
                        <p><strong>LinkedIn:</strong> 
                            <?php if ($contacto['linkedin']): ?>
                                <a href="<?php echo $contacto['linkedin']; ?>" target="_blank"><?php echo $contacto['linkedin']; ?></a>
                            <?php else: ?>
                                No disponible
                            <?php endif; ?>
                        </p>
                    </div>
                </div>
                
                <div class="text-center mt-4">
                    <a href="public/editar.php?id=<?php echo $contacto['id']; ?>" class="btn btn-warning">Editar</a>
                    <a href="../index.php?eliminar=<?php echo $contacto['id']; ?>" class="btn btn-danger" onclick="return confirm('¿Está seguro de eliminar este contacto?')">Eliminar</a>
                    <a href="../index.php" class="btn btn-secondary">Volver a la Lista</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>