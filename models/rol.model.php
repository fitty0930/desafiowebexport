<?php
class RolModel
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
     * Get all the roles
     * @return Array a list of roles
     */
    public function getRoles()
    {
        $sentencia = $this->db->prepare('SELECT * FROM roles ORDER BY id_rol ASC');
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Get a role by it's id
     * @param Number the role id
     * @return Object a role
     */
    public function Get($id_rol)
    {
        $sentencia = $this->db->prepare('SELECT * FROM roles WHERE id_rol = ?');
        $sentencia->execute(array($id_rol));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Creates a new role
     * @param String the role name
     */
    public function agregarRol($nombre)
    {
        $sentencia = $this->db->prepare("INSERT INTO roles(nombre) VALUES(?)");
        $sentencia->execute(array($nombre));
    }

    /**
     * Deletes a role
     * @param Number the id of the role
     */
    public function borrarRol($id_rol)
    {
        $sentencia = $this->db->prepare('DELETE FROM roles WHERE id_rol = ?');
        $sentencia->execute([$id_rol]);
    }

    /**
     * Edits a role
     * @param String the role name
     * @param Number the role id
     */
    public function editarRol($nombre, $id_rol)
    {
        $sentencia = $this->db->prepare('UPDATE roles SET nombre = ? WHERE id_rol = ?');
        $sentencia->execute([$nombre, $id_rol]);
    }

    /**
     * Get a role by it's name
     * @param String the role name
     * @return Object a role
     */
    public function getRol($nombre)
    {
        $sentencia = $this->db->prepare('SELECT * FROM roles WHERE nombre = ?');
        $sentencia->execute(array($nombre));
        $response = $sentencia->fetch(PDO::FETCH_OBJ);
        return $response;
    }
}
