<?php

    namespace common\constants;


    class Status
    {
        const BANNED = -1;
        const NO_ACTIVE = 0;
        const ACTIVE = 1;
        const ACTIVE_TEXT = "Активен";
        const QEUEUE_TEXT = "В очередь";
        const QEUEUE = 2;

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

        public static function getStatusNew($status){
            if(self::ACTIVE == $status){
                return self::ACTIVE_TEXT;
            }
            else {
                return self::QEUEUE_TEXT;
            }
        }
    }