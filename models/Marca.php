<?php 

namespace Model;

class Marca extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'marca';
    protected static $columnasDB = ['id', 'nombre_marca', 'imagen_marca'];

    public $id;
    public $nombre_marca;
    public $precio_marca;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre_marca = $args['nombre_marca'] ?? '';
        $this->imagen_marca = $args['imagen_marca'] ?? '';
    }

    public function validar() {
        if(!$this->nombre_marca) {
            self::$alertas['error'][] = 'El Nombre de la Marca es Obligatorio';
        }
        if(!$this->imagen_marca) {
            self::$alertas['error'][] = 'La Imagen de la Marca es Obligatorio';
        }

        return self::$alertas;
    }
}