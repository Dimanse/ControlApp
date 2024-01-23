<?php 

namespace Controllers;
use Model\Perfil;
use Model\Tratamiento;
use Model\Usuario;
use MVC\Router;

class TratamientoController {
    public static function index(Router $router){
        is_auth();
        $email = $_SESSION['email'];
        $usuario = Usuario::where('email', $email);
        $perfil = Perfil::where('propietarioId', $usuario->id);
        $id = $_SESSION['id'];
        $tratamientos = Tratamiento::belongsTo('propietarioId', $id);
        // debuguear($tratamientos);


        $router->render('/admin/tratamiento/index', [
            'titulo'=> 'Ya puedes añadir tu tratamiento ',
            'titulo1'=> 'Este es tu tratamiento',
            'usuario' => $usuario,
            'perfil' =>$perfil,
            'tratamientos' => $tratamientos
            
        ]);
    }

    public static function crear(Router $router){
        is_auth();
        $email = $_SESSION['email'];
        $usuario = Usuario::where('email', $email);
        $perfil = Perfil::where('propietarioId', $usuario->id);
        $tratamiento = Tratamiento::where('propietarioId', $usuario->id);
        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $tratamiento = new Tratamiento($_POST);
            $tratamiento->sincronizar($_POST);
            $tratamiento->validar_tratamiento();

            if(empty($alertas)){
                $tratamiento->propietarioId = $_SESSION['id'];

                $resultado = $tratamiento->guardar();

                if($resultado) {
                    header('Location: /admin/tratamiento?id=' . $tratamiento->propietarioId);
                }
            }
        }

        $router->render('/admin/tratamiento/crear', [
            'titulo'=> 'Añade tu tratamiento ',
            // 'titulo1'=> 'ya puedes crear tu perfil',
            'usuario' => $usuario,
            'tratamiento' =>$tratamiento,
            'alertas' => $alertas,
            'perfil' => $perfil
            
        ]);
    }

    public static function editar(Router $router){
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
            header('Location: /admin/tratamiento');
        }

        // Obtener ponente a Editar
        $tratamiento = Tratamiento::find($id);

        if(!$tratamiento) {
            header('Location: /admin/tratamiento');
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tratamiento->sincronizar($_POST);

            $alertas = $tratamiento->validar_tratamiento();

            if(empty($alertas)) {
                
                $resultado = $tratamiento->guardar();
                if($resultado) {
                    header('Location: /admin/tratamiento');
                }
            }

        }

        $router->render('/admin/tratamiento/editar', [
            'titulo'=> 'Actualiza tu tratamiento ',
            // 'titulo1'=> 'ya puedes crear tu perfil',
            'usuario' => $usuario,
            'perfil' => $perfil,
            'tratamiento' => $tratamiento,
            'alertas' => $alertas
            
        ]);
    }

    public static function eliminar(Router $router){
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin()) {
                header('Location: /login');
            }
            
            $id = $_POST['id'];
            $tratamiento = Tratamiento::find($id);
            if(!isset($tratamiento) ) {
                header('Location: /admin/tratamiento');
            }
            $resultado = $tratamiento->eliminar();
            if($resultado) {
                header('Location: /admin/tratamiento');
            }
        }
    }
}