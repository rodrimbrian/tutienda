<?php
$correo=$_POST["correo"];
$nombre_usuario=$_POST["nombre_usuario"];
$contraseña=$_POST["contraseña"];
$nombre_empresa=$_POST["nombre_empresa"];
$codi_empresa=$_POST["codi_empresa"];
$ciudad=$_POST["ciudad"];
$numero_celular=$_POST["numero_celular"];


// Create connection
$conn=mysqli_connect('localhost','root','','proyecto');
// Check connection
if ($conn==true) {


$sql = "INSERT INTO registro_proveedores VALUES('$correo','$nombre_usuario','$contraseña','$nombre_empresa','$codi_empresa','$ciudad','$numero_celular')";
$result=mysqli_query($conn,$sql);
if ($result==true) {

      echo "<script>alert('usuario registrado');
      window.location.href='login_pro.html';</script>";

      echo "<script>alert('Correo ya registrado');
      window.location.href='registro_pro.html';</script>";


}
}



?>
