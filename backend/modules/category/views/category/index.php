<?php
    use yii\grid\DataColumn;
    use yii\helpers\Html;
    use yii\grid\GridView;

    /**
     * @var $this yii\web\View
     * @var $searchModel backend\modules\category\models\form\CategorySearch
     * @var $dataProvider yii\data\ActiveDataProvider
     *
     */
?>

<div>
    <h2>
        <?= Html::a('Добавить категорию', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Назад', ['/'], ['class' => 'btn btn-info']) ?>
    </h2>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
        'layout'       => '{summary}{items}{pager}',
        'columns'      => [
            [
                'attribute' => 'name',
                'format'    => 'html',
                'value'     => function ($model) {
                    return str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;", $model->lvl) . $model->name;
                }
                //'filter'    => false,
            ],
            //            [
            //                'class'  => DataColumn::className(),
            //                'header' => 'Действия',
            //                'format' => 'html',
            //                'value'  => function ($model, $index, $widget) {
            //                    $buttons =
            //                        Html::a(
            //                            "<span class='glyphicon glyphicon-pencil'></span>",
            //                            Yii::$app->urlManager->createUrl(['category/category/update', 'id' => $model->id]), [
            //                            'class' => 'btn btn-primary pull-left',
            //                            'title' => 'Редактировать',
            //                        ])
            //                        .
            //                        Html::a(
            //                            "<span class='glyphicon glyphicon-trash'></span>",
            //                            Yii::$app->urlManager->createUrl(['category/category/delete', 'id' => $model->id]), [
            //                            'class' => 'btn btn-default pull-right',
            //                            'title' => 'Удалить',
            //                        ]);
            //
            //                    return $buttons;
            //                }
            //            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>