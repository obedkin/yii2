<?php
namespace app\modules\main\controllers;

use frontend\models\ContactForm;
use frontend\models\Image;
use frontend\models\SignupForm;
use yii\base\Response;
use yii\bootstrap\ActiveForm;

class MainController extends \yii\web\Controller
{
    public $layout = 'inner';

    public function actions()
    {
        return [

          'captcha' => [
            'class' => 'yii\captcha\CaptchaAction',
            'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
          ],
        ];
    }

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

    public function actionContact(){

        $model =  new ContactForm();
        if ($model->load(\Yii::$app->request->post()) && $model->validate()){
            \Yii::$app->common->sendMail($model->subject,$model->body);
            print_r ('success');
            die;
        }

        return $this->render('contact',['model'=>$model]);
    }

}
