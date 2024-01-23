<?php

namespace Controllers;

use Model\Perfil;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;


Class PonentesController{

    public static function index(Router $router){
       is_auth();
       $perfiles = Perfil::belongsTo('perfilId', $perfil->usuarioId);
        // debuguear($ponentes);




        $router->render('/admin/ponentes/index', [
            'titulo'=> 'Ponentes / Conferencistas',
            'ponentes'=> $ponentes,
        ]);
    }

    public static function crear(Router $router){
        $alertas = [];
        $ponente = new Ponente;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            // leer imagen
            //No olvidarse de añadir en el formulario enctype="multipart/form-data"

            if(!empty($_FILES['imagen']['tmp_name'])){
                $carpeta_imagenes = '../public/img/speakers';
                // Crear la carpeta si no existe
                if(!is_dir($carpeta_imagenes)){
                    mkdir($carpeta_imagenes, 0777, true);

                }

                $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('png', 80);
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('webp', 80);

                $nombre_imagen = md5(uniqId(rand(), true));

                $_POST['imagen'] = $nombre_imagen; 

            }

            $_POST['redes'] = json_encode($_POST['redes'].JSON_UNESCAPED_SLASHES);

            $ponente->sincronizar($_POST);

            // Validar

            $alertas = $ponente->validar();

            // Guardar el registro
            if(empty($alertas)){
                $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . '.png');
                $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . '.webp');

                $resultado = $ponente->guardar();

                if($resultado){
                    header('Location: /admin/ponentes');
                }
            }
        }
        
        $router->render('/admin/ponentes/crear', [
            'titulo'=> 'Registrar Ponente',
            'alertas' => $alertas,
            'ponente' => $ponente,
        ]);
    }


    public static function editar(Router $router){
        $alertas = [];
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);// convertir el id en un número entero

        if(!$id){
            header('Location: /admin/ponentes');
        }

        // Obtener el ponente a editar
        $ponente = Ponente::find($id);

        if(!$ponente){
            header('Location: /admin/ponentes');
        }

        $ponente->imagen_actual = $ponente->imagen;

        $router->render('/admin/ponentes/editar', [
            'titulo'=> 'Actualizar Ponente',
            'alertas' => $alertas,
            'ponente' => $ponente,
        ]);
    }
}
