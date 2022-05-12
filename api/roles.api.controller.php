<?php
require_once("models/rol.model.php");
require_once("./api/json.view.php");
include_once('helpers/auth.helper.php');



class RolesApiController{

    private $modelRole;
    private $viewJSON; 
    private $data; 
    private $authHelper;

    public function __construct(){
        $this->viewJSON = new JSONView();
        $this->modelRole= new RolModel();
        $this->authHelper = new AuthHelper();
        $this->data = file_get_contents("php://input");
    }
    private function getData() {
        return json_decode($this->data);
    }

    /**
     * Get all the roles
     * @return Response a list of roles and a status
     */
    public function obtenerRoles(){
        $roles = $this->modelRole->getRoles();
        $this->viewJSON->response($roles, 200);
    } 

    /**
     * Creates a new role
     * @return Response a message and a status
     */
    public function agregarRol(){
        
        $data = $this->getData();
        $role = $this->modelRole->getRol($data->nombre);
        if(!$role){
            $rol = $this->modelRole->agregarRol($data->nombre);
            if($rol){
                $this->viewJSON->response('Su rol ha sido asignado', 200);
            }else{
                $this->viewJSON->response('No se pudo asignar su rol', 500);
            }
        }else{
            $this->viewJSON->response('Ese rol ya existe', 404);
        }
        
    }

    /**
     * Deletes the specified role
     * @param Integer the role's ID
     * @return Response a message and a status
     */
    public function borrarRol($params = NULL){
        $id_rol = $params[':ID'];
        $role = $this->modelRole->Get($id_rol);
        if($role){
            $this->modelRole->borrarRol($id_rol);
            $this->viewJSON->response('Rol borrado con exito', 200);
        }else{
            $this->viewJSON->response("El rol buscado no existe", 404);
        }
    }

    
}