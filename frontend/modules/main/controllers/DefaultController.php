<?php

namespace app\modules\main\controllers;

use frontend\components\Common;
use yii\web\Controller;
use yii\db\Query;

class DefaultController extends Controller
{

    public function actionIndex()
    {
        $this->layout = "bootstrap";
        $query = new Query();
        $command = $query->from('advert')->orderBy('idadvert desc')->limit(5);
        $result_general = $command->all();
        $count_general = $command->count();

        return $this->render('index',['result_general' => $result_general, 'count_general' => $count_general]);
    }



    public function actionEvent(){

        $component = \Yii::$app->common; //new Common();
        $component->on(Common::EVENT_NOTIFY,[$component,'notifyAdmin']);
        $component->sendMail("test@domain.com","Test","Test text");
        $component->off(Common::EVENT_NOTIFY,[$component,'notifyAdmin']);

    }





    public function actionLoginData(){

        print \Yii::$app->user->identity->username;
    }
}
