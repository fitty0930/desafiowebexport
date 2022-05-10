<?php

require_once "./views/usuario.view.php";
require_once "./models/ctrlcuentas.model.php";

class UsuarioController
{
    private $modelProducto;
    private $modelCategoria;
    private $modelCtrlcuentas;
    private $view;

    public function __construct()
    {
        $this->modelCtrlcuentas = new CtrlcuentasModel();
        $this->view = new UsuarioView();
    }

    // USUARIOS
    public function mostrarUsuarios()
    {
        $usuarios = $this->modelCtrlcuentas->getUsuarios();
        $this->view->mostrarUsuarios($usuarios);
    }

}
