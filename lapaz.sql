
-- Volcando estructura para tabla lapaz.archivo
DROP TABLE IF EXISTS `archivo`;
CREATE TABLE IF NOT EXISTS `archivo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_on` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla lapaz.archivo: ~0 rows (aproximadamente)
DELETE FROM `archivo`;
/*!40000 ALTER TABLE `archivo` DISABLE KEYS */;
/*!40000 ALTER TABLE `archivo` ENABLE KEYS */;


-- Volcando estructura para tabla lapaz.contribuyente
DROP TABLE IF EXISTS `contribuyente`;
CREATE TABLE IF NOT EXISTS `contribuyente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cuit` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `calle` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `altura` int(11) DEFAULT NULL,
  `piso` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `telefono_fijo` int(11) DEFAULT NULL,
  `telefono_movil` int(11) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8144404AB9BA4881` (`cuit`),
  KEY `IDX_8144404AA76ED395` (`user_id`),
  CONSTRAINT `FK_8144404AA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla lapaz.contribuyente: ~0 rows (aproximadamente)
DELETE FROM `contribuyente`;
/*!40000 ALTER TABLE `contribuyente` DISABLE KEYS */;
/*!40000 ALTER TABLE `contribuyente` ENABLE KEYS */;


-- Volcando estructura para tabla lapaz.deuda
DROP TABLE IF EXISTS `deuda`;
CREATE TABLE IF NOT EXISTS `deuda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contribuyente_id` int(11) DEFAULT NULL,
  `plan_de_pago_id` int(11) DEFAULT NULL,
  `restructurada_en_plan_de_pago_id` int(11) DEFAULT NULL,
  `tasa_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `estado_deuda_id` int(11) DEFAULT NULL,
  `detalle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `importe` decimal(10,2) NOT NULL,
  `multa` decimal(10,2) NOT NULL,
  `recargo` decimal(10,2) NOT NULL,
  `atraso` int(11) NOT NULL,
  `periodo` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CF7674779A84072B` (`contribuyente_id`),
  KEY `IDX_CF767477328E8F15` (`plan_de_pago_id`),
  KEY `IDX_CF767477AAF0D8D5` (`restructurada_en_plan_de_pago_id`),
  KEY `IDX_CF767477E20BE1E2` (`tasa_id`),
  KEY `IDX_CF767477A76ED395` (`user_id`),
  KEY `IDX_CF767477343C603C` (`estado_deuda_id`),
  CONSTRAINT `FK_CF767477343C603C` FOREIGN KEY (`estado_deuda_id`) REFERENCES `estado_deuda` (`id`),
  CONSTRAINT `FK_CF767477328E8F15` FOREIGN KEY (`plan_de_pago_id`) REFERENCES `plan_de_pago` (`id`),
  CONSTRAINT `FK_CF7674779A84072B` FOREIGN KEY (`contribuyente_id`) REFERENCES `contribuyente` (`id`),
  CONSTRAINT `FK_CF767477A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_CF767477AAF0D8D5` FOREIGN KEY (`restructurada_en_plan_de_pago_id`) REFERENCES `plan_de_pago` (`id`),
  CONSTRAINT `FK_CF767477E20BE1E2` FOREIGN KEY (`tasa_id`) REFERENCES `tasa` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla lapaz.deuda: ~0 rows (aproximadamente)
DELETE FROM `deuda`;
/*!40000 ALTER TABLE `deuda` DISABLE KEYS */;
/*!40000 ALTER TABLE `deuda` ENABLE KEYS */;


-- Volcando estructura para tabla lapaz.estado_deuda
DROP TABLE IF EXISTS `estado_deuda`;
CREATE TABLE IF NOT EXISTS `estado_deuda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla lapaz.estado_deuda: ~4 rows (aproximadamente)
DELETE FROM `estado_deuda`;
/*!40000 ALTER TABLE `estado_deuda` DISABLE KEYS */;
INSERT INTO `estado_deuda` (`id`, `nombre`, `descripcion`) VALUES
	(1, 'Activa', 'Deuda que todavia se encuentra en vigencia'),
	(2, 'Paga', 'Esta deuda fue saldada'),
	(3, 'Restructurada', 'Deuda que fue restructurada dentro de un plan de pago'),
	(4, 'Anulada', 'Deuda que no es valida por error en la carga');
/*!40000 ALTER TABLE `estado_deuda` ENABLE KEYS */;


-- Volcando estructura para tabla lapaz.pago
DROP TABLE IF EXISTS `pago`;
CREATE TABLE IF NOT EXISTS `pago` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pago_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `fecha_pago` date NOT NULL,
  `created_on` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_F4DF5F3E63FB8380` (`pago_id`),
  KEY `IDX_F4DF5F3EA76ED395` (`user_id`),
  CONSTRAINT `FK_F4DF5F3EA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_F4DF5F3E63FB8380` FOREIGN KEY (`pago_id`) REFERENCES `deuda` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla lapaz.pago: ~0 rows (aproximadamente)
DELETE FROM `pago`;
/*!40000 ALTER TABLE `pago` DISABLE KEYS */;
/*!40000 ALTER TABLE `pago` ENABLE KEYS */;


-- Volcando estructura para tabla lapaz.plan_de_pago
DROP TABLE IF EXISTS `plan_de_pago`;
CREATE TABLE IF NOT EXISTS `plan_de_pago` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6BCBB951A76ED395` (`user_id`),
  CONSTRAINT `FK_6BCBB951A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla lapaz.plan_de_pago: ~0 rows (aproximadamente)
DELETE FROM `plan_de_pago`;
/*!40000 ALTER TABLE `plan_de_pago` DISABLE KEYS */;
/*!40000 ALTER TABLE `plan_de_pago` ENABLE KEYS */;


-- Volcando estructura para tabla lapaz.tasa
DROP TABLE IF EXISTS `tasa`;
CREATE TABLE IF NOT EXISTS `tasa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `nombre` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_on` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_B2AB323B3A909126` (`nombre`),
  KEY `IDX_B2AB323BA76ED395` (`user_id`),
  CONSTRAINT `FK_B2AB323BA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla lapaz.tasa: ~3 rows (aproximadamente)
DELETE FROM `tasa`;
/*!40000 ALTER TABLE `tasa` DISABLE KEYS */;
INSERT INTO `tasa` (`id`, `user_id`, `nombre`, `descripcion`, `created_on`) VALUES
	(1, 1, 'TGI', 'Tasa General Inmobiliaria', '2014-03-04 00:00:00'),
	(2, 1, 'TSA', 'Tasa Servicio Sanitario', '2014-03-04 00:00:00'),
	(3, 1, 'CEM', 'Cementerio', '2014-03-04 00:00:00');
/*!40000 ALTER TABLE `tasa` ENABLE KEYS */;


-- Volcando estructura para tabla lapaz.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) DEFAULT NULL,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_on` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`),
  KEY `IDX_8D93D649FE54D947` (`group_id`),
  CONSTRAINT `FK_8D93D649FE54D947` FOREIGN KEY (`group_id`) REFERENCES `user_group` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla lapaz.user: ~1 rows (aproximadamente)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `group_id`, `username`, `password`, `email`, `created_on`) VALUES
	(1, 1, 'prueba', 'prueba', 'prueba@gmail.com', '2014-03-04 00:00:00');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;


-- Volcando estructura para tabla lapaz.user_group
DROP TABLE IF EXISTS `user_group`;
CREATE TABLE IF NOT EXISTS `user_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created_on` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8F02BF9D5E237E06` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla lapaz.user_group: ~1 rows (aproximadamente)
DELETE FROM `user_group`;
/*!40000 ALTER TABLE `user_group` DISABLE KEYS */;
INSERT INTO `user_group` (`id`, `name`, `created_on`) VALUES
	(1, 'admin', '2014-03-04 00:00:00');

