<?php
namespace Controllers;
use Model\Citas;
use Model\Perfil;
use Model\Usuario;
use MVC\Router;

class CitasController {
    // public static function index(Router $router) {
    //     is_auth();
    //     $usuario = Usuario::find('id');
    //     $perfil = Perfil::where('propietarioId', $usuario->id);
    //     $citas = Citas::where('citaId', $perfil->propietarioId );
    //     debuguear($citas);

    //     $router->render('admin/dashboard/index', [
    //         'titulo' => 'Proximas Citas',
    //         'usuario' => $usuario,
    //         'perfil' => $perfil,
    //         'citas' => $citas,

    //     ]);
            
    // }

    public static function crear_cita(Router $router) {
        is_auth();
        $usuario = Usuario::find('id');
        $perfil = Perfil::where('propietarioId', $usuario->id);
        $citas = Citas::where('citaId', $perfil->propietarioId );
        $alertas = [];
        // debuguear($citas);

        if($_SERVER['REQUEST_METHOD'] === 'POST') {   
            $citas->sincronizar($_POST);

            $alertas = $citas->validar_citas();

            if(empty($alertas)) {
                
                $resultado = $citas->guardar();
                if($resultado) {
                    header('Location: /admin/dashboard?id=' . $perfil->propietarioId );
                }
            }

        }

        $router->render('admin/dashboard/crear_cita', [
            'titulo' => 'Proximas Citas',
            'usuario' => $usuario,
            'perfil' => $perfil,
            'citas' => $citas,
            'alertas' => $alertas,

        ]);
    }

    public static function editar_cita(Router $router) {


        $router->render('admin/dashboard/editar_cita', []);
    }

    public static function eliminar_cita() {

    }


}