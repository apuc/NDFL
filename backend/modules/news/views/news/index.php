<?php

    use yii\helpers\Html;
    use yii\grid\GridView;

    /* @var $this yii\web\View */
    /* @var $searchModel backend\modules\news\models\db\NewsSearch */
    /* @var $dataProvider yii\data\ActiveDataProvider */

    $this->title = 'News';
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить новость', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Назад', ['/'], ['class' => 'btn btn-info']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
        'columns'      => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            'title',
            'tags',
            [
                'attribute' => 'text',
                'format'    => 'html',
            ],
            [
                'attribute' => 'dt_add',
                'value'     => function ($model) {
                    return Yii::$app->formatter->asDatetime($model->dt_add);
                }
            ],
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
