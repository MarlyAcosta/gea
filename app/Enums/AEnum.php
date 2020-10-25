<?php
namespace App\Enums;

abstract class AEnum{
    protected $id, $nombre, $descripcion;
    public function __construct($id, $nombre, $descripcion = '')
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
    }
    public function getId(){
        return $this->id;
    }
    public function getNombre(){
        return $this->nombre;
    }
}
