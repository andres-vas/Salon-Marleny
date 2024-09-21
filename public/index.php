<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\LoginController;
use MVC\Router;

$router = new Router();

// --- INICIAR SESION ---
$router->get('/', [LoginController::class, 'login']);
$router->post('/', [LoginController::class, 'login']);
// --- CERRAR SESION ---
$router->get('/logout', [LoginController::class, 'logout']);

// --- RECUPERAR PASSWORD ---
$router->get('/olvide', [LoginController::class, 'olvide']);
$router->post('/olvide', [LoginController::class, 'olvide']);
$router->get('/recuperar', [LoginController::class, 'recuperar']);
$router->post('/recuperar', [LoginController::class, 'recuperar']);

// --- CREAR CUENTAS ---
$router->get('/crear-cuenta', [LoginController::class, 'crear']);
$router->post('/crear-cuenta', [LoginController::class, 'crear']);


// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();