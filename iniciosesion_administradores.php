<?php

$codigo_empresa=$_POST["codigo_empresa"];
$correo=$_POST["correo"];
$contraseña=$_POST["contraseña"];


$result=mysqli_query($con,"select * from registro_administradores ;");





//exito has iniciado sesion
  echo "<script>alert('has iniciado sesion');
  window.location.href='pajina_administradores.html';</script>";



//error no estas registrado
      echo "<script>alert('no estas registrado');
      window.location.href='sesion_admin.html';</script>";


?>
