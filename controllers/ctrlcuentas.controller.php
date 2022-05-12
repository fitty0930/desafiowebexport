<?php
require_once 'helpers/auth.helper.php';
require_once 'models/ctrlcuentas.model.php';
require_once 'views/ctrlcuentas.view.php';

class CtrlcuentasController
{
    private $authHelper;
    private $modelCtrlcuentas;
    private $viewCtrlcuentas;

    public function __construct()
    {
        $this->authHelper = new AuthHelper();
        $this->modelCtrlcuentas = new CtrlcuentasModel();
        $this->viewCtrlcuentas = new CtrlcuentasView();
        $this->authHelper->isAdmin();
    }

    /**
     * Show all the users with their permissions
     */
    public function mostrarCuentas()
    {
        $usuarios = $this->modelCtrlcuentas->getUsuarios();
        $this->viewCtrlcuentas->mostrarUsuarios($usuarios);
    }

    /**
     * Toggles the user's permissions
     */
    public function darPermisos($params = null)
    {
        $id_usuario = $params[':ID'];
        $usuario = $this->modelCtrlcuentas->getUsuarioID($id_usuario);
        if ($usuario->admin != 0) {
            $this->modelCtrlcuentas->darPermisos(0, $id_usuario);
        } else {
            $this->modelCtrlcuentas->darPermisos(1, $id_usuario);
        }
        header("Location: ../ctrlcuentas");
    }
}
