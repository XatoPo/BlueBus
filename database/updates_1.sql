ALTER TABLE usuario ADD ROL varchar(10) NOT NULL AFTER PASSWORD;

ALTER TABLE destino ADD ESTADO varchar(10) NOT NULL AFTER NOM_DESTINO;

--  1 - Actualización del Registro de Usuarios con Generación Automática de Código:
DROP PROCEDURE IF EXISTS RegistrarUsuario;

DELIMITER $$
CREATE PROCEDURE RegistrarUsuario (
    IN nombres VARCHAR(30),
    IN apellidos VARCHAR(30),
    IN correo VARCHAR(35),
    IN contraseña VARCHAR(25),
    IN rol VARCHAR(10)
)
BEGIN
    DECLARE ultimo_codigo CHAR(6);
    DECLARE nuevo_codigo CHAR(6);
    DECLARE numero_codigo INT;
    --  Obtener el último código de usuario
    SELECT COD_USER INTO ultimo_codigo
    FROM USUARIO
    ORDER BY COD_USER DESC
    LIMIT 1;
    --  Extraer la parte numérica del código y convertirla a un número
    SET numero_codigo = CAST(SUBSTRING(ultimo_codigo, 3) AS UNSIGNED);
    --  Incrementar el número
    SET numero_codigo = numero_codigo + 1;
    --  Formatear el nuevo código con el prefijo 'US' y el número ajustado a 4 dígitos con ceros a la izquierda
    SET nuevo_codigo = CONCAT('US', LPAD(numero_codigo, 4, '0'));
    --  Insertar el nuevo usuario con el nuevo código
    INSERT INTO USUARIO (COD_USER, NOMBRES, APELLIDOS, CORREO, PASSWORD, ROL)
    VALUES (nuevo_codigo, nombres, apellidos, correo, contraseña, rol);
END$$
DELIMITER ;

--  USERS
--  VERIFICAR 
DELIMITER $$
CREATE FUNCTION VerificarCredencialesAdmin (
    usuario_correo VARCHAR(35),
    contraseña VARCHAR(25)
) RETURNS BOOLEAN
BEGIN
    DECLARE existe BOOLEAN;
    SELECT EXISTS (SELECT * FROM USUARIO WHERE CORREO = usuario_correo AND PASSWORD = contraseña AND ROL = 'admin') INTO existe;
    RETURN existe;
END$$
DELIMITER ;
-- ACTUALIZAR
DELIMITER $$
CREATE PROCEDURE ActualizarUsuarioAdmin (
    IN codigo CHAR(6),
    IN nombres VARCHAR(30),
    IN apellidos VARCHAR(30),
    IN correo VARCHAR(35),
    IN contraseña VARCHAR(25),
    IN rol VARCHAR(10)
)
BEGIN
    UPDATE USUARIO SET NOMBRES = nombres, APELLIDOS = apellidos, CORREO = correo, PASSWORD = contraseña  WHERE COD_USER = codigo;
END$$
DELIMITER ;

-- DESTINO
-- BORRAR PROCEDIMIENTO RegistrarDestinoAdmin
DROP PROCEDURE IF EXISTS RegistrarDestinoAdmin;
-- REGISTRAR
DELIMITER $$
CREATE PROCEDURE RegistrarDestinoAdmin (
    IN codigo CHAR(6),
    IN nombre VARCHAR(50),
    IN estado varchar(10),
    IN descripcion TEXT
)
BEGIN
    INSERT INTO destino (COD_DESTINO, NOM_DESTINO, ESTADO, DESCRIPCION)
    VALUES (codigo, nombre, estado, descripcion);
END$$
DELIMITER ;
-- BORRAR PROCEDIMIENTO ActualizarDestinoAdmin
DROP PROCEDURE IF EXISTS ActualizarDestinoAdmin;
-- ACTUALIZAR
DELIMITER $$
CREATE PROCEDURE ActualizarDestinoAdmin (
    IN codigo CHAR(6),
    IN nombre VARCHAR(50),
    IN estado varchar(10),
    IN descripcion text
)
BEGIN
    UPDATE destino SET NOM_DESTINO = nombre, ESTADO = estado, DESCRIPCION = descripcion WHERE COD_DESTINO = codigo;
END$$
DELIMITER ;
-- VIAJES
-- REGISTAR
DELIMITER $$
CREATE PROCEDURE InsertarViajeAdmin (
    IN codigo CHAR(8),
    IN fecha_via date,
    IN hora_via time,
    IN duracion VARCHAR(10),
    IN cod_bus char(6),
    IN cod_destino char(6),
    IN cod_origen char(6),
    IN precio_base decimal(10,2)
)
BEGIN
    INSERT INTO viaje (COD_VIA, FECHA_VIA, HORA_VIA, DURACION, BUS, DESTINO, ORIGEN, PRECIO_BASE) 
    VALUES (codigo, fecha_via, hora_via, duracion, cod_bus, cod_destino, cod_origen, precio_base);
END$$
DELIMITER ;
-- ACTUALIZAR
DELIMITER $$
CREATE PROCEDURE ActualizarViajeAdmin (
    IN codigo CHAR(8),
    IN fecha_via date,
    IN hora_via time,
    IN duracion VARCHAR(10),
    IN cod_bus char(6),
    IN cod_destino char(6),
    IN cod_origen char(6),
    IN precio_base decimal(10,2)
)
BEGIN
    UPDATE viaje 
    SET FECHA_VIA = fecha_via, HORA_VIA = hora_via, DURACION = duracion, BUS = cod_bus, DESTINO = cod_destino, ORIGEN = cod_origen, PRECIO_BASE = precio_base WHERE COD_VIA = codigo;
END$$
DELIMITER ;
-- ELIMINAR
DELIMITER $$
CREATE PROCEDURE EliminarViajeAdmin (
    IN codigo CHAR(8)
)
BEGIN
    DELETE FROM viaje
    WHERE COD_VIA = codigo;
END$$
DELIMITER ;