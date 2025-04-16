<?php
$host = 'localhost';
$usuario = 'root';  // Cambia esto según tu configuración de MySQL
$contraseña = '';   // Cambia esto según tu configuración de MySQL
$base_datos = 'agenda_contactos';

// Crear conexión
$conexion = new mysqli($host, $usuario, $contraseña, $base_datos);

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Configurar codificación UTF-8
$conexion->set_charset("utf8");
?>