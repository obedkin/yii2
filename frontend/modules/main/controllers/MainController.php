<?php
namespace app\modules\main\controllers;

use frontend\models\Image;

class MainController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $this->layout = 'bootstrap';
        return $this->render('index');
    }

}
