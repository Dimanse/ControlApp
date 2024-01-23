<?php 

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\AuthController;
use Controllers\PresionController;

use Controllers\DashboardController;
// use Controllers\PonentesController;
use Controllers\MedicionesController;
use Controllers\TratamientoController;

$router = new Router();

// Login
$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'login']);
$router->post('/logout', [AuthController::class, 'logout']);

// Crear Cuenta
$router->get('/registro', [AuthController::class, 'registro']);
$router->post('/registro', [AuthController::class, 'registro']);

// Formulario de olvide mi password
$router->get('/olvide', [AuthController::class, 'olvide']);
$router->post('/olvide', [AuthController::class, 'olvide']);

// Colocar el nuevo password
$router->get('/reestablecer', [AuthController::class, 'reestablecer']);
$router->post('/reestablecer', [AuthController::class, 'reestablecer']);

// Confirmación de Cuenta
$router->get('/mensaje_confirmacion', [AuthController::class, 'mensaje_confirmacion']);
$router->get('/mensaje_reestablecer', [AuthController::class, 'mensaje_reestablecer']);
$router->get('/confirmar', [AuthController::class, 'confirmar']);


// Area de administración
$router->get('/admin/dashboard', [DashboardController::class, 'index']);
$router->get('/admin/dashboard/crear', [DashboardController::class, 'crear']);
$router->post('/admin/dashboard/crear', [DashboardController::class, 'crear']);
$router->get('/admin/dashboard/editar', [DashboardController::class, 'editar']);
$router->post('/admin/dashboard/editar', [DashboardController::class, 'editar']);
$router->post('/admin/dashboard/eliminar', [DashboardController::class, 'eliminar']);

$router->get('/admin/mediciones', [MedicionesController::class, 'index']);
$router->get('/admin/mediciones/crear', [MedicionesController::class, 'crear']);
$router->post('/admin/mediciones/crear', [MedicionesController::class, 'crear']);
$router->get('/admin/mediciones/editar', [MedicionesController::class, 'editar']);
$router->post('/admin/mediciones/editar', [MedicionesController::class, 'editar']);
$router->post('/admin/mediciones/eliminar', [MedicionesController::class, 'eliminar']);

$router->get('/admin/presion', [PresionController::class, 'index']);
$router->get('/admin/presion/crear', [PresionController::class, 'crear']);
$router->post('/admin/presion/crear', [PresionController::class, 'crear']);
$router->get('/admin/presion/editar', [PresionController::class, 'editar']);
$router->post('/admin/presion/editar', [PresionController::class, 'editar']);
$router->post('/admin/presion/eliminar', [PresionController::class, 'eliminar']);

$router->get('/admin/tratamiento', [TratamientoController::class, 'index']);
$router->get('/admin/tratamiento/crear', [TratamientoController::class, 'crear']);
$router->post('/admin/tratamiento/crear', [TratamientoController::class, 'crear']);
$router->get('/admin/tratamiento/editar', [TratamientoController::class, 'editar']);
$router->post('/admin/tratamiento/editar', [TratamientoController::class, 'editar']);
$router->post('/admin/tratamiento/eliminar', [TratamientoController::class, 'eliminar']);







// Registro de Usuarios


// Boleto virtual


$router->comprobarRutas();