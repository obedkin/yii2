<div class="row">
    <div class="col-xs-12">
    <div class="box">


        <?= \yii\grid\GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                'idadvert',
                [
                    'label' => 'Title',
                    'value' => 'title'

                ],
                'user.email',
                'price',
                'created_at:datetime',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view}  {delete}',
                    'buttons'=>[
                        'view'=>function ($url, $model, $key) {
                            return \yii\helpers\Html::a("<span class=\"glyphicon glyphicon-eye-open\"></span>", Yii::$app->params['baseUrl']."/view-advert/".$key,['target' => '_blank']);
                        }
                    ],
                ],
            ],
        ]) ?>


        </div>
        </div>

    </div>