CREATE DATABASE IF NOT EXISTS agenda_contactos;

USE agenda_contactos;

CREATE TABLE IF NOT EXISTS contacto (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombres VARCHAR(100) NOT NULL,
    apaterno VARCHAR(100) NOT NULL,
    amaterno VARCHAR(100) NOT NULL,
    genero ENUM('Masculino', 'Femenino', 'Otro') NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    telefono VARCHAR(15) NOT NULL,
    email VARCHAR(100) NOT NULL,
    linkedin VARCHAR(255) DEFAULT NULL
);

INSERT INTO contacto (nombres, apaterno, amaterno, genero, fecha_nacimiento, telefono, email, linkedin) VALUES
('Juan', 'Pérez', 'García', 'Masculino', '1990-01-15', '123456789', 'juan.perez@example.com', 'https://linkedin.com/in/juanperez'),
('María', 'López', 'Martínez', 'Femenino', '1985-05-20', '987654321', 'maria.lopez@example.com', NULL),
('Carlos', 'Gómez', 'Hernández', 'Masculino', '1992-03-10', '456789123', 'carlos.gomez@example.com', 'https://linkedin.com/in/carlosgomez');