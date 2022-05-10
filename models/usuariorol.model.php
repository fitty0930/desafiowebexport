<?php

    class UsuarioRolModel{

        private $db;

        public function __construct(){
            $this->db=$this->Connect();
            
        }

        private function Connect(){ // hace la conexion
            return new PDO('mysql:host=localhost;'
            .'dbname=db_desafio; charset=utf8' 
            , 'root', '');// el primer root es el usuario y el segundo (vacio) la contraseña
        }
        // usuarioxrol id_usuario, id_rol
        public function Get($id_comentario){
            $sentencia = $this->db->prepare('SELECT * FROM comentarios WHERE id_comentario = ?');
            $sentencia->execute([$id_comentario]);

            return $sentencia->fetch(PDO::FETCH_OBJ);
        }
        public function obtenerRolesDelUsuario($id_usuario){
            $sentencia = $this->db->prepare('SELECT * FROM usuarioxrol JOIN roles ON usuarioxrol.id_rol=roles.id_rol WHERE usuarioxrol.id_usuario = ?');
            $sentencia->execute([$id_usuario]);

            return $sentencia->fetchAll(PDO::FETCH_OBJ);
        }
        
        public function borrarRol($id_userxrol){
            $sentencia = $this->db->prepare('DELETE FROM usuarioxrol WHERE id_userxrol=?');
            $sentencia->execute([$id_userxrol]);
        }
        public function guardarRol($id_usuario, $id_rol){ 
            $sentencia = $this->db->prepare('INSERT INTO usuarioxrol(id_usuario, id_rol) VALUES(?,?)');
            $sentencia->execute([$id_usuario, $id_rol]);
            return $this->db->lastInsertId(); //  Devuelve el ID de la última fila o secuencia insertada
        }
    }