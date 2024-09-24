<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'th',
    'components' => [
        
        'assetManager' => [
            'bundles' => [
                'yii\bootstrap\BootstrapAsset' => [
                    'sourcePath' => '../web/css',
                    'css' => [
                        'bootstrap.min.css'
                    ]
                ],
                'yii\web\JqueryAsset' => [
                    'sourcePath' => '../web/js',
                    'js' => [
                        'jquery-1.11.3.min.js'
                    ]
                ],
            ],
        ],

        'i18n' => [ 
            'translations' => [ 
                'app' => [ 
                    'class' => 'yii\i18n\PhpMessageSource', 
                    'basePath' => '../messages', 
                    'fileMap' => 
                    [ 
                        'app' => 'app.php', 
                        'app/error' => 'error.php', 
                    ], 
                ], 
            ], 
        ],

        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'bd9ce9c84a3ddbe577f734a6c0daa090f64e9eb789e83dface14d19134dadfc1',
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
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.mailgun.org',
                'username' => 'postmaster@cc-oo.suffixworks.com',
                'password' => '2rpzz5rkgzw7',
            ],
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            // 'useFileTransport' => true,
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
    ],
    'params' => $params,
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
    ];
}

return $config;
