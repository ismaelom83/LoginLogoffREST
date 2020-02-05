/**
 * Author:  Ismael Heras
 * Created: 27-nov-2019
 */
-- La contraseña de los usuarios, es el codUsuario concatenado con el password, en este caso paso. [$usuario . $pass]
-- Base de datos a usar
USE DAW209DBproyectoLoginLogoffMulticapaPOO;


-- El tipo de usuario es "usuario" como predeterminado, despues añado un admin --
INSERT INTO T01_Usuarios(T01_CodUsuario, T01_DescUsuario, T01_Password,T01_NumAccesos) VALUES
    ('daniel','Daniel Alcala',SHA2('danielpaso',256),0),
    ('nereaA','Nerea Alvarez',SHA2('nereaApaso',256),0),
    ('miguel','Miguel Aranda',SHA2('miguelpaso',256),0),
    ('alex','Alex Dominguez',SHA2('alexpaso',256),0),
    ('david','David Garcia',SHA2('davidpaso',256),0),
    ('ismael','Ismael Heras',SHA2('ismaelpaso',256),0),
    ('victor','Victor Martinez',SHA2('victorpaso',256),0),
    ('bea','Bea Merino',SHA2('beapaso',256),0),
    ('nereaN','Nerea Nuevo',SHA2('nereaNpaso',256),0),
    ('mateo','Mateo Rivera',SHA2('mateopaso',256),0),
    ('rodrigo','Rodrigo Robles',SHA2('rodrigopaso',256),0),
    ('ruben','Ruben Merino',SHA2('rubenpaso',256),0),
    ('heraclio','Heraclio Bourbujo',SHA2('heracliopaso',256),0),
    ('amor','Amor Rodriguez',SHA2('amorpaso',256),0),
    ('maria','Maria Casado',SHA2('mariapaso',256),0),
    ('antonio','Antonio Janez',SHA2('antoniopaso',256),0);


INSERT INTO `T02_Departamento` (`T02_CodDepartamento`, `T02_DescDepartamento`, `T02_FechaBaja`, `T02_VolumenNegocio`) VALUES
('DAW', 'Despiege de aplicaciones', NULL, 3),
('DWS', 'Entorno servidor', NULL, 123),
('DIW', 'Interfaces WEB', NULL, 1),
('DWC', 'Entorno Cliente', NULL, 1),
('EIE', 'Empresa', NULL, 1);


-- Usuario con el rol admin --
INSERT INTO T01_Usuarios(T01_CodUsuario, T01_DescUsuario, T01_Password,T01_Perfil,T01_NumAccesos) VALUES ('admin','admin',SHA2('adminpaso',256),'administrador',0);

INSERT INTO T03_provincias (id, T03_pid_provincia,T03_pprovincia) VALUES
(1, 2, 'Albacete'),
(2, 3, 'Alicante/Alacant'),
(3, 4, 'Almeria'),
(4, 1, 'Araba/Alava'),
(5, 33, 'Asturias'),
(6, 5, 'Avila'),
(7, 6, 'Badajoz'),
(8, 7, 'Balears, Illes'),
(9, 8, 'Barcelona'),
(10, 48, 'Bizkaia'),
(11, 9, 'Burgos'),
(12, 10, 'Caceres'),
(13, 11, 'Cadiz'),
(14, 39, 'Cantabria'),
(15, 12, 'Castellon/Castello'),
(16, 51, 'Ceuta'),
(17, 13, 'Ciudad Real'),
(18, 14, 'Cordoba'),
(19, 15, 'Coruna'),
(20, 16, 'Cuenca'),
(21, 20, 'Gipuzkoa'),
(22, 17, 'Girona'),
(23, 18, 'Granada'),
(24, 19, 'Guadalajara'),
(25, 21, 'Huelva'),
(26, 22, 'Huesca'),
(27, 23, 'Jaen'),
(28, 24, 'Leon'),
(29, 27, 'Lugo'),
(30, 25, 'Lleida'),
(31, 28, 'Madrid'),
(32, 29, 'Malaga'),
(33, 52, 'Melilla'),
(34, 30, 'Murcia'),
(35, 31, 'Navarra'),
(36, 32, 'Ourense'),
(37, 34, 'Palencia'),
(38, 35, 'Palmas, Las'),
(39, 36, 'Pontevedra'),
(40, 26, 'Rioja, La'),
(41, 37, 'Salamanca'),
(42, 38, 'Santa Cruz de Tenerife'),
(43, 40, 'Segovia'),
(44, 41, 'Sevilla'),
(45, 42, 'Soria'),
(46, 43, 'Tarragona'),
(47, 44, 'Teruel'),
(48, 45, 'Toledo'),
(49, 46, 'Valencia'),
(50, 47, 'Valladolid'),
(51, 49, 'Zamora'),
(52, 50, 'Zaragoza');