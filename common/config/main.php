<?php
return [
  'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
  'components' => [
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
