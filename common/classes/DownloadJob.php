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

class DownloadJob extends BaseObject implements JobInterface
{
    public $url;
    public $file;

    public function execute($queue)
    {
        file_put_contents($this->file, file_get_contents($this->url));
    }
}



