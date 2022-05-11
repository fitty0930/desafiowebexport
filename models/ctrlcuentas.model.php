<?php

class CtrlcuentasModel
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
     * Get a user by his username
     * @param Integer the user's username
     * @return Object a user
     */
    public function getByUsername($username)
    {
        $query = $this->db->prepare('SELECT * FROM users WHERE username = ?');
        $query->execute(array($username));

        return $query->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Get a user by his id
     * @param Integer the user's id
     * @return Object a user
     */
    public function getUsuarioID($id_usuario)
    {
        $sentencia = $this->db->prepare('SELECT * FROM usuarios WHERE id_usuario = ?');
        $sentencia->execute([$id_usuario]);

        return $sentencia->fetch(PDO::FETCH_OBJ);
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
     * Deletes the selected user
     * @param Integer the user's id
     */
    public function borrarUsuario($id_usuario)
    {
        $sentencia = $this->db->prepare('DELETE FROM usuarios where id_usuario = ?');
        $sentencia->execute([$id_usuario]);
    }

    /**
     * Changes the user's permissions
     * @param Boolean true for admin, false for normal user
     */
    public function darPermisos($booleano, $id_usuario)
    {
        $sentencia = $this->db->prepare('UPDATE usuarios SET admin = ? WHERE id_usuario= ?');
        $sentencia->execute([$booleano, $id_usuario]);
    }
}
