<?php

namespace App\Enums;

class DocumentTypeEnum
{
    const PERSONAL = 'PERSONAL';
    const SLC = 'SLC';
    const HSEB = 'HSEB/NEB';
    const BACHELOR = 'BACHELOR';
    const MASTER = 'MASTER';
    const VOUCHER = 'VOUCHER';



    public static function values()
    {
        return [
            self::PERSONAL,
            self::SLC,
            self::HSEB,
            self::BACHELOR,
            self::MASTER,
            self::VOUCHER
        ];
    }
}
