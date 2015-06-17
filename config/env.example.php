<?php

/*
|--------------------------------------------------------------------------
| Definicion de Entorno
|--------------------------------------------------------------------------
|
| Variables utiles para definir entorno en la app, usadas como constantes.
|
*/
session_start();
define('ROOT_URL','/ruta-htdocs');
define('ROOT_ADMIN','/ruta-htdocs/admin/');
define('ADMIN_COLOR','skin-red');
define("MYSQL_SERVER","mysql:host=localhost");
define("MYSQL_USER","user");
define("MYSQL_PASS","password");
define("MYSQL_DB","dbname=nombrebasededatos");

?>