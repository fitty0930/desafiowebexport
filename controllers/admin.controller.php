<?php

include_once 'views/admin.view.php';
include_once 'views/usuario.view.php';
include_once 'helpers/auth.helper.php';
include_once('models/usuario.model.php');

class AdminController
{

    private $modelCategoria;
    private $viewUser;
    private $viewAdmin;
    private $authHelper;

    public function __construct()
    {
        $this->authHelper = new AuthHelper();
        $globalCategorias = $this->modelCategoria->getCategorias();
        $this->viewAdmin = new AdminView($globalCategorias);
        $this->viewUser = new UsuarioView();
        $this->modelCtrlcuentas = new CtrlcuentasModel();
        $this->modelUsuario = new UsuarioModel();
    }

    // PRODUCTOS
    public function mostrarUsuarios()
    {
        $usuarios = $this->modelCtrlcuentas->getUsuarios();
        $this->viewUser->mostrarUsuarios($usuarios);
    }

    public function crearUsuario()
    {
        $this->authHelper->isAdmin();

        
        $username = $_POST['username'];
        $password = $_POST['password'];
        $admin=0;

        if ((!empty($username)) && (!empty($password))) {
            
            $this->modelUsuario->Registrar($username, $password, $admin);

            header("Location: usuarios"); // lo pateo a home
        } else {
            $this->viewUser->msjError('Faltan campos por rellenar');}
    }

    public function borrarUsuario($params = null)
    {
        $id_usuario = $params[':ID'];
        $this->authHelper->isAdmin();

        $this->modelUsuario->borrarUsuario($id_usuario);
        header("Location: ../usuarios"); // tene en cuenta esto
    }

    public function editarUnUsuario($params = null)
    { 
        $id_usuario = $params[':ID'];
        $this->authHelper->isAdmin();
        $usuario = $this->modelUsuario->Get($id_usuario);
        if ($usuario) {
            $this->viewAdmin->editarUsuario($usuario);
        } else {
            $this->viewUser->msjError('No se pudo encontrar el ID de su producto');
        }

    }

    public function editarUsuarioSelec($params = null)
    {
        $id_usuario = $params[':ID'];
        $this->authHelper->isAdmin();
        $username = $_POST['username'];
        $password = $_POST['password'];
        $admin=0;

        if ((!empty($username)) && (!empty($password))) { 
            $this->modelUsuario->editarUsuario($id_usuario, $username, $password);
            header("Location: ../usuarios");
        } else {
            $this->viewUser->msjError("Datos insuficientes");
        }

    }

}
