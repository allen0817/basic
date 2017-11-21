<?php
/**
 * Created by PhpStorm.
 * User: Allen
 * Date: 2017/11/12
 * Time: 23:25
 */

namespace app\controllers;


use app\component\HelloEvent;
use app\component\MyBehavior;
use app\component\MyBehavior1;
use app\models\LoginForm;
use app\models\Member;
use app\models\News;
use app\models\Test;
use yii\base\DynamicModel;
use yii\web\Controller;
use Yii;

class HelloController extends  Controller
{
    const TEST_EVENT = 'test_event';
    const HELLO_EVENT = 'hello_event';

    public function behaviors()
    {
//        return parent::behaviors(); // TODO: Change the autogenerated stub

        return [

            MyBehavior::className(),

            [
                'class' => 'yii\filters\HttpCache',
                'only' => ['t'],
//                'lastModified' => function ($action, $params) {
//                    $q = new \yii\db\Query();
//                    return $q->from('news')->max('id');
//                },
                'cacheControlHeader' => 'public, max-age=7200', //缓存策略

                'etagSeed' => function ($action, $params) {
                    return md5('yii-china.com');
                },
            ],


        ];
    }

    public function actions()
    {
        return [
            //文件 上传
            'crop'=>[
                'class' => 'hyii2\avatar\CropAction',
                'config'=>[
                    'bigImageWidth' => '1000',     //大图默认宽度
                    'bigImageHeight' => '1000',    //大图默认高度
                    'middleImageWidth'=> '600',   //中图默认宽度
                    'middleImageHeight'=> '600',  //中图图默认高度
                    'smallImageWidth' => '100',    //小图默认宽度
                    'smallImageHeight' => '100',   //小图默认高度
                    //头像上传目录（注：目录前不能加"/"）
                    'uploadPath' => 'uploads/avatar',
                ]
            ]
        ];
    }


    public function actionIndex()
    {

        echo "this hello index<br>";

        //第一种方式在事件绑定handler时传入数据
        $test = new Test();
        $test->on(self::TEST_EVENT,[$test,Test::EVENT_HELLO],['bb','cc']);
        $test->trigger(self::TEST_EVENT);



        $test->on('aa',[$test,'bb'],null,false);
        $test->trigger('aa');



        //第二在事件触发事件时提供数据
        $hello = new HelloEvent();
        $hello->username = "cat";
        $hello->age = 20;




        $test->on(self::HELLO_EVENT,[$test,HelloEvent::SAY_HELLO]);

//        $this->off(self::HELLO_EVENT,[$test,HelloEvent::SAY_HELLO]);


        $test->trigger(self::HELLO_EVENT,$hello);
    }

    public function actionBehavior()
    {
        $test = new Test();

        $m = new MyBehavior();

//        $test->attachBehavior('m',$m);
//        $test->m();
        $test->attachBehaviors([
            MyBehavior1::className(),
            'm' =>  $m
        ]);

        $test->m();

        $test->m1();

        $password = '123';
        //生成密码
        $hash = Yii::$app->getSecurity()->generatePasswordHash($password);

        echo $hash."<br>";
        //解密
        if(Yii::$app->getSecurity()->validatePassword('123',$hash)){
            echo "success<br>";
        }else{
            echo "false<br>";
        }

    }

    public function actionT(){
//        $sqlite  =  Yii::$app->sqlite;
//        $sql = "select * from member";
//        $user = $sqlite->createCommand($sql)->queryOne();

//        $member = new Member();
//        $member->name = 'cat';
//        $member->hobby = 'read';
//        $member->save();

        //$user = Member::find()->asArray()->all();
//        $user = Member::find()->each(2);
//
//        echo "<pre>";
//        print_r($user);


        //加密
        $data = '123';
        $key = 'ADFWrw3425工EON##FF@@pw';
        $encrypt = Yii::$app->getSecurity()->encryptByPassword($data,$key);

        //解密
        $c = Yii::$app->getSecurity()->decryptByPassword($encrypt,$key);

//        echo $encrypt,'<br>',$c;
//        die;

        foreach (Member::find()->each(1) as $m){
            //echo $m->name,'<br>';
        }


        $params = array('name','email','password','captcha');

        $model = DynamicModel::validateData($params,[
            [['name','password','email','captcha'],'required'],
            [['email'],'email','message'=>'邮箱不正确'],
            [['name'],'string','message'=>'名字不能为空'],
            [['captcha'],'captcha','message'=>'error'],
        ]);




        return $this->render('t',['model'=>$model]);




    }


    public function actionMail(){
        $model = new LoginForm();

        $mail = Yii::$app->mailer->compose('/site/login',['model'=>$model,'name' => 'allen']);
        $mail->setTo('1009336683@qq.com');
        $mail->setSubject('login');
        //$mail->setHtmlBody('<h1>hello world</h1>');


//        for ($i=0;$i<1;$i++){
//            $mail->send();
//        }
    }


    public function actionUpload(){
        return $this->render('upload');
    }


}