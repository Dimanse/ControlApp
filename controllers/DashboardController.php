<?php

namespace Controllers;

use Model\Citas;
use Model\Perfil;
use Model\Usuario;
use MVC\Router;

use Intervention\Image\ImageManagerStatic as Image;

Class DashboardController{

    public static function index(Router $router){
        is_auth();
        $email = $_SESSION['email'];
        $usuario = Usuario::where('email', $email);

        $id = $_SESSION['id'];
        $perfil = Perfil::where('propietarioId', $id);
        $citas = Citas::belongsTo('citaId', $id );
        // debuguear($perfil->fecha);
        
        $router->render('/admin/dashboard/index', [
            'titulo'=> 'Este es tu perfil, ',
            'titulo1'=> 'ya puedes crear tu perfil',
            'titulo2' => 'Proximas citas médicas',
            'usuario' => $usuario,
            'perfil' =>$perfil,
            'citas' => $citas
            
        ]);
    }

    
    

    public static function crear(Router $router){
        is_auth();
        $email = $_SESSION['email'];
        $usuario = Usuario::where('email', $email);
        $alertas = [];
        $perfil = new Perfil;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            // leer imagen
            //No olvidarse de añadir en el formulario enctype="multipart/form-data"

            if(!empty($_FILES['imagen']['tmp_name'])){
                $carpeta_imagenes = '../public/img/paciente';
                // Crear la carpeta si no existe
                if(!is_dir($carpeta_imagenes)){
                    mkdir($carpeta_imagenes, 0777, true);

                }

                $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('png', 80);
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('webp', 80);

                $nombre_imagen = md5(uniqId(rand(), true));

                $_POST['imagen'] = $nombre_imagen; 

            }

            // $_POST['redes'] = json_encode($_POST['redes'].JSON_UNESCAPED_SLASHES);

            $perfil->sincronizar($_POST);

            // Validar

            $alertas = $perfil->validar_perfil(); 
            $perfil->confirmados = '1';
            $perfil->propietarioId = $_SESSION['id'];


            // Guardar el registro
            if(empty($alertas)){
                $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . '.png');
                $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . '.webp');

                $resultado = $perfil->guardar();

                if($resultado){
                    header('Location: /admin/dashboard?id='. $perfil->propietarioId);
                }
            }
        }
        
        $router->render('/admin/dashboard/crear', [
            'titulo'=> 'Registrar perfil',
            'alertas' => $alertas,
            'perfil' => $perfil,
            'usuario' => $usuario
        ]);
    }


    public static function editar(Router $router){
        $alertas = [];
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);// convertir el id en un número entero

        if(!$id){
            header('Location: /admin/dashboard');
        }

        // Obtener el ponente a editar
        $perfil = Perfil::find($id);
        // debuguear($perfil);
        

        if(!$perfil){
            header('Location: /admin/dashboard');
        }

        $perfil->imagen_actual = $perfil->imagen;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            // if(!is_admin()) {
            //     header('Location: /login');
            // }

            if(!empty($_FILES['imagen']['tmp_name'])) {
                
                $carpeta_imagenes = '../public/img/paciente';

                // Crear la carpeta si no existe
                // if(!is_dir($carpeta_imagenes)) {
                //     mkdir($carpeta_imagenes, 0755, true);
                // }

                $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('png', 80);
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('webp', 80);

                $nombre_imagen = md5( uniqid( rand(), true) );

                $_POST['imagen'] = $nombre_imagen;         
                        
            } else {
                $_POST['imagen'] = $perfil->imagen_actual;
            }

            $perfil->sincronizar($_POST);
            // debuguear($perfil);
            $alertas = $perfil->validar();

            if(empty($alertas)) {
                if(isset($nombre_imagen)) {
                    $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".png" );
                    $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp" );
                }
                $resultado = $perfil->guardar();
                if($resultado) {
                    header('Location: /admin/dashboard?id='. $perfil->propietarioId);
                }
            }

        }

        $router->render('/admin/dashboard/editar', [
            'titulo'=> 'Actualizar Paciente',
            'alertas' => $alertas,
            'perfil' => $perfil,
        ]);
    }


    public static function crear_cita(Router $router) {
        
        is_auth();
        $usuario = Usuario::find('id');
        $perfil = Perfil::where('propietarioId', $usuario->id);
        $citas = new Citas();
        $alertas = [];
        // debuguear($citas);

        if($_SERVER['REQUEST_METHOD'] === 'POST') {   
            $citas->sincronizar($_POST);
            $alertas = $citas->validar_citas();
            $citas->citaId = $_SESSION['id'];
            // debuguear($citas);

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

    public static function editar_cita(Router $router){
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
            header('Location: /admin/dashboard');
        }

        // Obtener ponente a Editar
        $cita = Citas::find($id);

        if(!$cita) {
            header('Location: /admin/dashboard');
        }
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            

            

                
            $cita->sincronizar($_POST);

            $alertas = $cita->validar_citas();

            if(empty($alertas)) {
                
                $resultado = $cita->guardar();
                if($resultado) {
                    header('Location: /admin/dashboard'.$perfil->propietarioId);
                }
            }

        }

        $router->render('admin/dashboard/editar_cita', [
            'titulo' => 'Actualizar cita',
            'alertas' => $alertas,
            'cita' => $cita,
            'usuario' => $usuario,
            'perfil' => $perfil
            
        ]);
    }
    
}