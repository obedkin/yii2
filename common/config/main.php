<?php
return [
  'name'=> 'Study Yii2',
  'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
  'modules'=>[
    'main'=>[
      'class'=>'app\modules\main\Module'
    ]
  ],
  'components' => [
    'db' => require(dirname(__DIR__)."/config/db.php"),
    'cache' => [
      'class' => 'yii\caching\FileCache',
    ],
    'urlManager' => [
      'class' => 'yii\web\UrlManager',
      'enablePrettyUrl' => TRUE,
      'showScriptName' => FALSE,
    ]
  ],
];
