<?php

require_once "./views/usuario.view.php";
require_once "./models/rol.model.php";
include_once 'models/usuario.model.php';

class UsuarioController
{

    private $modelRoles;
    private $view;
    private $modelUsuario;

    public function __construct()
    {
        $this->modelRoles = new RolModel();
        $this->view = new UsuarioView();
        $this->modelUsuario = new UsuarioModel();
    }

    /**
     * Shows all the users
     */
    public function mostrarUsuarios()
    {
        $usuarios = $this->modelUsuario->getUsuarios();
        $this->view->mostrarUsuarios($usuarios);
    }

    /**
     * Shows all the roles
     */
    public function mostrarRoles()
    {
        $roles = $this->modelRoles->getRoles();
        $this->view->mostrarRoles($roles);
    }

    /**
     * Shows an specific user
     * @param Integer the id of the specified user
     */
    public function mostrarUsuario($params = null)
    {
        $id_usuario = $params[':ID'];
        $usuario = $this->modelUsuario->Get($id_usuario);
        $roles = $this->modelRoles->getRoles();
        $this->view->mostrarUsuario($usuario, $roles);
    }
}
