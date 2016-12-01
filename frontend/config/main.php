<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'language' => 'en-EN',
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@dektrium/user/views' => '@app/views/user'
                ],
            ],
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'request'      => [
            'baseUrl' => '',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '' => 'waiting/waiting',
                'stock' => 'stock/stock',
                'packed' => 'packed/packed',
                'shipped' => 'shipped/shipped',
            ]
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false,
        ],
    ],
    'modules' => [
        'mainpage' => [
            'class' => 'frontend\modules\mainpage\Mainpage'
        ],
        'waiting' => [
            'class' => 'frontend\modules\waiting\Waiting',
        ],
        'stock' => [
            'class' => 'frontend\modules\stock\Stock',
        ],
        'address' => [
            'class' => 'frontend\modules\address\Address',
        ],
        'packed' => [
            'class' => 'frontend\modules\packed\Packed',
        ],
        'shipped' => [
            'class' => 'frontend\modules\shipped\Shipped',
        ],
    ],
    'params' => $params,
];
