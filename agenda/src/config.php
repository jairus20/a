<?php
$host = 'localhost'; // Dirección del servidor MySQL
$dbname = 'agenda_contactos'; // Nombre de la base de datos
$user = 'root'; // Usuario de MySQL
$password = ''; // Contraseña de MySQL (vacía por defecto en XAMPP)

// Crear conexión
$conexion = new mysqli($host, $user, $password, $dbname);

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>