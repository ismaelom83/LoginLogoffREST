/**
 
* Author:  Ismael Heras
 * Created: 27-nov-2019
 */
-- Cambiar nombre de la base de datos y el de usuario --
-- ProyectoTema5 || LoginLogoffTema5 || MtoDepartamentosPDOTema5 --

-- Crear base de datos --
    CREATE DATABASE if NOT EXISTS DAW209DBproyectoLoginLogoffMulticapaPOO;
-- Uso de la base de datos. --
    USE DAW209DBproyectoLoginLogoffMulticapaPOO;

-- Crear tablas. --
    CREATE TABLE IF NOT EXISTS T01_Usuarios(
        T01_CodUsuario varchar(15) PRIMARY KEY,
        T01_DescUsuario varchar(250) NOT null,
        T01_Password varchar(64) NOT null,
        T01_Perfil enum('administrador', 'usuario') default 'usuario',
        T01_NumAccesos integer(11) default 0,
        T01_FechaHoraUltimaConexion timestamp 
    );

 CREATE TABLE IF NOT EXISTS T02_Departamento(
        T02_CodDepartamento varchar(3) PRIMARY KEY,
        T02_DescDepartamento varchar(255) NOT null,
        T02_FechaBaja date DEFAULT null, -- Valor por defecto null, ya que cuando lo creas no puede estar de baja logica
        T02_VolumenNegocio float NOT null
    );

-- Crear del usuario --
    CREATE USER IF NOT EXISTS 'usuarioDAW209DBLoginPOO'@'%' identified BY 'paso'; 



-- Dar permisos al usuario --
    GRANT ALL PRIVILEGES ON DAW209DBproyectoLoginLogoffMulticapaPOO.* TO 'usuarioDAW209DBLoginPOO'@'%'; 

-- Hacer el flush privileges, por si acaso --
    FLUSH PRIVILEGES;