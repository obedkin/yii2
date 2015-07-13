<?php

namespace app\modules\cabinet\controllers;

use common\models\User;
use frontend\models\ChangePasswordForm;
use Imagine\Image\Box;
use Yii;
use yii\imagine\Image;
use yii\web\Controller;
use yii\web\UploadedFile;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function uploadAvatar(){
        if(Yii::$app->request->isPost){
            $id = Yii::$app->user->id;
            $path = Yii::getAlias("@frontend/web/uploads/users");
            $file = UploadedFile::getInstanceByName('avatar');
            if($file) {
                $name = $id . '.jpg';
                $file->saveAs($path . DIRECTORY_SEPARATOR . $name);


                $image = $path . DIRECTORY_SEPARATOR . $name;
                $new_name = $path . DIRECTORY_SEPARATOR . "small_" . $name;

                Image::frame($image, 0, '666', 0)
                  ->thumbnail(new Box(200, 200))
                  ->save($new_name, ['quality' => 100]);

                return true;
            }
        }

    }

    public function actionChangePassword(){

        $model = new ChangePasswordForm();

        if($model->load(\Yii::$app->request->post()) && $model->changepassword()){

            $this->refresh();

        }

        return $this->render('change-password',['model' => $model]);
    }

    public function actionSettings(){

        $model = User::findOne(\Yii::$app->user->id);
        $model->scenario = 'setting';

        if($model->load(\Yii::$app->request->post()) && $model->save()){
            $this->uploadAvatar();
            $this->refresh();

        }

        return $this->render('setting',['model' => $model]);

    }
}
