<?php
/**
 * Permitir la conexion contra la base de datos
 */
class dbnba
{
  //Atributos necesarios para la conexion.
  private $host="localhost";
  private $user="root";
  private $pass="root";
  private $db_name="nba";

  //Conector
  private $conexion;

  //Propiedades para controlar errores.
  private $error=false;

  function __construct()
  {
      $this->conexion = new mysqli($this->host, $this->user, $this->pass, $this->db_name);
      if ($this->conexion->connect_errno) {
        $this->error=true;
      }
  }

  //Funcion para saber si hay error en la conexion
  function hayError(){
    return $this->error;
  }

  //Funciones para la insercion de datos.
  public function Insertarequipo($nombre, $ciudad, $conferencia, $division)
  {
    $equipo="INSERT INTO equipos(Nombre, Ciudad, Conferencia, Division) VALUES ('".$nombre."', '".$ciudad ."', '" .$conferencia ."', '" .$division ."')";
    if (!$this->conexion->query($equipo)) {
      echo "Falló la creacion de la tabla: (" . $this->conexion->errno .")" . $this->conexion->error;
      return false;
    }
  }


  public function DevolverUltimoEquipo($nombre)
  {
    $equipo="SELECT * FROM equipos WHERE Nombre='" .$nombre ."'";
    if($this->error==false){
      $resultado = $this->conexion->query($equipo);
      return $resultado;
    }else{
      return null;
    }
  }

}


 ?>
