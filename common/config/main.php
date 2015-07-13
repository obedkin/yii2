<?php
return [
    'name' => 'Advert Project',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [

        'db' => require(dirname(__DIR__)."/config/db.php"),
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],

        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
          'rules' => [
            'pages/<view:[a-zA-Z0-9-]+>' => 'main/main/page',
            'view-advert/<id:\d+>' => 'main/main/view-advert',
            'cabinet/<action_cabinet:(settings|change-password)>' => 'cabinet/default/<action_cabinet>'
          ],
        ],
    ],
];
