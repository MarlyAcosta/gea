<?php
namespace App\Enums;

class EEncapsulamientoRutas extends AEnum{
    const PUBLICA = 'N_1';
    const PROTEGIDA = 'N_2';
    const PRIVADA = 'N_3';
    static $items = [];

    private static function setItems()
    {
        self::$items[self::PUBLICA] = new EEncapsulamientoRutas(1, __('enums.publica'));
        self::$items[self::PROTEGIDA] = new EEncapsulamientoRutas(2, __('enums.protegida'));
        self::$items[self::PRIVADA] = new EEncapsulamientoRutas(3, __('enums.privada'));
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
