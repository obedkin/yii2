<?php
namespace app\modules\main\controllers;

use frontend\models\Image;
use frontend\models\SignupForm;
use yii\base\Response;
use yii\bootstrap\ActiveForm;

class MainController extends \yii\web\Controller
{
    public $layout = 'inner';

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionRegister()
    {
        $model = new SignupForm();

        if(\Yii::$app->request->isAjax && \Yii::$app->request->isPost){
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load($_POST) && $model->signup()){
            print_r ($model->getAttributes());
            die;
        }
        return $this->render('register',['model'=>$model]);
    }

}
