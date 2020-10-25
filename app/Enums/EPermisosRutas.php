<?php
namespace App\Enums;

class EPermisosRutas extends AEnum{
    const CREAR = 'N_1';
    const ACTUALIZAR = 'N_2';
    const CONSULTAR = 'N_3';
    const INDEXAR = 'N_4';
    const TODOS = 'N_5';
    const NINGUNO = 'N_6';
    static $items = [];

    private static function setItems()
    {
        self::$items[self::CREAR] = new EPermisosRutas(1, __('enums.permiso_crear'));
        self::$items[self::ACTUALIZAR] = new EPermisosRutas(2, __('enums.permiso_actualizar'));
        self::$items[self::CONSULTAR] = new EPermisosRutas(3, __('enums.permiso_consultar'));
        self::$items[self::INDEXAR] = new EPermisosRutas(4, __('enums.permiso_indexar'));
        self::$items[self::TODOS] = new EPermisosRutas(5, __('enums.permiso_todos'));
        self::$items[self::NINGUNO] = new EPermisosRutas(6, __('enums.permiso_ninguno'));
    }
    public static function getIndex($index){
        $items = [];
        if(self::$items == null){
            self::setItems();
        }
        $items = self::$items;
        return $items[$index];
    }
}
