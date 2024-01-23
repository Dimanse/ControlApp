<?php 

namespace Model;

class Medicion extends ActiveRecord {
    protected static $tabla = 'mediciones';
    protected static $columnasDB = ['id', 'fecha', 'hora', 'tiempo', 'glucemia', 'observaciones', 'propietarioId'];


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->fecha = $args['fecha'] ?? '';
        $this->hora = $args['hora'] ?? '';
        $this->tiempo = $args['tiempo'] ?? '';
        $this->glucemia = $args['glucemia'] ?? '';
        $this->observaciones = $args['observaciones'] ?? '';
        $this->propietarioId = $args['propietarioId'] ?? '';
    }

    public function validar() {
        if(!$this->fecha) {
            self::$alertas['error'][] = 'La Fecha es Obligatoria';
        }
        if(!$this->hora) {
            self::$alertas['error'][] = 'La Hora es Obligatoria';
        }
        if(!$this->tiempo) {
            self::$alertas['error'][] = 'El momento de la medición es Obligatorio';
        }
        if(!$this->glucemia) {
            self::$alertas['error'][] = 'El Campo de Gluicemía es Obligatorio';
        }
        
    
        return self::$alertas;
    }


}