<?php
    // hace el login
    class UsuarioModel{
        private $db;

        public function __construct(){
            $this->db=$this->Connect();
            
        }

        private function Connect(){ // hace la conexion
            return new PDO('mysql:host=localhost;'
            .'dbname=db_desafio; charset=utf8' 
            , 'root', '');// el primer root es el usuario y el segundo (vacio) la contraseña
        }

        public function getUsuario($nombre_usuario) { // Get_Usuario
            $sentencia = $this->db->prepare('SELECT * FROM usuarios WHERE nombre_usuario = ?');
            $sentencia->execute(array($nombre_usuario));
            // var_dump($sentencia->fetchAll(PDO::FETCH_OBJ));
            $response = $sentencia->fetch(PDO::FETCH_OBJ);
            return $response;
            //var_dump($sentencia->errorInfo()); die();
            
        }
        
        public function Registrar($nombre_usuario, $password, $admin){ 
            $sentencia = $this->db->prepare('INSERT INTO usuarios(nombre_usuario, password, admin) VALUE(?,?,?)');
            $sentencia->execute([$nombre_usuario, $password, $admin]);
        }

        function borrarUsuario($id_usuario){
            
            $sentencia = $this->db->prepare("DELETE FROM usuarios WHERE id_usuario=?"); 
            $sentencia->execute([$id_usuario]);
        }

        public function getUsuarios(){ // va
            $sentencia = $this->db->prepare('SELECT * FROM usuarios ORDER BY id_usuario ASC');
            $sentencia->execute();

            return $sentencia->fetchAll(PDO::FETCH_OBJ);
        }

        public function Get($id_usuario){
            $sentencia = $this->db->prepare("SELECT * FROM usuarios WHERE id_usuario = ?");
            $sentencia->execute(array($id_usuario));
            return $sentencia->fetch(PDO::FETCH_OBJ);
        }

        function editarUsuario($id_usuario, $nombre_usuario, $password){ // hacer
            
            $sentencia = $this->db->prepare('UPDATE usuarios SET nombre_usuario = ?, password = ? WHERE id_usuario = ?'); // cambiar
            $sentencia->execute([$nombre_usuario, $password, $id_usuario]); // el signo de pregunta busca en el array para mas SEGURIDAD
            // Var_dump ($sentencia->errorInfo ());
        }
    }
