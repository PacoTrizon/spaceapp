<?php

class Usuario extends CI_Model {

/*
  public function obtenerSatelites()
  {
      $query = "select id,nombre,descripcion from satelites";
      $result = $this->db->query($query);
      $this->db->close();
    return $result->result();
  }*/

  public function newUsuario($array)
  {
      $usuario = new stdClass();
      $usuario->nombre = isset($array['nombre']) ? $array['nombre'] : '';
      $usuario->ap_paterno = isset($array['ap_paterno']) ? $array['ap_paterno'] : '';
      $usuario->ap_materno = isset($array['ap_materno']) ? $array['ap_materno'] : '';
      $usuario->edad = isset($array['edad']) ? $array['edad'] : '';
      $usuario->genero = isset($array['genero']) ? $array['genero'] : '';
      $usuario->celular = isset($array['celular']) ? $array['celular'] : '';
      $usuario->mac = isset($array['mac']) ? $array['mac'] : '';
      $usuario->ip = isset($array['ip']) ? $array['ip'] : '';
      $usuario->pais_id = isset($array['pais_id']) ? $array['pais_id'] : '';
      $usuario->estado_id = isset($array['estado_id']) ? $array['estado_id'] : '';
      $usuario->ciudad = isset($array['ciudad']) ? $array['ciudad'] : '';
      $usuario->cp = isset($array['cp']) ? $array['cp'] : '';
    return $usuario;
  }

  public function localizacionIp($externalContent)
  {
      preg_match('/Current IP Address: \[?([:.0-9a-fA-F]+)\]?/', $externalContent, $m);
      $details = file_get_contents("http://ipinfo.io/{$m[1]}");
    return ($details);
  }

  public function logIn($celular)
  {
      $query = "select * from usuarios where celular = $celular limit 1";
      $result = $this->db->query($query);
      $this->db->close();
    return $result->row();
  }

  public function signUp($busaqueda)
  {
    $query = "select * from usuarios where ";
    $result = $this->db->query($query);
    $this->db->close();
  return $result->result();
  }
}
