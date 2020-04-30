CREATE OR REPLACE VIEW users_per_universities AS
SELECT
    usr.id,
    usr.first_name,
    usr.last_name,
    usr.username,
    usr.email,
    SUBSTRING_INDEX(usr.email, '@', -1) AS email_domain,
    usr.token,
    CAST(FORMATEAR_FECHAS(usr.token_expires) AS char(200)) AS date_token_expiration,
    usr.api_token,
    CAST(FORMATEAR_FECHAS(usr.activation_date) AS char(200)) AS date_user_activation,
    CAST(FORMATEAR_FECHAS(usr.tos_date) AS char(200)) AS date_tos,
    usr.active,
    usr.is_superuser,
    usr.role,
    CAST(FORMATEAR_FECHAS(usr.created) AS char(200)) AS date_user_created,
    CAST(FORMATEAR_FECHAS(usr.modified) AS char(200)) AS date_user_modified,
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