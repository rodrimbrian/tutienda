<?php

$correo=$_POST["correo"];
$contraseña=$_POST["contraseña"];

      $con=mysqli_connect("localhost","root","","proyecto");
      if ($con==true) {
        //echo "Conexion exitosa";

      }
      else {
        echo "error";
      }

      $result=mysqli_query($con,"select * from registro_usuarios ;");



      echo "<script>alert('has iniciado sesion');
      window.location.href='principal.html';</script>";

      echo "<script>alert('no estas registrado');
      window.location.href='login.html';</script>";

?>
