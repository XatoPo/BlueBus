UPDATE USUARIO
SET ROL = CASE
    WHEN COD_USER IN ('US1012', 'US1013') THEN 'ADMIN'
    ELSE 'CLIENTE'
    END;

UPDATE DESTINO
SET ESTADO = 'Activo';

DELIMITER //
CREATE PROCEDURE InsertarReservaAdmin(
    IN p_cod_via CHAR(8),
    IN p_cod_user CHAR(6),
    IN p_id_asiento INT
)
BEGIN
    INSERT INTO RESERVA (COD_VIA, COD_USER, ID_ASIENTO)
    VALUES (p_cod_via, p_cod_user, p_id_asiento);
END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE ActualizarEstadoReservaAdmin(
    IN p_codigo_reserva INT,
    IN p_nuevo_estado ENUM('Reservado', 'Pagado')
)
BEGIN
    UPDATE RESERVA
    SET ESTADO = p_nuevo_estado
    WHERE COD_RESERVA = p_codigo_reserva;
END //
DELIMITER ;


DELIMITER //
CREATE PROCEDURE EliminarReservaAdmin(
    IN p_codigo_reserva INT
)
BEGIN
    DELETE FROM RESERVA
    WHERE COD_RESERVA = p_codigo_reserva;
    
    DELETE FROM VENTA
    WHERE COD_RESERVA = p_codigo_reserva;
END //
DELIMITER ;