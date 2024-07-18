-- NUEVA VERSIÓN DE BD VIAJES BUS
-- BY FLAV'S

DROP DATABASE IF EXISTS bdviajesBus;

CREATE DATABASE bdviajesBus;
USE bdviajesBus;

-- CREACIÓN DE TABLAS
CREATE TABLE DESTINO (
    COD_DESTINO CHAR(6) NOT NULL PRIMARY KEY,
    NOM_DESTINO VARCHAR(50) NOT NULL,
    DESCRIPCION TEXT
);

CREATE TABLE TIPO_SERVICIO (
    COD_SERVICIO CHAR(2) NOT NULL PRIMARY KEY,
    TIPO_SERVICIO VARCHAR(20) NOT NULL,
    TIPO_BUS VARCHAR(20) NOT NULL,
    TIPO_ASIENTO VARCHAR(20) NOT NULL
);

CREATE TABLE BUS (
    PLACA CHAR(6) NOT NULL PRIMARY KEY,
    NUM_ASIENTOS INT NOT NULL,
    PISOS INT NOT NULL,
    TIPO_BUS VARCHAR(20) NOT NULL,
    MODELO VARCHAR(50),
    CAPACIDAD_CARGA INT,
    ESTADO_MANTENIMIENTO ENUM('Bueno', 'Regular', 'Malo')
);

CREATE TABLE VIAJE (
    COD_VIA CHAR(8) NOT NULL PRIMARY KEY,
    FECHA_VIA DATE NOT NULL,
    HORA_VIA TIME NOT NULL,
    DURACION VARCHAR(10) NOT NULL, -- Duración en horas y minutos (ejemplo: '3h 30min')
    BUS CHAR(6) NOT NULL,
    DESTINO CHAR(6) NOT NULL,
    ORIGEN CHAR(6) NOT NULL,
    PRECIO_BASE DECIMAL(10, 2) NOT NULL, -- Precio base del viaje
    FOREIGN KEY (BUS) REFERENCES BUS(PLACA),
    FOREIGN KEY (DESTINO) REFERENCES DESTINO(COD_DESTINO),
    FOREIGN KEY (ORIGEN) REFERENCES DESTINO(COD_DESTINO)
);

CREATE TABLE USUARIO (
    COD_USER CHAR(6) NOT NULL PRIMARY KEY,
    NOMBRES VARCHAR(30) NOT NULL,
    APELLIDOS VARCHAR(30) NOT NULL,
    CORREO VARCHAR(35) NOT NULL,
    PASSWORD VARCHAR(25) NOT NULL
);

CREATE TABLE OFICINA (
    NUM_LOCAL CHAR(6) NOT NULL PRIMARY KEY,
    TELEFONO_FIJO VARCHAR(15),
    TELEFONO_CEL VARCHAR(15),
    DIRECCION VARCHAR(100),
    NOMBRE_OFI VARCHAR(50)
);

CREATE TABLE ASIENTO (
    ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    COD_VIA CHAR(8) NOT NULL,
    NUM_ASIENTO INT NOT NULL,
    TIPO_ASIENTO VARCHAR(20) NOT NULL,
    ESTADO ENUM('Libre', 'Reservado', 'Vendido') NOT NULL DEFAULT 'Libre',
    PRECIO DECIMAL(10, 2) NOT NULL, -- Precio del asiento (se suma al precio base del viaje)
    FOREIGN KEY (COD_VIA) REFERENCES VIAJE(COD_VIA)
);

CREATE TABLE RESERVA (
    COD_RESERVA INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    COD_VIA CHAR(8) NOT NULL,
    COD_USER CHAR(6) NOT NULL,
    ID_ASIENTO INT NOT NULL,
    ESTADO ENUM('Reservado', 'Pagado') NOT NULL DEFAULT 'Reservado',
    FOREIGN KEY (COD_VIA) REFERENCES VIAJE(COD_VIA),
    FOREIGN KEY (COD_USER) REFERENCES USUARIO(COD_USER),
    FOREIGN KEY (ID_ASIENTO) REFERENCES ASIENTO(ID)
);

CREATE TABLE VENTA (
    COD_VENTA INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    COD_RESERVA INT NOT NULL,
    FECHA_VENTA DATE NOT NULL,
    MONTO_TOTAL DECIMAL(10, 2) NOT NULL,
    ESTADO_PAGO ENUM('Pendiente', 'Pagado') NOT NULL DEFAULT 'Pendiente',
    FOREIGN KEY (COD_RESERVA) REFERENCES RESERVA(COD_RESERVA)
);

-- Rellenar la tabla DESTINO
INSERT INTO DESTINO (COD_DESTINO, NOM_DESTINO, DESCRIPCION) VALUES
('LIMA', 'Lima', 'Capital del Perú'),
('ICA', 'Ica', 'Ciudad ubicada en la costa sur del Perú, conocida por sus viñedos y dunas de arena'),
('AREQUIPA', 'Arequipa', 'Ciudad conocida como la Ciudad Blanca, ubicada en el sur del Perú'),
('CAMANA', 'Camaná', 'Ciudad costera ubicada en la región de Arequipa'),
('CHIMBOTE', 'Chimbote', 'Ciudad portuaria ubicada en la región de Áncash'),
('TRUJILLO', 'Trujillo', 'Ciudad ubicada en la costa norte del Perú, conocida por su patrimonio histórico'),
('HUARMEY', 'Huarmey', 'Ciudad costera ubicada en la región de Áncash'),
('CHICLAYO', 'Chiclayo', 'Ciudad ubicada en la costa norte del Perú, conocida por su gastronomía y sitios arqueológicos');

-- Rellenar la tabla TIPO_SERVICIO
INSERT INTO TIPO_SERVICIO (COD_SERVICIO, TIPO_SERVICIO, TIPO_BUS, TIPO_ASIENTO) VALUES
('1', 'Escala', 'Simple', 'Semi cama'),
('2', 'Directo', 'Doble piso', 'Sofá cama');

-- Rellenar la tabla BUS
INSERT INTO BUS (PLACA, NUM_ASIENTOS, PISOS, TIPO_BUS, MODELO, CAPACIDAD_CARGA, ESTADO_MANTENIMIENTO) VALUES
('ABC123', 50, 1, 'Simple', 'Marcopolo Paradiso 1800 DD', 5000, 'Bueno'),
('DEF456', 40, 2, 'Doble piso', 'Volvo 9800 DD', 6000, 'Regular'),
('GHI789', 50, 1, 'Simple', 'Irizar i6', 4800, 'Bueno'),
('JKL012', 40, 1, 'Simple', 'Mercedes-Benz OF 1621', 4500, 'Bueno'),
('MNO345', 30, 1, 'Simple', 'MAN 18.310 HOCL', 4000, 'Regular');

-- Rellenar la tabla VIAJE
-- Estos datos son hipotéticos y deben ser reemplazados por datos reales
INSERT INTO VIAJE (COD_VIA, FECHA_VIA, HORA_VIA, DURACION, BUS, DESTINO, ORIGEN, PRECIO_BASE) VALUES
('VIA001', '2024-04-20', '08:00:00', '4h 0min', 'ABC123', 'LIMA', 'AREQUIPA', 100.00),
('VIA002', '2024-04-20', '09:00:00', '3h 30min', 'DEF456', 'ICA', 'LIMA', 80.00),
('VIA003', '2024-04-21', '10:00:00', '6h 0min', 'ABC123', 'AREQUIPA', 'LIMA', 120.00),
('VIA009', '2024-04-21', '12:00:00', '6h 0min', 'ABC123', 'AREQUIPA', 'LIMA', 120.00),
('VIA010', '2024-04-21', '12:30:00', '6h 0min', 'ABC123', 'AREQUIPA', 'LIMA', 120.00),
('VIA011', '2024-04-21', '16:30:00', '6h 0min', 'ABC123', 'AREQUIPA', 'LIMA', 120.00),
('VIA012', '2024-04-21', '18:00:00', '6h 0min', 'ABC123', 'AREQUIPA', 'LIMA', 120.00),
('VIA013', '2024-04-21', '18:30:00', '6h 0min', 'ABC123', 'AREQUIPA', 'LIMA', 120.00),
('VIA014', '2024-04-21', '19:00:00', '6h 0min', 'ABC123', 'AREQUIPA', 'LIMA', 120.00),
('VIA015', '2024-04-21', '20:00:00', '6h 0min', 'ABC123', 'AREQUIPA', 'LIMA', 120.00),
('VIA016', '2024-04-21', '20:30:00', '6h 0min', 'ABC123', 'AREQUIPA', 'LIMA', 120.00),
('VIA017', '2024-04-21', '21:00:00', '6h 0min', 'ABC123', 'AREQUIPA', 'LIMA', 120.00),
('VIA018', '2024-04-21', '21:30:00', '6h 0min', 'ABC123', 'AREQUIPA', 'LIMA', 120.00),
('VIA019', '2024-04-21', '22:00:00', '6h 0min', 'ABC123', 'AREQUIPA', 'LIMA', 120.00),
('VIA004', '2024-04-21', '11:00:00', '5h 30min', 'DEF456', 'CAMANA', 'LIMA', 90.00),
('VIA005', '2024-04-22', '12:00:00', '8h 0min', 'ABC123', 'CHIMBOTE', 'LIMA', 150.00),
('VIA006', '2024-04-22', '13:00:00', '7h 30min', 'DEF456', 'TRUJILLO', 'LIMA', 110.00),
('VIA007', '2024-04-23', '14:00:00', '10h 0min', 'ABC123', 'HUARMEY', 'LIMA', 130.00),
('VIA008', '2024-04-23', '15:00:00', '9h 30min', 'DEF456', 'CHICLAYO', 'LIMA', 140.00),
('VIA020', '2024-04-21', '22:30:00', '6h 0min', 'ABC123', 'AREQUIPA', 'LIMA', 120.00);

-- Rellenar la tabla USUARIO con tus datos y algunos adicionales
INSERT INTO USUARIO (COD_USER, NOMBRES, APELLIDOS, CORREO, PASSWORD) VALUES
('US1000', 'Flavio Sebastian', 'Villanueva Medina', 'flaviovm2013@gmail.com', 'Ejemplo123!'),
('US1001', 'Juan', 'Perez', 'juanperez@gmail.com', 'Password123'),
('US1002', 'María', 'Gomez', 'mariagomez@gmail.com', 'SecurePass123'),
('US1003', 'Carlos', 'Lopez', 'carloslopez@gmail.com', 'Passw0rd!');

-- Rellenar la tabla OFICINA con datos hipotéticos
INSERT INTO OFICINA (NUM_LOCAL, TELEFONO_FIJO, TELEFONO_CEL, DIRECCION, NOMBRE_OFI) VALUES
('OFI001', '01-1234567', '999888777', 'Av. Arequipa 123', 'Oficina Principal'),
('OFI002', '01-9876543', '988777666', 'Av. Tacna 456', 'Oficina Central');


-- Crear una tabla temporal para los números de asiento
CREATE TEMPORARY TABLE Temp_Asientos (NUM_ASIENTO INT);

-- Insertar números de asientos hasta 50 (ajusta según sea necesario)
INSERT INTO Temp_Asientos (NUM_ASIENTO)
VALUES (1), (2), (3), (4), (5), (6), (7), (8), (9), (10),
        (11), (12), (13), (14), (15), (16), (17), (18), (19), (20),
        (21), (22), (23), (24), (25), (26), (27), (28), (29), (30),
        (31), (32), (33), (34), (35), (36), (37), (38), (39), (40),
        (41), (42), (43), (44), (45), (46), (47), (48), (49), (50);

-- Rellenar la tabla ASIENTO con datos basados en la capacidad del bus y los viajes
INSERT INTO ASIENTO (COD_VIA, NUM_ASIENTO, TIPO_ASIENTO, ESTADO, PRECIO)
SELECT 
    VIAJE.COD_VIA, 
    Temp_Asientos.NUM_ASIENTO, 
    'Económico' AS TIPO_ASIENTO, -- Puedes ajustar esto si hay diferentes tipos de asientos
    'Libre' AS ESTADO, 
    (VIAJE.PRECIO_BASE * IF(TIPO_SERVICIO.TIPO_SERVICIO = 'Directo', 1.2, 1.0)) + 10 -- Ejemplo de cálculo del precio del asiento
FROM 
    VIAJE 
    INNER JOIN BUS ON VIAJE.BUS = BUS.PLACA
    INNER JOIN TIPO_SERVICIO ON BUS.TIPO_BUS = TIPO_SERVICIO.TIPO_BUS
    CROSS JOIN Temp_Asientos
WHERE 
    Temp_Asientos.NUM_ASIENTO <= BUS.CAPACIDAD_CARGA;

-- Eliminar la tabla temporal después de su uso
DROP TEMPORARY TABLE Temp_Asientos;


-- PROCEDURES
-- 1 - Login de Usuarios:
DELIMITER $$
CREATE FUNCTION VerificarCredenciales (
    usuario_correo VARCHAR(35),
    contraseña VARCHAR(25)
) RETURNS BOOLEAN
BEGIN
    DECLARE existe BOOLEAN;
    SELECT EXISTS(SELECT * FROM USUARIO WHERE CORREO = usuario_correo AND PASSWORD = contraseña) INTO existe;
    RETURN existe;
END$$
DELIMITER ;

-- 2 - Registro de Usuarios con Generación Automática de Código:
DELIMITER $$
CREATE PROCEDURE RegistrarUsuario (
    IN nombres VARCHAR(30),
    IN apellidos VARCHAR(30),
    IN correo VARCHAR(35),
    IN contraseña VARCHAR(25)
)
BEGIN
    DECLARE ultimo_codigo CHAR(6);
    DECLARE nuevo_codigo CHAR(6);
    DECLARE numero_codigo INT;
    -- Obtener el último código de usuario
    SELECT COD_USER INTO ultimo_codigo
    FROM USUARIO
    ORDER BY COD_USER DESC
    LIMIT 1;
    -- Extraer la parte numérica del código y convertirla a un número
    SET numero_codigo = CAST(SUBSTRING(ultimo_codigo, 3) AS UNSIGNED);
    -- Incrementar el número
    SET numero_codigo = numero_codigo + 1;
    -- Formatear el nuevo código con el prefijo 'US' y el número ajustado a 4 dígitos con ceros a la izquierda
    SET nuevo_codigo = CONCAT('US', LPAD(numero_codigo, 4, '0'));
    -- Insertar el nuevo usuario con el nuevo código
    INSERT INTO USUARIO (COD_USER, NOMBRES, APELLIDOS, CORREO, PASSWORD)
    VALUES (nuevo_codigo, nombres, apellidos, correo, contraseña);
END$$
DELIMITER ;

-- 3 - Obtener Datos de Usuario por Correo Electrónico:
DELIMITER $$
CREATE FUNCTION ObtenerUsuarioPorCorreo (
    usuario_correo VARCHAR(35)
) RETURNS CHAR(6)
BEGIN
    DECLARE codigo_usuario CHAR(6);
    SELECT COD_USER INTO codigo_usuario FROM USUARIO WHERE CORREO = usuario_correo;
    RETURN codigo_usuario;
END$$
DELIMITER ;

-- 4 - Actualización de Información de Usuario:
DELIMITER $$
CREATE PROCEDURE ActualizarUsuario (
    IN codigo CHAR(6),
    IN nombres VARCHAR(30),
    IN apellidos VARCHAR(30),
    IN correo VARCHAR(35),
    IN contraseña VARCHAR(25)
)
BEGIN
    UPDATE USUARIO SET NOMBRES = nombres, APELLIDOS = apellidos, CORREO = correo, PASSWORD = contraseña WHERE COD_USER = codigo;
END$$
DELIMITER ;

-- 5 - Cancelar Reserva de Boleto:
DELIMITER $$
CREATE PROCEDURE CancelarReserva (
    IN reserva_id INT
)
BEGIN
    DECLARE asiento_id INT;
    SELECT ID_ASIENTO INTO asiento_id FROM RESERVA WHERE COD_RESERVA = reserva_id;
    UPDATE ASIENTO SET ESTADO = 'Libre' WHERE ID = asiento_id;
    DELETE FROM RESERVA WHERE COD_RESERVA = reserva_id;
END$$
DELIMITER ;

-- 6 - Selección de Asientos Disponibles Y Ocupados(mostrar):
DELIMITER $$
CREATE PROCEDURE MostrarAsientosDisponibles (
    IN viaje_cod CHAR(8)
)
BEGIN
    SELECT * FROM ASIENTO WHERE COD_VIA = viaje_cod AND ESTADO = 'Libre';
END$$
DELIMITER ;

DELIMITER $$

CREATE PROCEDURE MostrarAsientosOcupados (
    IN viaje_cod CHAR(8)
)
BEGIN
    SELECT NUM_ASIENTO
    FROM ASIENTO
    WHERE COD_VIA = viaje_cod AND ESTADO = 'Vendido';
END$$

DELIMITER ;


-- 7 - Compra de Boletos:
DELIMITER $$
CREATE PROCEDURE ComprarBoleto (
    IN usuario_cod CHAR(6),
    IN viaje_cod CHAR(8),
    IN asiento_id INT
)
BEGIN
    DECLARE nueva_reserva_id INT;
    DECLARE nuevo_codigo_venta INT;
    
    -- Insertar reserva
    INSERT INTO RESERVA (COD_VIA, COD_USER, ID_ASIENTO) VALUES (viaje_cod, usuario_cod, asiento_id);
    SET nueva_reserva_id = LAST_INSERT_ID();
    
    -- Insertar venta asociada a la reserva
    INSERT INTO VENTA (COD_RESERVA, FECHA_VENTA, MONTO_TOTAL, ESTADO_PAGO) VALUES (nueva_reserva_id, CURDATE(), 0, 'Pendiente');
    SET nuevo_codigo_venta = LAST_INSERT_ID();
    
    -- Actualizar estado del asiento a 'Reservado'
    UPDATE ASIENTO SET ESTADO = 'Reservado' WHERE ID = asiento_id;
    
    SELECT nuevo_codigo_venta;
END$$
DELIMITER ;

-- 8 - Búsqueda de Viajes por Origen, Destino y Fecha:
DELIMITER $$
CREATE PROCEDURE BuscarViajes (
    IN origen_cod CHAR(6),
    IN destino_cod CHAR(6),
    IN fecha_via DATE
)
BEGIN
    SELECT * FROM VIAJE 
    WHERE ORIGEN = origen_cod 
    AND DESTINO = destino_cod 
    AND FECHA_VIA = fecha_via;
END$$
DELIMITER ;

-- 9 - Listar Destinos:
DELIMITER $$
CREATE PROCEDURE ListarDestinos ()
BEGIN
    SELECT * FROM DESTINO;
END$$
DELIMITER ;

-- 10 - Listar Tipos de Servicio:
DELIMITER $$
CREATE PROCEDURE ListarTiposServicio ()
BEGIN
    SELECT * FROM TIPO_SERVICIO;
END$$
DELIMITER ;

-- 11 - Listar Buses:
DELIMITER $$
CREATE PROCEDURE ListarBuses ()
BEGIN
    SELECT * FROM BUS;
END$$
DELIMITER ;

-- 12 - Listar Viajes:
DELIMITER $$
CREATE PROCEDURE ListarViajes ()
BEGIN
    SELECT * FROM VIAJE;
END$$
DELIMITER ;

-- 13 - Listar Usuarios:
DELIMITER $$
CREATE PROCEDURE ListarUsuarios ()
BEGIN
    SELECT * FROM USUARIO;
END$$
DELIMITER ;

-- 14 - Listar Oficinas:
DELIMITER $$
CREATE PROCEDURE ListarOficinas ()
BEGIN
    SELECT * FROM OFICINA;
END$$
DELIMITER ;

-- 15 - Listar Asientos:
DELIMITER $$
CREATE PROCEDURE ListarAsientos ()
BEGIN
    SELECT * FROM ASIENTO;
END$$
DELIMITER ;

-- 16 - Listar Reservas:
DELIMITER $$
CREATE PROCEDURE ListarReservas ()
BEGIN
    SELECT * FROM RESERVA;
END$$
DELIMITER ;

-- 17 - Listar Ventas:
DELIMITER $$
CREATE PROCEDURE ListarVentas ()
BEGIN
    SELECT * FROM VENTA;
END$$
DELIMITER ;

-- 18 - Buscar Destino por ID:
DELIMITER $$
CREATE PROCEDURE BuscarDestinoPorID (
    IN codigo_destino CHAR(6)
)
BEGIN
    SELECT * FROM DESTINO WHERE COD_DESTINO = codigo_destino;
END$$
DELIMITER ;

-- 19 - Buscar Tipo de Servicio por ID:
DELIMITER $$
CREATE PROCEDURE BuscarTipoServicioPorID (
    IN codigo_servicio CHAR(2)
)
BEGIN
    SELECT * FROM TIPO_SERVICIO WHERE COD_SERVICIO = codigo_servicio;
END$$
DELIMITER ;

-- 20 - Buscar Bus por Placa:
DELIMITER $$
CREATE PROCEDURE BuscarBusPorPlaca (
    IN placa_bus CHAR(6)
)
BEGIN
    SELECT * FROM BUS WHERE PLACA = placa_bus;
END$$
DELIMITER ;

-- 21 - Buscar Viaje por ID:
DELIMITER $$
CREATE PROCEDURE BuscarViajePorID (
    IN codigo_viaje CHAR(8)
)
BEGIN
    SELECT * FROM VIAJE WHERE COD_VIA = codigo_viaje;
END$$
DELIMITER ;

-- 22 - Buscar Usuario por ID:
DELIMITER $$
CREATE PROCEDURE BuscarUsuarioPorID (
    IN codigo_usuario CHAR(6)
)
BEGIN
    SELECT * FROM USUARIO WHERE COD_USER = codigo_usuario;
END$$
DELIMITER ;

-- 23 - Buscar Oficina por ID:
DELIMITER $$
CREATE PROCEDURE BuscarOficinaPorID (
    IN codigo_oficina CHAR(6)
)
BEGIN
    SELECT * FROM OFICINA WHERE NUM_LOCAL = codigo_oficina;
END$$
DELIMITER ;

-- 24 - Buscar Asiento por ID:
DELIMITER $$
CREATE PROCEDURE BuscarAsientoPorID (
    IN id_asiento INT
)
BEGIN
    SELECT * FROM ASIENTO WHERE ID = id_asiento;
END$$
DELIMITER ;

-- 25 - Buscar Reserva por ID:
DELIMITER $$
CREATE PROCEDURE BuscarReservaPorID (
    IN codigo_reserva INT
)
BEGIN
    SELECT * FROM RESERVA WHERE COD_RESERVA = codigo_reserva;
END$$
DELIMITER ;

-- 26 - Buscar Venta por ID:
DELIMITER $$
CREATE PROCEDURE BuscarVentaPorID (
    IN codigo_venta INT
)
BEGIN
    SELECT * FROM VENTA WHERE COD_VENTA = codigo_venta;
END$$
DELIMITER ;

-- 27 - Buscar Usuario por correo (TODOS LOS DATOS):
DELIMITER $$
CREATE PROCEDURE BuscarUsuarioPorCorreo (
    IN correo_usuario VARCHAR(35)
)
BEGIN
    SELECT * FROM USUARIO WHERE CORREO = correo_usuario;
END$$
DELIMITER ;

-- 28 - Compra de boletos proceso completo
DELIMITER $$

CREATE PROCEDURE ComprarBoleto_v2 (
    IN usuario_cod CHAR(6),
    IN viaje_cod CHAR(8),
    IN asiento_id INT
)
BEGIN
    DECLARE nueva_reserva_id INT;
    DECLARE nuevo_codigo_venta INT;
    
    -- Insertar reserva
    INSERT INTO RESERVA (COD_VIA, COD_USER, ID_ASIENTO) 
    VALUES (viaje_cod, usuario_cod, asiento_id);
    
    SET nueva_reserva_id = LAST_INSERT_ID();
    
    -- Insertar venta asociada a la reserva
    INSERT INTO VENTA (COD_RESERVA, FECHA_VENTA, MONTO_TOTAL, ESTADO_PAGO) 
    VALUES (nueva_reserva_id, CURDATE(), 0, 'Pendiente');
    
    SET nuevo_codigo_venta = LAST_INSERT_ID();
    
    -- Actualizar estado del asiento a 'Reservado'
    UPDATE ASIENTO 
    SET ESTADO = 'Reservado' 
    WHERE ID = asiento_id;
    
    -- Si el pago se completa
    UPDATE ASIENTO 
    SET ESTADO = 'Vendido' 
    WHERE ID = asiento_id;
    
    UPDATE RESERVA 
    SET ESTADO = 'Pagado' 
    WHERE COD_RESERVA = nueva_reserva_id;
    
    UPDATE VENTA 
    SET ESTADO_PAGO = 'Pagado' 
    WHERE COD_VENTA = nuevo_codigo_venta;
    
    SELECT nuevo_codigo_venta;
END$$

DELIMITER ;

-- 29 - REGISTRO DE COMPRA DEFINITIVO:

DELIMITER //

CREATE PROCEDURE registrarCompra(
    IN p_cod_usu CHAR(6),
    IN p_cod_via CHAR(8),
    IN p_total DECIMAL(10, 2),
    IN p_selected_seats JSON
)
BEGIN
    DECLARE cod_reserva INT;
    DECLARE seat INT;
    DECLARE done INT DEFAULT FALSE;
    DECLARE seats_cursor CURSOR FOR 
        SELECT ID 
        FROM temp_selected_seats;
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

    -- Crear una tabla temporal para almacenar los asientos seleccionados
    CREATE TEMPORARY TABLE temp_selected_seats (ID INT);

    -- Rellenar la tabla temporal con los asientos seleccionados
    SET @index = 0;
    WHILE @index < JSON_LENGTH(p_selected_seats) DO
        SET seat = JSON_UNQUOTE(JSON_EXTRACT(p_selected_seats, CONCAT('$[', @index, ']')));
        INSERT INTO temp_selected_seats (ID) VALUES (seat);
        SET @index = @index + 1;
    END WHILE;

    -- Iniciar la transacción
    START TRANSACTION;

    -- Insertar en la tabla reserva
    INSERT INTO reserva (COD_VIA, COD_USER, ID_ASIENTO) 
    SELECT p_cod_via, p_cod_usu, ID FROM temp_selected_seats;

    -- Obtener el ID de la reserva recién insertada
    SET cod_reserva = LAST_INSERT_ID();

    -- Insertar en la tabla venta
    INSERT INTO venta (COD_RESERVA, FECHA_VENTA, MONTO_TOTAL, ESTADO_PAGO) 
    VALUES (cod_reserva, NOW(), p_total, 'Pagado');

    -- Abrir el cursor
    OPEN seats_cursor;

    read_loop: LOOP
        FETCH seats_cursor INTO seat;
        IF done THEN
            LEAVE read_loop;
        END IF;

        -- Actualizar el estado del asiento
        UPDATE asiento 
        SET ESTADO = 'Vendido', PRECIO = PRECIO + p_total
        WHERE NUM_ASIENTO = seat
        AND COD_VIA = p_cod_via;

    END LOOP;

    -- Cerrar el cursor
    CLOSE seats_cursor;

    -- Eliminar la tabla temporal
    DROP TEMPORARY TABLE IF EXISTS temp_selected_seats;

    -- Confirmar la transacción
    COMMIT;
END //

DELIMITER ;