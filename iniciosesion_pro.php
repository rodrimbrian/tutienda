<?php


$servername = "localhost";
$database = "proyecto";
$username = "root";
$password = "";


$sql = "select * from registro_proveedores";





//exito conexion
echo "<script>alert('has iniciado sesion');
window.location.href='insert_proveedor.html';</script>";


//error registro
echo "<script>alert('no estas registrado');
window.location.href='login_pro.html';</script>";





?>
