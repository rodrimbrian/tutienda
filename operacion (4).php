<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'mailer/Exception.php';
require 'mailer/PHPMailer.php';
require 'mailer/SMTP.php';

class BaseDatos
  {
      public $correo="";

    public function setCorreo($correo)
    {
      $this->correo=$correo;
    }

    public function conectar()
  	{
  	  $this->conexion=mysqli_connect("localhost","root","","proyecto");

  	    	if ($this->conexion) {
  	    		echo "conexion a base de datos OK"."<br>";
  	    		return $this->conexion;
  	    	}else{
  	    		echo "Error en BD"."<br>";
  	    	}
  	    //echo "Error en conexion Mysql"."<br>";
  	    }

  	public function recuperar()
    {
      //echo $this->correo;

        $consulta_c="select * from usuarios where correo='$this->correo'";
          //echo $consulta_c;
          $buscar_c= mysqli_query($this->conexion,$consulta_c);
            $res=mysqli_fetch_assoc($buscar_c);
              $contrasena=$res['contra'];
          if ($res) {
            //echo "busqueda exitos";
            $contraseña_encriptada=md5($contrasena);
              $cambiar_contrasena="update usuarios set contrasena='$contraseña_encriptada' where email='$this->correo'";
              $actualizacion_contrasena=mysqli_query($this->conexion,$cambiar_contrasena);
                //echo $cambiar_contrasena.'<br>';

                    $mail = new PHPMailer(true);
              try {
                  //Server settings
                  $mail->SMTPDebug = 0;
                  $mail->isSMTP();
                  $mail->Host       = 'smtp.gmail.com';
                  $mail->SMTPAuth   = true;
                  $mail->Username   = 'rontorres304@gmail.com';
                  $mail->Password   = '1000048535';
                  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                  $mail->Port       = 587;

                  //Recipients
                  $mail->setFrom('rontorres304@gmail.com', 'G.D.C Tienda virtual');
                  $mail->addAddress($this->correo);
                  $mail->isHTML(true);
                  $mail->Subject = utf8_decode('Recuperación de contraseña G.D.C Tienda virtual');
                  $mail->Body    = utf8_decode('Ingrese al siguiente link para cambiar la contraseña'.' http://localhost/Ronald/Proyecto/nueva.php ');
                  $mail->send();
                          echo'<script type="text/javascript">
                                alert("Enlace de contraseña enviado a su correo electronico, si es la primera vez que recupera contraseña el envio puede tardar hasta 10 minutos");
                                window.location.href="registro.php";
                                </script>';
              } catch (Exception $e) {
                  echo'<script type="text/javascript">
                        alert("El correo no fue enviado");
                        window.location.href="index.html";
                        </script>';
              }
          }else{
                          echo'<script type="text/javascript">
                                alert("el correo ingresado no cuenta con un usuario activo en el sistema");
                                window.location.href="recuperar_contraseña.php";
                                </script>';
            //echo "el correo ingresado no coincide con ninguna suscripción";
          }
    }
}
?>
