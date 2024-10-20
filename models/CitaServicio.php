<?php

namespace Model;

class CitaServicio extends ActiveRecord {
    protected static $tabla = 'citasServicios';
    protected static $columnasDB = ['id', 'citaId', 'servicioId', 'productoId'];

    public $id;
    public $citaId;
    public $servicioId;
    public $productoId;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->citaId = $args['citaId'] ?? '';
        $this->servicioId = $args['servicioId'] ?? null; // puede ser null
        $this->productoId = $args['productoId'] ?? null; // puede ser null
    }
}


