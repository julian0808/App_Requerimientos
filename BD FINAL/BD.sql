-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	6.0.10-alpha-community


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema bdprotocoloservidor
--

CREATE DATABASE IF NOT EXISTS bdprotocoloservidor;
USE bdprotocoloservidor;

--
-- Definition of table `t_estado_req_sabana`
--

DROP TABLE IF EXISTS `t_estado_req_sabana`;
CREATE TABLE `t_estado_req_sabana` (
  `idestado` int(11) NOT NULL,
  `nombre_estado` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idestado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_estado_req_sabana`
--

/*!40000 ALTER TABLE `t_estado_req_sabana` DISABLE KEYS */;
INSERT INTO `t_estado_req_sabana` (`idestado`,`nombre_estado`) VALUES 
 (1,'PENDIENTE'),
 (2,'CON RESPUESTA'),
 (3,'CASO CERRADO');
/*!40000 ALTER TABLE `t_estado_req_sabana` ENABLE KEYS */;


--
-- Definition of table `t_reqestadoaprobado`
--

DROP TABLE IF EXISTS `t_reqestadoaprobado`;
CREATE TABLE `t_reqestadoaprobado` (
  `idaprobado` int(11) NOT NULL AUTO_INCREMENT,
  `respuestaadmin` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idaprobado`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_reqestadoaprobado`
--

/*!40000 ALTER TABLE `t_reqestadoaprobado` DISABLE KEYS */;
INSERT INTO `t_reqestadoaprobado` (`idaprobado`,`respuestaadmin`) VALUES 
 (1,'APROBADO'),
 (2,'NO APROBADO'),
 (3,'PENDIENTE'),
 (4,'CANCELADO');
/*!40000 ALTER TABLE `t_reqestadoaprobado` ENABLE KEYS */;


--
-- Definition of table `t_reqestadoevaluacion`
--

DROP TABLE IF EXISTS `t_reqestadoevaluacion`;
CREATE TABLE `t_reqestadoevaluacion` (
  `idevaluacion` int(11) NOT NULL AUTO_INCREMENT,
  `estadoevaluacion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idevaluacion`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_reqestadoevaluacion`
--

/*!40000 ALTER TABLE `t_reqestadoevaluacion` DISABLE KEYS */;
INSERT INTO `t_reqestadoevaluacion` (`idevaluacion`,`estadoevaluacion`) VALUES 
 (1,'EVALUADO'),
 (2,'PENDIENTE POR EVALUAR'),
 (3,'PROCESO DE RESPUESTA'),
 (4,'CANCELADO');
/*!40000 ALTER TABLE `t_reqestadoevaluacion` ENABLE KEYS */;


--
-- Definition of table `t_reqestadorequerimiento`
--

DROP TABLE IF EXISTS `t_reqestadorequerimiento`;
CREATE TABLE `t_reqestadorequerimiento` (
  `idrequerimiento` int(11) NOT NULL AUTO_INCREMENT,
  `estadorequerimiento` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idrequerimiento`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_reqestadorequerimiento`
--

/*!40000 ALTER TABLE `t_reqestadorequerimiento` DISABLE KEYS */;
INSERT INTO `t_reqestadorequerimiento` (`idrequerimiento`,`estadorequerimiento`) VALUES 
 (1,'CON RESPUESTA'),
 (2,'EVALUADO'),
 (3,'PENDIENTE'),
 (4,'CANCELADO');
/*!40000 ALTER TABLE `t_reqestadorequerimiento` ENABLE KEYS */;


--
-- Definition of table `t_reqfotocopia`
--

DROP TABLE IF EXISTS `t_reqfotocopia`;
CREATE TABLE `t_reqfotocopia` (
  `idfotocopia` int(11) NOT NULL AUTO_INCREMENT,
  `documento` varchar(20) DEFAULT NULL,
  `fecha_fotocopia` varchar(20) DEFAULT NULL,
  `hora_fotocopia` varchar(20) DEFAULT NULL,
  `cantidad_fotocopia` int(11) DEFAULT NULL,
  `observacion_fotocopia` text,
  `archivo_fotocopia` varchar(100) DEFAULT NULL,
  `idaprobado` int(11) DEFAULT NULL,
  `observacionadminf` text,
  `idevaluacion` int(11) DEFAULT '2',
  `idrespevaluador` int(11) DEFAULT NULL,
  `observacionevaluadorf` text,
  `idrequerimiento` int(11) DEFAULT '3',
  `fecharespuesta_admin` varchar(20) DEFAULT NULL,
  `fecharegistro` varchar(20) DEFAULT NULL,
  `fecha_evaluacion` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idfotocopia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_reqfotocopia`
--

/*!40000 ALTER TABLE `t_reqfotocopia` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_reqfotocopia` ENABLE KEYS */;


--
-- Definition of table `t_reqpapeleria`
--

DROP TABLE IF EXISTS `t_reqpapeleria`;
CREATE TABLE `t_reqpapeleria` (
  `idpapeleria` int(11) NOT NULL AUTO_INCREMENT,
  `documento` varchar(20) DEFAULT NULL,
  `fecha_papeleria` varchar(20) DEFAULT NULL,
  `hora_papeleria` varchar(20) DEFAULT NULL,
  `toner` varchar(20) DEFAULT NULL,
  `cantidad_papeleria` int(11) DEFAULT NULL,
  `observacion_papeleria` text,
  `archivo_papeleria` varchar(100) DEFAULT NULL,
  `idaprobado` int(11) DEFAULT NULL,
  `observacionadminp` text,
  `idevaluacion` int(11) DEFAULT '2',
  `idrespevaluador` int(11) DEFAULT NULL,
  `observacionevaluadorp` text,
  `idrequerimiento` int(11) DEFAULT '3',
  `fecharespuesta_admin` varchar(20) DEFAULT NULL,
  `fecharegistro` varchar(20) DEFAULT NULL,
  `fecha_evaluacion` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idpapeleria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_reqpapeleria`
--

/*!40000 ALTER TABLE `t_reqpapeleria` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_reqpapeleria` ENABLE KEYS */;


--
-- Definition of table `t_reqrefrigerio`
--

DROP TABLE IF EXISTS `t_reqrefrigerio`;
CREATE TABLE `t_reqrefrigerio` (
  `idrefrigerio` int(11) NOT NULL AUTO_INCREMENT,
  `documento` varchar(20) DEFAULT NULL,
  `fechar` varchar(20) DEFAULT NULL,
  `horar` varchar(20) DEFAULT NULL,
  `cantidadr` int(11) DEFAULT NULL,
  `lugarrefrigerio` varchar(100) DEFAULT NULL,
  `observacionr` text,
  `idaprobado` int(11) DEFAULT NULL,
  `observacionadminr` text,
  `idevaluacion` int(11) DEFAULT '2',
  `idrespevaluador` int(11) DEFAULT NULL,
  `archivo_refrigerio` text,
  `observacionevaluadorr` text,
  `idrequerimiento` int(11) DEFAULT '3',
  `fecharespuesta_admin` varchar(20) DEFAULT NULL,
  `fecharegistro` varchar(20) DEFAULT NULL,
  `fecha_evaluacion` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idrefrigerio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_reqrefrigerio`
--

/*!40000 ALTER TABLE `t_reqrefrigerio` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_reqrefrigerio` ENABLE KEYS */;


--
-- Definition of table `t_reqrespuetaevaluador`
--

DROP TABLE IF EXISTS `t_reqrespuetaevaluador`;
CREATE TABLE `t_reqrespuetaevaluador` (
  `idrespevaluador` int(11) NOT NULL,
  `respuesta_evaluador` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idrespevaluador`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_reqrespuetaevaluador`
--

/*!40000 ALTER TABLE `t_reqrespuetaevaluador` DISABLE KEYS */;
INSERT INTO `t_reqrespuetaevaluador` (`idrespevaluador`,`respuesta_evaluador`) VALUES 
 (1,'SI'),
 (2,'NO');
/*!40000 ALTER TABLE `t_reqrespuetaevaluador` ENABLE KEYS */;


--
-- Definition of table `t_reqtransporte`
--

DROP TABLE IF EXISTS `t_reqtransporte`;
CREATE TABLE `t_reqtransporte` (
  `id_transporte` int(11) NOT NULL AUTO_INCREMENT,
  `documento` varchar(20) DEFAULT NULL,
  `fecha_inicial` varchar(20) DEFAULT NULL,
  `hora_inicial` varchar(20) DEFAULT NULL,
  `lugar_partida` varchar(50) DEFAULT NULL,
  `lugar_llegada` varchar(50) DEFAULT NULL,
  `idrequerimiento` int(20) DEFAULT '3' COMMENT 'Este estado es el que me permite saber , si el requerimiento es pendiente,evaluado,con respuesta  o cancelado',
  `cantidad_persona` int(11) DEFAULT NULL,
  `observacion` text,
  `idaprobado` int(11) DEFAULT '0' COMMENT 'este id es el que me dice , si el requerimiento fue arpobado, no aprobado, pendiente o cancelado',
  `observacion_admin` text,
  `idevaluacion` int(20) DEFAULT '2' COMMENT 'este idevaluacion , permite saber si es evaluado , pendiente por evaluar , evaluado negativo y cancelado',
  `idrespevaluador` int(11) DEFAULT NULL,
  `observacion_evaluadort` text,
  `fecharegistro` varchar(20) DEFAULT NULL,
  `fecharespuesta_admin` varchar(20) DEFAULT NULL,
  `fecha_evaluacion` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_transporte`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_reqtransporte`
--

/*!40000 ALTER TABLE `t_reqtransporte` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_reqtransporte` ENABLE KEYS */;


--
-- Definition of table `t_respuestaadmin`
--

DROP TABLE IF EXISTS `t_respuestaadmin`;
CREATE TABLE `t_respuestaadmin` (
  `idaprobado` int(11) NOT NULL,
  `respuesta` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idaprobado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_respuestaadmin`
--

/*!40000 ALTER TABLE `t_respuestaadmin` DISABLE KEYS */;
INSERT INTO `t_respuestaadmin` (`idaprobado`,`respuesta`) VALUES 
 (1,'Si'),
 (2,'No');
/*!40000 ALTER TABLE `t_respuestaadmin` ENABLE KEYS */;


--
-- Definition of table `t_usuarioprotocolo`
--

DROP TABLE IF EXISTS `t_usuarioprotocolo`;
CREATE TABLE `t_usuarioprotocolo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `documento` varchar(20) DEFAULT NULL,
  `nombre1` varchar(50) DEFAULT NULL,
  `nombre2` varchar(50) DEFAULT NULL,
  `apellido1` varchar(50) DEFAULT NULL,
  `apellido2` varchar(50) DEFAULT NULL,
  `contrasena` varchar(20) DEFAULT NULL,
  `rol` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_usuarioprotocolo`
--

/*!40000 ALTER TABLE `t_usuarioprotocolo` DISABLE KEYS */;
INSERT INTO `t_usuarioprotocolo` (`id`,`documento`,`nombre1`,`nombre2`,`apellido1`,`apellido2`,`contrasena`,`rol`) VALUES 
 (1,'1128270062','ALEX',NULL,'MUNOZ','CASTRO','1234','todos'),
 (2,'1234','JULIAN',NULL,'MESA',NULL,'1234','adminlogistico'),
 (3,'12345','RICARDO',NULL,'PUERTA',NULL,'1234','todos');
/*!40000 ALTER TABLE `t_usuarioprotocolo` ENABLE KEYS */;


--
-- Definition of procedure `sp3cargardatosgeneralesservidor`
--

DROP PROCEDURE IF EXISTS `sp3cargardatosgeneralesservidor`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp3cargardatosgeneralesservidor`(pdocumento text)
BEGIN


select 
id, 
documento,
concat_ws(" ", nombre1, nombre2, apellido1,apellido2) nombrecompleto,
nombre1,
nombre2,
apellido1,
contrasena,
apellido2,
rol
from t_usuarioprotocolo  where documento = pdocumento;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `spbusquedaevaluacionfotocopia`
--

DROP PROCEDURE IF EXISTS `spbusquedaevaluacionfotocopia`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spbusquedaevaluacionfotocopia`(pfecha_fotocopia text,pidfotocopia text,pidrequerimiento text,pdocumento text )
BEGIN
	
  
  set @x:= CONCAT('%',pfecha_fotocopia,'%');
 

if pidfotocopia = '' then
set @y:= CONCAT('%',pidfotocopia, '%');
else
set @y:= CONCAT('',pidfotocopia, '');
end if;

if pidrequerimiento = '' then
set @z:= CONCAT('%',pidrequerimiento, '%');
else
set @z:= CONCAT('',pidrequerimiento, '');
end if;
  
  
  
select 
f.idfotocopia, f.documento,concat_ws(" ",u.nombre1, u.nombre2, u.apellido1, u.apellido2)nombrecompleto,
f.fecha_fotocopia, f.hora_fotocopia, f.cantidad_fotocopia, f.observacion_fotocopia,
f.archivo_fotocopia, f.idaprobado,a.respuestaadmin, f.observacionadminf, f.idevaluacion,e.estadoevaluacion,
f.idrespevaluador,rev.respuesta_evaluador, f.observacionevaluadorf,f.idrequerimiento,q.estadorequerimiento, f.fecharespuesta_admin, f.fecharegistro
from t_reqfotocopia f
left join t_reqestadoevaluacion e on f.idevaluacion = e.idevaluacion
left join t_reqrespuetaevaluador rev on f.idrespevaluador = rev.idrespevaluador
left join t_usuarioprotocolo u on f.documento = u.documento
left join t_reqestadorequerimiento q on f.idrequerimiento = q.idrequerimiento
left join t_reqestadoaprobado a on f.idaprobado = a.idaprobado where f.documento = pdocumento and f.fecha_fotocopia like @x and f.idfotocopia like @y and f.idrequerimiento like @z ;

  
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `spcancelarfot`
--

DROP PROCEDURE IF EXISTS `spcancelarfot`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spcancelarfot`(pidfotocopia int,pidrequerimiento int, pidevaluacion int,pidaprobado int)
BEGIN
	update t_reqfotocopia SET
  idrequerimiento = pidrequerimiento
  ,idevaluacion = pidevaluacion
  ,idaprobado = pidaprobado
  ,fecha_evaluacion = now()
WHERE idfotocopia = pidfotocopia;	
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `spcancelarpap`
--

DROP PROCEDURE IF EXISTS `spcancelarpap`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spcancelarpap`(pidpapeleria int,pidrequerimiento int, pidevaluacion int,pidaprobado int)
BEGIN
update t_reqpapeleria SET
  idrequerimiento = pidrequerimiento
  ,idevaluacion = pidevaluacion
  ,idaprobado = pidaprobado
  ,fecha_evaluacion = now()
WHERE idpapeleria = pidpapeleria;	
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `spcancelarref`
--

DROP PROCEDURE IF EXISTS `spcancelarref`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spcancelarref`(pidrefrigerio int,pidrequerimiento int, pidevaluacion int,pidaprobado int)
BEGIN
	update t_reqrefrigerio SET
   idrequerimiento = pidrequerimiento
  ,idevaluacion = pidevaluacion
  ,idaprobado = pidaprobado
  ,fecha_evaluacion = now()
WHERE idrefrigerio = pidrefrigerio;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `spbusquedaevaluacionpapeleria`
--

DROP PROCEDURE IF EXISTS `spbusquedaevaluacionpapeleria`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spbusquedaevaluacionpapeleria`(pfecha_papeleria text,pidpapeleria text,pidrequerimiento text,pdocumento text )
BEGIN
	
  
  set @x:= CONCAT('%',pfecha_papeleria,'%');
 

if pidpapeleria = '' then
set @y:= CONCAT('%',pidpapeleria, '%');
else
set @y:= CONCAT('',pidpapeleria, '');
end if;

if pidrequerimiento = '' then
set @z:= CONCAT('%',pidrequerimiento, '%');
else
set @z:= CONCAT('',pidrequerimiento, '');
end if;
  
  
  
select 
p.idpapeleria, p.documento,concat_ws(" ",u.nombre1, u.nombre2, u.apellido1, u.apellido2)nombrecompleto,
p.fecha_papeleria,p.hora_papeleria, p.cantidad_papeleria, p.observacion_papeleria, p.archivo_papeleria,
p.idaprobado,a.respuestaadmin, p.observacionadminp, p.idevaluacion ,e.estadoevaluacion, p.idrespevaluador ,rev.respuesta_evaluador
, p.observacionevaluadorp,p.idrequerimiento ,q.estadorequerimiento, p.fecharespuesta_admin, p.fecharegistro, p.fecha_evaluacion
FROM t_reqpapeleria p
left join t_reqestadoevaluacion e on p.idevaluacion = e.idevaluacion
left join t_reqrespuetaevaluador rev on p.idrespevaluador = rev.idrespevaluador
left join t_usuarioprotocolo u on p.documento = u.documento
left join t_reqestadorequerimiento q on p.idrequerimiento = q.idrequerimiento
left join t_reqestadoaprobado a on p.idaprobado = a.idaprobado where p.documento = pdocumento and p.fecha_papeleria like @x and p.idpapeleria like @y and p.idrequerimiento like @z ;

  
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `spbusquedaevaluacionrefrigerio`
--

DROP PROCEDURE IF EXISTS `spbusquedaevaluacionrefrigerio`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spbusquedaevaluacionrefrigerio`(pfechar text,pidrefrigerio text,pidrequerimiento text,pdocumento text )
BEGIN
	
  
  set @x:= CONCAT('%',pfechar,'%');
 

if pidrefrigerio = '' then
set @y:= CONCAT('%',pidrefrigerio, '%');
else
set @y:= CONCAT('',pidrefrigerio, '');
end if;

if pidrequerimiento = '' then
set @z:= CONCAT('%',pidrequerimiento, '%');
else
set @z:= CONCAT('',pidrequerimiento, '');
end if;
  
  
  
select 
r.idrefrigerio, r.documento,concat_ws(" ",u.nombre1, u.nombre2, u.apellido1, u.apellido2)nombrecompleto,
r.fechar,r.horar, r.cantidadr, r.lugarrefrigerio,
r.observacionr, r.idaprobado,a.respuestaadmin, r.observacionadminr,
r.idevaluacion,e.estadoevaluacion, r.idrespevaluador,rev.respuesta_evaluador, r.observacionevaluadorr,
r.idrequerimiento,q.estadorequerimiento, r.fecharespuesta_admin, r.fecharegistro, r.fecha_evaluacion
from t_reqrefrigerio r
left join t_reqestadoevaluacion e on r.idevaluacion = e.idevaluacion
left join t_reqrespuetaevaluador rev on r.idrespevaluador = rev.idrespevaluador
left join t_usuarioprotocolo u on r.documento = u.documento
left join t_reqestadorequerimiento q on r.idrequerimiento = q.idrequerimiento
left join t_reqestadoaprobado a on r.idaprobado = a.idaprobado where r.documento = pdocumento and r.fechar like @x and r.idrefrigerio like @y and r.idrequerimiento like @z ;

  
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `spbusquedaevaluaciontransporte`
--

DROP PROCEDURE IF EXISTS `spbusquedaevaluaciontransporte`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spbusquedaevaluaciontransporte`(pfecha_inicial text,pid_transporte text,pidrequerimiento text,pdocumento text )
BEGIN
	
  
  set @x:= CONCAT('%',pfecha_inicial,'%');
 

if pid_transporte = '' then
set @y:= CONCAT('%',pid_transporte, '%');
else
set @y:= CONCAT('',pid_transporte, '');
end if;

if pidrequerimiento = '' then
set @z:= CONCAT('%',pidrequerimiento, '%');
else
set @z:= CONCAT('',pidrequerimiento, '');
end if;
  
  
  
	select 
t.id_transporte, t.documento,concat_ws(" ",u.nombre1, u.nombre2, u.apellido1, u.apellido2)nombrecompleto,
t.idrequerimiento,q.estadorequerimiento, t.fecha_inicial, t.hora_inicial,
t.lugar_partida, t.lugar_llegada, 
t.cantidad_persona,
t.idestado,est.estado, t.observacion, t.idaprobado,a.respuestaadmin,
t.observacion_admin, t.idevaluacion,e.estadoevaluacion , t.idrespevaluador,rev.respuesta_evaluador,
t.observacion_evaluadort,t.fecharegistro, t.fecharespuesta_admin
from t_reqtransporte t
left join t_reqestadoevaluacion e on t.idevaluacion = e.idevaluacion
left join t_reqrespuetaevaluador rev on t.idrespevaluador = rev.idrespevaluador
left join t_usuarioprotocolo u on t.documento = u.documento
left join t_reqestadorequerimiento q on t.idrequerimiento = q.idrequerimiento
left join t_reqestadoaprobado a on t.idaprobado = a.idaprobado
left join t_estado_llevartrans est on t.idestado = est.idestado where t.documento = pdocumento and t.fecha_inicial like @x and t.id_transporte like @y and t.idrequerimiento like @z ;

  
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `spbusquedafotocopiaadmin`
--

DROP PROCEDURE IF EXISTS `spbusquedafotocopiaadmin`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spbusquedafotocopiaadmin`(pfecha_fotocopia text,idfotocopia text,pidrequerimiento text )
BEGIN
	
  
set @x:= CONCAT('%',pfecha_fotocopia,'%');


if idfotocopia = '' then
set @y:= CONCAT('%',idfotocopia, '%');
else
set @y:= CONCAT('',idfotocopia, '');
end if;

if pidrequerimiento = '' then
set @z:= CONCAT('%',pidrequerimiento, '%');
else
set @z:= CONCAT('',pidrequerimiento, '');
end if;
  
  
  
select f.idfotocopia, f.documento,concat_ws(" ",u.nombre1, u.nombre2, u.apellido1, u.apellido2)nombrecompleto,
q.estadorequerimiento, f.fecha_fotocopia, f.hora_fotocopia, f.cantidad_fotocopia, f.observacion_fotocopia,
f.archivo_fotocopia, f.idaprobado, f.observacionadminf, f.idevaluacion, f.observacionevaluadorf,
f.idrequerimiento, f.fecharegistro,a.respuestaadmin from t_reqfotocopia f
left join t_reqestadoaprobado a on f.idaprobado = a.idaprobado
left join t_usuarioprotocolo u on f.documento = u.documento
inner join t_reqestadorequerimiento q on f.idrequerimiento = q.idrequerimiento where f.fecha_fotocopia like @x and f.idfotocopia like @y and f.idrequerimiento like @z ;

  
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `spcancelartrans`
--

DROP PROCEDURE IF EXISTS `spcancelartrans`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spcancelartrans`(pid_transporte int,pidrequerimiento int, pidevaluacion int,pidaprobado int)
BEGIN
	update t_reqtransporte SET
  idrequerimiento = pidrequerimiento
  ,idevaluacion = pidevaluacion
  ,idaprobado = pidaprobado
  ,fecha_evaluacion = now()
  WHERE id_transporte = pid_transporte;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `spcargardatosfotocopia`
--

DROP PROCEDURE IF EXISTS `spcargardatosfotocopia`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spcargardatosfotocopia`(pidfotocopia int)
BEGIN
SELECT idfotocopia, documento, fecha_fotocopia, hora_fotocopia, cantidad_fotocopia, observacion_fotocopia, archivo_fotocopia
FROM t_reqfotocopia
where idfotocopia = pidfotocopia;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `spcargardatospapeleria`
--

DROP PROCEDURE IF EXISTS `spcargardatospapeleria`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spcargardatospapeleria`(pidpapeleria int)
BEGIN
SELECT idpapeleria, documento, fecha_papeleria, hora_papeleria,toner, cantidad_papeleria, observacion_papeleria, archivo_papeleria, idaprobado, observacionadminp, idevaluacion, observacionevaluadorp, idrequerimiento, fecharespuesta_admin, fecharegistro 
FROM t_reqpapeleria
where idpapeleria = pidpapeleria;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `spbusquedapapeleriaadmin`
--

DROP PROCEDURE IF EXISTS `spbusquedapapeleriaadmin`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spbusquedapapeleriaadmin`(pfecha_papeleria text,pidpapeleria text,pidrequerimiento text )
BEGIN
	
  
set @x:= CONCAT('%',pfecha_papeleria,'%');


if pidpapeleria = '' then
set @y:= CONCAT('%',pidpapeleria, '%');
else
set @y:= CONCAT('',pidpapeleria, '');
end if;

if pidrequerimiento = '' then
set @z:= CONCAT('%',pidrequerimiento, '%');
else
set @z:= CONCAT('',pidrequerimiento, '');
end if;
  
  
  
select p.idpapeleria, p.documento,concat_ws(" ",u.nombre1, u.nombre2, u.apellido1, u.apellido2)nombrecompleto,
p.fecha_papeleria,p.hora_papeleria, p.cantidad_papeleria, p.observacion_papeleria,
p.archivo_papeleria, p.idaprobado, p.observacionadminp, p.idevaluacion,
p.observacionevaluadorp, p.idrequerimiento, p.fecharespuesta_admin, p.fecharegistro, q.estadorequerimiento, a.respuestaadmin
FROM t_reqpapeleria p
left join t_reqestadoaprobado a on p.idaprobado = a.idaprobado
left join t_usuarioprotocolo u on p.documento = u.documento
inner join t_reqestadorequerimiento q on p.idrequerimiento = q.idrequerimiento where p.fecha_papeleria like @x and p.idpapeleria like @y and p.idrequerimiento like @z ;

  
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `spbusquedarefrigerioadmin`
--

DROP PROCEDURE IF EXISTS `spbusquedarefrigerioadmin`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spbusquedarefrigerioadmin`(pfechar text,pidrefrigerio text,pidrequerimiento text )
BEGIN
	
  
  set @x:= CONCAT('%',pfechar,'%');
 

if pidrefrigerio = '' then
set @y:= CONCAT('%',pidrefrigerio, '%');
else
set @y:= CONCAT('',pidrefrigerio, '');
end if;

if pidrequerimiento = '' then
set @z:= CONCAT('%',pidrequerimiento, '%');
else
set @z:= CONCAT('',pidrequerimiento, '');
end if;
  
  
  
select r.idrefrigerio, r.documento,concat_ws(" ",u.nombre1, u.nombre2, u.apellido1, u.apellido2)nombrecompleto,q.estadorequerimiento, r.fechar,r.horar, r.lugarrefrigerio, r.idrequerimiento, r.cantidadr, r.observacionr,r.idaprobado,a.respuestaadmin, r.observacionadminr, r.idevaluacion, r.observacionevaluadorr, r.fecharegistro,r.archivo_refrigerio
from t_reqrefrigerio r 
left join t_reqestadoaprobado a on r.idaprobado = a.idaprobado
left join t_usuarioprotocolo u on r.documento = u.documento
inner join t_reqestadorequerimiento q on r.idrequerimiento = q.idrequerimiento where r.fechar like @x and r.idrefrigerio like @y and r.idrequerimiento like @z ;

  
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `spcargardatosevaluacionfotocopia`
--

DROP PROCEDURE IF EXISTS `spcargardatosevaluacionfotocopia`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spcargardatosevaluacionfotocopia`(pdocumento text)
BEGIN
select 
f.idfotocopia, f.documento,concat_ws(" ",u.nombre1, u.nombre2, u.apellido1, u.apellido2)nombrecompleto,
f.fecha_fotocopia, f.hora_fotocopia, f.cantidad_fotocopia, f.observacion_fotocopia,
f.archivo_fotocopia, f.idaprobado,a.respuestaadmin, f.observacionadminf, f.idevaluacion,e.estadoevaluacion,
f.idrespevaluador,rev.respuesta_evaluador, f.observacionevaluadorf,f.idrequerimiento,q.estadorequerimiento, f.fecharespuesta_admin, f.fecharegistro
from t_reqfotocopia f
left join t_reqestadoevaluacion e on f.idevaluacion = e.idevaluacion
left join t_reqrespuetaevaluador rev on f.idrespevaluador = rev.idrespevaluador
left join t_usuarioprotocolo u on f.documento = u.documento
inner join t_reqestadorequerimiento q on f.idrequerimiento = q.idrequerimiento
inner join t_reqestadoaprobado a on f.idaprobado = a.idaprobado where f.documento = pdocumento ;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `spcargardatosevaluacionpapeleria`
--

DROP PROCEDURE IF EXISTS `spcargardatosevaluacionpapeleria`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spcargardatosevaluacionpapeleria`(pdocumento text)
BEGIN
select 
p.idpapeleria, p.documento,concat_ws(" ",u.nombre1, u.nombre2, u.apellido1, u.apellido2)nombrecompleto,
p.fecha_papeleria,p.hora_papeleria, p.cantidad_papeleria, p.observacion_papeleria, p.archivo_papeleria,
p.idaprobado,a.respuestaadmin, p.observacionadminp, p.idevaluacion ,e.estadoevaluacion, p.idrespevaluador ,rev.respuesta_evaluador
, p.observacionevaluadorp,p.idrequerimiento ,q.estadorequerimiento, p.fecharespuesta_admin, p.fecharegistro, p.fecha_evaluacion
FROM t_reqpapeleria p
left join t_reqestadoevaluacion e on p.idevaluacion = e.idevaluacion
left join t_reqrespuetaevaluador rev on p.idrespevaluador = rev.idrespevaluador
left join t_usuarioprotocolo u on p.documento = u.documento
inner join t_reqestadorequerimiento q on p.idrequerimiento = q.idrequerimiento
inner join t_reqestadoaprobado a on p.idaprobado = a.idaprobado where p.documento = pdocumento ;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `spcargardatosrefrigerio`
--

DROP PROCEDURE IF EXISTS `spcargardatosrefrigerio`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spcargardatosrefrigerio`(pidrefrigerio int)
BEGIN
	select fechar, horar, cantidadr,lugarrefrigerio,observacionr from t_reqrefrigerio
  where idrefrigerio = pidrefrigerio;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `spcargardatostransporte`
--

DROP PROCEDURE IF EXISTS `spcargardatostransporte`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spcargardatostransporte`(pid_transporte int)
BEGIN
SELECT req.id_transporte, req.documento,req.fecha_inicial, req.hora_inicial, req.lugar_partida, req.lugar_llegada, req.cantidad_persona, req.observacion,req.fecharegistro 
FROM t_reqtransporte req
where id_transporte = pid_transporte;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `spguardarevaluacionfotocopia`
--

DROP PROCEDURE IF EXISTS `spguardarevaluacionfotocopia`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spguardarevaluacionfotocopia`(pidfotocopia int,pidrespevaluador int, pobservacionevaluadorf text )
BEGIN


set @a:= pidrespevaluador;

if  @a > 0 then

  update t_reqfotocopia SET
  idevaluacion = 1
  ,idrespevaluador = pidrespevaluador
  ,observacionevaluadorf = pobservacionevaluadorf
  ,idrequerimiento = 2
  ,fecha_evaluacion = now()
WHERE idfotocopia = pidfotocopia;

select rer.estadorequerimiento from t_reqfotocopia f
inner join  t_reqestadorequerimiento rer  on f.idrequerimiento = rer.idrequerimiento
where f.idfotocopia = pidfotocopia;

end if;


END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `spguardarevaluacionpapeleria`
--

DROP PROCEDURE IF EXISTS `spguardarevaluacionpapeleria`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spguardarevaluacionpapeleria`(pidpapeleria int,pidrespevaluador int, pobservacionevaluadorp text )
BEGIN


set @a:= pidrespevaluador;

if  @a > 0 then

  update t_reqpapeleria SET
  idevaluacion = 1
  ,idrespevaluador = pidrespevaluador
  ,observacionevaluadorp = pobservacionevaluadorp
  ,idrequerimiento = 2
  ,fecha_evaluacion = now()
WHERE idpapeleria = pidpapeleria;

select rer.estadorequerimiento from t_reqpapeleria p
inner join  t_reqestadorequerimiento rer  on p.idrequerimiento = rer.idrequerimiento
where p.idpapeleria = pidpapeleria;

end if;


END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `spcargardatosevaluacionrefrigerio`
--

DROP PROCEDURE IF EXISTS `spcargardatosevaluacionrefrigerio`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spcargardatosevaluacionrefrigerio`(pdocumento text)
BEGIN
select 
r.idrefrigerio, r.documento,concat_ws(" ",u.nombre1, u.nombre2, u.apellido1, u.apellido2)nombrecompleto,
r.fechar,r.horar, r.cantidadr, r.lugarrefrigerio,
r.observacionr, r.idaprobado,a.respuestaadmin, r.observacionadminr,
r.idevaluacion,e.estadoevaluacion, r.idrespevaluador,rev.respuesta_evaluador, r.observacionevaluadorr,
r.idrequerimiento,q.estadorequerimiento, r.fecharespuesta_admin, r.fecharegistro, r.fecha_evaluacion
from t_reqrefrigerio r
left join t_reqestadoevaluacion e on r.idevaluacion = e.idevaluacion
left join t_reqrespuetaevaluador rev on r.idrespevaluador = rev.idrespevaluador
left join t_usuarioprotocolo u on r.documento = u.documento
inner join t_reqestadorequerimiento q on r.idrequerimiento = q.idrequerimiento
inner join t_reqestadoaprobado a on r.idaprobado = a.idaprobado where r.documento = pdocumento ;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `spcargardatosevaluaciontransporte`
--

DROP PROCEDURE IF EXISTS `spcargardatosevaluaciontransporte`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spcargardatosevaluaciontransporte`(pdocumento text)
BEGIN
	select 
t.id_transporte, t.documento,concat_ws(" ",u.nombre1, u.nombre2, u.apellido1, u.apellido2)nombrecompleto,
t.idrequerimiento,q.estadorequerimiento, t.fecha_inicial, t.hora_inicial,
t.lugar_partida, t.lugar_llegada, 
t.cantidad_persona,
t.idestado,est.estado, t.observacion, t.idaprobado,a.respuestaadmin,
t.observacion_admin, t.idevaluacion,e.estadoevaluacion , t.idrespevaluador,rev.respuesta_evaluador,
t.observacion_evaluadort,t.fecharegistro, t.fecharespuesta_admin
from t_reqtransporte t
left join t_reqestadoevaluacion e on t.idevaluacion = e.idevaluacion
left join t_reqrespuetaevaluador rev on t.idrespevaluador = rev.idrespevaluador
left join t_usuarioprotocolo u on t.documento = u.documento
inner join t_reqestadorequerimiento q on t.idrequerimiento = q.idrequerimiento
inner join t_reqestadoaprobado a on t.idaprobado = a.idaprobado
inner join t_estado_llevartrans est on t.idestado = est.idestado where t.documento = pdocumento ;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `spcargardatosfotocopiaadmin`
--

DROP PROCEDURE IF EXISTS `spcargardatosfotocopiaadmin`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spcargardatosfotocopiaadmin`()
BEGIN
select f.idfotocopia, f.documento,concat_ws(" ",u.nombre1, u.nombre2, u.apellido1, u.apellido2)nombrecompleto,
q.estadorequerimiento,a.respuestaadmin, f.fecha_fotocopia, f.hora_fotocopia, f.cantidad_fotocopia, f.observacion_fotocopia,
f.archivo_fotocopia, f.idaprobado, f.observacionadminf, f.idevaluacion, f.observacionevaluadorf,
f.idrequerimiento, f.fecharegistro from t_reqfotocopia f
left join t_reqestadoaprobado a on f.idaprobado = a.idaprobado
left join t_usuarioprotocolo u on f.documento = u.documento
inner join t_reqestadorequerimiento q on f.idrequerimiento = q.idrequerimiento group by f.idfotocopia desc;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `spcargardatospapeleriaadmin`
--

DROP PROCEDURE IF EXISTS `spcargardatospapeleriaadmin`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spcargardatospapeleriaadmin`()
BEGIN
select p.idpapeleria, p.documento,concat_ws(" ",u.nombre1, u.nombre2, u.apellido1, u.apellido2)nombrecompleto,
p.fecha_papeleria,p.hora_papeleria,p.toner, p.cantidad_papeleria, p.observacion_papeleria,
p.archivo_papeleria, p.idaprobado, p.observacionadminp, p.idevaluacion,
p.observacionevaluadorp, p.idrequerimiento, p.fecharespuesta_admin, p.fecharegistro, q.estadorequerimiento, a.respuestaadmin
FROM t_reqpapeleria p
left join t_reqestadoaprobado a on p.idaprobado = a.idaprobado
left join t_usuarioprotocolo u on p.documento = u.documento
inner join t_reqestadorequerimiento q on p.idrequerimiento = q.idrequerimiento group by p.idpapeleria desc;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `spcargardatosrefrigerioadmin`
--

DROP PROCEDURE IF EXISTS `spcargardatosrefrigerioadmin`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spcargardatosrefrigerioadmin`()
BEGIN
select r.idrefrigerio, r.documento,concat_ws(" ",u.nombre1, u.nombre2, u.apellido1, u.apellido2)nombrecompleto,q.estadorequerimiento, r.fechar,r.horar, r.lugarrefrigerio, r.idrequerimiento, r.cantidadr, r.observacionr,r.idaprobado,a.respuestaadmin, r.observacionadminr, r.idevaluacion, r.observacionevaluadorr, r.fecharegistro
from t_reqrefrigerio r 
left join t_reqestadoaprobado a on r.idaprobado = a.idaprobado
left join t_usuarioprotocolo u on r.documento = u.documento
inner join t_reqestadorequerimiento q on r.idrequerimiento = q.idrequerimiento group by r.idrefrigerio desc;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `spguardarevaluacionrefrigerio`
--

DROP PROCEDURE IF EXISTS `spguardarevaluacionrefrigerio`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spguardarevaluacionrefrigerio`(pidrefrigerio int,pidrespevaluador int, pobservacionevaluadorr text )
BEGIN


set @a:= pidrespevaluador;

if  @a > 0 then

  update t_reqrefrigerio SET
  idevaluacion = 1
  ,idrespevaluador = pidrespevaluador
  ,observacionevaluadorr = pobservacionevaluadorr
  ,idrequerimiento = 2
  ,fecha_evaluacion = now()
WHERE idrefrigerio = pidrefrigerio;

select rer.estadorequerimiento from t_reqrefrigerio r
inner join  t_reqestadorequerimiento rer  on r.idrequerimiento = rer.idrequerimiento
where r.idrefrigerio = pidrefrigerio;

end if;


END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `spguardarevaluaciontransporte`
--

DROP PROCEDURE IF EXISTS `spguardarevaluaciontransporte`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spguardarevaluaciontransporte`(pid_transporte int,pidrespevaluador int, pobservacion_evaluadort text )
BEGIN


set @a:= pidrespevaluador;
if  @a > 0 then
	update t_reqtransporte SET
  idrequerimiento = 2
  ,idevaluacion = 1
  ,idrespevaluador = pidrespevaluador
  ,observacion_evaluadort = pobservacion_evaluadort
  ,fecha_evaluacion = now()
  WHERE id_transporte = pid_transporte;
select ret.estadorequerimiento from t_reqtransporte t
inner join  t_reqestadorequerimiento ret  on t.idrequerimiento = ret.idrequerimiento
where t.id_transporte = pid_transporte;
end if;


END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `spguardarfotocopia`
--

DROP PROCEDURE IF EXISTS `spguardarfotocopia`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spguardarfotocopia`(pdocumento int, pfecha_fotocopia text,phora_fotocopia text, pcantidad_fotocopia int , parchivo_fotocopia text, pobservacion_fotocopia text )
BEGIN
insert into t_reqfotocopia (
   documento
  ,fecha_fotocopia
  ,hora_fotocopia
  ,cantidad_fotocopia
  ,archivo_fotocopia
  ,observacion_fotocopia
  ,fecharegistro
) VALUES (
   pdocumento
  ,pfecha_fotocopia
  ,phora_fotocopia
  ,pcantidad_fotocopia
  ,parchivo_fotocopia
  ,pobservacion_fotocopia
  ,now()
);	

select idfotocopia from t_reqfotocopia where documento = pdocumento;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `spguardarfotocopiaadmin`
--

DROP PROCEDURE IF EXISTS `spguardarfotocopiaadmin`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spguardarfotocopiaadmin`(pidfotocopia int,pidaprobado int, pobservacionadminf text )
BEGIN


set @a:= pidaprobado;

if  @a > 0 then

  update t_reqfotocopia SET
   idaprobado = pidaprobado
  ,observacionadminf = pobservacionadminf
  ,idrequerimiento = 1
  ,fecharespuesta_admin = now()
  WHERE idfotocopia = pidfotocopia;

select ret.estadorequerimiento from t_reqfotocopia f
inner join  t_reqestadorequerimiento ret  on f.idrequerimiento = ret.idrequerimiento
where f.idfotocopia = pidfotocopia;

end if;

END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `spguardarpapeleria`
--

DROP PROCEDURE IF EXISTS `spguardarpapeleria`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spguardarpapeleria`(pdocumento int, pfecha_papeleria text,phora_papeleria text,ptoner text, pcantidad_papeleria int , parchivo_papeleria text, pobservacion_papeleria text )
BEGIN
insert into t_reqpapeleria (
   documento
  ,fecha_papeleria
  ,hora_papeleria
  ,toner
  ,cantidad_papeleria
  ,archivo_papeleria
  ,observacion_papeleria
  ,fecharegistro
) VALUES (
   pdocumento
  ,pfecha_papeleria
  ,phora_papeleria
  ,ptoner
  ,pcantidad_papeleria
  ,parchivo_papeleria
  ,pobservacion_papeleria
  ,now()
)	;

select idpapeleria from t_reqpapeleria where documento = pdocumento;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `spguardarpapeleriaadmin`
--

DROP PROCEDURE IF EXISTS `spguardarpapeleriaadmin`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spguardarpapeleriaadmin`(pidpapeleria int,pidaprobado int, pobservacionadminp text )
BEGIN


set @a:= pidaprobado;

if  @a > 0 then

  update t_reqpapeleria SET
   idaprobado = pidaprobado
  ,observacionadminp = pobservacionadminp
  ,idrequerimiento = 1
  ,fecharespuesta_admin = now()
  WHERE idpapeleria = pidpapeleria;

select ret.estadorequerimiento from t_reqpapeleria p
inner join  t_reqestadorequerimiento ret  on p.idrequerimiento = ret.idrequerimiento
where p.idpapeleria = pidpapeleria;

end if;

END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `spguardarrefrigerio`
--

DROP PROCEDURE IF EXISTS `spguardarrefrigerio`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spguardarrefrigerio`(pdocumento text,pfechar text,phorar text,plugarrefrigerio text ,pcantidadr int,parchivo_refrigerio text, pobservacionr text)
BEGIN
	insert into t_reqrefrigerio (
  documento
  ,fechar
  ,horar
  ,lugarrefrigerio
  ,cantidadr
  ,archivo_refrigerio
  ,observacionr
  ,fecharegistro
) VALUES (
   pdocumento
  ,pfechar
  ,phorar
  ,plugarrefrigerio
  ,pcantidadr
  ,parchivo_refrigerio
  ,pobservacionr
  ,now()
);

select idrefrigerio from t_reqrefrigerio where documento = pdocumento;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `spguardarrefrigerioadmin`
--

DROP PROCEDURE IF EXISTS `spguardarrefrigerioadmin`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spguardarrefrigerioadmin`(pidrefrigerio int,pidaprobado int, pobservacionadminr text )
BEGIN


set @a:= pidaprobado;

if  @a > 0 then

	update t_reqrefrigerio SET
   idaprobado = pidaprobado
  ,observacionadminr = pobservacionadminr
  ,idrequerimiento = 1
  ,fecharespuesta_admin = now()
  WHERE idrefrigerio = pidrefrigerio;

select ret.estadorequerimiento from t_reqrefrigerio r
inner join  t_reqestadorequerimiento ret  on r.idrequerimiento = ret.idrequerimiento
where r.idrefrigerio = pidrefrigerio;

end if;

END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `spguardartransporte`
--

DROP PROCEDURE IF EXISTS `spguardartransporte`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spguardartransporte`(pdocumento int, pfecha_inicial text,phora_inicial text,plugar_partida text,plugar_llegada text,pcantidad_persona int, pobservacion text )
BEGIN
	insert into t_reqtransporte (
   documento
  ,fecha_inicial
  ,hora_inicial
  ,lugar_partida
  ,lugar_llegada
  ,cantidad_persona
  ,observacion
  ,fecharegistro
) VALUES (
  pdocumento
  ,pfecha_inicial
  ,phora_inicial
  ,plugar_partida
  ,plugar_llegada
  ,pcantidad_persona
  ,pobservacion
  ,now()
);

select id_transporte from t_reqtransporte where documento = pdocumento;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `sprol`
--

DROP PROCEDURE IF EXISTS `sprol`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sprol`(pdocumento text)
BEGIN
select rol FROM t_usuarioprotocolo where documento = pdocumento;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `sptraerestadotransporte`
--

DROP PROCEDURE IF EXISTS `sptraerestadotransporte`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sptraerestadotransporte`()
BEGIN
	select idestado, estado from  t_estado_llevartrans;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `spvalidarevaluacionrequerimiento`
--

DROP PROCEDURE IF EXISTS `spvalidarevaluacionrequerimiento`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spvalidarevaluacionrequerimiento`(pdocumento text)
BEGIN
set @l :=(select COUNT(id_transporte) from t_reqtransporte  WHERE idrequerimiento = 1 and documento = pdocumento);
set @i :=(select COUNT(idfotocopia) from t_reqfotocopia where idrequerimiento = 1 and documento = pdocumento);
set @c :=(select COUNT(idpapeleria) from t_reqpapeleria where idrequerimiento = 1 and documento = pdocumento) ;
set @he :=(select COUNT(idrefrigerio) from t_reqrefrigerio where idrequerimiento = 1 and documento = pdocumento);

select (@l + @i + @c + @he) total;
	
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
