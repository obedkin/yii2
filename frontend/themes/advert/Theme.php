<?php

namespace frontend\themes\advert;
use Yii;

class Theme extends \yii\base\Theme
{
    public $pathMap = [
        '@frontend/views'   => '@frontend/themes/advert/views',
        '@frontend/modules' => '@frontend/themes/advert/modules'
    ];

    public function init()
    {
        parent::init();
    }
}
