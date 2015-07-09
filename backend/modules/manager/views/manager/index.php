<?php

    use yii\helpers\Html;
    use yii\grid\GridView;

    /* @var $this yii\web\View */
    /* @var $searchModel backend\modules\manager\models\db\UserSearch */
    /* @var $dataProvider yii\data\ActiveDataProvider */

    $this->title = 'Административные пользователи';
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить пользователя', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Назад', ['/'], ['class' => 'btn btn-info']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
        'columns'      => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'email:email',
            //'password',
            'name',
            'surname',
            // 'patronymic',
            // 'salt',
            [
                'attribute' => 'status',
                'format'    => 'text',
                'value'     => function ($model) {
                    return \common\constants\Status::getStatusText($model->status);
                },
                'filter'    => [-1 => "Забанен",
                                0  => "Не активирован",
                                1  => 'Активирован',
                ],
            ],
            // 'time_create:datetime',
            // 'time_update:datetime',
            // 'verification_code',
            [
                'attribute' => 'user_type',
                'format'    => 'text',
                'value'     => function ($model) {
                    return \common\constants\UserType::getUserTypeNumber($model->user_type);
                },
                'filter'    => [\common\constants\UserType::MODERATOR     => 'Модератор',
                                \common\constants\UserType::ADMINISTRATOR => 'Администратор',
                ],
            ],
            // 'image',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
