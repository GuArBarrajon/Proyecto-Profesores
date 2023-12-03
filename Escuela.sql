-- Crear la base de datos "Escuela"
CREATE DATABASE IF NOT EXISTS Escuela;

-- Usar la base de datos "Escuela"
USE Escuela;

-- Crear la tabla "Profesores"
CREATE TABLE IF NOT EXISTS Profesores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombres VARCHAR(25),
    apellido VARCHAR(25),
    telefono CHAR(10),
    email VARCHAR(50)
);

-- Crear la tabla "Dias"
CREATE TABLE IF NOT EXISTS Dias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(20)
);

-- Insertar los días de la semana
INSERT INTO Dias (nombre) VALUES
    ('Lunes'),
    ('Martes'),
    ('Miércoles'),
    ('Jueves'),
    ('Viernes');

-- Crear la tabla "Dias_disponibles"
CREATE TABLE IF NOT EXISTS Dias_disponibles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    legajo_prof INT,
    id_dia INT,
    FOREIGN KEY (legajo_prof) REFERENCES Profesores(id),
    FOREIGN KEY (id_dia) REFERENCES Dias(id)
);

-- Insertar datos en la tabla "Profesores"
INSERT INTO Profesores (nombres, apellido, telefono, email) VALUES
    ('Juan', 'Gómez', '1234567890', 'juan.gomez@email.com'),
    ('María', 'López', '9876543210', 'maria.lopez@email.com'),
    ('Pedro', 'Martínez', '5678901234', 'pedro.martinez@email.com'),
    ('Luisa', 'Pérez', '2345678901', 'luisa.perez@email.com'),
    ('Miguel', 'Rodríguez', '8901234567', 'miguel.rodriguez@email.com'),
    ('Ana', 'Hernández', '4321098765', 'ana.hernandez@email.com'),
    ('Carlos', 'Fernández', '7654321098', 'carlos.fernandez@email.com'),
    ('Laura', 'García', '1098765432', 'laura.garcia@email.com'),
    ('Javier', 'Sánchez', '6543210987', 'javier.sanchez@email.com'),
    ('Sofía', 'Díaz', '8765432109', 'sofia.diaz@email.com'),
    ('Diego', 'López', '2109876543', 'diego.lopez@email.com'),
    ('Carmen', 'Torres', '5432109876', 'carmen.torres@email.com'),
    ('Antonio', 'Ortega', '3210987654', 'antonio.ortega@email.com'),
    ('Rosa', 'Ramírez', '7654321098', 'rosa.ramirez@email.com'),
    ('Manuel', 'Cruz', '0987654321', 'manuel.cruz@email.com'),
    ('Elena', 'Soto', '2345678901', 'elena.soto@email.com'),
    ('Francisco', 'Molina', '8765432109', 'francisco.molina@email.com'),
    ('Isabel', 'Luna', '6543210987', 'isabel.luna@email.com'),
    ('Rafael', 'Gómez', '4321098765', 'rafael.gomez@email.com'),
    ('Lucía', 'Flores', '1234567890', 'lucia.flores@email.com'),
    ('Daniel', 'Vargas', '8901234567', 'daniel.vargas@email.com'),
    ('Paula', 'Paredes', '1098765432', 'paula.paredes@email.com'),
    ('Mario', 'Mendez', '9876543210', 'mario.mendez@email.com'),
    ('Silvia', 'Aguilar', '5678901234', 'silvia.aguilar@email.com'),
    ('Jorge', 'Silva', '2345678901', 'jorge.silva@email.com'),
    ('Natalia', 'Figueroa', '7654321098', 'natalia.figueroa@email.com'),
    ('Gustavo', 'Cortés', '5432109876', 'gustavo.cortes@email.com'),
    ('Valeria', 'Rojas', '2109876543', 'valeria.rojas@email.com'),
    ('Ricardo', 'Vera', '4321098765', 'ricardo.vera@email.com'),
    ('Rodolfo', 'López', '1133558765', 'rodo.lopez@email.com');

-- Insertar días disponibles para los 30 profesores
INSERT INTO Dias_disponibles (legajo_prof, id_dia) VALUES
      (1, 1), (2, 2), (3, 3), (4, 4), (5, 5), (6, 1), (6, 2), (7, 2), (7, 3), (8, 3), (8, 4), (9, 4), (9, 5), (10, 5), (10, 1),
	(11, 1), (11, 2), (11, 3), (12, 4), (12, 5), (13, 3), (13, 2), (13, 4), (14, 4), (14, 5), (14, 1), (15, 1), (15, 2), (15, 3), (15, 4),
	(16, 2), (16, 3), (16, 4), (16, 5), (17, 3), (17, 4), (17, 5), (17, 1), (18, 4), (18, 5), (18, 1), (18, 2), (19, 1), (19, 2), (19, 3),
	(19, 4), (19, 5), (20, 1), (21, 2), (22, 3), (23, 3), (24, 4), (25, 5), (26, 2), (26, 5), (27, 3), (27, 5), (28, 1), (28, 4), (29, 1), (29, 3),
        (30, 1), (30, 3), (30, 5);		
      
SELECT * FROM dias_disponibles;

CREATE TABLE IF NOT EXISTS Administradores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    correo VARCHAR(50) NOT NULL UNIQUE,
    contrasenia VARCHAR(50) NOT NULL
);

INSERT INTO Administradores (correo, contrasenia) VALUES ('admin', 'admin');