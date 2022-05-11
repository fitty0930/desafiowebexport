<?php
require_once("models/usuario.model.php");
require_once("models/usuariorol.model.php");
require_once("./api/json.view.php");
include_once('helpers/auth.helper.php');



class UserRolesApiController{
     
    
    private $modelComentario; 
    private $modelUsuario;
    private $modelUserRole;
    private $viewJSON; 
    private $data; 
    private $authHelper;

    public function __construct(){
        $this->viewJSON = new JSONView();
        $this->modelUsuario= new UsuarioModel();
        $this->modelUserRole= new UsuarioRolModel();
        $this->authHelper = new AuthHelper();
        $this->data = file_get_contents("php://input");
    }
    private function getData() {
        return json_decode($this->data);
    }

    public function obtenerRolesDelUsuario($params = NULL){
        
        $id_usuario = $params[':ID'];
        $usuarioRoles = $this->modelUsuario->Get($id_usuario);
        if($usuarioRoles){
            $roles = $this->modelUserRole->obtenerRolesDelUsuario($id_usuario);
            $this->viewJSON->response($roles, 200);
        }else{
            $this->viewJSON->response('No existe el usuario', 404);
        }
    } 

    public function agregarRol(){
        
        $data = $this->getData();
        $alreadyHaveRole=$this->modelUserRole->alreadyHaveRole($data->id_usuario , $data->id_rol);
        if(!$alreadyHaveRole){
            $rol = $this->modelUserRole->guardarRol($data->id_usuario , $data->id_rol);
            if($rol){
                $this->viewJSON->response('Su rol ha sido asignado', 200);
            }else{
                $this->viewJSON->response('No se pudo asignar su rol', 500);
            }
        }else{
            $this->viewJSON->response('El rol ya se encuentra asignado para ese usuario', 404);
        }
    }

    public function borrarRol($params = NULL){
        $id_userxrol = $params[':ID'];
        $userxrole = $this->modelUserRole->Get($id_userxrol);
        if($userxrole){
            $this->modelUserRole->borrarRol($id_userxrol);
            $this->viewJSON->response('Rol borrado con exito', 200);
        }else{
            $this->viewJSON->response("El rol buscado no existe", 404);
        }
    }

    
}