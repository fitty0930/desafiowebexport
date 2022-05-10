<?php
include_once('views/login.view.php');
include_once('views/usuario.view.php');
include_once('models/usuario.model.php');
include_once('helpers/auth.helper.php');

    class LoginController{
        private $view;
        private $modelUsuario;
        private $modelCategoria; 
        private $authHelper;
        private $viewUsuario;
        
        public function __construct(){
            
            $this->modelUsuario = new UsuarioModel();
            $this->authHelper = new AuthHelper();
            $this->viewUsuario = new UsuarioView();
            $this->view = new LoginView();
        }

        // INGRESO
        public function mostrarLogin(){
            $this->view->mostrarLogin();
        }

        public function verificarUsuario(){

            $nombre_usuario = $_POST['usuario'];
            $password = $_POST['password'];
            $usuario = $this->modelUsuario->getUsuario($nombre_usuario);
            if (!empty($nombre_usuario) && !empty($password)) {
                
                if ($usuario && ($password == $usuario->password || password_verify($password, $usuario->password))) { 
                    $this->authHelper->Login($usuario);
                    header('Location: productos');
                } else {
                    $this->view->mostrarLogin("Usuario o contraseña incorrectos");}
            } else {
                $this->view->mostrarLogin("Quedan campos por rellenar");
            }
        }
        
        // SALIDA
        public function Logout() {
            $this->authHelper->Logout();
            header('Location: home');
        }

        // REGISTRO
        public function mostrarRegistro(){
            $this->view->mostrarRegistro();

        }
        public function Registrar(){
            $nombre_usuario = $_POST['usuario'];
            $password = $_POST['password'];
            $admin=0;       
            if (!empty($nombre_usuario) && !empty($password) && ($nombre_usuario!="administrador")) {

                $yaesUsuario = $this->modelUsuario->getUsuario($nombre_usuario); 

                if(!$yaesUsuario){
                    $this->modelUsuario->Registrar($nombre_usuario, $password, $admin);
                    $usuario= $this->modelUsuario->getUsuario($nombre_usuario);

                    $this->authHelper->Login($usuario);
                    header('Location: productos');
                }
                else{
                    
                    $this->view->mostrarRegistro('Alguien ya registró ese nombre de usuario');
                }

            }
            else{
                $this->view->mostrarRegistro("Campos vacios o usuario prohibido");
            }
        }

    }
