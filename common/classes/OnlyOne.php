<?php
/**
 * Created by PhpStorm.
 * User: Allen
 * Date: 2017/11/26
 * Time: 00:45
 */

namespace  app\common\classes;


class  OnlyOne
{
    //静态变量保存全局实例
    private static $_instance = null;

    //私有构造函数，防止外界实例化对象
    private function __construct(){
        $fd = fopen('a.txt','a+');
        fwrite($fd,'1');
    }

    //私有克隆函数，防止外办克隆对象

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    //静态方法，单例统一访问入口
    static public function getInstance() {
        if (is_null ( self::$_instance ) || !isset ( self::$_instance )) {
            self::$_instance = new self ();
        }
        return self::$_instance;
    }

    public function hello($str=''){
        echo "hello :",$str,"<br>";
    }

}