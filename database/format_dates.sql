DELIMITER //

CREATE OR REPLACE FUNCTION FORMATEAR_FECHAS ( fecha_formatear DATETIME )
RETURNS TEXT

BEGIN

    DECLARE fecha_larga_formateada TEXT;

    SET lc_time_names = 'es_CR';

    SET fecha_larga_formateada = DATE_FORMAT(fecha_formatear, '%W %c de %M del %Y a las %H:%i:%s');

    RETURN fecha_larga_formateada;

END; //

DELIMITER ;