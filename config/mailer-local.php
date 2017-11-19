<?php
return [
    'class' => 'yii\swiftmailer\Mailer',
    'useFileTransport' => false, //false发送邮件，true只是生成邮件在runtime文件夹下，不发邮件
    'transport' => [
         'class' => 'Swift_SmtpTransport',
         'host' => 'smtp.qq.com', //每种邮箱的host配置不一样，主要指$
         'username' => '1009336683@qq.com',
         'password' => 'gxczvskrttekbfji',//授权码跟密码均可
         'port' => '465',
         'encryption' => 'ssl'
    ],
    'messageConfig' => [
        'charset' => 'UTF-8',
        'from' => ['1009336683@qq.com' => '测试']
    ],
];
