<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class APIController extends ResourceController
{
    protected $modelName = 'App\Models\UsuarioModelo';
    protected $format    = 'json';

    public function index()
    {
        return $this->respond($this->model->findAll());
    }
    public function registrar(){
        $nombre = $this->request->getPost("nombre");
        $correo = $this->request->getPost("correo");
        $password = $this->request->getPost("password");
        //se creó arreglo con datos recibidos
        $arregloDatos = array(
            "nombre"=>$nombre,
            "correo"=>$correo,
            "password"=>$password
        );
        //operacion que graba informacion
        $id = $this->model->insert($arregloDatos);
        //respuesta
        $mensaje = array(
            "msj"=>"exito agregando el usuario",
            "estado"=>true
        );
        return $this->respond(json_encode($mensaje));
    }
}