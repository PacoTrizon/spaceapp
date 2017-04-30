<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articles extends CI_Controller {

  function __construct() {
        parent::__construct();
        $this->load->model("Article");
        $this->load->library('form_validation');
        //$this->validarSesion();
    }

    private function validarSesion()
    {
      $user = $this->session->userdata();
      if (isset($user['usuario'])) {
        return true;
      }else {
        $response['error'] = true;
        $response['msg'] = "logeate";
        echo json_encode($response);
      }
    }
 public function obtenerArticulos()
 {
   $response = array();
   $response['error'] = true;
   $this->form_validation->set_rules('address','Direccion IP','trim|required');
   if (!isset($_POST['categoria'])) {
     $this->form_validation->set_rules('palabra','Palabra','trim|required');
   }
   if (!isset($_POST['palabra'])) {
     $this->form_validation->set_rules('categoria','Categoria','trim|required');
   }
   if($this->form_validation->run() == FALSE) {
     $response['msg'] = validation_errors();
   }else {
     $_POST['usuario'] = 1;
  //   echo "-------------------> ".json_encode($this->session->userdata('usuario'));
     $article = $this->Article->newArticle((array) $_POST);
     $data['articulos'] = $this->Article->obtenerArticulos($article);
     $response['error'] = false;
     $response['msg'] = $this->load->view('articulos/show',$data,true);
   }
  echo json_encode($response);
 }

  public function post()
  {
    echo json_encode($_POST);
  }
}
