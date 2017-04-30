<?php

class Article extends CI_Model {

  public function newArticle($array)
  {
      $article = new stdClass();
      $article->categoria = isset($array['categoria']) && !empty($array['categoria']) ? $array['categoria'] : 7;
      $article->palabra = isset($array['palabra']) && !empty($array['palabra']) ? $array['palabra'] : '';
      $article->fechainicial = isset($array['fechainicial']) && !empty($array['fechainicial']) ? $array['fechainicial'] : null;
      $article->fechafinal = isset($array['fechafinal']) && !empty($array['fechafinal']) ? $array['fechafinal'] : null;
      $article->usuario = isset($array['usuario']) && !empty($array['usuario']) ? $array['usuario'] : '';
      $article->address = isset($array['address']) && !empty($array['address']) ? $array['address'] : '';
    return $article;
  }

  public function obtenerArticulos($busqueda)
  {
    $query = "call obtenerArticulos($busqueda->categoria,'$busqueda->palabra','$busqueda->fechainicial',
    '$busqueda->fechafinal', $busqueda->usuario,'$busqueda->address')";

    if (is_null($busqueda->fechainicial) && is_null($busqueda->fechafinal)) {
      $query = "call obtenerArticulos($busqueda->categoria,'$busqueda->palabra',null,
      null, $busqueda->usuario,'$busqueda->address')";
    }elseif (is_null($busqueda->fechainicial) && !is_null($busqueda->fechafinal)) {
      $query = "call obtenerArticulos($busqueda->categoria,'$busqueda->palabra',null,
      '$busqueda->fechafinal', $busqueda->usuario,'$busqueda->address')";
    }elseif (!is_null($busqueda->fechainicial) && is_null($busqueda->fechafinal)) {
      $query = "call obtenerArticulos($busqueda->categoria,'$busqueda->palabra','$busqueda->fechainicial',
      null, $busqueda->usuario,'$busqueda->address')";
    }
      $result = $this->db->query($query);
      $this->db->close();
    return $result->result();
  }
}
