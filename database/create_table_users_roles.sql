DROP TABLE `user_roles`;

CREATE TABLE IF NOT EXISTS `user_roles` (
    `role_id` int(11) NOT NULL AUTO_INCREMENT,
    `role_text_id` VARCHAR(200) NOT NULL,
    `role_description` text,
    PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `user_roles` (
    `role_text_id`,
    `role_description`
) VALUES 
('admin', 'Administrador'),
('validador', 'Validador'),
('digitador', 'Digitador'),
('digivali', 'Digitador - Validador');