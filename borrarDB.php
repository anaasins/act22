<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Borrar entrada.</title>
  </head>
  <body>
    <?php
      include 'dbnba.php';
      $equipo=new dbnba();

      $borrar=$equipo->BorrarEquipo($_GET["nombre"]);

      if ($borrar==true) {
        echo "Se ha borrado con exito";
      }else {
        echo "<a href='listaequipos.php>No se ha podido borrar.</a>'";
      }
     ?>
  </body>
</html>
