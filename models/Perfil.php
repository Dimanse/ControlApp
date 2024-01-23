<?php 

namespace Model;

class Perfil extends ActiveRecord {
    protected static $tabla = 'perfil';
    protected static $columnasDB = ['id', 'nombres', 'imagen', 'enfermedades', 'fecha', 'apellidos', 'doctor', 'estatura', 'peso', 'clinica', 'observaciones', 'confirmados', 'propietarioId'];


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombres = $args['nombres'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->enfermedades = $args['enfermedades'] ?? '';
        $this->fecha = $args['fecha'] ?? '';
        $this->apellidos = $args['apellidos'] ?? '';
        $this->doctor = $args['doctor'] ?? '';
        $this->estatura = $args['estatura'] ?? '';
        $this->peso = $args['peso'] ?? '';
        $this->clinica = $args['clinica'] ?? '';
        $this->observaciones = $args['observaciones'] ?? '';
        $this->confirmados = $args['confirmados'] ?? '';
        $this->propietarioId = $args['propietarioId'] ?? '';
    }

    public function validar_perfil() {
        if(!$this->nombres) {
            self::$alertas['error'][] = 'Debes añadir tu nombre completo';
        }
        if(!$this->apellidos) {
            self::$alertas['error'][] = 'Agrega tus apellidos';
        }
        if(!$this->imagen) {
            self::$alertas['error'][] = 'Añade la imagen de perfil que tu desees';
        }
        if(!$this->fecha) {
            self::$alertas['error'][] = 'Seria bueno que añadieras tu fecha de nacimiento';
        }
       
        if(!$this->doctor) {
            self::$alertas['error'][] = '¿como se llama tu doctor?';
        }
        if(!$this->estatura) {
            self::$alertas['error'][] = '¿cuanto mides?';
        }
        if(!$this->peso) {
            self::$alertas['error'][] = '¿Dime tu peso?';
        }
        
        return self::$alertas;
    }
        
        
    
}   