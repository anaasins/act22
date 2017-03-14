<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Lista equipos</title>
  </head>
  <body>
    <?php
      include 'dbnba.php';
      $equipo=new dbnba();
      ?>

      <table border="1px">
        <thead>
         <tr>
           <th>Nombre</th>
           <th>Ciudad</th>
           <th>Conferencia</th>
           <th>Division</th>
           <th>Borrar</th>
         </tr>
        </thead>


      <?php

      $lista=$equipo->ListaEquipos();
      while ($fila=$lista->fetch_assoc()) {
        echo "<tr><td>" .$fila["Nombre"] ."</td><td>" .$fila["Ciudad"] ."</td><td>" .$fila["Conferencia"] ."</td><td>" .$fila["Division"] ."</td><td><a href='borrarDB.php?nombre=".$fila["Nombre"]."'>Borrar registro</a></td></tr>";
        }
     ?>

     </table>
  </body>
</html>
