<?php

class UsuarioModel
{
    private $db;

    public function __construct()
    {
        $this->db = $this->Connect();

    }

    private function Connect()
    {
        return new PDO('mysql:host=localhost;'
            . 'dbname=db_desafio; charset=utf8'
            , 'root', ''); 
    }

    /**
     * Get one user
     * @param String the user's username
     * @return Object a user
     */
    public function getUsuario($nombre_usuario)
    { // Get_Usuario
        $sentencia = $this->db->prepare('SELECT * FROM usuarios WHERE nombre_usuario = ?');
        $sentencia->execute(array($nombre_usuario));
        $response = $sentencia->fetch(PDO::FETCH_OBJ);
        return $response;
    }

    /**
     * Register the user
     * @param String the new user's username
     * @param String the new user's password
     * @param Boolean the new user's permissions
     */
    public function Registrar($nombre_usuario, $password, $admin)
    {
        $sentencia = $this->db->prepare('INSERT INTO usuarios(nombre_usuario, password, admin) VALUE(?,?,?)');
        $sentencia->execute([$nombre_usuario, $password, $admin]);
    }

    /**
     * Deletes the selected user
     * @param Integer the user's id
     */
    public function borrarUsuario($id_usuario)
    {
        $sentencia = $this->db->prepare("DELETE FROM usuarios WHERE id_usuario=?");
        $sentencia->execute([$id_usuario]);
    }

    /**
     * Get all the users
     * @return Array a list of users
     */
    public function getUsuarios()
    {
        $sentencia = $this->db->prepare('SELECT * FROM usuarios ORDER BY id_usuario ASC');
        $sentencia->execute();

        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Get one user
     * @param Integer the user's id
     * @return Object a user
     */
    public function Get($id_usuario)
    {
        $sentencia = $this->db->prepare("SELECT * FROM usuarios WHERE id_usuario = ?");
        $sentencia->execute(array($id_usuario));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Edits a user
     * @param Integer the user's id
     * @param String the user's username
     * @param String the user's password
     */
    public function editarUsuario($id_usuario, $nombre_usuario, $password)
    {
        $sentencia = $this->db->prepare('UPDATE usuarios SET nombre_usuario = ?, password = ? WHERE id_usuario = ?'); // cambiar
        $sentencia->execute([$nombre_usuario, $password, $id_usuario]);
    }
}
