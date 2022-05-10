<?php

require_once "./views/usuario.view.php";
require_once "./models/ctrlcuentas.model.php";
require_once "./models/rol.model.php";
include_once('models/usuario.model.php');

class UsuarioController
{
    
    private $modelCtrlcuentas;
    private $modelRoles;
    private $view;
    private $modelUsuario;

    public function __construct()
    {
        $this->modelCtrlcuentas = new CtrlcuentasModel();
        $this->modelRoles= new RolModel();
        $this->view = new UsuarioView();
        $this->modelUsuario = new UsuarioModel();
    }

    // USUARIOS
    public function mostrarUsuarios()
    {
        $usuarios = $this->modelCtrlcuentas->getUsuarios();
        $this->view->mostrarUsuarios($usuarios);
    }

    public function mostrarRoles()
    {
        $roles = $this->modelRoles->getRoles();
        $this->view->mostrarRoles($roles);
    }

    public function mostrarUsuario($params = null){
        $id_usuario = $params[':ID'];
        $usuario= $this->modelUsuario-> Get($id_usuario);
        $this->view->mostrarUsuario($usuario);
    }
}
