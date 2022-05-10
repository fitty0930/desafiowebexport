<?php
    require_once('libs/Smarty.class.php');
    require_once('helpers/auth.helper.php');

    class AdminView{

        private $smarty; // smarty


        public function __construct($globalCategorias = NULL){
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
            $this->smarty->assign('categorias',$globalCategorias); 
        }
        

        public function editarUsuario($usuario){ 
            // var_dump($producto);
            $this->smarty->assign('titulo', 'Editar usuario');
            $this->smarty->assign('usuario', $usuario);
            $this->smarty->display('templates/editarUsuario.tpl');
        }
        

        public function editarCategoria($categoria){ 
            $this->smarty->assign('titulo', 'edit'.$categoria->nombre);
            $this->smarty->assign('categoria', $categoria);
            $this->smarty->display('templates/editarCategoria.tpl');
        }

    }