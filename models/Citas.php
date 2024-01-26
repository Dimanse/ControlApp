<?php 
namespace Model;

class Citas extends ActiveRecord {
    protected static $tabla = 'citas';
    protected static $columnasDB = ['id', 'fecha', 'hora', 'especialista', 'clinica', 'observaciones', 'citaId'];

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->fecha = $args['fecha'] ?? '';
        $this->hora = $args['hora'] ?? '';
        $this->especialista = $args['especialista'] ?? '';
        $this->clinica = $args['clinica'] ?? '';
        $this->observaciones = $args['observaciones'] ?? '';
        $this->citaId = $args['citaId'] ?? '';
    }

    public function validar_citas() {
        if(!$this->fecha) {
            self::$alertas['error'][] = 'Debes añadir la fecha de la cita';
        }
        if(!$this->hora) {
            self::$alertas['error'][] = 'Agrega la hora exacta de la cita';
        }
        if(!$this->especialista) {
            self::$alertas['error'][] = '¿En que especialidad es tu cita?';
        }
       
        if(!$this->clinica) {
            self::$alertas['error'][] = '¿en que clínica o ebais es la cita?';
        }
        
        
        return self::$alertas;
    }
}