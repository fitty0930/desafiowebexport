<?php
require_once "Router.php";
require_once "./api/userroles.api.controller.php";
require_once "./api/roles.api.controller.php";
require_once "./api/usuarios.api.controller.php";

define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
define("LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]). 'login');
define("ROLES", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]). 'roles');
define("HOME", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');



$r = new Router();

$r->addRoute("usuarioxrol/:ID/roles", "GET", "UserRolesApiController", "obtenerRolesDelUsuario");
$r->addRoute("usuariosxrol", "POST", "UserRolesApiController", "agregarRol");
$r->addRoute("usuariosxrol/:ID", "DELETE", "UserRolesApiController", "borrarRol");

$r->addRoute("rolesapi", "GET", "RolesApiController", "obtenerRoles");
$r->addRoute("rolesapi", "POST", "RolesApiController", "agregarRol");
$r->addRoute("rolesapi/:ID", "DELETE", "RolesApiController", "borrarRol");


$r->addRoute("usersapi", "GET", "UsersApiController", "obtenerUsuarios");
$r->addRoute("usersapi", "POST", "UsersApiController", "agregarUsuario");
$r->addRoute("usersapi/:ID", "DELETE", "UsersApiController", "borrarUsuario");

$r->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);