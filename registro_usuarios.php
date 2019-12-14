<?php
$correo=$_POST["correo"];
$nombre_usuario=$_POST["nombre_usuario"];
$contraseña=$_POST["contraseña"];



// Create connection
$conn=mysqli_connect('localhost','root','','proyecto');


$sql = "INSERT INTO registro_usuarios VALUES('$correo','$nombre_usuario','$contraseña')";
$result=mysqli_query($conn,$sql);
if ($result==true) {
      
      echo "<script>alert('usuario registrado');
      window.location.href='login.html';</script>";
}
else {
      echo "<script>alert('usuario ya registrado');
          window.location.href='registro_usu.html';</script>";

}

?>
