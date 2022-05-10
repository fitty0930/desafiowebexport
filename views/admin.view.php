<?php
    require_once('libs/Smarty.class.php');
    require_once('helpers/auth.helper.php');

    class AdminView{

        private $smarty; // smarty


        public function __construct(){
            $authHelper = new AuthHelper();
            $session= $authHelper->obtenerUsuarioAdm();
            if($session == NULL ){
                $nombreUsuario = NULL; 
                $idUsuario = NULL;
                $admin = NULL;
            } 
            else{
                $nombreUsuario = $session["usuario"]; 
                $idUsuario = $session["id_usuario"];
                $admin = $authHelper->obtenerAdminAdm();
            }

            $this->smarty = new Smarty();
            $this->smarty->assign('basehref', BASE_URL);
            $this->smarty->assign('nombreUsuario', $nombreUsuario);
            $this->smarty->assign('idUsuario', $idUsuario); 
            $this->smarty->assign('admin', $admin); 
        }
        

        public function editarUsuario($usuario){ 
            $this->smarty->assign('titulo', 'Editar usuario');
            $this->smarty->assign('usuario', $usuario);
            $this->smarty->display('templates/editarUsuario.tpl');
        }
        

        public function editarRol($rol){ 
            $this->smarty->assign('titulo', 'edit'.$rol->nombre);
            $this->smarty->assign('rol', $rol);
            $this->smarty->display('templates/editarRol.tpl');
        }

    }