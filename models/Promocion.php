<?php 

namespace Model;

class Promocion extends ActiveRecord {
    protected static $tabla = 'promocion';
    protected static $columnasDB = ['id', 'descripcion_promocion', 'fecha_inicio_promocion', 'fecha_fin_promocion', 'id_tipo_descuento', 'activo_descuento'];

    public $id;
    public $descripcion_promocion;
    public $fecha_inicio_promocion;
    public $fecha_fin_promocion;
    public $id_tipo_descuento;
    public $activo_descuento;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->descripcion_promocion = $args['descripcion_promocion'] ?? '';
        $this->fecha_inicio_promocion = $args['fecha_inicio_promocion'] ?? '';
        $this->fecha_fin_promocion = $args['fecha_fin_promocion'] ?? '';
        $this->id_tipo_descuento = $args['id_tipo_descuento'] ?? '';
        $this->activo_descuento = $args['activo_descuento'] ?? '';
    }

    public function validar() {
        self::$alertas = [];

        if (!$this->descripcion_promocion) {
            self::$alertas['error'][] = 'La descripción de la promoción es obligatoria';
        }
        if (!$this->fecha_inicio_promocion) {
            self::$alertas['error'][] = 'La fecha de inicio es obligatoria';
        }
        if (!$this->fecha_fin_promocion) {
            self::$alertas['error'][] = 'La fecha de fin es obligatoria';
        }
        if (!$this->id_tipo_descuento) {
            self::$alertas['error'][] = 'El tipo de descuento es obligatorio';
        }

        return self::$alertas;
    }
}