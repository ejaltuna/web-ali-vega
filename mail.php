<?php
  //Comprobamos que se haya presionado el boton enviar
        if(isset($_POST['send'])){

        //Guardamos en variables los datos enviados
            $nombre = $_POST['name'];
            $email = $_POST['email'];
            $subject = $_POST['subject'];
            $mense = $_POST['message'];

        ///Validamos del lado del servidor que el nombre y el email no estén vacios
            if($nombre == ''){
                echo "Debe ingresar su nombre";
            }
            else if($email == ''){
                echo "Debe ingresar su email";
            }else{
        $para = "ventas@lavegaalimentos.com.ve , info@lavegaalimentos.com.ve";//Email al que se enviará
        $asunto = "$nombre Esta Interesado en saber de tus Productos";//Puedes cambiar el asunto del mensaje desde aqui
        //Este sería el cuerpo del mensaje
        $mensaje = "
                    <table border='0' cellspacing='2' cellpadding='2' align='center'>
                    <tr>
                    <td width='30%' align='center'><strong>Cliente Interesado.</strong></td>
                
                    </tr>
                    <tr>
                    <td width='30%' align='right'><strong>Nombre de la persona interesada:</strong></td>
                    <td width='80%' align='left'>$nombre</td>
                    </tr>
                    <tr>
                    <td width='30%' align='right'><strong>correo de la persona:</strong></td>
                    <td width='70%' align='left'>$email</td>
                    </tr>
                    <tr>
                    <td align='right'><strong>Asusnto:</strong></td>
                    <td align='left'>$subject</td>
                    </tr>
                    <tr>
                    <td width='30%' align='right' ><strong>Descripcion del Mensaje:</strong></td>
                    <td width='70%' align='left'>$mense</td>
                    </tr>

                    
                    </table>
                    ";

            //Cabeceras del correo
            $headers = "From: $nombre <$email>\r\n"; //Quien envia?
            $headers .= "X-Mailer: PHP5\n";
            $headers .= 'MIME-Version: 1.0' . "\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; //

        //Comprobamos que los datos enviados a la función MAIL de PHP estén bien y si es correcto enviamos
            if(mail($para, $asunto, $mensaje, $headers)){
        echo '<script type="text/javascript">alert("Tu correo fue enviado con exito");
        window.location.assign("http://www.lavegaalimentos.com.ve/contacto.html");
        </script>';
                        

            }else{
                
        echo '<script type="text/javascript">alert("Tu correo No fue enviado ");
        window.location.assign("http://www.lavegaalimentos.com.ve/contacto.html");
        </script>';
                     
            }
        }
    }
?>