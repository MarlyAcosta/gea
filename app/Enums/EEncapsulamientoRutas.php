<?php
namespace App\Enums;

class EEncapsulamientoRutas extends AEnum{
    const PUBLICA = 'N_1';
    const PROTEGIDA = 'N_2';
    const PRIVADA = 'N_3';
    static $items = [];

    public function setItems()
    {
        $items[self::PUBLICA] = new EEncapsulamientoRutas(1, __('enums.publica'));
        $items[self::PROTEGIDA] = new EEncapsulamientoRutas(2, __('enums.protegida'));
        $items[self::PRIVADA] = new EEncapsulamientoRutas(3, __('enums.privada'));
    }
}
