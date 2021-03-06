<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'Laymeneasylife',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'timeZone' => 'Asia/Karachi',
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'cdzEiQSSRoh9tjhI9XWFbLjYwLxTvjPX',
        ],
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
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
    /*
      'urlManager' => [
      'enablePrettyUrl' => true,
      'showScriptName' => false,
      'rules' => [
      ],
      ],
     */
    ],
    'params' => $params,
];
$config['modules']['laymengenerator'] = [
    'class' => 'app\modules\Generator\Module',
     'allowedIPs' => ['*'],
    'generators' => [ //here
        'mycrud' => [ // generator name
            //'class' => 'yii\gii\generators\crud\Generator', // generator class
            'class' => 'app\crudTemplates\crud\Generator', // generator class
            'templates' => [ //setting for out templates
                'myCrud' => '@app/crudTemplates/crud/default', // template name => path to template
            ]
        ],
        'mymodel' => [ // generator name
            //'class' => 'yii\gii\generators\crud\Generator', // generator class
            'class' => 'app\crudTemplates\model\Generator', // generator class
            'templates' => [ //setting for out templates
                'myCrud' => '@app/crudTemplates/crud/default', // template name => path to template
            ]
        ],
    ]
];


if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'generators' => [ //here
            'mycrud' => [ // generator name
                //'class' => 'yii\gii\generators\crud\Generator', // generator class
                'class' => 'app\crudTemplates\crud\Generator', // generator class
                'templates' => [ //setting for out templates
                    'myCrud' => '@app/crudTemplates/crud/default', // template name => path to template
                ]
            ],
            'mymodel' => [ // generator name
                //'class' => 'yii\gii\generators\crud\Generator', // generator class
                'class' => 'app\crudTemplates\model\Generator', // generator class
                'templates' => [ //setting for out templates
                    'myCrud' => '@app/crudTemplates/crud/default', // template name => path to template
                ]
            ],
        ]
    ];
}

return $config;
