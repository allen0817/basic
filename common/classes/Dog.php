<?php
/**
 * Created by PhpStorm.
 * User: Allen
 * Date: 2017/11/23
 * Time: 00:18
 */
namespace  app\common\classes;

use app\common\Interfaces\Animal;

class  Dog implements Animal
{
    public function eat()
    {
        // TODO: Implement eat() method.
        echo "dog eating....<br>";

    }

    public function sing()
    {
        // TODO: Implement sing() method.
        echo "dog singing....<br>";
    }
}