<!DOCTYPE html>
<html lang="es">
  <?php
    require 'plantilla/header.php';
  ?>
  <body class="fixed-nav" id="page-top" onload="getFacturas();">
    <?php
      include 'plantilla/menu.php';
      include 'plantilla/agregar.php';
      include 'plantilla/editar.php';
      include 'plantilla/pagar.php';
      include 'plantilla/footer.php';
    ?>
  </body>
</html>
