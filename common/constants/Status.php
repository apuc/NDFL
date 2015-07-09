<?php

    namespace common\constants;


    class Status
    {
        const BANNED = -1;
        const NO_ACTIVE = 0;
        const ACTIVE = 1;

        public static function getStatusText($status)
        {
            switch($status){
                case self::BANNED:
                    return 'Забанен';
                case self::NO_ACTIVE:
                    return 'Не активирован';
                case self::ACTIVE:
                    return 'Активирован';
            }
        }
    }