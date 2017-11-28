<?php
/**
 * Created by PhpStorm.
 * User: Allen
 * Date: 2017/11/27
 * Time: 23:40
 */

namespace app\common\classes;


use app\models\Test1;
use yii\base\BaseObject;
use yii\queue\JobInterface;






class InsertTest extends BaseObject implements JobInterface
{


    public function execute($queue)
    {
        for ($i=0;$i<5;$i++){
            sleep(1);
            $m = new Test1();
            $m->name = 'test_'.$i;
            $m->number = mt_rand(10000,99999);
            $m->time = time();
            $m->detail = 'hello world';

            $m->save(false);
        }
    }
}