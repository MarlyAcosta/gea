<?php
namespace App\Enums;

class EActivo extends AEnum{
    const ACTIVO = 'N_1';
    const INACTIVO = 'N_2';
    static $items = [];

    private static function setItems()
    {
        self::$items[self::ACTIVO] = new EActivo(1, __('enums.activo'));
        self::$items[self::INACTIVO] = new EActivo(2, __('enums.inactivo'));
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
