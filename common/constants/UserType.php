<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 23.06.2015
 * Time: 20:43
 */

namespace common\constants;


class UserType {
    const USER = 2;
    const MODERATOR = 3;
    const ADMINISTRATOR = 4;


    public static function getUserTypeNumber($userNum)
    {
        switch($userNum){
            case self::USER:
                return 'Зарегестрированный пользователь';
            case self::MODERATOR:
                return 'Модератор';
            case self::ADMINISTRATOR:
                return 'Администратор';
        }
    }

    public static function getUserTypeText($userNum){
        switch($userNum){
            case self::USER:
                return "user";
            case self::MODERATOR:
                return "moderator";
            case self::ADMINISTRATOR:
                return "administrator";
        }
    }
}