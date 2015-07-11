<?php

    use yii\helpers\Html;
    use yii\widgets\DetailView;

    /* @var $this yii\web\View */
    /* @var $model backend\modules\news\models\db\News */

    $this->title = $model->title;
    $this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">

</div>
<div class="news-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data'  => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method'  => 'post',
            ],
        ]) ?>
        <?= Html::a('Назад', ['/news'], ['class' => 'btn btn-info']) ?>
    </p>

    <?= DetailView::widget([
        'model'      => $model,
        'attributes' => [
            'id',
            'title',
            'tags',
            [
                'attribute' => 'text',
                'format'    => 'html',
            ],
            'dt_add:datetime',
            [
                'attribute' => 'status',
                'value'     => \common\constants\Status::getStatusNew($model->status)
            ]
        ],
    ]) ?>

</div>
