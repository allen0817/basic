<?php
/**
 * Created by PhpStorm.
 * User: Allen
 * Date: 2017/11/26
 * Time: 01:18
 */

namespace  app\common\classes;

class Test
{

    public function __construct(){
        $fd = fopen('a.txt','a+');
        fwrite($fd,'2');
    }

    public function news($str=''){
        echo "get: ",$str,'<br>';

    }


}