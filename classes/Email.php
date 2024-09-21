<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email{

    public $email;
    public $nombre;
    public $token;

    public function __construct ($email, $nombre, $token){
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion(){
        // CREAR EL OBJETO DE EMAIL
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = 'd5df1d836ccd62';
        $mail->Password = '2a606b00d95736';

        $mail->setFrom('salonmarleny@marleny.com');
        $mail->addAddress('salonmarleny@marleny.com', 'SalonMarleny.com');
        $mail->Subject = 'Confirma tu Cuenta';

        // SET HTML

        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';
        $contenido = '<html>';
        $contenido .="<p><strong>Hola " . $this->nombre . "</strong> Has creado tu cuentqa en Salon Marlny, solo debes de confirmarla presionando el siguiene enlace</p>";
        $contenido .="<p>Presiona Aqui: <a href='http://localhost:3000/confirmar-cuenta?token=". $this->token. "'>Confirmar Cuenta</a></p>";
        $contenido .="<p>Si tu no solicitaste esta cuenta, puedes ignorar el mensaje</p>";
        $contenido .= '</html>';
        $mail->Body = $contenido;
        
        // ENVIAR EL EMAIL
        $mail->send();
        


    }

}



?>