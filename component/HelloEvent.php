<?php
/**
 * Created by PhpStorm.
 * User: Allen
 * Date: 2017/11/12
 * Time: 23:28
 */
namespace  app\component;

use yii\base\Event;

class  HelloEvent extends  Event{

    public $username;
    public $age;

    const SAY_HELLO = 'sayHello';


}