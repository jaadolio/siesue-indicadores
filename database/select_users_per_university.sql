SELECT
    usr.id,
    usr.first_name,
    usr.last_name,
    usr.username,
    usr.email,
    SUBSTRING_INDEX(usr.email, '@', -1) AS email_domain,
    usr.token,
    FORMATEAR_FECHAS(usr.token_expires) AS token_expires,
    usr.api_token,
    FORMATEAR_FECHAS(usr.activation_date) AS activation_date,
    FORMATEAR_FECHAS(usr.tos_date) AS tos_date,
    usr.active,
    usr.is_superuser,
    usr.role,
    FORMATEAR_FECHAS(usr.created) AS created,
    FORMATEAR_FECHAS(usr.modified) AS modified,
    usr.university_id,
    univ.name AS university_name,
    univ.sigla,
    univ.sede_central,
    univ.sedes_regionales
FROM
    users AS usr
    INNER JOIN universities AS univ ON usr.university_id = univ.id
ORDER BY
	SUBSTRING_INDEX(usr.email, '@', -1) ASC;