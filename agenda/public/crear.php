<?php
require_once '../src/config.php';

$mensaje = '';

// Procesar el formulario cuando se envía
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombres = $conexion->real_escape_string($_POST['nombres']);
    $apaterno = $conexion->real_escape_string($_POST['apaterno']);
    $amaterno = $conexion->real_escape_string($_POST['amaterno']);
    $genero = $conexion->real_escape_string($_POST['genero']);
    $fecha_nacimiento = $conexion->real_escape_string($_POST['fecha_nacimiento']);
    $telefono = $conexion->real_escape_string($_POST['telefono']);
    $email = $conexion->real_escape_string($_POST['email']);
    $linkedin = $conexion->real_escape_string($_POST['linkedin']);
    
    $sql = "INSERT INTO contacto (nombres, apaterno, amaterno, genero, fecha_nacimiento, telefono, email, linkedin) 
            VALUES ('$nombres', '$apaterno', '$amaterno', '$genero', '$fecha_nacimiento', '$telefono', '$email', '$linkedin')";
    
    if ($conexion->query($sql)) {
        $mensaje = "Contacto agregado con éxito";
    } else {
        $mensaje = "Error: " . $conexion->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nuevo Contacto</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center mb-4">Agregar Nuevo Contacto</h1>
        
        <?php if ($mensaje): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $mensaje; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Formulario de Registro</h5>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="nombres" class="form-label">Nombres:</label>
                            <input type="text" class="form-control" id="nombres" name="nombres" required>
                        </div>
                        
                        <div class="col-md-4 mb-3">
                            <label for="apaterno" class="form-label">Apellido Paterno:</label>
                            <input type="text" class="form-control" id="apaterno" name="apaterno" required>
                        </div>
                        
                        <div class="col-md-4 mb-3">
                            <label for="amaterno" class="form-label">Apellido Materno:</label>
                            <input type="text" class="form-control" id="amaterno" name="amaterno" required>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="genero" class="form-label">Género:</label>
                            <select class="form-select" id="genero" name="genero" required>
                                <option value="">Seleccione...</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                                <option value="Otro">Otro</option>
                            </select>
                        </div>
                        
                        <div class="col-md-4 mb-3">
                            <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento:</label>
                            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
                        </div>
                        
                        <div class="col-md-4 mb-3">
                            <label for="telefono" class="form-label">Teléfono:</label>
                            <input type="tel" class="form-control" id="telefono" name="telefono" required>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="linkedin" class="form-label">LinkedIn (opcional):</label>
                            <input type="url" class="form-control" id="linkedin" name="linkedin" placeholder="https://linkedin.com/in/usuario">
                        </div>
                    </div>
                    
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary">Guardar Contacto</button>
                        <a href="index.php" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>