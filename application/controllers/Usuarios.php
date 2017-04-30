<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

  function __construct() {
        parent::__construct();
        $this->load->model("Usuario");
        $this->load->library('form_validation');
    }

    function obtenerMenu()
    {
      $response = "";
      if (isset($_GET['menu'])) {
        if ($_GET['menu'] == 1) {
          $response = $this->load->view('usuarios/login','',true);
        }elseif ($_GET['menu'] == 2) {
          $response = $this->load->view('usuarios/signup','',true);
        }
      }        //$login = $this->Usuario->newUsuario((array) $_POST);

      echo $response;
    }

    public function logIn()
    {
      $response = array();
      $response['error'] = true;
      $this->form_validation->set_rules('cel','Celular','trim|required');
      if($this->form_validation->run() == FALSE){
        $response['msg'] = validation_errors();
      }else {
        $result = $this->Usuario->logIn($_POST['cel']);
        if (isset($result->id)) {
          $this->session->set_userdata('usuario',$result);
          $response['error'] = false;
          $response['msg'] = $result;
        }else {
          $response['msg'] = "Usuario no registrado";
        }
      }
    echo json_encode($response);
    }

    public function co()
    {
      //$this->session->unset_userdata('usuario');
      var_dump($this->session->userdata());

    }

    public function signUp()
    {
      $response = array();
      $response['error'] = true;
      $this->form_validation->set_rules('nombre','Nombre','trim|required|xss_clean');
      $this->form_validation->set_rules('ap_paterno','Apellido Paterno','trim|required|xss_clean');
      /*$this->form_validation->set_rules('ip','Ip','trim|required|xss_clean');*/
      $this->form_validation->set_rules('cel','Celular','trim|required|xss_clean');
      if($this->form_validation->run() == FALSE){
        $response['msg'] = validation_errors();
      }else {
        $signup = $this->Usuario->newUsuario((array) $_POST);
        $response['msg'] = $this->Usuario->signUp($signup);
      }
    echo json_encode($response);
    }

}
