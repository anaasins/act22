<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Insercion de nuevos equipos</title>
  </head>
  <body>
    <?php
    include 'dbnba.php';
    $equipo=new dbnba();

    if (empty($_POST["nombre"])==false && empty($_POST["ciudad"])==false && empty($_POST["conferencia"])==false && empty($_POST["division"])==false) {

      $resultado=$equipo->Insertarequipo($_POST["nombre"],  $_POST["ciudad"], $_POST["conferencia"], $_POST["division"]);

      echo "ULTIMO REGISTRO: <br>";
      $resultado=$equipo->DevolverUltimoEquipo($_POST["nombre"]);
      $fila=$resultado->fetch_assoc();
      echo "Nombre: " .$fila["Nombre"] ."<br>Ciudad: " .$fila["Ciudad"] ."<br>Conferencia: " .$fila["Conferencia"] ."<br>Division: " .$fila["Division"];

    }else {
      echo "<a href='index.php'> Debes rellenar todos los campos </a>";
    }
     ?>
  </body>
</html>
