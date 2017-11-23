<?php
/**
 * Created by PhpStorm.
 * User: Allen
 * Date: 2017/11/23
 * Time: 23:35
 */

namespace app\common\classes;


use app\common\Interfaces\Animal;

class Cat implements Animal
{
    public function eat()
    {
        // TODO: Implement eat() method.
        echo "cat eating....<br>";
    }

    public function sing()
    {
        // TODO: Implement sing() method.
        echo "cat singing....<br>";
    }
}