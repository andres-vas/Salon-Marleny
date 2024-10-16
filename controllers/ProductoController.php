<?php

namespace Controllers;

use Model\Producto;
use Model\Promocion;  // Importación del modelo
use Model\Marca;  // Importación del modelo
use MVC\Router;

class ProductoController {
    public static function index(Router $router) {
        session_start();
        isAdmin();

        $productos = Producto::all();

        $router->render('productos/index', [
            'nombre' => $_SESSION['nombre'],
            'productos' => $productos
        ]);
    }

    public static function crear(Router $router) {
        session_start();
        isAdmin();
        $producto = new Producto;
        $alertas = [];

        // Obtener los tipos de descuentos
        $promociones = Promocion::all();
        $marcas = Marca::all();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $producto->sincronizar($_POST);

            $alertas = $producto->validar();

            if (empty($alertas)) {
                $producto->guardar();
                header('Location: /productos');
            }
        }

        $router->render('productos/crear', [
            'nombre' => $_SESSION['nombre'],
            'producto' => $producto,
            'promociones' => $promociones,
            'marcas' => $marcas,
            'alertas' => $alertas
        ]);
    }

    public static function actualizar(Router $router) {
        session_start();
        isAdmin();

        if (!is_numeric($_GET['id'])) return;

        $producto = Producto::find($_GET['id']);
        $alertas = [];

        // Obtener los tipos de descuentos
        $promociones = Promocion::all();
        $marcas = Marca::all();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $producto->sincronizar($_POST);

            $alertas = $producto->validar();

            if (empty($alertas)) {
                $producto->guardar();
                header('Location: /productos');
            }
        }

        $router->render('productos/actualizar', [
            'nombre' => $_SESSION['nombre'],
            'producto' => $producto,
            'promociones' => $promociones,
            'marcas' => $marcas,
            'alertas' => $alertas
        ]);
    }

    public static function eliminar() {
        session_start();
        isAdmin();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $producto = Producto::find($id);
            $producto->eliminar();
            header('Location: /productos');
        }
    }
}
