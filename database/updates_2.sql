-- 1 - Listar Usuarios:
DELIMITER $$
CREATE PROCEDURE ListarUsuariosAdmin ()
BEGIN
    SELECT * FROM USUARIO;
END$$
DELIMITER ;

-- 2 - Listar Viajes:
DELIMITER $$
CREATE PROCEDURE ListarViajesAdmin ()
BEGIN
    SELECT * FROM VIAJE;
END$$
DELIMITER ;

-- 3 - Listar Destinos:
DELIMITER $$
CREATE PROCEDURE ListarDestinosAdmin ()
BEGIN
    SELECT * FROM DESTINO;
END$$
DELIMITER ;

-- 4 - Listar Reservas:
DELIMITER $$
CREATE PROCEDURE ListarReservasAdmin ()
BEGIN
    SELECT * FROM RESERVA;
END$$
DELIMITER ;
