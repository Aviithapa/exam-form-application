<?php

namespace App\Enums;

class StatusEnum
{
    const REJECTED = 'rejected';
    const PROGRESS = 'progress';
    const APPROVED = 'approved';


    public static function values()
    {
        return [
            self::REJECTED,
            self::PROGRESS,
            self::APPROVED,
        ];
    }
}
