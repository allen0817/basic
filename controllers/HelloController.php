<?php
/**
 * Created by PhpStorm.
 * User: Allen
 * Date: 2017/11/12
 * Time: 23:25
 */

namespace app\controllers;


use app\component\HelloEvent;
use app\models\Test;
use yii\web\Controller;

class HelloController extends  Controller
{
    const TEST_EVENT = 'test_event';
    const HELLO_EVENT = 'hello_event';

    public function actionIndex()
    {

        echo "this hello index<br>";

        //第一种方式在事件绑定handler时传入数据
        $test = new Test();
        $this->on(self::TEST_EVENT,[$test,Test::EVENT_HELLO],['bb','cc']);
        $this->trigger(self::TEST_EVENT);



        //第二在事件触发事件时提供数据
        $hello = new HelloEvent();
        $hello->username = "cat";
        $hello->age = 20;
        $this->on(self::HELLO_EVENT,[$test,HelloEvent::SAY_HELLO]);
        $this->trigger(self::HELLO_EVENT,$hello);



        


    }
}