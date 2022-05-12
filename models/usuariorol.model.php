<?php

class UsuarioRolModel
{

    private $db;

    public function __construct()
    {
        $this->db = $this->Connect();

    }

    private function Connect()
    {
        return new PDO('mysql:host=mysqldb;'
            . 'dbname=db_desafio; charset=utf8'
            , 'root', 'dockerwebexport');
    }

    /**
     * Get one user-role relationship
     * @param Integer the id of the user-role relation
     * @return Object a user-role relationship
     */
    public function Get($id_userxrol)
    {
        $sentencia = $this->db->prepare('SELECT * FROM usuarioxrol WHERE id_userxrol = ?');
        $sentencia->execute([$id_userxrol]);

        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Verify if a user already have a role
     * @param Integer user's id
     * @param Integer role id
     * @return Object the user-role relationship
     */
    public function alreadyHaveRole($id_usuario, $id_rol)
    {
        $sentencia = $this->db->prepare('SELECT * FROM usuarioxrol WHERE id_usuario=? AND id_rol=?');
        $sentencia->execute([$id_usuario, $id_rol]);

        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Obtain the roles from the specified user
     * @param Integer the user's id
     * @return Array the user's roles
     */
    public function obtenerRolesDelUsuario($id_usuario)
    {
        $sentencia = $this->db->prepare('SELECT * FROM usuarioxrol JOIN roles ON usuarioxrol.id_rol=roles.id_rol WHERE usuarioxrol.id_usuario = ?');
        $sentencia->execute([$id_usuario]);

        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Deletes a user-role relationship
     * @param Integer the user-role relationship id
     */
    public function borrarRol($id_userxrol)
    {
        $sentencia = $this->db->prepare('DELETE FROM usuarioxrol WHERE id_userxrol=?');
        $sentencia->execute([$id_userxrol]);
    }

    /**
     * Stores a new user-role relationship
     * @param Integer a user's id
     * @param Integer a role id
     * @return Object the last user-role relationship created
     */
    public function guardarRol($id_usuario, $id_rol)
    {
        $sentencia = $this->db->prepare('INSERT INTO usuarioxrol(id_usuario, id_rol) VALUES(?,?)');
        $sentencia->execute([$id_usuario, $id_rol]);
        return $this->db->lastInsertId();
    }
}
