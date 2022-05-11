<?php
    class RolModel{
        private $db;

        public function __construct(){
            $this->db = $this->Connect();
            
        }

        private function Connect(){ // hace la conexion
            return new PDO('mysql:host=localhost;'
            .'dbname=db_desafio; charset=utf8' 
            , 'root', '');// el primer root es el usuario y el segundo (vacio) la contraseña
        }

        public function getRoles(){
            $sentencia = $this->db->prepare('SELECT * FROM roles ORDER BY id_rol ASC');
            $sentencia->execute();
            return $sentencia->fetchAll(PDO::FETCH_OBJ);
        }
        public function Get($id_rol){
            $sentencia = $this->db->prepare('SELECT * FROM roles WHERE id_rol = ?');
            $sentencia->execute(array($id_rol));
            return $sentencia->fetch(PDO::FETCH_OBJ);
        } 

        public function agregarRol($nombre){ 
            $sentencia= $this->db->prepare("INSERT INTO roles(nombre) VALUES(?)"); 
            $sentencia->execute(array($nombre));
        }

        public function borrarRol($id_rol){
            $sentencia = $this->db->prepare('DELETE FROM roles WHERE id_rol = ?');
            $sentencia->execute([$id_rol]);
        }

        public function editarRol($nombre, $id_rol){
            $sentencia = $this->db->prepare('UPDATE roles SET nombre = ? WHERE id_rol = ?');
            $sentencia->execute([$nombre, $id_rol]);
        }

        public function getRol($nombre) {
            $sentencia = $this->db->prepare('SELECT * FROM roles WHERE nombre = ?');
            $sentencia->execute(array($nombre));
            $response = $sentencia->fetch(PDO::FETCH_OBJ);
            return $response;
        }
    }