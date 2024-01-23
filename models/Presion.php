<?php 

namespace Model;

class Presion extends ActiveRecord {
    protected static $tabla = 'presion';
    protected static $columnasDB = ['id', 'fecha', 'hora', 'max', 'min', 'observaciones', 'propietarioId'];


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->fecha = $args['fecha'] ?? '';
        $this->hora = $args['hora'] ?? '';
        $this->max = $args['max'] ?? '';
        $this->min = $args['min'] ?? '';
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
        if(!$this->max) {
            self::$alertas['error'][] = 'Debes inclir una medida máxima válida';
        }
        if(!$this->min) {
            self::$alertas['error'][] = 'Debes inclir una medida mínima válida';
        }
        
        
    
        return self::$alertas;
    }

    


}