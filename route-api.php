<?php
require_once "Router.php";
require_once "./api/userroles.api.controller.php";

define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
define("LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]). 'login');
define("ROLES", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]). 'roles');
define("HOME", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');



$r = new Router();

$r->addRoute("usuarioxrol/:ID/roles", "GET", "UserRolesApiController", "obtenerRolesDelUsuario");
$r->addRoute("usuariosxrol", "POST", "UserRolesApiController", "agregarRol");
$r->addRoute("usuariosxrol/:ID", "DELETE", "UserRolesApiController", "borrarRol");



$r->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);