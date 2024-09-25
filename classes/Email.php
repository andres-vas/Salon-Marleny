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
        $mail->Username = 'ac4ba9ec507067';
        $mail->Password = '5c1c37868513cf';

        $mail->setFrom('salonmarleny@marleny.com');
        $mail->addAddress('salonmarleny@marleny.com', 'SalonMarleny.com');
        $mail->Subject = 'Confirma tu Cuenta';

        // SET HTML

        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';
        $contenido = '<html>';
        $contenido .="<p><strong>Hola " . $this->nombre . "</strong> Has creado tu cuentqa en Salon Marlny, solo debes de confirmarla presionando el siguiene enlace</p>";
        $contenido .="<p>Presiona Aqui: <a href='http://localhost:8080/confirmar-cuenta?token=". $this->token. "'>Confirmar Cuenta</a></p>";
        $contenido .="<p>Si tu no solicitaste esta cuenta, puedes ignorar el mensaje</p>";
        $contenido .= '</html>';
        $mail->Body = $contenido;
        
        // ENVIAR EL EMAIL
        $mail->send();
        


    }

}



?>