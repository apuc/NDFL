<?php

    use yii\helpers\Html;

    /* @var $this yii\web\View */
    /* @var $model backend\modules\manager\models\db\User */

    $this->title = 'Редактирование пользователя: ' . ' ' . $model->email;
    $this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
    $this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
    $this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Назад', ['/manager'], ['class' => 'btn btn-info']) ?>
    </p>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
