<?php

include_once 'views/admin.view.php';
include_once 'views/usuario.view.php';
include_once 'helpers/auth.helper.php';
include_once 'models/usuario.model.php';
include_once 'models/rol.model.php';

class AdminController
{
    private $authHelper;
    private $modelRol;
    private $viewAdmin;
    private $viewUser;
    private $modelUsuario;

    public function __construct()
    {
        $this->authHelper = new AuthHelper();
        $this->modelRol = new RolModel();
        $this->viewAdmin = new AdminView();
        $this->viewUser = new UsuarioView();
        $this->modelCtrlcuentas = new CtrlcuentasModel();
        $this->modelUsuario = new UsuarioModel();
    }

    /**
     * Shows the view to edit a user
     */
    public function editarUnUsuario($params = null)
    {
        $id_usuario = $params[':ID'];
        $this->authHelper->isAdmin();
        $usuario = $this->modelUsuario->Get($id_usuario);
        if ($usuario) {
            $this->viewAdmin->editarUsuario($usuario);
        } else {
            $this->viewUser->msjError('No se pudo encontrar usuario');
        }

    }

    /**
     * Edits the selected user
     */
    public function editarUsuarioSelec($params = null)
    {
        $id_usuario = $params[':ID'];
        $this->authHelper->isAdmin();
        $username = $_POST['username'];
        $password = $_POST['password'];
        $admin = 0;

        if ((!empty($username)) && (!empty($password))) {
            $this->modelUsuario->editarUsuario($id_usuario, $username, $password);
            header("Location: ../usuarios");
        } else {
            $this->viewUser->msjError("Datos insuficientes");
        }

    }

    /**
     * Shows the view to edit a role
     */
    public function editarUnRol($params = null)
    {
        $id_rol = $params[':ID'];
        $this->authHelper->isAdmin();
        $rol = $this->modelRol->Get($id_rol);
        if ($rol) {
            $this->viewAdmin->editarRol($rol);
        } else {
            $this->viewUser->msjError('No se pudo encontrar el rol');
        }

    }

    /**
     * Edits the selected role
     */
    public function editarRolSelec($params = null)
    {
        $id_rol = $params[':ID'];
        $this->authHelper->isAdmin();
        $nombre = $_POST['nombre'];

        if ((!empty($nombre))) {
            $this->modelRol->editarRol($nombre, $id_rol);
            header("Location: ../roles");
        } else {
            $this->viewUser->msjError("Datos insuficientes");
        }

    }
}
