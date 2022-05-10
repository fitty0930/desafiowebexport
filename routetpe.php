<?php

require_once "controllers/usuario.controller.php";
require_once "controllers/login.controller.php";
require_once "controllers/admin.controller.php";
require_once "controllers/ctrlcuentas.controller.php";
require_once "Router.php";

define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
define("HOME", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
define("LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');

if (!isset($_GET['action'])){
    $_GET['action'] = '';
}


$r= new Router();

$r->addRoute("home","GET","UsuarioController", "mostrarUsuarios");
// LOGIN
$r->addRoute("login","GET","LoginController", "mostrarLogin");
$r->addRoute("registry","GET","LoginController", "mostrarRegistro");
$r->addRoute("checkregistry","POST","LoginController", "Registrar");
$r->addRoute("checklogin","POST","LoginController", "verificarUsuario");
$r->addRoute("logout","GET","LoginController", "Logout");

// USUARIOS
$r->addRoute("usuarios","GET","UsuarioController", "mostrarUsuarios");
$r->addRoute("crearusuario","POST","AdminController", "crearUsuario");
$r->addRoute("borrarusuario/:ID","GET","AdminController", "borrarUsuario");
$r->addRoute("edicionusuario/:ID","GET","AdminController", "editarUnUsuario"); // este muestra plant p edit
$r->addRoute("editarusuario/:ID","POST","AdminController", "editarUsuarioSelec");

// ROLES
$r->addRoute("roles","GET","UsuarioController", "mostrarRoles");
$r->addRoute("crearrol","POST","AdminController", "crearRol");
$r->addRoute("borrarrol/:ID","GET","AdminController", "borrarRol");
$r->addRoute("edicionrol/:ID","GET","AdminController", "editarUnRol"); // este muestra plant p edit
$r->addRoute("editarrol/:ID","POST","AdminController", "editarRolSelec");


//CONTROL DE CUENTAS
$r->addRoute("ctrlcuentas","GET","CtrlcuentasController", "mostrarCuentas");
$r->addRoute("borrarcuenta/:ID","GET","CtrlcuentasController", "borrarCuentas");
$r->addRoute("darpermisocuenta/:ID","GET","CtrlcuentasController", "darPermisos");



// DEFAULT
$r->setDefaultRoute("UsuarioController", "mostrarUsuarios");

$r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 

