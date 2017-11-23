<?php
/**
 * Created by PhpStorm.
 * User: Allen
 * Date: 2017/11/24
 * Time: 01:01
 */

namespace app\common\classes;




use app\common\Interfaces\Animal;
use yii\web\HttpException;

class AnimalFactory
{


    public static function create($type){

        $class = "\\app\\common\\classes\\".$type;

        if (class_exists($class)){
            $animal = new $class();
            if($animal instanceof  Animal){
                return $animal;
            }
        }
        throw new HttpException(500,'没有此类');
    }

}