<?php

    use yii\helpers\Html;
    use yii\widgets\DetailView;

    /* @var $this yii\web\View */
    /* @var $model backend\modules\manager\models\db\User */

    $this->title = 'Профиль: ';
    $this->params['breadcrumbs'][] = ['label' => 'Профиль', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data'  => [
                'confirm' => 'Вы уверены что хотите удалить профиль?',
                'method'  => 'post',
            ],
        ]) ?>
        <?= Html::a('Назад', ['/category'], ['class' => 'btn btn-info']) ?>
    </p>

    <?= DetailView::widget([
        'model'      => $model,
        'attributes' => [
            //'id',
            'name',
            //'password',

            ['attribute' => 'parent_id',
             'value'     => \common\models\db\Category::findOne(['id' => $model->parent_id])->name,
            ],
        ],
    ]) ?>

</div>
