-- MySQL dump 10.13  Distrib 5.5.24, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: info_instituciones
-- ------------------------------------------------------
-- Server version	5.5.24-0ubuntu0.12.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `navitems`
--

DROP TABLE IF EXISTS `navitems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `navitems` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nav_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `page_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `layout` varchar(255) NOT NULL,
  `homepage` tinyint(1) NOT NULL,
  `customurl` varchar(255) DEFAULT NULL,
  `ordering` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_77C5DA3DF03A7216` (`nav_id`),
  KEY `IDX_77C5DA3D727ACA70` (`parent_id`),
  KEY `IDX_77C5DA3DC4663E4` (`page_id`),
  CONSTRAINT `FK_77C5DA3D727ACA70` FOREIGN KEY (`parent_id`) REFERENCES `navitems` (`id`),
  CONSTRAINT `FK_77C5DA3DC4663E4` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`),
  CONSTRAINT `FK_77C5DA3DF03A7216` FOREIGN KEY (`nav_id`) REFERENCES `navs` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `navitems`
--

LOCK TABLES `navitems` WRITE;
/*!40000 ALTER TABLE `navitems` DISABLE KEYS */;
INSERT INTO `navitems` VALUES (1,1,NULL,1,'Inicio','inicio','home',1,'',1),(2,1,NULL,NULL,'Formulario instituciones','formulario-instituciones','interior',0,'http://instituciones.chilesinpapeleo.local/webform/view/formulario-instituciones',2),(7,NULL,2,4,'Prueba','prueba','interior',0,NULL,3),(8,NULL,1,NULL,'Otro','otro','',0,NULL,0);
/*!40000 ALTER TABLE `navitems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `navs`
--

DROP TABLE IF EXISTS `navs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `navs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `navs`
--

LOCK TABLES `navs` WRITE;
/*!40000 ALTER TABLE `navs` DISABLE KEYS */;
INSERT INTO `navs` VALUES (1,'Menú Principal','menu-principal');
/*!40000 ALTER TABLE `navs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `restricted` tinyint(1) NOT NULL,
  `content` longtext NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `alias_index` (`alias`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (1,'Inicio','inicio',0,'<font color=\"#1f497d\">Portada con logos</font>'),(2,'Documentación de Apoyo','documentacion-de-apoyo',0,'<span style=\"color: #1f497d;\">Introducción</span>&nbsp;<div><b>¿Por qué estamos haciendo esto?</b>&nbsp;</div><div>&nbsp;La campaña de digitalización de trámites públicos se enmarca dentro de la iniciativa ChileAtiende, la red multiservicios del Estado, lanzada oficialmente a inicios de 2012 y que, a través de más de 140 sucursales, un call center y un portal web, busca acercar los trámites y beneficios de las instituciones públicas a los ciudadanos.\n\nEn esta línea, y de acuerdo a los ejes de trabajo de la Agenda de Modernización del Estado, &nbsp;uno de los factores fundamentales para avanzar en la construcción de un gobierno más cercano y 100% al servicio de los ciudadanos ha sido facilitar la realización de trámites, lo cual ha alcanzado un importante avance con ChileAtiende, al registrar más de un millón de atenciones mensuales a julio de este año.\n\nEl desafío actual consiste en continuar simplificando la vida de las personas. Esto, con el compromiso de las instituciones públicas y la participación de los ciudadanos, para desarrollar en conjunto servicios que se adapten a sus necesidades y condiciones de vida y así avanzar mediante la tecnología actualmente disponible en desburocratizar el Estado y avanzar hacia un Chile sin papeleo.&nbsp;</div><div><b>¿Qué beneficios tiene la simplificación y digitalización?</b>&nbsp;</div><div>La simplificación y digitalización de trámites tiene enormes beneficios para las instituciones y nos permite avanzar hacia el objetivo de simplificar la vida de las personas y acercando el estado a los ciudadanos.</div><div>Beneficios para las instituciones&nbsp;</div><div><ul><li>Trámites más simples requieren menos carga de trabajo para los funcionarios pues se evitan pasos innecesarios o procesamientos engorrosos</li><li>Acorta los tiempos de procesamiento&nbsp;</li><li>Simplifica el manejo de información evitando documentación en papel en grandes archivadores&nbsp;</li><li>Menos gasto en papeles e impresiones&nbsp;</li></ul>Beneficios para los ciudadanos&nbsp;</div><div><ul><li>Menos o ningún papel que presentar&nbsp;</li><li>Posibilidad de realizar trámites desde la casa o la oficina sin necesidad de trasladarse a una oficina de la institución&nbsp;</li><li>Claridad de en que estado está el trámite y cuales son los plazos que la institución tiene para entregar una resolución&nbsp;</li><li>Trámites más rápidos&nbsp;</li></ul><b>¿Hacia donde queremos llegar con esta campaña?&nbsp;</b></div><div>&nbsp;Actualmente,  el portal de servicios del Estado ChileAtiende cuenta con información de 1.950 trámites, de un total de alrededor de 2.500 con que cuenta el Estado en su totalidad, tanto para ciudadanos como para empresas. Entre estos, sólo un 25% de ellos se encuentra total o parcialmente en línea, mientras que el 75% restante requiere ser realizado presencialmente en oficinas de alguna institución del Estado.&nbsp;</div><div>&nbsp;En este escenario, la iniciativa Chile sin Papeleo está enfocada a simplificar y digitalizar aquellos trámites más usados por los ciudadanos y que aún son realizados presencialmente. Adicionalmente, se busca simplificar los requerimientos de antecedentes, utilizando los recursos de interoperabilidad del Estado disponibles, para evitar que se solicite la presentación de documentos que previamente han sido emitidos por otra institución de la Administración Pública (de acuerdo a lo señalado en la Ley 19.880)&nbsp;</div><div>&nbsp;En esta campaña, el compromiso de las instituciones durante este 2012 de digitalizar uno de sus trámites permitirá avanzar en la digitalización de un 5% del total de procedimientos del Estado, alcanzando el 30% del total de trámites existentes.&nbsp;</div><div>Para la segunda etapa a desarrollarse el 2013, con el aporte de los ciudadanos y el compromiso de las instituciones se espera a de año, contar con un total de 60% de los trámites digitalizados a disposición de la ciudadanía.&nbsp;</div><div>En este sentido, para apoyar a las instituciones en el cumplimiento de su compromiso, MINSEGPRES ha preparado este documento de apoyo técnico, como una guía simple de como simplificar y digitalizar los trámites comprometidos.&nbsp;</div><div>Adicionalmente, en el sitio de la campaña&nbsp;<a href=\"http://www.chilesinpapeleo.cl\">www.chilesinpapeleo.cl</a>, en el acceso a instituciones, se les facilitarán herramientas como un software para digitalización de trámites, el sistema de autenticación digital ciudadana (ClaveÚnica) y un formulario de contacto donde podrán canalizar sus consultas y solicitar apoyo en el proceso de digitalización.<br></div>'),(4,'Prueba','prueba',0,'<p>Un procedimiento administrativo del Estado, usualmente conocido como <strong>trámite,</strong> es una sucesión de acciones o tareas vinculados entre sí, producidos por una Institución Pública o por particulares interesados, que son de interés para los ciudadanos.</p>\n\n<p>Un trámite tendrá entonces elementos clave que deben ser identificados si pensamos en mejorarlo, estos son: </p>\n\n<ul>\n	<li>Un ciudadano interesado en que este procedimiento se realice.</li>\n	<li>Información de entrada, que puede ser provista por el ciudadano, solicitada a otras instituciones o interna a la institución que entrega el trámite. Y,</li>\n	<li>Un resultado que es lo que busca el ciudadano. Este puede ser la obtención de un beneficio, un documento que certifique alguna información que esté en poder de la institución, u otro.</li>\n</ul>\n<p>El trámite podemos entenderlo como proceso, donde las tareas se siguen unas a otras, teniendo cada una un objetivo, un responsable y un resultado. </p>\n\n<p>Entendemos que un trámite es digital, desde el punto de vista del ciudadano, cuando este no requiere presentarse en una oficina ni entregar documentación física para completarlo. Los niveles de digitalización están descritos en el capitulo anterior.</p>\n\n<p>Los procesos podemos diagramarlos, indicando en un mismo diagrama cuales son las tareas, cómo se vinculan y quien es el responsable en cada caso, para eso usamos los siguientes elementos:</p>\n\n<table class=\"table table-bordered\">\n<tbody></tbody>\n\n\n<thead>\n	<tr>\n<th>Elemento</th>\n\n<th>Forma</th>\n\n<th>Descripción</th>\n	</tr>\n</thead>\n\n<tbody>\n	<tr>\n		<td>Tarea</td>\n\n		<td class=\"\" align=\"center\"><img alt=\"botón tarea\" src=\"/./assets/img/1.png\"></td>\n\n		<td>\n<p>Una tarea es una acción que desarrolla una persona, ya sea un ciudadano o un funcionario de una institución pública.</p>\n\n<p>Las tareas pueden ser, por ejemplo, completar un formulario con datos, entregar documentos a otra persona, actualizar información en un sistema, validar información, aceptar o rechazar una solicitud, emitir una resolución, entre otras.</p>\n\n<p>En cada trámite se debe distinguir cual es la tarea inicial, que da origen al proceso, y cuál es la tarea final, con la cual damos por concluido el trámite.</p>\n</td>\n	</tr>\n\n	<tr>\n		<td>Conexión secuencial entre tareas</td>\n\n		<td class=\"\" align=\"center\"><img alt=\"conexion secuencial\" src=\"/./assets/img/2.png\"></td>\n\n		<td>\n<p>Las tareas en un proceso deben estar vinculadas, cada vez que una tarea es terminada, está da inicio a una o más tareas siguientes.</p>\n\n<p>La conexión secuencial entre tareas indica que es necesario terminar una tarea para comenzar otra.</p>\n</td>\n	</tr>\n\n	<tr>\n		<td>Conexión entre tareas por evaluación</td>\n\n		<td class=\"\" align=\"center\"><img alt=\"conexion entre tareas\" src=\"/./assets/img/3.png\"></td>\n\n		<td class=\"\">\n<p>En este caso, la conexión indica que debe existir una evaluación o condición a partir de la cual se determina cual es la tarea sucesora, puede ser una o la otra dependiendo de la condición establecida.</p>\n</td>\n	</tr>\n\n	<tr>\n		<td>Conexión entre tareas paralelas</td>\n\n		<td class=\"\" align=\"center\"><img alt=\"conexion entre tareas paralelas\" src=\"/./assets/img/4.png\"></td>\n\n		<td>\n<p>En este caso, la conexión señala que después de completada la primera tarea, las dos tareas siguientes deben ser desarrolladas de forma simultanea</p>\n</td>\n	</tr>\n\n	<tr>\n		<td>Conexión paralela con evaluación</td>\n\n		<td class=\"\" align=\"center\"><img alt=\"conexion paralela con evaluacion\" src=\"/./assets/img/5.png\"></td>\n\n		<td>\n<p>En este caso, se utiliza una condición para decidir a donde continúa el flujo hacia dos o más tareas en paralelo </p>\n</td>\n	</tr>\n\n	<tr>\n		<td>Conexión de unión</td>\n\n		<td class=\"\" align=\"center\"><img alt=\"conexion de union\" src=\"/./assets/img/6.png\"></td>\n\n		<td>\n<p>Esta conexión indica que para que el flujo continúe, las múltiples tareas que se están ejecutando en paralelo deben finalizar. Ej. Se envía una aprobación en paralelo a distintas áreas, y mediante la unión, tú puedes definir que para que avance a la próxima tarea solo si se completan todas las aprobaciones que se enviaron en paralelo anteriormente </p>\n</td>\n	</tr>\n</tbody>\n</table>\n\n<p>Con estos elementos podremos representar cualquier Procedimiento Administrativo o trámite, ya sea cómo se ejecuta actualmente o bien la forma en que nos gustaría que éste fuera.</p>\n\n<p>Para conocer un trámite no basta con entender cuáles son las tareas y responsables, necesitaremos también recolectar información que nos permitirá posteriormente detectar cuales son los problemas de ese procedimiento y como mejorarlo.</p>\n\n<p>La información que necesitamos recolectar debe responder a las siguientes preguntas:</p>\n<h3>a) Como y quien inicia el trámite</h3>\n\n<ul>\n	<li>¿Lo comienza el ciudadano o se gatilla internamente? </li>\n	<li>¿Lo realiza presencialmente o por otro canal?</li>\n	<li>¿Lo realiza personalmente el interesado o un tercero?</li>\n</ul><h3>b) Que información es relevante para realizarlo </h3>\n\n<ul>\n	<li>¿Qué documentos necesito?</li>\n	<li>¿Y qué dato específico requiero de cada documento?</li>\n	<li>¿Quién provee esa información (Institución Pública/Privada)?&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </li>\n	<li>¿Existe confidencialidad de la información?</li>\n	<li>¿Cómo se obtiene?</li>\n</ul><h3>c) Estados y sub-estados del trámite </h3>\n\n<p>Entendemos por Estado, las grandes etapas del proceso que es relevante para el ciudadano identificar, por ejemplo, Antecedentes Recepcionados, En evaluación, En espera de Resolución.</p>\n\n<p>Entendemos por sub-estados, el detalle de las etapas de un trámite, que es relevante para la gestión de la institución, señala en que tarea se encuentra el trámite.</p>\n<h3>d) Disponibilidad de esta información para el ciudadano</h3>\n\n<p>¿Qué información del trámite no debiera estar disponible para el ciudadano de acuerdo a restricciones legales? Entendemos que si no existen restricciones legales, toda la información debería estar disponible al ciudadano en caso de que éste la requiera.</p>\n<h3>e) ¿Cómo se cierra el trámite?</h3>\n\n<p>¿Cuál es la tarea terminal? </p>\n\n<p>¿Cómo se comunica al ciudadano la resolución de su trámite?</p>\n\n<p>Se verifica la conformidad del ciudadano con,</p>\n\n<ul>\n	<li>El resultado de trámite</li>\n	<li>El procedimiento mediante el cual se realizó el trámite</li>\n	<li>La interacción con las personas durante la tramitación</li>\n	<li>La interacción con sistemas de información durante la tramitación</li>\n</ul>\n<p>Con esta información, más un diagrama del proceso, podemos sentarnos a revisar y diagnosticar nuestro trámite para resolver cómo podemos mejorarlo. Para eso, la ley establece el <em>cómo</em> debería ser un trámite y cuáles son los <em>derechos de los ciudadanos</em> en este proceso.</p>');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(128) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_index` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'pcanales','204d701dc179c10c6264d44e9219691d38020905:c9cac421c266eae9f6c425a5afb363fdde926dd9','Pablo Canales Hernández',1),(2,'admin','4249bf66250672b966062b03b00962e13cbee9bf:a3e08cd9937199fe54d19e5d60b3548d337e2c3b','Administrator',1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `webforms`
--

DROP TABLE IF EXISTS `webforms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webforms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `campo` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `webforms`
--

LOCK TABLES `webforms` WRITE;
/*!40000 ALTER TABLE `webforms` DISABLE KEYS */;
/*!40000 ALTER TABLE `webforms` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-09-04 15:36:34
