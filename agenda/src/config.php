<?php
$host = '192.168.56.106'; 
$dbname = 'agenda_contactos';
$user = 'usuario';
$password = '123';

// Crear conexión
$conexion = new mysqli($host, $user, $password, $dbname);

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>
