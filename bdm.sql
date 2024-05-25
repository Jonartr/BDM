-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-05-2024 a las 09:36:58
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdm`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `ABCategoria` (IN `_Nombre` VARCHAR(100), IN `_Descripcion` VARCHAR(255), IN `_Correo` VARCHAR(100), IN `_Opcion` INT, IN `_IDCAT` INT)   BEGIN 
   
  IF _Opcion = 1 THEN

      INSERT INTO categorias(Nombre, Descripcion, Correo) VALUES (_Nombre, _Descripcion, _Correo);

  END IF;

  IF _Opcion = 2 THEN 

      UPDATE categorias set Nombre = _Nombre, Descripcion = _Descripcion WHERE ID_Cat = _IDCAT;

  END IF;

  IF _Opcion = 3 THEN 

      DELETE FROM categorias WHERE ID_Cat = _IDCAT;

  END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ABCListas` (IN `_Nombre` VARCHAR(100), IN `_Descripcion` VARCHAR(255), IN `_Privacidad` INT, IN `_Imagen` MEDIUMBLOB, IN `_Correo` VARCHAR(255), IN `_Opcion` INT, IN `_ID` INT)   BEGIN 

	IF _Opcion = 1 THEN
    
    INSERT INTO listas (Nombre, Descripcion, Privacidad, Imagen, Correo)VALUES (_Nombre, _Descripcion,_Privacidad, _Imagen,_Correo);
    
    END IF;
    
	IF _Opcion = 2 THEN
    	
    UPDATE listas set Nombre = _Nombre, Descripcion = _Descripcion, Privacidad = _Privacidad, Imagen = _Imagen WHERE ID_Lista = _ID ;
      
    END IF;
    
    IF _Opcion = 3 THEN 
    
    UPDATE listas set Estatus = 0 WHERE ID_Lista = _ID;
    
    END IF;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ABCProductos` (IN `_Nombre` VARCHAR(100), IN `_Descripcion` VARCHAR(255), IN `_Imagen_1` MEDIUMBLOB, IN `_Imagen_2` MEDIUMBLOB, IN `_Imagen_3` MEDIUMBLOB, IN `_Video` LONGBLOB, IN `_TipoVenta` INT, IN `_Precio` FLOAT, IN `_Existencias` INT, IN `_Valoracion` INT, IN `_Categoria` INT, IN `_Correo` VARCHAR(100), IN `_Opcion` INT, IN `_Codigo` INT, IN `_Lista` INT)   BEGIN

     IF _Opcion = 1 THEN 
         
        INSERT INTO producto(Nombre, Descripcion, Imagen_1, Imagen_2, Imagen_3, Video, TipoVenta, Precio, Existencias, Valoracion, 
        Categoria, Usuario,Estatus, Aprobacion) VALUES (_Nombre, _Descripcion,_Imagen_1, _Imagen_2,_Imagen_3, _Video,_TipoVenta, _Precio
                                                       ,_Existencias, _Valoracion,_Categoria, _Correo, 0, 0);        

     END IF;

     IF _Opcion = 2 THEN
       UPDATE producto set Nombre = _Nombre, Descripcion = _Descripcion, Imagen_1 = _Imagen_1, Imagen_2 = _Imagen_2, Imagen_3 = _Imagen_3,
       Video = _Video, TipoVenta = _TipoVenta, Valoracion = _Valoracion, Categoria = _Categoria WHERE Codigo = _Codigo;

     END IF;


     IF _Opcion = 3 THEN 
     
        UPDATE producto set Estatus = 0 WHERE Codigo = _Codigo;     

     END IF;

     IF _Opcion = 4 THEN 
 
     UPDATE producto set Lista = _Lista WHERE Codigo = _Codigo;    
 
     END IF;
     
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ABCUsuario` (IN `Email` VARCHAR(100), IN `Usuario` VARCHAR(30), IN `_Contrasena` VARCHAR(30), IN `Rol` INT, IN `Imagen` MEDIUMBLOB, IN `_Nombre` VARCHAR(100), IN `Nacimiento` DATE, IN `Sexo` INT, IN `Privacidad` INT, IN `Opcion` INT)   BEGIN 

IF Opcion = 1 THEN
    INSERT INTO usuarios VALUES (Email, Usuario, _Contrasena, Rol, Imagen, CURRENT_TIMESTAMP, NULL ,1,Privacidad);
    INSERT INTO datospersonales (Nombre, FechaNacimiento, Sexo, Correo) VALUES (_Nombre, Nacimiento, Sexo, Email);
END IF;

     
IF Opcion = 2 THEN 
    	UPDATE usuarios set Imagen = Foto where Correo = Email;
        UPDATE datospersonales set Nombre = _Nombre, FechaNacimiento = Nacimiento where Correo = Email;
END IF;

IF  Opcion = 3 THEN
    
  	  DELETE FROM usuarios WHERE Correo = Email;
    
END IF;
    
IF  Opcion = 4 THEN

    UPDATE usuarios set Contrasena = _Contrasena where Correo = Email;
    
END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertarVenta` (IN `_CantidadVenta` DOUBLE, IN `_TotalVenta` DOUBLE, IN `_Categoria` INT, IN `_Codigo` INT, IN `_Correo` VARCHAR(100), IN `_Comprador` VARCHAR(100), IN `_Nombre` VARCHAR(100), IN `_Precio` DOUBLE, IN `_TotalProducto` DOUBLE)   BEGIN

INSERT INTO venta (FechaVenta, CantidadVenta, TotalVenta, IDCat, Codigo, Correo, Comprador) VALUES (NOW(), _CantidadVenta, _TotalVenta,_Categoria ,_Codigo, _Correo, _Comprador);


INSERT INTO Historial (Codigo, Nombre, Precio, CantidadComprada, Total, FechaCompra, Usuario)
VALUES(_Codigo, _Nombre,_Precio,_CantidadVenta, _TotalProducto, NOW(),_Comprador);

UPDATE Historial 
SET Imagen = (SELECT Imagen_1 FROM producto WHERE Codigo = _Codigo)
WHERE Codigo = _Codigo;


UPDATE venta SET Imagen = (SELECT Imagen_1 FROM producto WHERE Codigo = _Codigo) WHERE Codigo = _Codigo;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Mensajeria` (IN `_Mensaje` TEXT, IN `_Remitente` VARCHAR(100), IN `_Emisor` VARCHAR(100), IN `_Codigo` INT)   BEGIN

INSERT INTO Chat(Mensaje, Emisor, Remitente, Fecha, Codigo) VALUES (_Mensaje, _Remitente, _Emisor, now(), _Codigo);

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `aprobaciones`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `aprobaciones` (
`Codigo` int(11)
,`Nombre` varchar(60)
,`Descripcion` varchar(255)
,`Precio` float
,`Imagen_1` mediumblob
,`Usuario` varchar(100)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `ID_Cat` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL COMMENT 'Nombre de la categoria',
  `Descripcion` varchar(255) DEFAULT NULL COMMENT 'Detalles de la categoria',
  `Correo` varchar(100) DEFAULT NULL COMMENT 'Usuario quien la creo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`ID_Cat`, `Nombre`, `Descripcion`, `Correo`) VALUES
(2, 'Mangas', 'Comics japoneses onichan uwu', 'rickijtr@hotmail.com'),
(4, 'Electronica', 'Productos tecnologicos', 'rickijtr@hotmail.com'),
(6, 'Alola', 'adaadasdas', 'rickijtr@hotmail.com'),
(7, 'Videojuegos', 'Videojuegos que me gustan ', 'rickimd54@gmail.com'),
(8, 'Ropa', 'Vestimenta', 'rickimd54@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat`
--

CREATE TABLE `chat` (
  `IDChat` int(11) NOT NULL,
  `Mensaje` varchar(255) DEFAULT NULL COMMENT 'Datos de comunicacion ',
  `Fecha` datetime DEFAULT NULL COMMENT 'Dia que se envio el mensaje',
  `Emisor` varchar(100) DEFAULT NULL COMMENT 'Quien envia el mensaje',
  `Remitente` varchar(100) DEFAULT NULL COMMENT 'Quien recibe el mensaje',
  `Codigo` int(11) NOT NULL COMMENT 'Producto al que pertenece el chat'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `chat`
--

INSERT INTO `chat` (`IDChat`, `Mensaje`, `Fecha`, `Emisor`, `Remitente`, `Codigo`) VALUES
(6, 'Buenas', '2024-05-21 16:20:00', 'rickijtr@hotmail.com', 'rickimd54@gmail.com', 14),
(7, 'Aloha', '2024-05-21 16:20:36', 'rickimd54@gmail.com', 'rickijtr@hotmail.com', 14),
(8, 'Quibo', '2024-05-21 16:23:05', 'rickimd54@gmail.com', 'rickijtr@hotmail.com', 14),
(9, 'Quibo', '2024-05-21 16:23:13', 'rickimd54@gmail.com', 'rickijtr@hotmail.com', 14),
(10, 'Llora y llora y mueve sus manitas', '2024-05-21 17:09:55', 'rickimd54@gmail.com', 'rickijtr@hotmail.com', 14),
(11, 'America ya :D', '2024-05-21 21:23:31', 'rickimd54@gmail.com', 'rickijtr@hotmail.com', 14),
(12, 'Hallo :D', '2024-05-21 22:28:22', 'rickijtr@hotmail.com', 'rickimd54@gmail.com', 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `ID_Comentario` int(11) NOT NULL,
  `Comentario` varchar(255) DEFAULT NULL,
  `Usuario` varchar(100) DEFAULT NULL,
  `Producto` int(11) DEFAULT NULL,
  `Calificacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion`
--

CREATE TABLE `cotizacion` (
  `ID_Coty` int(11) NOT NULL,
  `Usuario` varchar(100) DEFAULT NULL,
  `Comprador` varchar(100) NOT NULL,
  `Codigo` int(11) DEFAULT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Detalles` text DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `Total` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datospersonales`
--

CREATE TABLE `datospersonales` (
  `IDPersona` int(11) NOT NULL,
  `Nombre` varchar(255) DEFAULT NULL COMMENT 'Nombre del usuario',
  `FechaNacimiento` date DEFAULT NULL COMMENT 'Cumpleaños de la persona',
  `Sexo` int(11) DEFAULT NULL COMMENT 'Sexo del usuario',
  `Correo` varchar(100) DEFAULT NULL COMMENT 'Correo del usuario a quien le pertenecen los datos'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `datospersonales`
--

INSERT INTO `datospersonales` (`IDPersona`, `Nombre`, `FechaNacimiento`, `Sexo`, `Correo`) VALUES
(2, 'Jonathan Torres', '2024-03-31', 1, 'rickijtr@hotmail.com'),
(12, 'Jorge Salas', '1999-05-05', 1, 'rickimd54@gmail.com'),
(14, 'Ricardo Rivera', '1999-07-04', 1, 'hola@hola.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `ID_Historial` int(11) NOT NULL,
  `Codigo` int(11) DEFAULT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Imagen` mediumblob NOT NULL,
  `Precio` float DEFAULT NULL,
  `CantidadComprada` int(11) DEFAULT NULL,
  `Calificacion` int(11) NOT NULL,
  `Total` float DEFAULT NULL,
  `FechaCompra` datetime DEFAULT NULL,
  `Usuario` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`ID_Historial`, `Codigo`, `Nombre`, `Imagen`, `Precio`, `CantidadComprada`, `Calificacion`, `Total`, `FechaCompra`, `Usuario`) VALUES
(1, 2, 'Monas chinas', 0x39643237636438312d633831352d346165622d386235352d3164663236643565363361652e6a7067, 19.99, 3, 0, 779.97, '2024-05-24 21:49:10', 'rickijtr@hotmail.com'),
(2, 6, 'Magas', 0x3433343131383134335f373732333230373134373730333638305f353530383539313535323536373437373738365f6e2e6a7067, 180, 4, 0, 779.97, '2024-05-24 21:49:10', 'rickijtr@hotmail.com'),
(7, 2, 'Monas chinas', 0x39643237636438312d633831352d346165622d386235352d3164663236643565363361652e6a7067, 19.99, 3, 0, 0, '2024-05-24 21:49:10', 'rickimd54@gmail.com'),
(8, 2, 'Monas chinas', 0x39643237636438312d633831352d346165622d386235352d3164663236643565363361652e6a7067, 19.99, 3, 0, 0, '2024-05-24 21:49:10', 'rickimd54@gmail.com'),
(9, 2, 'Monas chinas', 0x39643237636438312d633831352d346165622d386235352d3164663236643565363361652e6a7067, 19.99, 1, 0, 19.99, '2024-05-24 21:49:10', 'rickimd54@gmail.com'),
(15, 6, 'Magas', 0x3433343131383134335f373732333230373134373730333638305f353530383539313535323536373437373738365f6e2e6a7067, 180, 3, 0, 540, '2024-05-24 22:08:04', 'rickimd54@gmail.com'),
(16, 6, 'Magas', 0x3433343131383134335f373732333230373134373730333638305f353530383539313535323536373437373738365f6e2e6a7067, 180, 3, 0, 180, '2024-05-24 00:00:00', 'rickimd54@gmail.com'),
(20, 6, 'Magas', 0x3433343131383134335f373732333230373134373730333638305f353530383539313535323536373437373738365f6e2e6a7067, 180, 2, 0, 180, '2024-05-25 00:35:56', 'rickimd54@gmail.com'),
(21, 6, 'Magas', 0x3433343131383134335f373732333230373134373730333638305f353530383539313535323536373437373738365f6e2e6a7067, 180, 2, 0, 180, '2024-05-25 00:58:13', 'rickimd54@gmail.com'),
(22, 2, 'Monas chinas', 0x39643237636438312d633831352d346165622d386235352d3164663236643565363361652e6a7067, 19.99, 3, 0, 59.97, '2024-05-25 01:00:59', 'rickimd54@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listas`
--

CREATE TABLE `listas` (
  `ID_Lista` int(11) NOT NULL COMMENT 'Clave de la lista',
  `Nombre` varchar(100) DEFAULT NULL COMMENT 'Nombre de la lista',
  `Descripcion` varchar(100) DEFAULT NULL COMMENT 'Detalles de la lista',
  `Privacidad` int(11) NOT NULL,
  `Imagen` mediumblob NOT NULL,
  `Estatus` int(11) NOT NULL,
  `Usuario` varchar(100) DEFAULT NULL COMMENT 'Usuario al cual le pertenece la lista'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `listas`
--

INSERT INTO `listas` (`ID_Lista`, `Nombre`, `Descripcion`, `Privacidad`, `Imagen`, `Estatus`, `Usuario`) VALUES
(2, 'Videojuegos', 'Videojuegos que me gustan ', 1, 0x3433383234323030395f3832383338383938323530303236355f3535363838313233353439303234313433355f6e2e6a7067, 0, 'rickijtr@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `Codigo` int(11) NOT NULL,
  `Nombre` varchar(60) DEFAULT NULL,
  `Descripcion` varchar(255) DEFAULT NULL,
  `Imagen_1` mediumblob DEFAULT NULL,
  `Imagen_2` mediumblob DEFAULT NULL,
  `Imagen_3` mediumblob DEFAULT NULL,
  `Video` longblob DEFAULT NULL,
  `TipoVenta` int(11) DEFAULT NULL,
  `Precio` float DEFAULT NULL,
  `Existencias` int(11) DEFAULT NULL,
  `Valoracion` int(11) DEFAULT NULL,
  `Categoria` int(11) DEFAULT NULL,
  `Lista` int(11) NOT NULL,
  `Estatus` int(11) NOT NULL COMMENT 'Si esta activo el producto',
  `Aprobacion` int(11) NOT NULL COMMENT 'Si se aprobo el producto',
  `Usuario` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`Codigo`, `Nombre`, `Descripcion`, `Imagen_1`, `Imagen_2`, `Imagen_3`, `Video`, `TipoVenta`, `Precio`, `Existencias`, `Valoracion`, `Categoria`, `Lista`, `Estatus`, `Aprobacion`, `Usuario`) VALUES
(2, 'Monas chinas', 'Monas japonesas', 0x39643237636438312d633831352d346165622d386235352d3164663236643565363361652e6a7067, 0x3237393139333237335f313032303239343438383630313130365f323234333135393137343936373834333037335f6e2e6a7067, 0x3330353132313932355f323031383838353139343936353630355f373132373039363239353533363635393237305f6e2e6a7067, 0x5175652c207175652c7175652c207175652c20766572676173c2a1c2a1204e616e695f204d656d652048442d31303830705f36306670732e6d7034, 1, 19.99, 41, 0, 2, 2, 1, 1, 'rickijtr@hotmail.com'),
(6, 'Magas', 'Pues magas que mas jsjsjs', 0x3433343131383134335f373732333230373134373730333638305f353530383539313535323536373437373738365f6e2e6a7067, 0x3331303830393535385f3737383736333935333431333532335f373036383430353238383031393735313432365f6e2e6a7067, 0x3332353936343937345f3837333138383132303539313632375f323035333635313639323933373535383638365f6e2e6a7067, 0x766964656f706c61796261636b2e6d7034, 1, 180, 46, 0, 4, 0, 1, 1, 'rickijtr@hotmail.com'),
(13, 'Taranis', 'Tanque con niños furros y un cañon que mata a quien pongas como sacrificio', 0x46554741325f45786f2d546172616e69732e6a7067, 0x696d616765732e6a7067, 0x546172616e69732e6a7067, 0x536f756c2043616e6e6f6e2026204d616e616761726d202d2053797374656d202346756761322023467567614d656c6f646965734f66537465656c322e6d7034, 1, 20000, 100, 0, 4, 0, 1, 1, 'rickijtr@hotmail.com'),
(14, 'Producto shido', 'Shido', 0x3334313039363436385f3935333436323834363030393734395f3633333136313033393031343939313431315f6e2e6a7067, 0x3237333138303238355f3635373438323731353637343634375f383839393334363335333231363538393239375f6e2e6a7067, 0x3238313235333632375f31303232363833323032383439373338385f353937353639323630373935353137323434335f6e2e6a7067, 0x466f72746e697465202020323032332d31322d32362032322d32372d34352e6d7034, 2, 150, 30, 0, 2, 0, 1, 1, 'rickijtr@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `IdRol` int(11) NOT NULL COMMENT 'Clave del rol',
  `Nombre` varchar(50) DEFAULT NULL COMMENT 'Descripcion del rol'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`IdRol`, `Nombre`) VALUES
(1, 'Vendedor'),
(2, 'Comprador'),
(3, 'Administrador'),
(4, 'Comprador - Privado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Correo` varchar(100) NOT NULL COMMENT 'Correo electronico del usuario',
  `NombreUsuario` varchar(30) DEFAULT NULL COMMENT 'Apodo del usuario(unico)',
  `Contrasena` varchar(30) DEFAULT NULL COMMENT 'Contraseña para inicio de sesion',
  `Rol` int(11) DEFAULT NULL COMMENT 'Rol del usuario(mas detalles en Tabla roles)',
  `Imagen` blob DEFAULT NULL COMMENT 'Foto de perfil del usuario',
  `FechaRegistro` datetime DEFAULT NULL COMMENT 'Dia que se registro el usuario',
  `FechaBaja` datetime DEFAULT NULL COMMENT 'Dia que se da de baja el usuario(No se elimina solo cambia estatus)',
  `Estatus` int(11) DEFAULT NULL COMMENT 'Validar si la cuenta esta activa o inactiva',
  `Privacidad` int(11) NOT NULL COMMENT 'Permite si mostrar todos los datos personales de la cuenta'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Correo`, `NombreUsuario`, `Contrasena`, `Rol`, `Imagen`, `FechaRegistro`, `FechaBaja`, `Estatus`, `Privacidad`) VALUES
('hola@hola.com', 'Wiwichi', 'Adios5678**', 3, 0x363635313831343338386635382e6a7067, '2024-05-25 00:12:19', NULL, 1, 1),
('rickijtr@hotmail.com', 'Geno', 'Hola1234**', 1, 0x3331303830393535385f3737383736333935333431333532335f373036383430353238383031393735313432365f6e2e6a7067, '2024-04-21 23:50:21', NULL, 1, 1),
('rickimd54@gmail.com', 'Skadi', 'Hola1234**', 2, 0x363634633530303337383862632e6a7067, '2024-05-21 01:40:51', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `IDVenta` int(11) NOT NULL COMMENT 'Identificacion numero de venta',
  `FechaVenta` datetime DEFAULT NULL COMMENT 'Dia de la venta de los productos',
  `CantidadVenta` int(11) DEFAULT NULL COMMENT 'Total de productos vendidos',
  `TotalVenta` float DEFAULT NULL COMMENT 'Precio del total de la venta',
  `Imagen` mediumblob NOT NULL,
  `IDCat` int(11) DEFAULT NULL COMMENT 'Categoria creada por usuario',
  `Codigo` int(11) DEFAULT NULL COMMENT 'Codigo del producto',
  `Correo` varchar(100) DEFAULT NULL COMMENT 'Vendedor',
  `Comprador` varchar(100) NOT NULL COMMENT 'Cliente que compro'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`IDVenta`, `FechaVenta`, `CantidadVenta`, `TotalVenta`, `Imagen`, `IDCat`, `Codigo`, `Correo`, `Comprador`) VALUES
(1, '2024-05-22 12:25:52', 3, 599.97, 0x39643237636438312d633831352d346165622d386235352d3164663236643565363361652e6a7067, 2, 2, 'rickijtr@hotmail.com', ''),
(2, '2024-05-22 12:25:52', 3, 599.97, 0x3433343131383134335f373732333230373134373730333638305f353530383539313535323536373437373738365f6e2e6a7067, 4, 6, 'rickijtr@hotmail.com', ''),
(3, '2024-05-22 12:48:49', 3, 779.97, 0x39643237636438312d633831352d346165622d386235352d3164663236643565363361652e6a7067, 2, 2, 'rickijtr@hotmail.com', ''),
(4, '2024-05-22 12:48:49', 4, 779.97, 0x3433343131383134335f373732333230373134373730333638305f353530383539313535323536373437373738365f6e2e6a7067, 4, 6, 'rickijtr@hotmail.com', ''),
(7, '2024-05-22 13:17:06', 3, 779.97, 0x39643237636438312d633831352d346165622d386235352d3164663236643565363361652e6a7067, 2, 2, 'rickijtr@hotmail.com', ''),
(8, '2024-05-22 13:17:06', 4, 779.97, 0x3433343131383134335f373732333230373134373730333638305f353530383539313535323536373437373738365f6e2e6a7067, 4, 6, 'rickijtr@hotmail.com', ''),
(14, '2024-05-24 13:22:44', 3, 59.97, 0x39643237636438312d633831352d346165622d386235352d3164663236643565363361652e6a7067, 2, 2, 'rickijtr@hotmail.com', ''),
(15, '2024-05-24 15:40:47', 3, 59.97, 0x39643237636438312d633831352d346165622d386235352d3164663236643565363361652e6a7067, 2, 2, 'rickijtr@hotmail.com', 'rickimd54@gmail.com'),
(16, '2024-05-24 15:41:13', 3, 59.97, 0x39643237636438312d633831352d346165622d386235352d3164663236643565363361652e6a7067, 2, 2, 'rickijtr@hotmail.com', 'rickimd54@gmail.com'),
(17, '2024-05-24 15:57:52', 3, 59.97, 0x39643237636438312d633831352d346165622d386235352d3164663236643565363361652e6a7067, 2, 2, 'rickijtr@hotmail.com', 'rickimd54@gmail.com'),
(18, '2024-05-24 16:04:42', 1, 59.97, 0x39643237636438312d633831352d346165622d386235352d3164663236643565363361652e6a7067, 2, 2, 'rickijtr@hotmail.com', 'rickimd54@gmail.com'),
(19, '2024-05-24 22:08:04', 3, 540, 0x3433343131383134335f373732333230373134373730333638305f353530383539313535323536373437373738365f6e2e6a7067, 4, 6, 'rickijtr@hotmail.com', 'rickimd54@gmail.com'),
(20, '2024-05-24 22:52:29', 3, 540, 0x3433343131383134335f373732333230373134373730333638305f353530383539313535323536373437373738365f6e2e6a7067, 4, 6, 'rickijtr@hotmail.com', 'rickimd54@gmail.com'),
(21, '2024-05-24 23:25:18', 3, 599.97, 0x3433343131383134335f373732333230373134373730333638305f353530383539313535323536373437373738365f6e2e6a7067, 4, 6, 'rickijtr@hotmail.com', 'rickimd54@gmail.com'),
(22, '2024-05-24 23:25:19', 3, 599.97, 0x39643237636438312d633831352d346165622d386235352d3164663236643565363361652e6a7067, 2, 2, 'rickijtr@hotmail.com', 'rickimd54@gmail.com'),
(23, '2024-05-24 23:27:18', 1, 599.97, 0x3433343131383134335f373732333230373134373730333638305f353530383539313535323536373437373738365f6e2e6a7067, 4, 6, 'rickijtr@hotmail.com', 'rickimd54@gmail.com'),
(24, '2024-05-25 00:35:56', 2, 360, 0x3433343131383134335f373732333230373134373730333638305f353530383539313535323536373437373738365f6e2e6a7067, 4, 6, 'rickijtr@hotmail.com', 'rickimd54@gmail.com'),
(25, '2024-05-25 00:58:13', 2, 360, 0x3433343131383134335f373732333230373134373730333638305f353530383539313535323536373437373738365f6e2e6a7067, 4, 6, 'rickijtr@hotmail.com', 'rickimd54@gmail.com'),
(26, '2024-05-25 01:00:59', 3, 59.97, 0x39643237636438312d633831352d346165622d386235352d3164663236643565363361652e6a7067, 2, 2, 'rickijtr@hotmail.com', 'rickimd54@gmail.com');

--
-- Disparadores `venta`
--
DELIMITER $$
CREATE TRIGGER `ActualizarExistencia` AFTER INSERT ON `venta` FOR EACH ROW BEGIN
    -- Actualizar la cantidad de existencias en la tabla de productos
    UPDATE producto
    SET Existencias = Existencias - NEW.CantidadVenta
    WHERE Codigo = NEW.Codigo;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `viewcategoria`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `viewcategoria` (
`ID_Cat` int(11)
,`Nombre` varchar(100)
,`Descripcion` varchar(255)
,`Correo` varchar(100)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `aprobaciones`
--
DROP TABLE IF EXISTS `aprobaciones`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `aprobaciones`  AS SELECT `producto`.`Codigo` AS `Codigo`, `producto`.`Nombre` AS `Nombre`, `producto`.`Descripcion` AS `Descripcion`, `producto`.`Precio` AS `Precio`, `producto`.`Imagen_1` AS `Imagen_1`, `producto`.`Usuario` AS `Usuario` FROM `producto` WHERE `producto`.`Aprobacion` = 0 ;

-- --------------------------------------------------------

--
-- Estructura para la vista `viewcategoria`
--
DROP TABLE IF EXISTS `viewcategoria`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewcategoria`  AS SELECT `categorias`.`ID_Cat` AS `ID_Cat`, `categorias`.`Nombre` AS `Nombre`, `categorias`.`Descripcion` AS `Descripcion`, `categorias`.`Correo` AS `Correo` FROM `categorias` ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`ID_Cat`),
  ADD KEY `Correo` (`Correo`);

--
-- Indices de la tabla `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`IDChat`),
  ADD KEY `Emisor` (`Emisor`),
  ADD KEY `Remitente` (`Remitente`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`ID_Comentario`),
  ADD KEY `Usuario` (`Usuario`),
  ADD KEY `Producto` (`Producto`);

--
-- Indices de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  ADD PRIMARY KEY (`ID_Coty`),
  ADD KEY `Codigo` (`Codigo`),
  ADD KEY `Usuario` (`Usuario`),
  ADD KEY `Comprador` (`Comprador`);

--
-- Indices de la tabla `datospersonales`
--
ALTER TABLE `datospersonales`
  ADD PRIMARY KEY (`IDPersona`),
  ADD KEY `Correo` (`Correo`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`ID_Historial`),
  ADD KEY `Codigo` (`Codigo`),
  ADD KEY `Usuario` (`Usuario`);

--
-- Indices de la tabla `listas`
--
ALTER TABLE `listas`
  ADD PRIMARY KEY (`ID_Lista`),
  ADD KEY `Usuario` (`Usuario`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `Categoria` (`Categoria`),
  ADD KEY `Usuario` (`Usuario`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`IdRol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Correo`),
  ADD KEY `Rol` (`Rol`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`IDVenta`),
  ADD KEY `IDCat` (`IDCat`),
  ADD KEY `Codigo` (`Codigo`),
  ADD KEY `Correo` (`Correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `ID_Cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `chat`
--
ALTER TABLE `chat`
  MODIFY `IDChat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `ID_Comentario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  MODIFY `ID_Coty` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `datospersonales`
--
ALTER TABLE `datospersonales`
  MODIFY `IDPersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `ID_Historial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `listas`
--
ALTER TABLE `listas`
  MODIFY `ID_Lista` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave de la lista', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `Codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `IdRol` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave del rol', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `IDVenta` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificacion numero de venta', AUTO_INCREMENT=27;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD CONSTRAINT `categorias_ibfk_1` FOREIGN KEY (`Correo`) REFERENCES `usuarios` (`Correo`);

--
-- Filtros para la tabla `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`Emisor`) REFERENCES `usuarios` (`Correo`),
  ADD CONSTRAINT `chat_ibfk_2` FOREIGN KEY (`Remitente`) REFERENCES `usuarios` (`Correo`);

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`Usuario`) REFERENCES `usuarios` (`Correo`),
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`Producto`) REFERENCES `producto` (`Codigo`);

--
-- Filtros para la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  ADD CONSTRAINT `cotizacion_ibfk_1` FOREIGN KEY (`Codigo`) REFERENCES `producto` (`Codigo`),
  ADD CONSTRAINT `cotizacion_ibfk_2` FOREIGN KEY (`Usuario`) REFERENCES `usuarios` (`Correo`),
  ADD CONSTRAINT `cotizacion_ibfk_3` FOREIGN KEY (`Comprador`) REFERENCES `usuarios` (`Correo`);

--
-- Filtros para la tabla `datospersonales`
--
ALTER TABLE `datospersonales`
  ADD CONSTRAINT `datospersonales_ibfk_1` FOREIGN KEY (`Correo`) REFERENCES `usuarios` (`Correo`);

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `historial_ibfk_1` FOREIGN KEY (`Codigo`) REFERENCES `producto` (`Codigo`),
  ADD CONSTRAINT `historial_ibfk_2` FOREIGN KEY (`Usuario`) REFERENCES `usuarios` (`Correo`);

--
-- Filtros para la tabla `listas`
--
ALTER TABLE `listas`
  ADD CONSTRAINT `listas_ibfk_1` FOREIGN KEY (`Usuario`) REFERENCES `usuarios` (`Correo`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`Categoria`) REFERENCES `categorias` (`ID_Cat`),
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`Usuario`) REFERENCES `usuarios` (`Correo`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`Rol`) REFERENCES `roles` (`IdRol`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`IDCat`) REFERENCES `categorias` (`ID_Cat`),
  ADD CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`Codigo`) REFERENCES `producto` (`Codigo`),
  ADD CONSTRAINT `venta_ibfk_3` FOREIGN KEY (`Correo`) REFERENCES `usuarios` (`Correo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
