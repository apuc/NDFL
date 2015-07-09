<?php

    use yii\helpers\Html;
    use yii\widgets\DetailView;

    /* @var $this yii\web\View */
    /* @var $model backend\modules\manager\models\db\User */

    $this->title = 'Профиль: ' . $model->email;
    $this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data'  => [
                'confirm' => 'Вы уверены что хотите удалить профиль ' . $model->email . '?',
                'method'  => 'post',
            ],
        ]) ?>
        <?= Html::a('Назад', ['/manager'], ['class' => 'btn btn-info']) ?>
    </p>

    <?= DetailView::widget([
        'model'      => $model,
        'attributes' => [
            //'id',
            'email:email',
            //'password',
            'surname',
            'name',
            'patronymic',
            //'salt',
            ['attribute' => 'status',
             'value'     => \common\constant\Status::getStatusText($model->status),
            ],
            'time_create:datetime',
            'time_update:datetime',
            //'verification_code',
            ['attribute' => 'user_type',
             'value'     => \common\constant\UserType::getUserTypeNumber($model->user_type),
            ],
            ['attribute' => 'image',
             'format'    => 'html',
             'value'     => Html::img('/image/' . $model->image),
            ],
        ],
    ]) ?>

</div>
