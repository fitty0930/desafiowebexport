<?php
require_once "models/usuario.model.php";
require_once "models/usuariorol.model.php";
require_once "./api/json.view.php";
include_once 'helpers/auth.helper.php';

class UsersApiController
{

    private $modelUsuario;
    private $viewJSON;
    private $data;
    private $authHelper;

    public function __construct()
    {
        $this->viewJSON = new JSONView();
        $this->modelUsuario = new UsuarioModel();
        $this->modelUserRole = new UsuarioRolModel();
        $this->authHelper = new AuthHelper();
        $this->data = file_get_contents("php://input");
    }

    private function getData()
    {
        return json_decode($this->data);
    }

    /**
     * Get all the users
     * @return Response the list of users and the status
     */
    public function obtenerUsuarios()
    {
        $usuarios = $this->modelUsuario->getUsuarios();
        $this->viewJSON->response($usuarios, 200);
    }

    /**
     * Creates a user
     * @return Response A message and the status
     */
    public function agregarUsuario()
    {
        $data = $this->getData();
        $admin = 0;
        $user = $this->modelUsuario->getUsuario($data->nombre_usuario);
        if (!$user) {
            $usuario = $this->modelUsuario->Registrar($data->nombre_usuario, $data->password, $admin);
            if ($usuario) {
                $this->viewJSON->response('El usuario ha sido creado', 200);
            } else {
                $this->viewJSON->response('No se pudo crear el usuario', 500);
            }
        } else {
            $this->viewJSON->response('Ese nombre de usuario ya existe', 404);
        }

    }

    /**
     * Deletes the specified user
     * @param Integer the user's ID
     * @return Response A message and the status
     */
    public function borrarUsuario($params = null)
    {
        $id_usuario = $params[':ID'];
        $user = $this->modelUsuario->Get($id_usuario);
        if ($user) {
            $this->modelUsuario->borrarUsuario($id_usuario);
            $this->viewJSON->response('Usuario borrado con exito', 200);
        } else {
            $this->viewJSON->response("El usuario buscado no existe", 404);
        }
    }

}
