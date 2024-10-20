<?php

namespace Controllers;

use Model\Cita;
use Model\CitaServicio;
use Model\Servicio;
use Model\Producto;

class APIController {

    public static function index() {
        $servicios = Servicio::all();
        echo json_encode($servicios);
        
    }

    public static function indexPro() {
        $productos = Producto::all();
        echo json_encode($productos);
    }

    public static function guardar() {
        // Almacena la Cita y devuelve el ID
        $cita = new Cita($_POST);
        $resultado = $cita->guardar();
        $id = $resultado['id'];
    
        // Almacena los Servicios con el ID de la Cita, si existen
        if (isset($_POST['servicios']) && !empty($_POST['servicios'])) {
            foreach ($_POST['servicios'] as $idServicio) {
                if (!empty($idServicio)) { // Solo guarda si el idServicio no está vacío
                    $args = [
                        'citaId' => $id,
                        'servicioId' => $idServicio,
                        'productoId' => null  // Deja productoId como nulo para servicios
                    ];
                    $citaServicio = new CitaServicio($args);
                    $citaServicio->guardar();
                }
            }
        }
    
        // Almacena los Productos con el ID de la Cita, si existen
        if (isset($_POST['productos']) && !empty($_POST['productos'])) {
            foreach ($_POST['productos'] as $idProducto) {
                if (!empty($idProducto)) { // Solo guarda si el idProducto no está vacío
                    $args = [
                        'citaId' => $id,
                        'servicioId' => null, // Deja servicioId como nulo para productos
                        'productoId' => $idProducto
                    ];
                    $citaProducto = new CitaServicio($args);
                    $citaProducto->guardar();
                }
            }
        }
    
        // Enviar respuesta en formato JSON
        echo json_encode(['resultado' => $resultado]);
    }
    
    
    
    
    

    public static function eliminar() {
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $cita = Cita::find($id);
            $cita->eliminar();
            header('Location:' . $_SERVER['HTTP_REFERER']);
        }
    }
}