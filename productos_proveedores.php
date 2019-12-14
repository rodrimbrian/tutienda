<?php


$id_producto=$_POST["id_producto"];
$descripcion=$_POST["descripcion"];
$imagen_producto=$_POST["imagen_producto"];
$precio=$_POST["precio"];
$cantidad=$_POST["cantidad"];




$conn=mysqli_connect('localhost','root','','proyecto');


$sql = "INSERT INTO productos_proveedores VALUES ('$id_producto','$descripcion','$imagen_prducto','$precio','$cantidad')";



$result=mysqli_query($conn,$sql);
if ($result==true) {
//exito productos registrados
      echo "<script>alert('productos registrados');
      window.location.href='insert_proveedor.html';</script>";
}
else {
  // error  productos registrados
      echo "<script>alert('productos ya registrado');
      window.location.href='insert_proveedor.html';</script>";

}

?>
