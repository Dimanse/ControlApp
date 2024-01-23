<?php

namespace Controllers;

use Model\Medicion;
use Model\Perfil;
use Model\Presion;
use Model\Usuario;
use MVC\Router;

use Classes\Paginacion;
use Intervention\Image\ImageManagerStatic as Image;

class MedicionesController {

    public static function index(Router $router) {
        is_auth();
        $email = $_SESSION['email'];
        $usuario = Usuario::where('email', $email);
        
        $id = $_SESSION['id'];
        $mediciones = Medicion::belongsTo('propietarioId', $id);
        
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



        $router->render('admin/mediciones/index', [
            'titulo' => 'Perfiles Glucémicos',
            'perfil' => $perfil,
            // 'presiones' => $presiones,
            'mediciones' => $mediciones,
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
            
            $medicion = new Medicion($_POST);
                   
            $medicion->sincronizar($_POST);

            // validar
            $alertas = $medicion->validar();


            // Guardar el registro
            if(empty($alertas)) {

                // Generar una url unica
                
                $medicion->propietarioId = $_SESSION['id'];
                // debuguear($medicion);
                
                // Guardar en la BD
                $resultado = $medicion->guardar();
                // debuguear($resultado);

                if($resultado) {
                    header('Location: /admin/mediciones?id=' . $medicion->propietarioId);
                }
            }
        }

        $router->render('admin/mediciones/crear', [
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
            header('Location: /admin/mediciones');
        }

        // Obtener ponente a Editar
        $medicion = Medicion::find($id);

        if(!$medicion) {
            header('Location: /admin/mediciones');
        }

        $medicion->imagen_actual = $medicion->imagen;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            

            

                
            $medicion->sincronizar($_POST);

            $alertas = $medicion->validar();

            if(empty($alertas)) {
                
                $resultado = $medicion->guardar();
                if($resultado) {
                    header('Location: /admin/mediciones');
                }
            }

        }

        $router->render('admin/mediciones/editar', [
            'titulo' => 'Actualizar Medicion',
            'alertas' => $alertas,
            'medicion' => $medicion,
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
            $medicion = Medicion::find($id);
            if(!isset($medicion) ) {
                header('Location: /admin/mediciones');
            }
            $resultado = $medicion->eliminar();
            if($resultado) {
                header('Location: /admin/mediciones');
            }
        }

    }
}