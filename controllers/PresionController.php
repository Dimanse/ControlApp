<?php

namespace Controllers;


use Model\Perfil;
use Model\Usuario;
use MVC\Router;
use Model\Presion;

use Classes\Paginacion;
use Intervention\Image\ImageManagerStatic as Image;

class PresionController {

    public static function index(Router $router) {
        is_auth();
        $email = $_SESSION['email'];
        $usuario = Usuario::where('email', $email);
        
        $id = $_SESSION['id'];
        $presiones = Presion::belongsTo('propietarioId', $id);
        
        // $usuario->id = Usuario::find($id);
        $perfil = Perfil::where('propietarioId', $usuario->id);
        // debuguear($perfil);
        
        // $pagina_actual = $_GET['page'];
        // $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);
        
        
        // // debuguear($id);
        
        // if(!$pagina_actual || $pagina_actual < 1) {
        //     header('Location: /admin/mediciones?id='. $mediciones->propietarioId . '?page=1');
        // }
        // $registros_por_pagina = 5;
        // $total = Presion::total();
        // $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);

        // if($paginacion->total_paginas() < $pagina_actual) {
        //     header('Location: /admin/mediciones?page=1');
        //  }

        // $presiones = Presion::paginar($registros_por_pagina, $paginacion->offset());



        $router->render('admin/presion/index', [
            'titulo' => 'Perfiles Glucémicos',
            'perfil' => $perfil,
            'presiones' => $presiones,
            // 'paginacion' => $paginacion->paginacion(),
            'usuario' => $usuario,
        ]);
    }

    public static function crear(Router $router) {
        is_auth();
        $email = $_SESSION['email'];
        $usuario = Usuario::where('email', $email);

        // $id = $_SESSION['id'];
        $perfil = Perfil::where('propietarioId', $usuario->id);
        
        $alertas = [];
       

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $presion = new Presion($_POST);
                   
            $presion->sincronizar($_POST);

            // validar
            $alertas = $presion->validar();


            // Guardar el registro
            if(empty($alertas)) {

                // Generar una url unica
                
                $presion->propietarioId = $_SESSION['id'];
                // debuguear($presion);
                
                // Guardar en la BD
                $resultado = $presion->guardar();
                // debuguear($resultado);

                if($resultado) {
                    header('Location: /admin/presion?id=' . $presion->propietarioId);
                }
            }
        }

        $router->render('admin/presion/crear', [
            'titulo' => 'Registrar Glucemia',
            'alertas' => $alertas,
            'perfil' =>$perfil,
            'usuario' => $usuario,
            
        ]);
    }


    public static function editar(Router $router) {
        is_auth();
        $email = $_SESSION['email'];
        $usuario = Usuario::where('email', $email);

        $id = $_SESSION['id'];
        $perfil = Perfil::belongsTo('propietarioId', $id);
        $alertas = [];
        // Validar el ID
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if(!$id) {
            header('Location: /admin/presion');
        }

        // Obtener ponente a Editar
        $presion = Presion::find($id);

        if(!$presion) {
            header('Location: /admin/presion');
        }

       

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            

            

                
            $presion->sincronizar($_POST);

            $alertas = $presion->validar();

            if(empty($alertas)) {
                
                $resultado = $presion->guardar();
                if($resultado) {
                    header('Location: /admin/presion');
                }
            }

        }

        $router->render('admin/presion/editar', [
            'titulo' => 'Actualizar Medicion',
            'alertas' => $alertas,
            'presion' => $presion,
            'usuario' => $usuario,
            'perfil' => $perfil
            
        ]);

    }

    public static function eliminar() {
 
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin()) {
                header('Location: /login');
            }
            
            $id = $_POST['id'];
            $presion = Presion::find($id);
            if(!isset($presion) ) {
                header('Location: /admin/presion');
            }
            $resultado = $presion->eliminar();
            if($resultado) {
                header('Location: /admin/presion');
            }
        }

    }
}