<?php

namespace Controllers;
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
        // MOSTRAR LA VISTA DE CREAR CUENTA
        $router->render('auth/crear-cuenta', [

        ]);
    }

}