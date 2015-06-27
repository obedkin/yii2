<?php
namespace frontend\components;

use yii\base\Component;

class Common extends Component{

    const EVENT_NOTIFY = 'notify_admin';

    public function sendMail($subject,$text,$emailFrom='obedkinav@ya.ru',$nameFrom='Advert'){
        if(\Yii::$app->mail->compose()
          ->setFrom(['yii2.school@yandex.ru' => 'Advert'])
          ->setTo([$emailFrom => $nameFrom])
          ->setSubject($subject)
          ->setHtmlBody($text)
          ->send()){
            $this->trigger(self::EVENT_NOTIFY);
            return true;
        }
    }

    public function notifyAdmin($event){

        print "Notify Admin";
    }



}