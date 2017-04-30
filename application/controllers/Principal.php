<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {

  function __construct() {
        parent::__construct();
        $this->load->model("Categoria");
    }

  public function Busqueda()
  {
    $data['vista'] = 'articulos/find';
    $data['categorias'] = $this->Categoria->obtenerCategorias();
    $this->load->view('template/template',$data);
  }

}

?>
