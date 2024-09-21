<?php

namespace Controllers;


use Classes\Email;
use Model\Usuario;
use MVC\Router;

class LoginController {
    public static function login(Router $router) {
        // MOSTRAR LA VISTA DEL LOGIN
        $router->render('auth/login');
    }

    public static function logout() {
        // CERRAR CUENTA

    }

    public static function olvide(Router $router) {
        // MOSTRAR LA VISTA DE OLVIDE PASSWORD
        $router->render('auth/olvide-password', [

        ]);
    }

    public static function recuperar() {
        // MOSTRAR LA VISTA DE RECUPERAR CUENTA
        echo "DESDE RECUPERAR";
    }

    public static function crear(Router $router) {
        $usuario = new Usuario;

        // ALERTAS VACIAS
        $alertas = [];
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarNuevaCuenta();

            // REVISAR QUE ALERTA ESTE VACIO
            if(empty($alertas)){
                // VALIDAR QUE EL CORREO NO EXISTA
                $resultado = $usuario->existeUsuario();

                if($resultado->num_rows) {
                    $alertas = Usuario::getAlertas();
                } else {
                    //  HASHEAR EL PASSWORD
                    $usuario->hashPassword();

                    // GENERAR UN TOKEN UNICO
                    $usuario->crearToken();

                    // ENVIAR EMAIL
                    $email = new Email($usuario->nombre, $usuario->email, $usuario->token);
                    $email->enviarConfirmacion();

                    // CREAR EL USUARIO
                    $resultado = $usuario->guardar();
                    if($resultado) {
                        header('Location: /mensaje');
                    }

                    //debuguear($usuario);
                    
                }
            }
        }

        // MOSTRAR LA VISTA DE CREAR CUENTA
        $router->render('auth/crear-cuenta', [
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);
    }

    public static function mensaje(Router $router) {
        $router->render('auth/mensaje');
    }

}