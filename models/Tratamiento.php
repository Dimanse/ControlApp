<?php
namespace Model;

class Tratamiento extends ActiveRecord {

    protected static $tabla = 'tratamiento';
    protected static $columnasDB = ['id', 'hora','tiempo', 'cantidad', 'formato', 'medicamento', 'gramos', 'observaciones', 'propietarioId'];

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->hora = $args['hora'] ?? '';
        $this->tiempo = $args['tiempo'] ?? '';
        $this->cantidad = $args['cantidad'] ?? '';
        $this->formato = $args['formato'] ?? '';
        $this->medicamento = $args['medicamento'] ?? '';
        $this->gramos = $args['gramos'] ?? '';
        $this->observaciones = $args['observaciones'] ?? '';
        $this->propietarioId = $args['propietarioId'] ?? '';
    }

    public function validar_tratamiento(){
        if(!$this->hora){
            self::$alertas['error'][] = 'La hora es obligatoria';
        }
        if(!$this->cantidad){
            self::$alertas['error'][] = 'La cantidad es obligatoria';
        }
        if(!$this->formato){
            self::$alertas['error'][] = 'La formato es obligatorio';
        }
        if(!$this->medicamento){
            self::$alertas['error'][] = 'El nombre del medicamento es obligatorio';
        }
       

        

        return self::$alertas;
    }
}