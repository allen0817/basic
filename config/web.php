<?php

$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');
$sqlite = require(__DIR__ . '/sqlite.php');
$mail = require (__DIR__ . '/mailer-local.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'modules' => [
        'gridview' =>  [
            'class' => '\kartik\grid\Module'
        ],


        'admin' => [
            //'class' => 'mdm\admin\Module',
            //'layout' => 'left-menu',         //yii2-admin的导航菜单
            'class' => 'app\modules\admin\Module',
            'layout' => 'left-menu',         //yii2-admin的导航菜单

        ],


    ],



//    'aliases' => [
//        '@mdm/admin' => '@vendor/mdmsoft/yii2-admin',
//    ],

    'as access' => [
        //'class' => 'mdm\admin\components\AccessControl',
        'class' => 'app\modules\admin\components\AccessControl',
        'allowActions' => [
            'admin/*',            //配置允许权限
            '*',
        ]
    ],


    'components' => [


        'authManager' => [
            'class' => 'app\modules\admin\components\DbManager',
            'defaultRoles' => ['guest'],
        ],




        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'JOIWSWOHWHWY##SFJWOJ',
        ],

//        'response' => [
//            'class' => 'yii\web\Response',
//            'on beforeSend' => function ($event) {
//                $response = $event->sender;
//                if ($response->data !== null) {
//                    $response->data = [
//                        'success' => $response->isSuccessful,
//                        'data' => $response->data,
//                    ];
//                    $response->statusCode = 200;
//                }
//            },
//        ],


        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                'file' =>  [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],

            ],
        ],
        'db' => $db,
        'sqlite' => $sqlite,
        'mailer' => $mail,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
//            'enableStrictParsing' => false,
            'rules' => [

            ]
        ],


    ],
    //'defaultRoute' => 'site/hello',
//    'catchAll' => ['site/login'],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
