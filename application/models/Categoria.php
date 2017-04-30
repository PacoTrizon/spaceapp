<?php
/**
 *
 */
class Categoria extends CI_Model
{
  public function obtenerCategorias()
  {
      $query = "select id,nombre,descripcion from categorias where id <> 7";
      $result = $this->db->query($query);
      $this->db->close();
    return $result->result();
  }
}


 ?>
