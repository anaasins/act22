<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Insercion de nuevos equipos</title>
  </head>
  <body>
    <?php
    //comptobamos que han rellenado todos los campos.
    if (empty($_POST["nombre"])==false && empty($_POST["ciudad"])==false && empty($_POST["conferencia"])==false && empty($_POST["division"])==false) {
      //incluimos la bd y creamos el objeto.
      include 'dbnba.php';
      $equipo=new dbnba();

      //llamamos a la funcion que nos inserta en la bd
      $resultado=$equipo->Insertarequipo($_POST["nombre"],  $_POST["ciudad"], $_POST["conferencia"], $_POST["division"]);
      //sacamos el ultimo equipo filtrandolo por el nombre.
      echo "ULTIMO REGISTRO: <br>";
      $resultado=$equipo->DevolverEquipoNombre($_POST["nombre"]);
      $fila=$resultado->fetch_assoc();
      echo "Nombre: " .$fila["Nombre"] ."<br>Ciudad: " .$fila["Ciudad"] ."<br>Conferencia: " .$fila["Conferencia"] ."<br>Division: " .$fila["Division"];

      //enlace para actualizar los campos que acabas de insertar.
      echo "<br>";
      echo "<a href='actualizar.php?nombre=".$fila["Nombre"]."&ciudad=".$fila["Ciudad"]."&conferencia=".$fila["Conferencia"]."&division=".$fila["Division"]."'>Actualizar registro.</a>";

      //Enlace borrar registro.
      echo "<br>";
      echo "<a href='listaequipos.php'>Borrar registro.</a>";

    }else {
      echo "<a href='index.php'> Debes rellenar todos los campos </a>";
    }
     ?>
  </body>
</html>
